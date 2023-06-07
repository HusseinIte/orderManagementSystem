<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrameAttribute extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'frameType',
        'size',
        'arm',
        'bridge',
        'frameShape',
        'frameClass',
        'color'
    ];
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
