<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LiquidSoapResource extends JsonResource
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
            'value, ml' => $this->value,
            'antibacterial' => $this->is_antibacterial,
            'contains surfactants' => $this->contains_surfactants
        ];
    }
}
