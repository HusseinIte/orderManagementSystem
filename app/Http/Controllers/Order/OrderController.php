<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        return view('admin.order.index');
    }
    public function getAllOrder(){
        return Order::all();
    }
}
