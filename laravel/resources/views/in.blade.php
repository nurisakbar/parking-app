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
            <div class="col-md-12" style="margin-bottom:20px;border-bottom:1px dotted">
                {!! Form::open(['url'=>'/']) !!}
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Masukan Plat Nomor</label>
                      {!! Form::text('license_plate_number', null, ['required'=>'required','class'=>'form-control','placeholder'=>'Input Plat Nomer','id'=>'inputGroup-sizing-lg']) !!}
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Pilih Warna Mobil</label>
                      @foreach($colors as $color)
                        <div class="radio-item">
                            <input type="radio" id="ritema" name="car_color" value="{{$color}}">
                            <label for="ritema">{{$color}}</label>
                        </div>
                      @endforeach
                    </div>
                  </div>
                  <div class="col-md-6">
                    <button type="submit" class="btn btn-success">Cetak Tiket Masuk</button>
                  </div>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="col-md-12">
              <div class="row">
                @foreach($parkingSlots as $slot)
                <div class="col-md-3" style="margin-bottom: 10px;">
                  <div class="card">
                    <div class="card-body">
                      <p>Nomor Parkir : <b>{{$slot->slot_number}}</b><br>Status : <b>{{$slot->is_avaible=='y'?'Kosong':'Terisi'}}</b></p>
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