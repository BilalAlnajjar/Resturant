<?php

namespace App\Models;

use App\Models\Offer;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OfferCategory extends Pivot
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "offer_categories";

    public function offers(){
        return $this->belongsTo(Offer::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
