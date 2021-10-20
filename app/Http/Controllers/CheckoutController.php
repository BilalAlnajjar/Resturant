<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Address;
// use PayPalCheckoutSdk\Core\PayPalHttpClient;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\SubAdditionOffers;
use App\Models\SubAdditionProducts;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Core\ProductionEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CheckoutController extends Controller
{

    private $mode;
    private $clientId;
    private $clientSecret;
    private $order;
    private $price;

    public function index(){
        $ip = $this->get_client_ip();
        $orders = Order::where('ip',$ip)->get();

        foreach($orders as $ord){
            if($ord->status != 'completed'){
                $this->order = $ord;
        }
    }

    return view('orderCreate',[
        'order' => $this->order,
    ]);
}
    public function createOrder(Request $request)
    {

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


        $name = $this->order->address()->get();


        // Creating an environment

        $client = $this->getClient();
        // create order in the system then


        // Construct a request object and set desired parameters
        // Here, OrdersCreateRequest() creates a POST request to /v2/checkout/orders
        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');  // must I use it
        $request->body = [
            "intent" => "CAPTURE",
            "purchase_units" => [[
                "reference_id" => "20201208",
                "amount" => [
                    "value" => $this->order->price,
                    "currency_code" => "GBP"
                ]
            ]],
            "application_context" => [
                "cancel_url" => URL::route('paypal.cancel'), // i used URL to return all link
                "return_url" => URL::route('paypal.return'),
            ]
        ];

        try {
            // Call API with your client and get a response for your call
            $response = $client->execute($request);

            if ($response->statusCode == 201) {

                session()->put('paypal_order_id',$response->result->id);

                foreach ($response->result->links as $link) {
                    if ($link->rel == 'approve') {

                        return redirect()->away($link->href);
                    }
                }
            }

            // If call returns body in response, you can get the deserialized version from the result attribute of the response
            //print_r($response); // print $response
        } catch (HttpException $ex) {
            echo $ex->statusCode;
            print_r($ex->getMessage());
        }
    }

    public function paypalReturn(Request $request)
    {

        $request->session()->put('message','Payment completed successfully');

        //return array_sum( array($a));
         $ip = $this->get_client_ip();

        $orders = Order::where('ip',$ip)->get();

        if(count($orders) == '0'){
            return redirect()->route('index')->with('orderMess','ليس لديك طلبات حاليا
            ');
        }


        foreach($orders as $ord){
            if($ord->status != 'completed'){
                $this->order = $ord;
        }
    }

     $this->price = $this->order->price;

        if(empty($request->input('PayerID')) || empty($request->input('token'))){
            die('Payment Filed');
        }

        // Here, OrdersCaptureRequest() creates a POST request to /v2/checkout/orders
        // $response->result->id gives the orderId of the order created above
        $client = $this->getClient();
        $request = new OrdersCaptureRequest(session()->get('paypal_order_id'));
        $request->prefer('return=representation');
        try {
            // Call API with your client and get a response for your call
            $response = $client->execute($request);

            // If call returns body in response, you can get the deserialized version from the result attribute of the response

            session()->forget('paypal_order_id');

            if($response->result->status == 'COMPLETED'){


                $this->order->update([
                    'payment_type' => 'paypal',
                ]);

                $cart = Cart::where('order_id',$this->order->id)->first();
                $cart->delete();

                $address_id = $this->order->address()->first()->id;

                return redirect()->route('order.confirmation',$address_id)->with('result','sacssesChechout');
            }

            return redirect()->route('user.home')->withErrors('ErrorChechout','Payment faild,Please try agein');

        } catch (HttpException $ex) {
            echo $ex->statusCode;
            print_r($ex->getMessage());
        }
    }

    public function paypalCancel()
    {

        dd(request()->all());
    }

private function getClient(){
        $this->clientId = config('paypal.sandbox_client_id');
        $this->clientSecret = config('paypal.sandbox_secret');
        $environment = new SandboxEnvironment($this->clientId, $this->clientSecret); // if sandbox must change ProductionEnvironment to SandboxEnvironment;
        $client = new PayPalHttpClient($environment);

        return  $client;

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
