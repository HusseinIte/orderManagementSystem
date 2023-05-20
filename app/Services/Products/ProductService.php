<?php


namespace App\Services\Products;


use App\Models\Product\Product;
use App\Models\Product\ProductAttribute;
use App\Services\ImageService;
use Illuminate\Http\Request;
use function Symfony\Component\Translation\t;

class ProductService
{
    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function index()
    {
        return view('admin.product.index');
    }

    public function storeProduct(Request $request)
    {
        $product = Product::create([
            'category_id' => $request->category_id,
            'numberModel' => $request->numberModel,
            'amount' => $request->amount,
            'price' => $request->price,
            'alertAmount' => $request->alertAmount,
        ]);
//        $this->imageService->uploadProductImage($request, $product->id);
        $this->storeAttributes($request, $product->id);


    }

    public function storeAttributes(Request $request, $id)
    {
        $attributes = $request->input('attributes');
        foreach ($attributes as $key => $value) {
            ProductAttribute::create([
                'product_id' => $id,
                'productAttribute' => $key,
                'productValue' => $value
            ]);
        }
    }
}
