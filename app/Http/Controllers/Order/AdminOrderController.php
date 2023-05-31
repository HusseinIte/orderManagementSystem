<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use App\Services\Order\AdminOrderService;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    protected $adminOrderService;

    public function __construct(AdminOrderService $adminOrderService)
    {
        $this->adminOrderService = $adminOrderService;
    }

    public function index()
    {
        return $this->adminOrderService->index();
    }

    public function getAllOrder()
    {
        return $this->adminOrderService->getAllOrder();
    }
}
