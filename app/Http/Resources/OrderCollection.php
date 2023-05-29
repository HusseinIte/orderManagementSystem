<?php

namespace App\Http\Resources;

use App\Models\User\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class OrderCollection extends ResourceCollection
{

    public function toArray(Request $request): array
    {
        $collection = $this->collection->map(function($item) {
            $customer=Customer::find($item->customer_id);
            $item->center_name=$customer->centerName;
            return $item;
        });

        return [
            'data' => $collection
        ];
    }
}
