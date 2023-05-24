<?php


namespace App\Services;


use App\Models\Image\Image;

use App\Models\Product\ProductImage;
use Illuminate\Http\Request;
use function PHPUnit\Framework\size;

class ImageService
{
//    upload one image
    public function uploadPublicImage(Request $request)
    {
        $file = $request->file('images');
        $name = $file->hashName();
        $path = $file->storeAs('images', $name, 'my_files');
        return Image::create([
            'name' => $name
        ]);
    }

// upload multiple image for products
    public function uploadProductImage(Request $request, $id)
    {
        $files = $request->file('images');
        foreach ($files as $image) {
//            $name = $image->hashName();
            $path = $image->store('ProductsImage', 'my_files');
            ProductImage::create([
                'product_id' => $id,
                'path' => $path
            ]);
        }

    }

    public function getProductImages($productId)
    {
        $product = Product::findOrFail($productId);
        $images = [];

        foreach ($product->images as $image) {
            $path = storage_path('app/public/' . $image->path);

            if (File::exists($path)) {
                $file = File::get($path);
                $base64 = base64_encode($file);
                $images[] = $base64;
            }
        }

        return response()->json(['images' => $images]);
    }
}
