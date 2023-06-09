<?php


namespace App\Services\Order;


use App\Events\ExecuteOrder;
use App\Events\RejectOrder;
use App\Events\SendAlertProduct;
use App\Http\Resources\DirectOrderResource;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Models\Order\Department;
use App\Models\Order\DirectOrder;
use App\Models\Order\Order;
use App\Models\Order\OrderDepartment;
use http\Env\Request;
use Illuminate\Database\QueryException;

class WarehouseOrderService
{
    public function getAllOrder()
    {
        $department = Department::find(1);
        $orders = $department->orders;
        return OrderResource::collection($orders);
    }

    public function getAllDirectOrder()
    {

        return DirectOrderResource::collection(DirectOrder::all());

    }

    public function getAllDirectOrderExecuted()
    {
        return DirectOrderResource::collection(DirectOrder::where('isExecute', 1)->get());
    }

    public function getAllNewDirectOrder()
    {
        return DirectOrderResource::collection(DirectOrder::where('isExecute', 0)->get());
    }

    public function getOrderExecuted()
    {
        $department = Department::find(1);
        return $department->orders()->wherePivot('isExecute', 1)->get();
    }

    public function getNewOrder()
    {
        $department = Department::find(1);
        return $department->orders()->wherePivot('isExecute', 0)->get();
    }

    public function updateStock($orderItems)
    {
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
        $this->updateStock($order->orderItems);
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

    public function executeDirectOrder($id)
    {
        $order = DirectOrder::find($id);
        $this->updateStock($order->directOrderItems);
//        $this->checkLevelStock($order);
        $order->isExecute = 1;
        $order->orderStatus = "تم تسليم الطلب";
        $order->save();
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
