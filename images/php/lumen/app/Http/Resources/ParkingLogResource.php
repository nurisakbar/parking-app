<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ParkingLogResource extends JsonResource
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
            'slot'                  =>  $this->parking_slot_id,
            'registration_number'   =>  $this->registration_number,
            'license_plate_number'  =>  $this->license_plate_number,
            'car_color'             =>  $this->car_color,
            'in'                    =>  $this->in,
            'out'                   =>  $this->out
        ];
    }
}
