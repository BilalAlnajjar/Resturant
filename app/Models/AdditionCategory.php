<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionCategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "addition_categories";

    public function sub_additions(){
        return $this->hasMany(AdditionSubCategory::class);
    }
}
