<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use Illuminate\Http\Request;
use niklasravnsborg\LaravelPdf\Facades\Pdf;


class InvoiceController extends Controller
{
    public function Invoice($id)
    {
        $order = Order::find($id);
        $items = $order->orderItems;
        $pdf = PDF::loadView('admin.order.invoice_pdf',['order' => $order,'items'=>$items]);
        return $pdf->download('techsolutionstuff.pdf');
    }
}
