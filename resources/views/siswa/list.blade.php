@extends('navigation')
@section('content')
<div class="container mt-5">
    <div class="row">
        <h1> Berikut data siswa </h1>
    </div>
</div>
@if($message = Session::get('message'))
    <div style="background-color: #0ff; padding: 10px;">
        {{ $message }}
    </div>
@endif

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8 mb-8">
            {{-- <a class="btn btn-primary" href="{{ url('/siswa/insert') }}"> + Tambah Siswa </a> --}}
            <button class="btn btn-primary" onclick="createSiswa()"> + Tambah Siswa </button>
        </div>
        <div id="read" class="mt-3"></div>
        
    </div>
</div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div id="page" class="p-2"></div>
        </div>
      </div>
    </div>
</div>

<Script>
  $(document).ready(function () {
    readSiswa();
  });
  
  // read data siswa dari database
  function readSiswa() {
    $.get("{{ url('siswa/read') }}", {}, function (data, status) {
      $("#read").html(data);
    });
  }
  
  // modal show create siswa
  function createSiswa() {
    $.get("{{ url('siswa/insert') }}", {}, function (data, status) {
      $("#page").html(data);
      $("#exampleModal").modal("show");
      $("#exampleModalLabel").text("Tambah data Siswa");
    });
  }
  
  // untuk proses create siswa menggunakan ajax
  function insertSiswa() {
    _token: "{{ csrf_token() }}";
    var nama = $("#nama").val();
    var nis = $("#nis").val();
    var email = $("#email").val();
    var kelas_id = $("#kelas").val(); // Mengambil ID kelas dari dropdown
    var agama = $("#agama").val();
    $.ajax({
      type: "post",
      url: "{{ url('siswa/insert') }}",
      data: {
        _token: "{{ csrf_token() }}",
        nama: nama,
        nis: nis,
        email: email,
        kelas_id: kelas_id, // Mengirim ID kelas
        agama: agama,
      },
      success: function (data) {
        $(".btn-close").click();
        readSiswa();
      },
    });
  }
  
  // modal show update siswa
  function showSiswa(id) {
    $.get("{{ url('siswa/update') }}/" + id, {}, function (data, status) {
      $("#page").html(data);
      $("#exampleModal").modal("show");
      $("#exampleModalLabel").text("Edit data Siswa");
    });
  }
  
  // untuk proses update siswa menggunakan ajax
  function updateSiswa(id) {
    var nama = $("#nama").val();
    var nis = $("#nis").val();
    var email = $("#email").val();
    var kelas_id = $("#kelas").val(); // Mengambil ID kelas dari dropdown
    var agama = $("#agama").val();
    $.ajax({
      type: "post",
      url: "{{ url('siswa/update') }}/" + id,
      data: {
        _token: "{{ csrf_token() }}",
        nama: nama,
        nis: nis,
        email: email,
        kelas_id: kelas_id, // Mengirim ID kelas
        agama: agama,
      },
      success: function (data) {
        $(".btn-close").click();
        readSiswa();
      },
    });
  }
  
  // untuk proses delete siswa menggunakan ajax
  function deleteSiswa(id) {
    $.ajax({
      type: "get",
      url: "{{ url('siswa/delete') }}/" + id,
      data: {
        _token: "{{ csrf_token() }}",
      },
      success: function (data) {
        readSiswa();
      },
      error: function (xhr, status, error) {
        console.error(error);
      },
    });
  }
  
</Script>
@endsection
