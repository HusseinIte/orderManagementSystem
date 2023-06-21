<?php


namespace App\Services\Order;


use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Models\Order\Order;
use function Symfony\Component\Routing\Loader\Configurator\collection;

class AdminOrderService
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.order.index', ['orders' => $orders]);
    }

    public function create()
    {
        return view('admin.order.create');
    }

    public function getOrderDetails($id)
    {
        $order = Order::find($id);
        $items = $order->orderItems;
        if ($order->orderType == "صيانة") {
            return view('admin.order.orderMaintenanceDetail', ['order' => $order, 'items' => $items]);
        }
        return view('admin.order.order_details', ['order' => $order, 'items' => $items]);
    }

}
