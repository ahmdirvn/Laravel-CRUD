@extends('navigation')
@section('content')
<div class="container mt-5">
    <div class="row">
        <h1> Berikut data Guru </h1>
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
            <button class="btn btn-primary" onclick="createGuru()"> + Tambah guru </button>
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
    readGuru();
  });
  
  // read data guru dari database
  function readGuru() {
    $.get("{{ url('guru/read') }}", {}, function (data, status) {
      $("#read").html(data);
    });
  }
  
  // modal show create guru
  function createGuru() {
    $.get("{{ url('guru/insert') }}", {}, function (data, status) {
      $("#page").html(data);
      $("#exampleModal").modal("show");
      $("#exampleModalLabel").text("Tambah data guru");
    });
  }
  
  // untuk proses create guru menggunakan ajax
  function insertGuru() {
    _token: "{{ csrf_token() }}";
    var nama = $("#nama").val();
    var nip = $("#nip").val();
    var mata_pelajaran = $("#mata_pelajaran").val();
    $.ajax({
      type: "post",
      url: "{{ url('guru/insert') }}",
      data: {
        _token: "{{ csrf_token() }}",
        nama: nama,
        nip: nip,
        mata_pelajaran: mata_pelajaran,
      },
      success: function (data) {
        $(".btn-close").click();
        readGuru();
      },
    });
  }
  
  // modal show update guru
  function showGuru(id) {
    $.get("{{ url('guru/update') }}/" + id, {}, function (data, status) {
      $("#page").html(data);
      $("#exampleModal").modal("show");
      $("#exampleModalLabel").text("Edit data guru");
    });
  }
  
  // untuk proses update guru menggunakan ajax
  function updateGuru(id) {
    var nama = $("#nama").val();
    var nip = $("#nip").val();
    var mata_pelajaran = $("#mata_pelajaran").val();
    $.ajax({
      type: "post",
      url: "{{ url('guru/update') }}/" + id,
      data: {
        _token: "{{ csrf_token() }}",
        nama: nama,
        nip: nip,
        mata_pelajaran: mata_pelajaran,
      },
      success: function (data) {
        $(".btn-close").click();
        readGuru();
      },
    });
  }
  
  // untuk proses delete guru menggunakan ajax
  function deleteGuru(id) {
    $.ajax({
      type: "get",
      url: "{{ url('guru/delete') }}/" + id,
      data: {
        _token: "{{ csrf_token() }}",
      },
      success: function (data) {
        readGuru();
      },
      error: function (xhr, status, error) {
        console.error(error);
      },
    });
  }
  
</Script>
@endsection
