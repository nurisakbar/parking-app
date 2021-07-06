@extends('layout')
@section('content')
<!-- Begin page content -->
<main class="flex-shrink-0">
    <div class="container" style="margin-top: 80px;border:1px dotted;padding:30px;">
        <div class="row">
            <div class="col-md-12">
                <h2>Proses Out Berhasil</h2>
                <hr style="border:1px dotted black">
                <div class="row">
                  <div class="col-md-3">
                      <img style="margin-top:-22px;" width="240" src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d0/QR_code_for_mobile_English_Wikipedia.svg/1200px-QR_code_for_mobile_English_Wikipedia.svg.png">
                  </div>
                  <div class="col-md-9">
                      <table class="table table-bordered">
                          <tr>
                              <td width="130">No Registrasi</td>
                              <td> : {{ $response->result->registration_number}}</td>
                          </tr>
                          <tr>
                            <td width="130">Plat Nomor</td>
                            <td> : {{ $response->result->license_plate_number}}</td>
                        </tr>
                        <tr>
                            <td width="130">Warna Mobil</td>
                            <td> : {{ $response->result->car_color}}</td>
                        </tr>
                        <tr>
                          <td width="130">Waktu Masuk</td>
                          <td> : {{ $response->result->in}}</td>
                      </tr>
                      <tr>
                        <td width="130">Waktu Keluar</td>
                        <td> : {{ $response->result->out}}</td>
                    </tr>
                      </table>
                  </div>
              </div>

              <div class="alert alert-primary" role="alert">
                Halaman Ini Akan Di Alihkan Dalam 3 Detik ....
              </div>
            </div>
        </div>
    </div>
  </main>
@endsection

@push('javascript')
<script>
    $(document).ready(function(){
        var delay = 2000; 
        var url = 'https://itsolutionstuff.com'
        setTimeout(function(){ window.location = url; }, delay);
    });
</script>
@endpush