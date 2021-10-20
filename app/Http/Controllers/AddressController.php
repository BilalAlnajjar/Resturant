<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Place;
use App\Models\Address;
use App\Models\General;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (!$request->delivary){
             $request->session()->put('message','Delivery method must be selected.');
            return back()->with('result','oops');
        }
        $ip = $this->get_client_ip();
        $carts = Cart::where('ip',$ip)->get();

        if(count($carts) == 0 ){
            $request->session()->put('message',"Not found orders in your cart");
            return back()->with('result', "faile");
        }

        $service_fee = General::first()->delivery_price;
        $delivery_price = Place::first()->price;


        if($request->delivary == 'true'){
            foreach($carts as $cart){
                $cart->delivary_price = $delivery_price;
               $cart->save();
            }
        }

        if($request->delivary == 'false'){
        foreach($carts as $cart){
           $cart->delivary_price = 0;
           $cart->save();
        }
        }

        foreach($carts as $cart){
            $cart->service_fee = $service_fee;
            $cart->save();
         }



        return redirect()->route('order.user');
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAddress(Request $request){
        $request->validate([
            'name' => 'required',
            'surename' => 'required',
            'city' => 'required',
            'street' => 'required',
            'mobile' => 'required|numeric',
            'email' => 'required|email',
        ]);




        $ip = $this->get_client_ip();


        $adress =  Address::create([
            'name' => $request->name,
            'surename' => $request->surename,
            'city' => $request->city,
            'street' => $request->street,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'order_id' => $order->id,
        ]);

        return redirect()->route('checkout.index');

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
     * Display the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'order_id' => 'nullable|exists:orders,id',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $user = auth('api')->user();
        $address = $user->address;
        $address->update($request->only('provice','town','street','number_of_build','number_of_apartment'));

        return response()->json([
           'address' =>  $address,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = Address::findOrFail($id);
        $address->delete();

        return response()->json([
            'message' => 'address is deleted',
        ]);
    }


}
