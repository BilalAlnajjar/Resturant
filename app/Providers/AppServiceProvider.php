<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\AddressController;
use App\Models\General;
use App\Models\Soical;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $a = new AddressController();

        $ip = $a->get_client_ip();
        $carts = Cart::where('ip',$ip)->get();
        $web = General::get()->last();
        $social = Soical::get()->last();

        $total = 0;
        $devliery = 0;
        $service_fee=0;

        // if(General::first()){
        // $devliery = General::first()->delivary_price;
        // }

        if($carts != []){
            foreach($carts as $cart){
                $total +=$cart->price;
                $devliery =  $cart->delivary_price;
                $service_fee = $cart->service_fee;
            }

            $total += ($devliery +$service_fee);
        }

        View::share('carts',$carts);
        View::share('total',$total);
        View::share('web',$web);
        View::share('social',$social);
        View::share('devliery',$devliery);
    }
}
