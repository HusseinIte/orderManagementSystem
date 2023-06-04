<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Services\Order\DeliveryOrderService;
use Illuminate\Http\Request;

class DeliveryOrderController extends Controller
{
    protected $orderDeliveryService;

    public function __construct(DeliveryOrderService $deliveryOrderService)
    {
        $this->orderDeliveryService = $deliveryOrderService;
    }

    public function getAllOrder()
    {
       return $this->orderDeliveryService->getAllOrder();

    }

    public function getExecutedOrder()
    {

    }

    public function getNonExecutedOrder()
    {

    }

}
