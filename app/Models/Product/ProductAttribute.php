<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'productAttribute',
        'productValue'

    ];
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
