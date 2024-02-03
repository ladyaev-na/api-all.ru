<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return[
            "id" => $this->id,
            "product_name" => $this->product->name,
            "quantity" => $this->quantity,
        ];
    }
}
