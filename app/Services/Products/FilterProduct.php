<?php


namespace App\Services\Products;


use App\Http\Resources\Product\ProductFilterCollection;
use App\Http\Resources\Product\ProductResource;
use App\Models\Category\Category;
use App\Models\Product\Product;
use App\Models\Product\ProductAttribute;
use http\Env\Response;
use http\Exception;
use function Symfony\Component\Routing\Loader\Configurator\collection;
use function Termwind\ValueObjects\pr;

class FilterProduct
{

    public function getKidsProduct()
    {
        $products = ProductAttribute::where([
            ['productAttribute', 'frameClass'],
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
            ['productAttribute', 'frameClass'],
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
            ['productAttribute', 'frameClass'],
            ['productValue', 'women']
        ])->get();
        return response()->json([
            'status' => 'success',
            'products' => new ProductFilterCollection($products)
        ]);

    }

    public function getBorderProducts()
    {
//        category 1
        $category = Category::find(1);
        $products = $category->products;
        return ProductResource::collection($products);

    }

    public function getDevicesProducts()
    {
//        category 2
        $category = Category::find(2);
        $products = $category->products;
        return ProductResource::collection($products);

    }

    public function getGlassesProducts()
    {
//        category 3
        $category = Category::find(3);
        $products = $category->products;
        return ProductResource::collection($products);
    }

    public function searchProduct($numberModel)
    {
        try {
            $products = Product::where('numberModel', $numberModel)->get();
            return ProductResource::collection($products);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()]);
        }
    }

}
