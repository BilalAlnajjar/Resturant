<?php

namespace App\Http\Controllers;
use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Cart;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\SubAdditionOffers;
use App\Models\SubAdditionProducts;
use Illuminate\Support\Facades\Session;



class PaymentController extends Controller
{

    public $order;

    public function index()
    {
        return view('view-stripe');
    }

    public function makePayment(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $ip = $this->get_client_ip();

        $orders = Order::where('ip',$ip)->get();

        if(count($orders) == '0'){
            return redirect()->route('index')->with('orderMess','You Do not have Order !!' );
         }


         foreach($orders as $ord){
             if($ord->status != 'completed'){
                 $this->order = $ord;
         }
     }

     if(!$this->order){
        return redirect()->route('index')->with('messageOrder','You dont have no Order !!');
    }


        Charge::create([
                "amount" => $this->order->price * 100,
                "currency" => 'gbp',
                "source" => $request->stripeToken,
        ]);

        $this->order->update([
            'payment_type' => 'stripe',
        ]);

        $cart = Cart::where('order_id',$this->order->id)->first();
        $cart->delete();

        $request->session()->put('message','Payment completed successfully');

        return redirect()->route('order.confirmation',$this->order->address()->first()->id)->with('result','sacssesChechout');


        // return redirect()->route('index')->with('result','sacssesChechout');
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
}
