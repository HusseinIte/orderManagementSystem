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

    public function getAllOrder()
    {
        return new OrderCollection(Order::all());
    }


}
