<?php


namespace App\Services\Order;


use App\Models\Order\Department;

class DeliveryOrderService
{
    public function getAllOrder()
    {
        $department = Department::find(2);
        return $department->orders;
    }

}
