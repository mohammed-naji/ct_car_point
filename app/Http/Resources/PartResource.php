<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->trans_name,
            'image' => asset('storage/' . $this->image),
            'price' => $this->price,
            'sale_price' => $this->sale_price,
            'description' => $this->trans_description,
            'type' => $this->type->trans_name,
            'created_at' => $this->created_at->toDateString()
        ];
    }
}
