<?php


namespace App\Services\Order;


use App\Events\SendOrder;
use App\Http\Resources\OrderCollection;
use App\Models\Order\Order;
use App\Models\Order\OrderItem;
use App\Models\Shopping\Cart;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Monolog\error;

class CustomerOrderService
{
    public function getMyOrder()
    {
        $customer = User::find(Auth::id())->customer;
        $orders = $customer->orders;
        return new OrderCollection($orders);

    }

    public function createOrder($cart, $customer)
    {
        $order = Order::firstOrCreate([
            'customer_id' => $customer->id,
            'orderStatus' => 'الطلب قيد الإنتظار في المستودع',
            'orderType' => 'شراء',
            'totalPrice' => $cart->totalPrice
        ]);
        $this->storeOrderItem($cart, $order->id);
        return $order;
    }

    public function storeOrderItem($cart, $id)
    {
        $cartItems = $cart->cartItems;
        foreach ($cartItems as $item) {
            OrderItem::firstOrCreate([
                'order_id' => $id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity
            ]);
            $item->delete();
        }
        $cart->totalPrice = 0;
        $cart->save();
    }

// send order from user to warehouse
    public function sendOrder(Request $request)
    {
        $user = User::find(Auth::id());
        $customer = $user->customer;
        $cart = $user->cart;
        $process = $this->processingOrder($cart);
        if ($process['status'] == "error") {
            return $process;
        }
        if ($cart->cartItems->isEmpty()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'لايمكن إنشاء طلب من دون منتجات'
            ]);
        }
        $order = $this->createOrder($cart, $customer);
        SendOrder::dispatch($order);
        return response()->json([
            'status' => 'success',
            'message' => 'تم إرسال الطلب بنجاح'
        ]);

    }

// processing order before create
    public function processingOrder($cart)
    {
        $cartItems = $cart->cartItems;
        foreach ($cartItems as $item) {
            $product = $item->product;
            if ($item->quantity > $product->amount) {
                return [
                    'status' => 'error',
                    'message' => 'this is overstock order reduce quantity for item :' . $item->id
                ];
            }
        }
        return [
            'status' => 'success',
        ];
    }

}
