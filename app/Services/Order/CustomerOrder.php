<?php


namespace App\Services\Order;


use App\Models\Order\Order;
use App\Models\Order\OrderItem;
use App\Models\Shopping\Cart;
use App\Models\Shopping\CartItem;
use App\Models\User\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerOrder
{
    public function getAllOrder()
    {
        $user = User::find(Auth::id());
        return $user->orders;

    }

    public function createOrder(Request $request)
    {
        $user = User::find(Auth::id());
        $cart = $user->cart;
        $order = Order::create([
            'user_id' => $user->id,
            'orderStatus' => 'جاري المعالجة',
            'totalPrice' => $cart->totalPrice
        ]);
        $this->storeOrderItem($cart, $order->id);
    }

    public function storeOrderItem(Cart $cart, $id)
    {
        $cartItems = $cart->cartItems();
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity
            ]);
        }
    }

// send order from user to warehouse
    public function sendOrder(Request $request)
    {
        $this->createOrder($request);
        return response()->json([
            'status' => 'success',
            'message' => 'تم إرسال الطلب بنجاح'
        ]);
    }

}
