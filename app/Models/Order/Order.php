<?php

namespace App\Models\Order;

use App\Models\User\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'orderStatus',
        'orderType',
        'totalPrice'
    ];
    protected $hidden=['pivot'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function departments()
    {
        return $this->belongsToMany(Department::class)->using(DepartmentOrder::class)->withTimestamps();
    }
}
