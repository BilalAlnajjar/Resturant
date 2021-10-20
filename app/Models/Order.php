<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    use Notifiable;
    protected $guarded = [];

    // protected $appends = [
    //     'date',
    // ];


    public function products(){
        return $this->belongsToMany(Product::class,'order_products')
        ->using(OrderProduct::class)->withPivot('quantity');
    }

    public function offers(){
        return $this->belongsToMany(Offer::class,'order_offers')
        ->using(OrderOffer::class)->withPivot('quantity');
    }

    public function address(){
        return $this->belongsTo(Address::class,'address_id');
    }

    public function routeNotificationForNexmo($notification = null)
    {
        return $this->address()->first()->mobile;
    }


    // public function getDateAttribute(){
    //     return Carbon::createFromFormat('Y-M-d H:i:s',)->format('Y-m-d');
    // }
}
