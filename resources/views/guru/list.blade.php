@extends('navigation')
@section('content')
<h1> Berikut data Guru </h1>
@if($message = Session::get('message'))
    <div style="background-color: #0ff; padding: 10px;">
        {{ $message }}
    </div>
@endif

<a href="{{ url('/guru/insert') }}"> + Tambah Guru </a>
<table border="1" cellspacing="0" cellpadding="5" style="margin-top: 20px;">
    <tr>
        <td> Nama </td>
        <td> Mata Pelajaran </td>
        <td> Kelas </td>
        <td> Action </td>
    </tr>

@foreach ($gurus as $guru)
    <tr>
        <td> {{ $guru->nama }} </td>
        <td> {{ $guru->mata_pelajaran }} </td>
        <td> {{ $guru->kelas }} </td>
        <td>
            <a href="{{ url('/guru/update/'.$guru->id) }}"> Edit </a>
            <a href="{{ url('/guru/delete/'.$guru->id) }}"> Delete </a>
        </td>
    </tr>
@endforeach
</table>

@endsection
