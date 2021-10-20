<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChechoutsController extends Controller
{
    public function index(){

    }
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'surename' => 'required',
            'city' => 'required',
            'street' => 'required',
            'mobile' => 'required',
            'email' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $ip = $this->get_client_ip();

        $request->order ? $order = Order::findOrFail($request->order['id']+1) : $order = Order::where('ip',$ip)->get()->last();

        array_keys($request->order);

        $adress =  Address::create([
            'name' => $request->name,
            'surename' => $request->surename,
            'city' => $request->city,
            'street' => $request->street,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'order_id' => $order->id,
        ]);

        return response()->json($adress);

    }
}
