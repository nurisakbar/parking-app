<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ParkingSlotResouce extends JsonResource
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
            'slot_number'           =>  $this->id,
            'is_avalible'           =>  $this->is_avalible,
            'registration_number'   =>  $this->registration_number
        ];
    }
}
