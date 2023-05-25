<?php


namespace App\Services\Order;


use App\Events\ExecuteOrder;
use App\Events\SendAlertProduct;
use App\Models\Order\Department;
use App\Models\Order\Order;
use App\Models\Order\OrderDepartment;
use http\Env\Request;

class WarehouseOrderService
{
    public function getAllOrder()
    {
        $department = Department::find(1);
        return $department->orders;
    }

    public function updateStock(Order $order)
    {
        $orderItems = $order->orderItems;
        foreach ($orderItems as $item) {
            $quantity = $item->quantity;
            $product = $item->product;
            $amount = $product->amount;
            $product->amount = $amount - $quantity;
            $product->save();

        }
    }

    public function executeOrder($id)
    {
        $order = Order::find($id);
        $this->updateStock($order);
//        $this->checkLevelStock($order);
        ExecuteOrder::dispatch($order);
    }

    public function checkLevelStock(Order $order)
    {
        $orderItems = $order->orderItems;
        foreach ($orderItems as $item) {
            $product = $item->product;
            if ($product->amount <= $product->alertAmount) {
                SendAlertProduct::dispatch($product);
            }
        }
    }

}
