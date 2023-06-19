<?php


namespace App\Services\Order;


use App\Events\SendOrder;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Models\Order\Order;
use App\Models\Order\OrderItem;
use App\Models\Product\Product;
use App\Models\Shopping\Cart;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Monolog\error;
use function Symfony\Component\Routing\Loader\Configurator\collection;

class CustomerOrderService
{
    public function getMyOrder()
    {
        $customer = User::find(Auth::id())->customer;
        $orders = $customer->orders;
        return OrderResource::collection($orders);

    }

    public function createOrder(Request $request, $customer)
    {
        $order = Order::create([
            'customer_id' => $customer->id,
            'orderStatus' => 'الطلب قيد الإنتظار في المستودع',
            'orderType' => 'شراء',
            'totalPrice' => $request->totalPrice
        ]);
        $this->storeOrderItem($request, $order->id);
        return $order;
    }

    public function storeOrderItem($request, $id)
    {
        $cartItems = $request->items;
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity']
            ]);
        }
    }

// send order from user to warehouse
    public function sendOrder(Request $request)
    {
        $user = User::find(Auth::id());
        $customer = $user->customer;
        $process = $this->processingOrder($request);
        if ($process['status'] == "error") {
            return $process;
        }
        if (count($request->items) == 0) {
            return response()->json([
                'status' => 'failed',
                'message' => 'لايمكن إنشاء طلب من دون منتجات'
            ]);
        }
        $order = $this->createOrder($request, $customer);
        SendOrder::dispatch($order);
        return response()->json([
            'status' => 'success',
            'message' => 'تم إرسال الطلب بنجاح'
        ]);

    }

// processing order before create
    public function processingOrder($request)
    {
        $cartItems = $request->items;
        foreach ($cartItems as $item) {
            $product = Product::find($item['product_id']);
            if ($item['quantity'] > $product->amount) {
                return [
                    'status' => 'error',
                    'message' => 'this is overstock order reduce quantity for product :' . $item['product_id']
                ];
            }
        }
        return [
            'status' => 'success',
        ];
    }

}
