<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use App\Services\Order\CustomerOrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerOrderController extends Controller
{
    protected $customerOrderService;

    public function __construct(CustomerOrderService $customerOrderService)
    {
        $this->customerOrderService = $customerOrderService;
    }

    public function getMyOrder()
    {
        return $this->customerOrderService->getMyOrder();

    }


    public function sendOrder(Request $request)
    {
        return $this->customerOrderService->sendOrder($request);
    }
}
