@extends('layout')
@section('content')
<style>
  .red{
    height: 140px;
    background-color: red;
    margin-bottom: 30px;
    margin-right:20px;
  }
</style>
<main class="flex-shrink-0">
    <div class="container" style="margin-top: 80px;border:1px dotted;padding:30px;">
        <div class="row">
            <div class="col-md-12" style="margin-bottom:20px;border-bottom:1px dotted;padding-bottom:20px;">
                {!! Form::open(['url'=>'list','method'=>'GET']) !!}
                <div class="row">
                    <p class="text-center"><h3>Filter Data Berdasarkan</h3></p>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Warna Mobil : </label>
                      {!! Form::select('car_color', $colors, $car_color, ['class'=>'form-control']) !!}
                    </div>
                  </div>
                  <div class="col-md-6">
                    <button type="submit" style="margin-top:20px;" class="btn btn-success">Filter Data</button>
                  </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="text-center"><h3>Informasi Status & Info Parkir</h3></p>
                <hr style="border 1px dotted">
              <div class="row">
                @foreach($parkingSlots->data as $slot)
                <div class="col-md-4" style="margin-bottom: 10px;">
                  <div class="card">
                    <div class="card-body">
                      <p>
                            Nomor Parkir : <b>{{$slot->slot}}</b><br>
                            Warna Mobil : <b>{{$slot->car_color}}</b><br>
                            Nomor registrasi : <b>{{$slot->registration_number}}</b><br>
                            Nomor Plat : <b>{{$slot->license_plate_number}}</b>
                    </p>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
        </div>
    </div>
</main>
@endsection