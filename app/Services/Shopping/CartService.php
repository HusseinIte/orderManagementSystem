<?php


namespace App\Services\Shopping;


use App\Models\Product\Product;
use App\Models\Shopping\CartItem;
use App\Models\Shopping\ShoppingSession;
use App\Models\User\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartService
{

    public function addToCart(Request $request)
    {
        $cart = $this->getCartForUser();
        $cartItem = CartItem::create([
            'product_id' => $request->product_id,
            'cart_id' => $cart->id,
            'quantity' => $request->quantity
        ]);
        $this->updateTotalPriceCart($cartItem);
        return response()->json([
            'status' => 'success',
            'message' => 'تم إضافة المنتج إلى السلة'
        ]);
    }

    public function updateTotalPriceCart(CartItem $cartItem)
    {
        $product = $cartItem->product;
        $cart = $cartItem->cart;
        $oldTotal = $cart->totalPrice;
        $cart->totalPrice = $oldTotal + ($cartItem->quantity * $product->price);
        $cart->save();
    }

// parameter : id for cart Item
    public function minusQuantityItem($id)
    {
        $cart_item = CartItem::find($id);
        $quantity = $cart_item->quantity;
        if ($quantity > 1) {
            $cart_item->quantity = $quantity - 1;
        }
        $cart_item->quantity = 1;
        $cart_item->save();
        $this->updateTotalPriceCart($cart_item);

    }

    public function plusQuantityItem($id)
    {
        $cart_item = CartItem::find($id);
        $quantity = $cart_item->quantity;
        $cart_item->quantity = $quantity + 1;
        $cart_item->save();
        $this->updateTotalPriceCart($cart_item);
    }

    public function getCartForUser()
    {
        $user = User::find(Auth::id());
        return $user->cart;
    }

}
