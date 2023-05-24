<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDepartment extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'department',
        'isExecute'
    ];
}
