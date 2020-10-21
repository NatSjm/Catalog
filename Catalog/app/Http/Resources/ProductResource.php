<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => ucfirst($this->name),
            'price' => number_format($this->price / 100, 2),
            'description' => $this->description,
            'fragranceId' => $this->fragrance_id,
            'fragrance' => $this->fragrance->name,
            'type' => str_replace('_', ' ', Str::snake(class_basename($this->productable_type))),
            'properties' => $this->when($this->relationLoaded('productable'), function () {
                $productableResource = 'App\Http\Resources\\' .class_basename($this->productable_type).'Resource';
                return new $productableResource($this->productable);
            }),
        ];
    }
}
