<?php


namespace App\Services\Order;


use App\Models\Order\Department;

class MaintenanceOrderService
{
    public function getAllOrder()
    {
        $department = Department::find(3);
        return $department->orders;
    }

}
