<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionSubCategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "addition_sub_categories";

    public function category_addition(){
        return $this->belongsTo(AdditionCategory::class,'addition_category_id');
    }
}
