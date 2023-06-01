<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Services\Products\FilterProduct;
use App\Services\Products\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        return $this->productService->index();
    }

    public function getAllProduct()
    {
        return $this->productService->getAllProduct();
    }

    public function storeProduct(Request $request)
    {
        return $this->productService->storeProduct($request);
    }

    public function getKidsProduct(FilterProduct $filterProduct)
    {
        return $filterProduct->getKidsProduct();
    }

    public function getMenProduct(FilterProduct $filterProduct)
    {
        return $filterProduct->getKidsProduct();
    }

    public function getWomenProduct(FilterProduct $filterProduct)
    {
        return $filterProduct->getKidsProduct();
    }
}
