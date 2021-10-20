<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Order::where('status','pending')->where('payment_type','!=',null)->get();
        return view('admin.index',[
            'orders' => $orders,
            'online_visitor' => DB::table('customers')->count(),
            'orders_count' => DB::table('orders')->count(),
            'product_count' => DB::table('products')->count(),
            'offer_count' => DB::table('offers')->count(),
        ]);
    }
}
