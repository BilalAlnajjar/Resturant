<?php

namespace App\Models;

use App\Models\Offer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderOffer extends Pivot
{
    protected $table = 'order_offers';
    public $incrementing = false;
    public $timestamps = false;
    protected $guarded = [];
    protected $primaryKey = ['order_id','offer_id'];


    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function offer(){
        return $this->belongsTo(Offer::class);
}

protected function setKeysForSaveQuery($query)
{
    $query->where('order_id',$this->order_id)
    ->where('offer_id',$this->offer_id);

    return $query;
}
}
