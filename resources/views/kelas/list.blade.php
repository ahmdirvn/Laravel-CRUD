@extends('navigation')
@section('content')
<div class="container mt-5">
    <div class="row">
        <h1> Berikut data Kelas </h1>
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
            <button class="btn btn-primary" onclick="createKelas()"> + Tambah Kelas </button>
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
    readKelas();
  });
  
  // read data kelas dari database
  function readKelas() {
    $.get("{{ url('kelas/read') }}", {}, function (data, status) {
      $("#read").html(data);
    });
  }
  
  // modal show create kelas
  function createKelas() {
    $.get("{{ url('kelas/insert') }}", {}, function (data, status) {
      $("#page").html(data);
      $("#exampleModal").modal("show");
      $("#exampleModalLabel").text("Tambah data kelas");
    });
  }
  
  // untuk proses create kelas menggunakan ajax
  function insertKelas() {
    _token: "{{ csrf_token() }}";
    var nama_kelas = $("#nama_kelas").val();
    var guru_id = $("#wali_kelas").val();
    $.ajax({
      type: "post",
      url: "{{ url('kelas/insert') }}",
      data: {
        _token: "{{ csrf_token() }}",
        nama_kelas: nama_kelas,
        guru_id: guru_id,
      },
      success: function (data) {
        $(".btn-close").click();
        readKelas();
      },
    });
  }
  
  // modal show update kelas
  function showKelas(id) {
    $.get("{{ url('kelas/update') }}/" + id, {}, function (data, status) {
      $("#page").html(data);
      $("#exampleModal").modal("show");
      $("#exampleModalLabel").text("Edit data kelas");
    });
  }
  
  // untuk proses update kelas menggunakan ajax
  function updateKelas(id) {
    var nama_kelas = $("#nama_kelas").val();
    var guru_id = $("#wali_kelas").val();
    $.ajax({
      type: "post",
      url: "{{ url('kelas/update') }}/" + id,
      data: {
        _token: "{{ csrf_token() }}",
        nama_kelas: nama_kelas,
        guru_id: guru_id,
      },
      success: function (data) {
        $(".btn-close").click();
        readKelas();
      },
    });
  }
  
  // untuk proses delete kelas menggunakan ajax
  function deleteKelas(id) {
    $.ajax({
      type: "get",
      url: "{{ url('kelas/delete') }}/" + id,
      data: {
        _token: "{{ csrf_token() }}",
      },
      success: function (data) {
        readKelas();
      },
      error: function (xhr, status, error) {
        console.error(error);
      },
    });
  }
  
</Script>
@endsection
