<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Offer;
use App\Models\OfferCategory;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'categories';

    public function offers(){
        return $this->belongsToMany(offer::class,'offer_categories')
        ->using(OfferCategory::class);;
    }

    public function products(){
        return $this->belongsToMany(Product::class,'product_categories')
        ->using(ProductCategory::class)->orderBy('priority');
    }
}
