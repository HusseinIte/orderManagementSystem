<?php


namespace App\Http\Response;


use App\Models\Product\Product;
use Illuminate\Http\Response;

class ProductResponse extends Response
{
    public function toJson()
    {
        $data = [
            'products' => Product::with('attributes')->get(),
        ];
        return response()->json($data);
    }

}
