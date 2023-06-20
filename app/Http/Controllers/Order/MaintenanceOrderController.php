<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Services\Order\MaintenanceOrderService;
use Illuminate\Http\Request;

class MaintenanceOrderController extends Controller
{
    protected $maintenanceOrderService;

    public function __construct(MaintenanceOrderService $maintenanceOrderService)
    {
        $this->maintenanceOrderService = $maintenanceOrderService;
    }

    public function getAllOrder()
    {
        return $this->maintenanceOrderService->getAllOrder();
    }

}
