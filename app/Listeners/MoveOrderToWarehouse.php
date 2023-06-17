<?php

namespace App\Listeners;

use App\Events\ExecuteOrder;
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
    public function handle(SendOrder $event)
    {
        $order = $event->order;
        $order->departments()->attach(1, ['isExecute' => 0]);
        $order->orderStatus = "الطلب قيد الإنتظار في المستودع";
        $order->save();
//        broadcast(new SendOrder($order));

    }
}
