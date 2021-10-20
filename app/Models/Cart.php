<?php

namespace App\Models;

use App\Models\CartAdditions;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $table = "carts";
    // public $timestamps = false;
    protected $guarded = [];


    public function products(){
        return $this->belongsTo(Product::class,'product_id');
    }

    public function offers(){
        return $this->belongsTo(Offer::class,'offer_id');
    }

    public function additions(){
        return $this->belongsToMany(AdditionSubCategory::class,'cart_additions','cart_id','addition_sub_id')
        ->using(CartAdditions::class);
    }




}
