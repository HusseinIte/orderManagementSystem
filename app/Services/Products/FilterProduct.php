<?php


namespace App\Services\Products;


use App\Http\Resources\Product\ProductFilterCollection;
use App\Models\Product\Product;
use App\Models\Product\ProductAttribute;

class FilterProduct
{

    public function getKidsProduct()
    {
        $products = ProductAttribute::where([
            ['productAttribute', 'Age'],
            ['productValue', 'kids']
        ])->get();
        return response()->json([
            'status' => 'success',
            'products' => new ProductFilterCollection($products)
        ]);
    }

    public function getMenProduct()
    {
        $products = ProductAttribute::where([
            ['productAttribute', 'Age'],
            ['productValue', 'men']
        ])->get();
        return response()->json([
            'status' => 'success',
            'products' => new ProductFilterCollection($products)
        ]);

    }

    public function getWomenProduct()
    {
        $products = ProductAttribute::where([
            ['productAttribute', 'Age'],
            ['productValue', 'women']
        ])->get();
        return response()->json([
            'status' => 'success',
            'products' => new ProductFilterCollection($products)
        ]);

    }

    public function searchProduct(Product $product)
    {
        $attributes = $product->attributes;

    }

}
