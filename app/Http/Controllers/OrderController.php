<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Email;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Place;
use App\Mail\NewOrder;
use App\Mail\OrderUser;
use App\Models\AdditionSubCategory;
use App\Models\Address;
use App\Models\CartAdditions;
use App\Models\General;
use App\Models\Product;
use App\Models\Customer;
use App\Models\WorkHours;
use App\Models\OrderOffer;
use App\Models\SetingEmail;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Models\SubAdditionOffers;
use App\Models\SubAdditionProducts;
use App\Notifications\acceptOrder;
use Illuminate\Support\Facades\Mail;
use App\Notifications\OrderNotification;
use Illuminate\Support\Facades\Validator;
use App\Notifications\newOrderNotification;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
   public $order;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->where('payment_type','!=',null)->get();
       return view('admin.orders',[
           'orders' => $orders,
       ]);
    }

    public function orderCustomer(){
        $ip = $this->get_client_ip();
        return $order = Order::where('ip',$ip)->where('payment_type','!=',null)->first();

        return $order;
    }

    public function indexUser(){

        // return Cart::first()->delivary_price;
        $places = Place::all();
        return view('checkout',[
            'places' => $places,
        ]);
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

    public function indexPending()
    {
        $orders = Order::where('status','pending')->where('payment_type','!=',null)->orderBy('id', 'desc')->get();

       return view('admin.orders',[
           'orders' => $orders,
       ]);
    }

    // public function indexProcessing()
    // {
    //     $orders = Order::where('status',"!=",'processing')->get();

    //    return view('admin.orders',[
    //        'orders' => $orders,
    //    ]);
    // }

    public function indexDeclined()
    {
        $orders = Order::where('status','declined')->where('payment_type','!=',null)->orderBy('id', 'desc')->get();

       return view('admin.orders',[
           'orders' => $orders,
       ]);
    }

    public function indexComplete()
    {
        $orders = Order::where('status','completed')->where('payment_type','!=',null)->orderBy('id', 'desc')->get();

       return view('admin.orders',[
           'orders' => $orders,
       ]);
    }

    public function indexOrdersCustomer($id){
        $customer = Customer::findOrFail($id);
        $orders = $customer->orders()->where('payment_type','!=',null)->get();

        return view('admin.orders',[
            'orders' => $orders,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function confirmation($id){

        $address = Address::findOrFail($id);
        $order = $address->order()->first();
        $delivery_price = Place::first()->price;
        return view('confeirm',[
            'address' => $address,
            'order' => $order,
            'delivery_price' => $delivery_price,

        ]);
    }

    // public function indexShipping()
    // {
    //     $orders = Order::where('status','shipping')->get();

    //    return view('admin.orders',[
    //        'orders' => $orders,
    //    ]);
    // }


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
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surename' => 'required',
            // 'city' => 'required',
            'mobile' => 'required',
            'email' => ['required','email'],
            'timeLater' => 'nullable',
            'time' => [Rule::requiredIf(Cart::where('ip',$this->get_client_ip())->first()->delivary_price != 0)],
            'payment_type' => "required",
            'postcode' => Rule::requiredIf(Cart::where('ip',$this->get_client_ip())->first()->delivary_price != 0),
        ]);

        $t = new DateTime();
        $tim = $t->format('H:i');
        $general = General::first();
        if(!$general){
            $request->session()->put('message',"The restaurant is currently closed,please contact during working hours");
            return redirect()->route('index')->with('result', "faile");
        }
        if(!($general->hour_from < $tim && $tim < $general->hour_to)){

            $from = General::first()->hour_from;
            $to = General::first()->hour_to;

            $request->session()->put('message',"The restaurant is currently closed,please contact during working hours form $from to $to");
            return redirect()->route('index')->with('result', "faile");

        }
        // // return $request->payment_type;
        // $time = '';


        // if($request->time == 1){

        //     $time = 'now';
        // }else if($request->time == 2){
        //     $time = 'later';
        // }
        $ip = $this->get_client_ip();


        // $place = Place::where('name',$request->city)->first();


        // $carts = Cart::where('ip',$ip)->get();
        // $product_order = [];
        // $offer_order = [];

        // // foreach($carts as $cart){
        // //     $product_order[$cart->id] = OrderProduct::where('ip',$ip)->where('product_id',$cart->product_id)->first();
        // //     $offer_order[$cart->id] = OrderOffer::where('ip',$ip)->where('offer_id',$cart->offer_id)->first();
        // // }



        // $length = count(array_filter($offer_order)) + count(array_filter($product_order));


        // if(!$carts->first()){
        //     $request->session()->put('message','You do not have order at the moment');
        //     return redirect()->route('index')->with('result', "faile");

        // }

        // $cart_products = $cart->products()->get();
        // $cart_offers = $cart->offers()->get();

         $customer = Customer::where('ip',$ip)->first();

        if(!$customer){
            $customer = Customer::create([
                'name' => $request->name,
                'surename' => $request->surename,
                'ip' => $ip,
                // 'city' => $request->city,
                // 'street' => $request->street,
                'mobile' => $request->mobile,
                'email' => $request->email,
            ]);
        }

        $number = random_int(100,100000);


    // if(count(array_filter($offer_order)) != count($carts) && count(array_filter($product_order)) != count($carts) && $length != count($carts)){
        $qunatity = 1;
            if($request->quantity){
                $quntity = $request->quantity;
            }
            $general = General::first();
            $place = Place::first();
            $total = $general->delivery_price + $place->price;

            $address =  Address::create([
                'name' => $request->name,
                'surename' => $request->surename,
                // 'city' => $request->city,
                // 'street' => $request->street,
                'mobile' => $request->mobile,
                'email' => $request->email,
                'customer_id' => $customer->id,
            ]);

            if($request->postcode){
                $address->update([
                'postcode' => $request->postcode,
                'company' => $request->company,
                'address1' => $request->address1,
                'address2' => $request->address2,
                'town' => $request->town,
                ]);
            }
/******************************************************** */
        // $order = Order::create([
        //     'number' => $number,
        //     'ip' => $ip,
        //     'quantity' => $qunatity,
        //     'price' => $total,
        //     'time' => $time,
        //     'timeLater' => $request->timeLater,
        //     'address_id' => $address->id,
        //     'customer_id' => $customer->id,
        // ]);

        // foreach($carts as $cart){
        //     $cart->update([
        //         'order_id'=> $order->id,
        //         'service_fee' => $general->delivery_price,
        //         'delivary_price' => $place->price,
        //     ]);
        //     $total += $cart->price;

        //     foreach($cart->additions as $addition){
        //         $total += $addition->price;
        //     }

        //     $order->update([
        //         'price' => $total,
        //     ]);

        //     foreach($cart->additions as $addition){
        //         $sub_addition = AdditionSubCategory::findOrFail($addition->id);

        //         if($cart->offer_id){

        //             SubAdditionOffers::create([
        //                 'offer_id' => $cart->offer_id,
        //                 'addition_sub_id' => $addition->id,
        //                 'order_id' => $order->id,
        //             ]);
        //         }

        //         if($cart->product_id){

        //             SubAdditionProducts::create([
        //                 'product_id' => $cart->product_id,
        //                 'addition_sub_id' => $addition->id,
        //                 'order_id' => $order->id,
        //             ]);
        //         }
        //     }
/***********************************End*********************************************** */
            // if($cart->product_id){
            //      $orders = OrderProduct::where('ip',$ip)->where('product_id',$cart->product_id)->first();
            // }


            // if($cart->offer_id){
            //     $orders = OrderOffer::where('ip',$ip)->where('offer_id',$cart->offer_id)->first();
            // }

            // if($orders){
            //  $quantity = $orders->quantity + 1;

            //  $orders->update([
            //      'quantity' => $quantity,
            //  ]);
            // }else{
/****************************Start********************** */
            //     if($cart->product_id){
            //         OrderProduct::create([
            //             'order_id' => $order->id,
            //             'product_id' => $cart->product_id,
            //             'ip' => $ip,
            //             'quantity' => $cart->quantity,
            //             'price' => Product::find($cart->product_id)->price,
            //         ]);
            //     }

            //     if($cart->offer_id){
            //        $order_offer= OrderOffer::create([
            //             'order_id' => $order->id,
            //             'offer_id' => $cart->offer_id,
            //             'ip' => $ip,
            //             'quantity' => $cart->quantity,
            //             'price' => Offer::find($cart->offer_id)->price,
            //         ]);

            //     }

            // }
/********************************End */
        // }

        // $email = SetingEmail::first();

        /******************Start */
        // Mail::to('blalthmen75@gmail.com')->send(new NewOrder);
        // Mail::to($request->email)->send(new OrderUser);

        // if($request->payment_type == 'cash'){
        //     $order->update([
        //         'payment_type' => 'cash',
        //     ]);

        //     $cart = Cart::where('order_id',$order->id)->get();

        //     foreach($carts as $cart){
        //         $cart->delete();
        //     }

        //     $request->session()->put('message',"Your order has been successfully submitted");
        //     return redirect()->route('index')->with('result', "success");
        // }

        // if($request->payment_type == 'paypal'){

        //     return redirect()->route('checkout.index');
        // }

        // else if($request->payment_type == 'stripe'){
        //     return redirect()->route('stripe');
        // }

        /***********************End */


        if($request->time == 1){

            $time = 'now';
        }else if($request->time == 2){
            $time = 'later';
        }


        // return view('confeirm',[
        //     'address' => $address,
        //     'time' => $time,
        //     'timeLater' => $request->timeLater,
        // ]);

        $number = random_int(100,100000);
        $ip = $this->get_client_ip();


// if(count(array_filter($offer_order)) != count($carts) && count(array_filter($product_order)) != count($carts) && $length != count($carts)){
    $qunatity = 1;
        if($request->quantity){
            $quntity = $request->quantity;
        }
        $general = General::first();
        $place = Place::first();
        $total = $general->delivery_price;

        $carts = Cart::where('ip',$ip)->get();

        $order = Order::create([
                'number' => $number,
                'ip' => $ip,
                'quantity' => $qunatity,
                'price' => $total,
                'time' => $request->time,
                'timeLater' => $request->timeLater,
                'address_id' => $address->id,
                'customer_id' => $customer->id,

            ]);

            foreach($carts as $cart){
                $cart->update([
                    'order_id'=> $order->id,
                    'service_fee' => $general->delivery_price,
                ]);
                $total += $cart->price;

                // foreach($cart->additions as $addition){
                //     $total += $addition->price;
                // }

                if($cart->delivary_price != 0){
                    $order->update([

                        'delivery' =>'delivery',
                    ]);

                    $cart->update([
                        'delivary_price' => $place->price,
                    ]);

                    $total+=$place->price;

                }


                $order->update([
                    'price' => $total,
                ]);

                foreach($cart->additions as $addition){
                    $sub_addition = AdditionSubCategory::findOrFail($addition->id);

                    if($cart->offer_id){

                        SubAdditionOffers::create([
                            'offer_id' => $cart->offer_id,
                            'addition_sub_id' => $addition->id,
                            'order_id' => $order->id,
                        ]);
                    }

                    if($cart->product_id){

                       $subadditio_product =  SubAdditionProducts::create([
                            'product_id' => $cart->product_id,
                            'addition_sub_id' => $addition->id,
                            'order_id' => $order->id,
                            'count' => CartAdditions::where('addition_sub_id',$addition->id)->where('cart_id',$cart->id)->first()->count,
                        ]);

                    }
                }

                if($cart->product_id){
                    OrderProduct::create([
                        'order_id' => $order->id,
                        'product_id' => $cart->product_id,
                        'ip' => $ip,
                        'quantity' => $cart->quantity,
                        'price' => Product::find($cart->product_id)->price,
                    ]);
                }

                if($cart->offer_id){
                   $order_offer= OrderOffer::create([
                        'order_id' => $order->id,
                        'offer_id' => $cart->offer_id,
                        'ip' => $ip,
                        'quantity' => $cart->quantity,
                        'price' => Offer::find($cart->offer_id)->price,
                    ]);

                }

            }

            // $order->notify(new newOrderNotification($order));


                // Mail::to('blalthmen75@gmail.com')->send(new NewOrder);
                // Mail::to($customer->email)->send(new OrderUser);

                if($request->payment_type == 'cash'){
                    $order->update([
                        'payment_type' => 'cash',
                    ]);

                    $cart = Cart::where('order_id',$order->id)->get();

                    foreach($carts as $cart){
                        $cart->delete();
                    }

                    $request->session()->put('message',"Your order has been successfully submitted");
                    return redirect()->route('order.confirmation',$address->id)->with('result','sacssesChechout');

                }

                if($request->payment_type == 'paypal'){

                    return redirect()->route('checkout.index');
                }

                else if($request->payment_type == 'stripe'){
                    return redirect()->route('stripe');
                }

    }

        public function orderStore(Request $request){
            $request->validate([
                'time' => 'required|in:now,later',
                'payment_type' => "required",
                'timeLater' => 'nullable',
                'address_id' => 'required',
                'customer_id' => 'required'
            ]);

            $number = random_int(100,100000);
            $ip = $this->get_client_ip();


    // if(count(array_filter($offer_order)) != count($carts) && count(array_filter($product_order)) != count($carts) && $length != count($carts)){
        $qunatity = 1;
            if($request->quantity){
                $quntity = $request->quantity;
            }
            $general = General::first();
            $place = Place::first();
            $customer = Customer::findOrFail($request->customer_id);
            $total = $general->delivery_price;


            $order = Order::create([
                    'number' => $number,
                    'ip' => $ip,
                    'quantity' => $qunatity,
                    'price' => $total,
                    'time' => $request->time,
                    'timeLater' => $request->timeLater,
                    'address_id' => $request->address_id,
                    'customer_id' => $request->customer_id,
                ]);
                 $carts = Cart::where('ip',$ip)->get();

                foreach($carts as $cart){
                    $cart->update([
                        'order_id'=> $order->id,
                        'service_fee' => $general->delivery_price,
                    ]);
                    $total += $cart->price;

                    foreach($cart->additions as $addition){
                        $total += $addition->price;
                    }

                    $order->update([
                        'price' => $total,
                    ]);

                    foreach($cart->additions as $addition){
                        $sub_addition = AdditionSubCategory::findOrFail($addition->id);

                        if($cart->offer_id){

                            SubAdditionOffers::create([
                                'offer_id' => $cart->offer_id,
                                'addition_sub_id' => $addition->id,
                                'order_id' => $order->id,
                            ]);
                        }

                        if($cart->product_id){

                            SubAdditionProducts::create([
                                'product_id' => $cart->product_id,
                                'addition_sub_id' => $addition->id,
                                'order_id' => $order->id,
                            ]);
                        }
                    }
        /***********************************End*********************************************** */
                    // if($cart->product_id){
                    //      $orders = OrderProduct::where('ip',$ip)->where('product_id',$cart->product_id)->first();
                    // }


                    // if($cart->offer_id){
                    //     $orders = OrderOffer::where('ip',$ip)->where('offer_id',$cart->offer_id)->first();
                    // }

                    // if($orders){
                    //  $quantity = $orders->quantity + 1;

                    //  $orders->update([
                    //      'quantity' => $quantity,
                    //  ]);
                    // }else{
        /****************************Start********************** */
                        if($cart->product_id){
                            OrderProduct::create([
                                'order_id' => $order->id,
                                'product_id' => $cart->product_id,
                                'ip' => $ip,
                                'quantity' => $cart->quantity,
                                'price' => Product::find($cart->product_id)->price,
                            ]);
                        }

                        if($cart->offer_id){
                           $order_offer= OrderOffer::create([
                                'order_id' => $order->id,
                                'offer_id' => $cart->offer_id,
                                'ip' => $ip,
                                'quantity' => $cart->quantity,
                                'price' => Offer::find($cart->offer_id)->price,
                            ]);

                        }

                    }
        /********************************End */
                // }

                // $email = SetingEmail::first();

                /******************Start */
                Mail::to('blalthmen75@gmail.com')->send(new NewOrder);
                Mail::to($customer->email)->send(new OrderUser);

                if($request->payment_type == 'cash'){
                    $order->update([
                        'payment_type' => 'cash',
                    ]);

                    $cart = Cart::where('order_id',$order->id)->get();

                    foreach($carts as $cart){
                        $cart->delete();
                    }

                    $request->session()->put('message',"Your order has been successfully submitted");
                    return redirect()->route('index')->with('result', "success");
                }

                if($request->payment_type == 'paypal'){

                    return redirect()->route('checkout.index');
                }

                else if($request->payment_type == 'stripe'){
                    return redirect()->route('stripe');
                }
        }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);

        return view('admin.edit-order',[
            'order' => $order,
        ]);



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $order = Order::findOrFail($id);

        if($order->products()->first()){
            if($request->quantity){
                $amount = $order->products()->first()->price * $request->quantity;

                $order->update([
                    'price' => $amount,
                    'quantity' => $request->quantity,
                ]);
            }
        }

        if($order->offers()->first()){
            if($request->quantity){
                $amount = $order->offers()->first()->price * $request->quantity;

                $order->update([
                    'price' => $amount,
                    'quantity' => $request->quantity,
                ]);
            }
        }

        if($request->status){
            $order->update([
                'status' => $request->status,
            ]);
        }

        $request->session()->put('message','Updated order Successfully');

        return redirect()->route('orders.index')->with("result",'success');
    }

    public function statusComplete($id){
        $order = Order::findOrFail($id);

        $order->update([
            'status' => 'completed'
        ]);

        $order->notify(new acceptOrder($order));

        return back();
    }

    public function statusConsle($id){
        $order = Order::findOrFail($id);

        $order->update([
            'status' => 'declined'
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return back()->with("result",'success');
    }
}
