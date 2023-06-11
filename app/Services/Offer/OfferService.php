<?php


namespace App\Services\Offer;


use App\Models\Product\Product;

class OfferService
{
    public function index()
    {
        $products = Product::all();
        return view('admin.offers.index', ['products' => $products]);
    }

}
