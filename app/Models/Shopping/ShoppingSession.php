<?php

namespace App\Models\Shopping;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingSession extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'totalPrice'
    ];
    public function cartItems(){
        return $this->hasMany(CartItem::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
