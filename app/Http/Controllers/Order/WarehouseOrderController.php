<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Services\Order\WarehouseOrderService;
use Illuminate\Http\Request;

class WarehouseOrderController extends Controller
{
    protected $warehouseOrder;

    public function __construct(WarehouseOrderService $warehouseOrder)
    {
        $this->warehouseOrder = $warehouseOrder;
    }

    public function executeOrder($id)
    {
        return $this->warehouseOrder->executeOrder($id);
    }
}
