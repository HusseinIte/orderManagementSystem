<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceAttribute extends Model
{
    use HasFactory;
    protected $fillable=[
        'product_id',
        'details'
    ];
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
