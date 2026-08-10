<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'logo', 'description'];

    // Relasi: 1 Brand punya banyak produk (jika tabel products punya brand_id)
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
