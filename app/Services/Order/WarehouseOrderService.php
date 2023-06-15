<?php


namespace App\Services\Order;


use App\Events\ExecuteOrder;
use App\Events\SendAlertProduct;
use App\Models\Order\Department;
use App\Models\Order\Order;
use App\Models\Order\OrderDepartment;
use http\Env\Request;
use Illuminate\Database\QueryException;

class WarehouseOrderService
{
    public function getAllOrder()
    {
        $department = Department::find(1);
        return $department->orders;
    }

    public function getExecutedOrder()
    {
        $department = Department::find(1);
        return $department->orders()->wherePivot('isExecute', 1);
    }

    public function getNewOrder()
    {
        $department = Department::find(1);
        return $department->orders()->wherePivot('isExecute', 0);
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
        try {
            ExecuteOrder::dispatch($order);
        } catch (QueryException $e) {
            $errorMessage = 'هذا الطلب منفذ';
            return response()->json([
                'status' => 'failed',
                'message' => $errorMessage]);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'تم تنفيذ الطلب بنجاح'
        ]);

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
