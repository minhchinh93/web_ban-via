<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class size extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function product()
    {
        return $this->hasMany(Product::class, 'size_id', 'id');
    }
}
