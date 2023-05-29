<?php


namespace App\Services\Order;


use App\Http\Resources\OrderCollection;
use App\Models\Order\Order;

class AdminOrderService
{
    public function getAllOrder(){

        return new OrderCollection(Order::all());
    }

}
