<?php

namespace App\Models\Shopping;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'shopping_session_id',
        'quantity'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function shopping_session()
    {
        return $this->belongsTo(ShoppingSession::class);
    }

}
