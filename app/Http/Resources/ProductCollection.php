<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use function Illuminate\Http\Client\throwIf;
use function Nette\Utils\attributes;
use function Nette\Utils\map;

class ProductCollection extends ResourceCollection
{
    public function setAttributes($attributes)
    {
        return $attributes->map(function ($attribute) {
            return [
                'productAttribute' => $attribute->productAttribute,
                'productValue' => $attribute->productValue
            ];
        });
    }

    public function setImages($images)
    {
        return $images->map(function ($image) {
            return [
                'id' => $image->id,
                'path' => $image->path
            ];
        });
    }

    public function toArray(Request $request): array
    {

        return [
            'data' => $this->collection->map(function ($product) {
                return [
                    'id' => $product->id,
                    'numberModel' => $product->numberModel,
                    'amount' => $product->amount,
                    'price' => $product->price,
                    'images' => $this->setImages($product->images),
                    'attribute' => $this->setAttributes($product->attributes)
                ];
            })
        ];
    }
}
