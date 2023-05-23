<?php

namespace App\Models\Product;

use App\Models\Category\Category;
use App\Models\Order\OrderItem;
use App\Models\Shopping\CartItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function League\Flysystem\has;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'numberModel',
        'amount',
        'price',
        'alertAmount',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function cartItem()
    {
        return $this->hasOne(CartItem::class);
    }

    public function orderItem()
    {
        return $this->hasOne(OrderItem::class);
    }
}
