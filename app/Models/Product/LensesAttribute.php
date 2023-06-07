<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LensesAttribute extends Model
{
    use HasFactory;
    protected $fillable=[
        'product_id',
        'spherical',
        'cylinder',
        'lensesClass',
        'classType'
    ];
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
