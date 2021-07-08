<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ParkingSlot;

class ParkingSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parkingSlots =[];
        for ($parkingSlotNumber=1;$parkingSlotNumber<=20;$parkingSlotNumber++) {
            $parkingSlots[] = ['slot_number'=>$parkingSlotNumber];
        }
        ParkingSlot::insert($parkingSlots);
    }
}
