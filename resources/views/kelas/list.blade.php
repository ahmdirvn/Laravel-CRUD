@extends('navigation')
@section('content')
<h1> Berikut data Kelas </h1>
@if($message = Session::get('message'))
    <div style="background-color: #0ff; padding: 10px;">
        {{ $message }}
    </div>
@endif

<a href="{{ url('/kelas/insert') }}"> + Tambah Kelas </a>
<table border="1" cellspacing="0" cellpadding="5" style="margin-top: 20px;">
    <tr>
        <td> Kelas </td>
        <td> Action </td>
    </tr>

    @foreach ($kelass as $kelas)
    <tr>
        <td> {{ $kelas->nama_kelas }} </td>
        <td> 
            <a href="{{ url('/kelas/update/'.$kelas->id) }}"> Edit </a>
            <a href="{{ url('/kelas/delete/'.$kelas->id) }}" > Delete </a>
        </td>
    </tr>
    @endforeach

@endsection