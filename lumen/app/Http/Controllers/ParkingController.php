<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParkingSlot;
use App\Models\ParkingLog;
use App\Http\Requests\ParkingInRequest;
use App\Http\Requests\ParkingOutRequest;
use App\Http\Resources\ParkingLogResource;
use App\Http\Requests\testRequest;

class ParkingController extends Controller
{

    /**
     * @OA\Info(
     *   title="Example API",
     *   version="1.0",
     *   @OA\Contact(
     *     email="support@example.com",
     *     name="Support Team"
     *   )
     * )
     */



    /**
     * @OA\Get(
     *     path="/sample/{category}/things",
     *     operationId="/sample/category/things",
     *     tags={"yourtag"},
     *     @OA\Parameter(
     *         name="category",
     *         in="path",
     *         description="The category parameter in path",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="criteria",
     *         in="query",
     *         description="Some optional other parameter",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Returns some sample category things",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *     ),
     * )
     */
    
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
        return ParkingLogResource::collection($parkingLog->get());
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


    public function slot()
    {
        $parkingSlot = ParkingSlot::all();
        return $parkingSlot;
    }
}
