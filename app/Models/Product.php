<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'category',
        'variant',
        'gender',
        'top_note',
        'middle_note',
        'base_note',
        'composition',
        'packaging',
        'volume',
        'price',
        'stock',
        'description',
        'image',
        'image_hover',
        'is_best_seller',
    ];
}
