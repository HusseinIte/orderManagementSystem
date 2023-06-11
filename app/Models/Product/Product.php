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
        'manufactureCompany',
        'amount',
        'price',
        'alertAmount',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function frameAttribute()
    {
        return $this->hasOne(FrameAttribute::class);
    }
    public function lensesAttribute()
    {
        return $this->hasOne(LensesAttribute::class);
    }

    public function deviceAttribute()
    {
        return $this->hasOne(DeviceAttribute::class);
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
