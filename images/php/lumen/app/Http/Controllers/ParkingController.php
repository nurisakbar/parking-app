<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParkingSlot;
use App\Models\ParkingLog;
use App\Http\Requests\ParkingInRequest;
use App\Http\Requests\ParkingOutRequest;
use App\Http\Resources\ParkingLogResource;
use App\Http\Resources\ParkingSlotResouce;

class ParkingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $parkingLog = ParkingLog::query();
        if ($request->has('car_color')) {
            $parkingLog->where('car_color', $request->car_color);
        }

        if ($request->has('registration_number')) {
            $parkingLog->where('registration_number', $request->registration_number);
        }
        $parkingLog->where('out', null);
        return response()->json([
            'message'   =>  'List Parkir',
            'data'      =>  ParkingLogResource::collection($parkingLog->get())
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function in(ParkingInRequest $request)
    {
        $parkingSlotAvaible = ParkingSlot::where('is_avaible', 'y')->orderBy('id', 'ASC')->first();
        $registrationNumber = $this->RegistrationNumber();
        $parkingLog = ParkingLog::create([
            'parking_slot_id'       =>  $parkingSlotAvaible->id,
            'registration_number'   =>  $registrationNumber,
            'car_color'             =>  $request->car_color,
            'license_plate_number'  =>  $request->license_plate_number,
            'in'                    =>  date('Y-m-d H:i:s')]);
        $parkingSlotAvaible->update(['is_avaible'=>'n','registration_number'=>$registrationNumber]);
        return response()->json(
            [
                'success'=>true,
                'message'=>'In Process Success',
                'result'=>new ParkingLogResource($parkingLog)
            ],
            201
        );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function out(ParkingOutRequest $request)
    {
        $parkingSlot = ParkingSlot::where('registration_number', $request->registration_number)->firstOrFail();
        $parkingSlot->update(['is_avaible'=>'y','registration_number'=>null]);
        $parkingLog = ParkingLog::where('registration_number', $request->registration_number)->where('out', null)->firstOrFail();
        $parkingLog->update(['out'=>date('Y-m-d H:i:s')]);
        return response()->json(
            [
                'success'=>'true',
                'message'=>'Out Process Success',
                'result'=>new ParkingLogResource($parkingLog)
            ],
            200
        );
    }

    /**
     * Generate Registration Number.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function RegistrationNumber()
    {
        $maxRegistrationNumber = ParkingLog::max('registration_number');
        $prefixRegistrationNumber = 'RG'.date('Ymd');
        if ($maxRegistrationNumber==null) {
            return $prefixRegistrationNumber.'001';
        } else {
            $latest = substr($maxRegistrationNumber, 10, 3);
            return $prefixRegistrationNumber . sprintf("%03s", $latest+1);
        }
    }


    public function slot(Request $request)
    {
        return response()->json([
            'message'   =>  'List Slot',
            'data'      =>  ParkingSlotResouce::collection(ParkingSlot::all())
        ]);
    }
}
