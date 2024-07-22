@extends('navigation')
@section('content')
<div class="container mt-5">
    <div class="row">
        <h1> Berikut data Keseluruhan untuk Laporan </h1>
    </div>
</div>
@if($message = Session::get('message'))
    <div style="background-color: #0ff; padding: 10px;">
        {{ $message }}
    </div>
@endif

<div class="container mt-5">
    <div class="row">
        <div id="read" class="mt-3"></div>
    </div>
</div>

<Script>
  $(document).ready(function () {
    readLaporan();
  });
  
  // read data guru dari database
  function readLaporan() {
    $.get("{{ url('laporan/read') }}", {}, function (data, status) {
      $("#read").html(data);
    });
  }

  
</Script>
@endsection
