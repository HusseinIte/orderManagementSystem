<?php

namespace App\Http\Resources;

use App\Models\User\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use function League\Flysystem\map;

class OrderCollection extends ResourceCollection
{

    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->map(function ($order) {
                return [
                    'id' => $order->id,
                    'center_name' => $order->customer->centerName,
                    'orderStatus' => $order->orderStatus,
                    'totalPrice' => $order->totalPrice,
                    'created_at' => $order->created_at,
                    'updated_at' => $order->updated_at
                ];
            })
        ];
    }
}
