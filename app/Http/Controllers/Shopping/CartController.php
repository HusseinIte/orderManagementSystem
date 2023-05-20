<?php

namespace App\Http\Controllers\Shopping;

use App\Http\Controllers\Controller;
use App\Services\Shopping\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cartService;
    public function __construct(CartService $cartService)
    {
        $this->cartService=$cartService;
    }

    public function addToCart(Request $request){
        return $this->cartService->addToCart($request);
    }
}
