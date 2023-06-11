<?php


namespace App\Services\Order;


use App\Events\SendOrder;
use App\Http\Resources\OrderCollection;
use App\Models\Order\Order;
use App\Models\Order\OrderItem;
use App\Models\Shopping\Cart;
use App\Models\Shopping\CartItem;
use App\Models\User\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerOrderService
{
    public function getMyOrder()
    {
        $customer = User::find(Auth::id())->customer;
        $orders= $customer->orders;
        return new OrderCollection($orders);

    }

    public function createOrder(Request $request)
    {
        $user = User::find(Auth::id());
        $customer = $user->customer;
        $cart = $user->cart;
        $order = Order::firstOrCreate([
            'customer_id' => $customer->id,
            'orderStatus' => 'الطلب قيد الإنتظار في المستودع',
            'orderType' => 'شراء',
            'totalPrice' => $cart->totalPrice
        ]);
        $this->storeOrderItem($cart, $order->id);
        return $order;
    }

    public function storeOrderItem(Cart $cart, $id)
    {
        $cartItems = $cart->cartItems;
        foreach ($cartItems as $item) {
            OrderItem::firstOrCreate([
                'order_id' => $id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity
            ]);
        }
    }

// send order from user to warehouse
    public function sendOrder(Request $request)
    {
        $order = $this->createOrder($request);
        SendOrder::dispatch($order);
        return response()->json([
            'status' => 'success',
            'message' => 'تم إرسال الطلب بنجاح'
        ]);
    }

}
