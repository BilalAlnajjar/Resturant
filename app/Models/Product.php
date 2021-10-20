<?php

namespace App\Models;

use Akuechler\Geoly;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function orders(){
        return $this->belongsToMany(Order::class,'order_products','order_id')
        ->using(OrderProduct::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class,'product_categories')
        ->using(ProductCategory::class);
    }

    public function additions(){
        return $this->belongsToMany(AdditionCategory::class,'additions_products')
        ->using(AdditionsProducts::class);;
    }

    public function sub_additions(){
        return $this->belongsToMany(AdditionSubCategory::class,'sub_addition_products','product_id','addition_sub_id')
        ->using(SubAdditionProducts::class);
    }

}
