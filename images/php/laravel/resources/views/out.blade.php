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
            <div class="col-md-12">
                {!! Form::open(['url'=>'out','method'=>'GET']) !!}
                <h2>Exit Parkir</h2>
                <hr>
                {!! Form::text('registration_number', null, ['class'=>'form-control','placeholder'=>'Silahkan Input Nomor Registrasi Parkir']) !!}
                <br>
                <button type="submit" class="btn btn-success">Prosess</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</main>
@endsection