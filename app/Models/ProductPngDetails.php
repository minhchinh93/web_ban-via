<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPngDetails extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function productPNG()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
