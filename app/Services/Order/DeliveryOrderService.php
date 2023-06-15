<?php


namespace App\Services\Order;


use App\Events\DeliverOrder;
use App\Events\ReceiveOrderByDelivery;

use App\Models\Order\Department;
use App\Models\Order\Order;

class DeliveryOrderService
{
    public function getAllOrder()
    {
        $department = Department::find(2);
        return $department->orders;
    }

    // Receive Order by delivery from warehouse
    public function receiveOrderFromWarehouse($id)
    {
        $order = Order::find($id);
        ReceiveOrderByDelivery::dispatch($order);
        return response()->json([
            'status' => 'success',
            'message' => 'جاري شحن الطلب'
        ]);
    }

    public function deliverOrderToCustomer($id)
    {
        $order = Order::find($id);
        DeliverOrder::dispatch($order);
        return response()->json([
            'status' => 'success',
            'message' => 'تم تسليم الطلب'
        ]);
    }
    public function getExecutedOrder()
    {
        $department = Department::find(2);
        return $department->orders()->wherePivot('isExecute', 1);
    }

    public function getNewOrder()
    {
        $department = Department::find(2);
        return $department->orders()->wherePivot('isExecute', 0);
    }

}
