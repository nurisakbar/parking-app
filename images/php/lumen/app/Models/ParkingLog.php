<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParkingLog extends Model
{
    protected $fillable=['parking_slot_id','registration_number','car_color','license_plate_number','in','out'];
}
