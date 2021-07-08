@extends('layout')
@section('content')
<!-- Begin page content -->
<main class="flex-shrink-0">
    <div class="container" style="margin-top: 80px;border:1px dotted;padding:30px;">
        {!! Form::open(['url'=>'search','method'=>'GET']) !!}
        <div class="row">
            <div class="col-md-6">
                {!! Form::text('registration_number', $registration_number, ['class'=>'form-control','placeholder'=>'Masukan Nomor Registrasi Parkir']) !!}
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-danger">Tampilkan</button>
            </div>
        </div>
        {!! Form::close() !!}
        
        @if($registration_number!=null)
        <hr>
        <div class="row">
            <div class="col-md-3">
                <img style="margin-top:-22px;" width="240" src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d0/QR_code_for_mobile_English_Wikipedia.svg/1200px-QR_code_for_mobile_English_Wikipedia.svg.png">
            </div>
            <div class="col-md-9">
                <table class="table table-bordered">
                    <tr>
                        <td width="150">Nomor Slot Parkir</td>
                        <td> : {{ $response->data[0]->slot}}</td>
                    </tr>
                    <tr>
                        <td width="150">No Registrasi</td>
                        <td> : {{ $response->data[0]->registration_number}}</td>
                    </tr>
                    <tr>
                      <td width="150">Plat Nomor</td>
                      <td> : {{ $response->data[0]->license_plate_number}}</td>
                  </tr>
                  <tr>
                      <td width="150">Warna Mobil</td>
                      <td> : {{ $response->data[0]->car_color}}</td>
                  </tr>
                  <tr>
                    <td width="150">Waktu Masuk</td>
                    <td> : {{ $response->data[0]->in}}</td>
                </tr>
                </table>
            </div>
        </div>

        @endif
    </div>
  </main>
@endsection

@push('javascript')
<script>
    $(document).ready(function(){
        setTimeout("/';",2000);
    });
</script>
@endpush