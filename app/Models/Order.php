<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_name',
        'customer_phone',
        'customer_address',
        'items',
        'total_price',
        'status',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'items' => 'array',
            'total_price' => 'decimal:2',
        ];
    }
}
