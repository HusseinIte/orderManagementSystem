<?php


namespace App\Services\Order;


use App\Models\Order\OrderDepartment;

class WarehouseOrder
{
    public function getAllOrder()
    {
        $department = OrderDepartment::where('department', 'المستودع')->get();
        return $department->orders;
    }

}
