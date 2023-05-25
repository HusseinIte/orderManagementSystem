<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Services\Order\CustomerOrderService;
use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{
    protected $customerOrderService;

    public function __construct(CustomerOrderService $customerOrderService)
    {
        $this->customerOrderService = $customerOrderService;
    }


    public function sendOrder(Request $request)
    {
       return $this->customerOrderService->sendOrder($request);
    }
}
