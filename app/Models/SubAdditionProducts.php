<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class SubAdditionProducts extends Pivot
{
    use HasFactory;
    protected $table = 'sub_addition_products';
    protected $guarded = [];
}
