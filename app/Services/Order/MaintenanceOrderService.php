<?php


namespace App\Services\Order;


use App\Events\SendOrder;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Models\Order\Department;
use App\Models\Order\Order;
use App\Models\Order\OrderItem;
use App\Models\User\User;

class MaintenanceOrderService
{
    public function getAllOrder()
    {
        $department = Department::find(3);
        $orders = $department->orders;
        return OrderResource::collection($orders);
    }
}
