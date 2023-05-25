<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'departmentName'
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class)->using(DepartmentOrder::class)->withTimestamps();
    }

}
