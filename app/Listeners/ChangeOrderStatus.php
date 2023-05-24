<?php

namespace App\Listeners;

use App\Events\SendOrder;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ChangeOrderStatus
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
        $order->orderStatus = "الطلب قيد الإنتظار في المستودع";
        $order->save();

    }
}
