<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class AdditionsOffers extends Pivot
{
    use HasFactory;
    protected $table = 'additions_offers';
    protected $guarded = [];
}
