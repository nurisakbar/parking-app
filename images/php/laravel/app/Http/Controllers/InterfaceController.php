<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InterfaceController extends Controller
{
    public $apiHost;

    public function __construct()
    {
        $this->apiHost = env("API_URL", "http://localhost:9000");
    }

    public $colors = ['red'=>'red','black'=>'black'];

    public function in()
    {
        $data['colors']         = $this->colors;
        // $data['parkingSlots']    = json_decode(Http::get($this->apiHost.'/parking/slot'));
        // return $data;
        return view('in', $data);
    }

    public function list(Request $request)
    {
        $data['car_color']       = $request->car_color??null;
        $data['colors']          = $this->colors;
        $data['parkingSlots']    = json_decode(Http::get($this->apiHost.'/parking/list', $request->all()));
        return view('list', $data);
    }


    public function out(Request $request)
    {
        $data['colors']         = $this->colors;
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

    public function search(Request $request)
    {
        $data['registration_number'] = $request->registration_number??null;
        if ($request->has('registration_number')) {
            $data['response'] = json_decode(Http::get($this->apiHost.'/parking/list', $request->all()));
        }
        return view('search', $data);
    }
}
