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
        $this->updateTotalPriceCart($request, $cart);
    }

    public function updateTotalPriceCart(Request $request, $cart)
    {
        $product = Product::find($request->product_id);
        $oldTotal = $cart->totalPrice;
        $cart->totalPrice = $oldTotal + ($request->quantity * $product->price);
        $cart->save();
    }

    public function getCartForUser()
    {
        $user = User::find(Auth::id());
        return $user->cart;
    }

}
