@extends('navigation')
@section('content')
<h1> Berikut data siswa </h1>
@if($message = Session::get('message'))
    <div style="background-color: #0ff; padding: 10px;">
        {{ $message }}
    </div>
@endif

<a href="{{ url('/siswa/insert') }}"> + Tambah Siswa </a>
<table border="1" cellspacing="0" cellpadding="5" style="margin-top: 20px;">
    <tr>
        <td> Nama </td>
        <td> Email </td>
        <td> Kelas </td>
        <td> Agama </td>
        <td> Action </td>
    </tr>

@foreach ($siswas as $siswa)
    <tr>
        <td> {{ $siswa->nama }} </td>
        <td> {{ $siswa->email }} </td>
        <td> {{ $siswa->kelas }} </td>
        <td> {{ $siswa->agama }} </td>
        <td>
            <a href="{{ url('/siswa/update/'.$siswa->id) }}"> Edit </a>
            <a href="{{ url('/siswa/delete/'.$siswa->id) }}"> Delete </a>
        </td>
    </tr>
@endforeach
</table>

@endsection
