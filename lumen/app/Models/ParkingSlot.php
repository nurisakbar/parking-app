<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParkingSlot extends Model
{
    protected $fillable=['registration_number','is_avaible'];

    public function ParkingLog()
    {
        return $this->hasMany(ParkingLog::class);
    }
}
