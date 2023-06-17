<?php


namespace App\Services\Order;


use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Models\Order\Department;

class MaintenanceOrderService
{
    public function getAllOrder()
    {
        $department = Department::find(3);
        $orders = $department->orders;
        return OrderResource::collection($orders);
    }
}
