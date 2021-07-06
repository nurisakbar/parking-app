<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InterfaceController extends Controller
{
    public $apiHost = "http://localhost:9000";

    public function in()
    {
        $data['colors']         = ['red','black'];
        $data['parkingSlots']    = json_decode(Http::get($this->apiHost.'/parking/slot'));
        return view('in', $data);
    }


    public function out(Request $request)
    {
        $data['colors']         = ['red','black'];
        $data['parkingSlots']    = json_decode(Http::get($this->apiHost.'/parking/slot'));
        if ($request->registration_number!=null) {
            $data['response'] = json_decode(Http::put($this->apiHost.'/parking/out', $request->all()));
            return view('parking-out-success', $data);
        }
        return view('out', $data);
    }

    public function inAction(Request $request)
    {
        $data['response'] = json_decode(Http::post($this->apiHost.'/parking/in', $request->all()));
        return view('parking-in-success', $data);
        return $response;
    }
}
