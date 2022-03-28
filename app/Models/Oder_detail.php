<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oder_detail extends Model
{
    use HasFactory;
    use HasFactory;
    protected $guarded = [];

    public function ProductPngDetails()
    {
        return $this->belongsTo(ProductPngDetails::class, 'oder_sku', 'id');

    }
}
