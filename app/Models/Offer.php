<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dateFormat = 'Y-m-d';
    protected $dates = [
        'end_offer',
    ];

    public function categories(){
        return $this->belongsToMany(Category::class,'offer_categories')
        ->using(OfferCategory::class);;
    }

    public function products(){
        return $this->belongsToMany(Product::class,'product_offers')
        ->using(ProductOffer::class);;
    }

    public function additions(){
        return $this->belongsToMany(AdditionCategory::class,'additions_offers')
        ->using(AdditionsOffers::class);;
    }

    public function sub_additions(){
        return $this->belongsToMany(AdditionSubCategory::class,'sub_addition_offers','offer_id','addition_sub_id')
        ->using(SubAdditionOffers::class);
    }
}
