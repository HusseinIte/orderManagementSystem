<?php


namespace App\Services\Products;


use App\Http\Resources\ProductCollection;
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

    public function getAllProduct()
    {
        return new ProductCollection(Product::all());
    }

    public function storeProduct(Request $request)
    {
        $jsonData = $request->input('data');
        $data = json_decode($jsonData);
        $product = Product::create([
            'category_id' => $data->category_id,
            'numberModel' => $data->numberModel,
            'amount' => $data->amount,
            'price' => $data->price,
            'alertAmount' => $data->alertAmount,
        ]);
        $this->imageService->uploadProductImage($request, $product->id);
        $this->storeAttributes($data, $product->id);
        return response()->json([
            'status'=>'success',
            'message'=>'تم حفظ المنتج بنجاح '
        ]);

    }

    public function storeAttributes($data, $id)
    {
        $attributes = $data->attributes;
        foreach ($attributes as $key => $value) {
            ProductAttribute::create([
                'product_id' => $id,
                'productAttribute' => $key,
                'productValue' => $value
            ]);
        }
    }
}
