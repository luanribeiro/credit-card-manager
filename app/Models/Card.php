<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Card extends Model
{

    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'slug',
        'image',
        'brand_id',
        'category_id',

        'limit',
        'annual_fee',
    ];
    
}
