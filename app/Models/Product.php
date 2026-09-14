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
        'launch_date',
        'description',
        'image',
        'image_hover',
        'is_best_seller',
    ];

    protected $casts = [
        'volume' => 'array',
        'price' => 'decimal:2',
        'stock' => 'integer',
        'launch_date' => 'date',
        'is_best_seller' => 'boolean',
    ];
}