<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\Order\CustomerOrder;
use App\Services\Users\CustomerService;
use App\Services\Users\UserService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;

    }

    public function index()
    {
        return $this->customerService->index();
    }

    public function register(Request $request)
    {
        return $this->customerService->register($request);
    }
    public function sendOrder(CustomerOrder $customerOrder,Request $request){
        return $customerOrder->sendOrder($request);
    }
}
