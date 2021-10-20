<?php

namespace App\Http\Controllers;

use App\Models\AdditionSubCategory;
use App\Models\Cart;
use App\Models\CartAdditions;
use App\Models\General;
use App\Models\Offer;
use App\Models\Product;
use App\Models\SubAdditionOffers;
use App\Models\SubAdditionProducts;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ip = $this->get_client_ip();

        $carts = Cart::where('ip',$ip)->with(['offers','products'])->get();

        return $carts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    function get_client_ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {

        return $request;
        $request->validate([
            'price' => 'required',
            'product_id' => 'required_without:offer_id|int|exists:products,id',
            'offer_id' => 'required_without:product_id|int|exists:offers,id',
        ]);
        $ip = $this->get_client_ip();

        if($request->product_id){
            $oldcart = Cart::where("ip",'=',$ip)->where("product_id",'=',$request->product_id);
        }

        if($request->offer_id){
            $oldcart = Cart::where("ip",'=',$ip)->where("offer_id",'=',$request->offer_id);
        }

        if ($oldcart->first()) {
            $oldcart->update([
                'quantity' => $oldcart->first()->quantity +1,
            ]);
            return response()->json($oldcart);
        }
        if($request->product_id){

        $cart = Cart::create([
            'ip' => $ip,
            'product_id' => $request->product_id,
            'price' => $request->price,
        ]);
        }
        if($request->offer_id){

        $cart = Cart::create([
            'ip' => $ip,
            'offer_id' => $request->offer_id,
            'price' => $request->price,
        ]);
        }

        return $cart;

    //     $this->alert('success', 'Complete add product to cart', [
    //         'position' =>  'top-end',
    //         'timer' =>  3000,
    //         'toast' =>  true,
    //         'text' =>  '',
    //         'confirmButtonText' =>  'Ok',
    //         'cancelButtonText' =>  'Cancel',
    //         'showCancelButton' =>  true,
    //         'showConfirmButton' =>  false,
    //   ]);
    }

    public function storeOffer(Request $request,$id){

        $ip = $this->get_client_ip();

        $offer = Offer::findOrFail($id);
        $general = General::first();

        $idsString = $request->except('_token','quantity');

        if($idsString == []){
            $request->session()->put('message',"You must choose it least one of the additions");
            return back()->with('result', "faile");
        }

            $oldcart = Cart::where("ip",'=',$ip)->where("offer_id",'=',$id);


        if ($oldcart->first()) {
            $oldcart->update([
                'quantity' => $oldcart->first()->quantity +1,
            ]);
            return back()->with([
                'message' => 'The order already founded',
            ]);
        }
        $price = $offer->price;
        $ids =[];

        $quantity = 1;
        $cart = Cart::create([
            'ip' => $ip,
            'offer_id' => $offer->id,
            'service_fee' => $general->delivery_price,
            'price' => $price,
            'delivary_price' => 0,
            'quantity' => $quantity,
        ]);

        if($request->quantity){
            $cart->update([
                'quantity' => $request->quantity,
                'price' =>  $price * $request->quantity,
            ]);
        }

        return $idsString;


        if($idsString != []){
            foreach($idsString as $key => $val){
                $ids[] = $key;
            }

            foreach($ids as $id){
                $addition = AdditionSubCategory::find($id);

                CartAdditions::create([
                    'cart_id' => $cart->id,
                    'addition_sub_id' => $addition->id,
                ]);

                $price += $addition->price;
            }
        }

        return back();
    }


    public function storeProduct(Request $request,$id){
        $ip = $this->get_client_ip();

        $product = Product::findOrFail($id);

        if($request->sub_addition == [] && $product->additions()->first()){
            $request->session()->put('message',"You must choose it least one of the additions");
            return back()->with('result', "faile");
        }

            $oldcart = Cart::where("ip",'=',$ip)->where("product_id",'=',$id);


        if ($oldcart->first()) {
            $oldcart->update([
                'quantity' => $oldcart->first()->quantity +1,
            ]);
            return back();
        }

        $price = $product->price;
        $general = General::first();



        $quantity = 1;
        $cart = Cart::create([
            'ip' => $ip,
            'product_id' => $product->id,
            'price' => $price * $quantity,
            'service_fee' => $general->delivery_price,
            'delivary_price' => 0,
            'quantity' => $quantity,
        ]);


        if($request->quantity){
            $cart->update([
                'quantity' => $request->quantity,
                'price' =>  $price * $request->quantity,
            ]);
        }


            foreach($request->sub_addition as $id){
                $addition = AdditionSubCategory::find($id);

                $name = $addition->name;
                $firstWord = explode(" ",$name);
                $count_input = 1;
                $length = count($firstWord) -1;

                if($request["$firstWord[0]_$firstWord[$length]"]){

                    $count_input = $request["$firstWord[0]_$firstWord[$length]"];
            }

                $cart_addition =  CartAdditions::create([
                    'cart_id' => $cart->id,
                    'addition_sub_id' => $addition->id,
                    'count' => $count_input,
                ]);

                $price += $addition->price * $cart_addition->count;
            }


            $cart->price = $price;
            $cart->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();

        return back();
    }
}
