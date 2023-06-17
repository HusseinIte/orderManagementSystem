<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'center_name' => $this->customer->centerName,
            'orderStatus' => $this->orderStatus,
            'orderType' => $this->orderType,
            'totalPrice' => $this->totalPrice,
            'orderItem' => OrderItemResource::collection($this->orderItems),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
