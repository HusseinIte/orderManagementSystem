<?php

namespace App\Listeners;

use App\Events\SendOrder;
use App\Models\Order\OrderDepartment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MoveOrderToWarehouse
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SendOrder $event): void
    {
        $order = $event->order;
        $order->departments()->attach(1, ['isExecute' => 0]);
        $order->orderStatus = "الطلب قيد الإنتظار في المستودع";
        $order->save();

    }
}