@extends('navigation')
@section('content')
<h1> Tambah data Siswa </h1>
<form method="post">
    @csrf
    <table>
        <tr>
            <td> Nama </td>
            <td> <input type="text" name="nama" value= "{{ (isset($siswa)) ? $siswa->nama : '' }}"> </td>
        </tr>
        <tr>
            <td> Mata Pelajaran </td>
            <td> <input type="text" name="mata_pelajaran" value= "{{ (isset($siswa)) ? $siswa->mata_pelajaran : '' }}"> </td>
        </tr>
        <tr>
            <td> Kelas </td>
            <td> <input type="text" name="kelas" value= "{{ (isset($siswa)) ? $siswa->kelas : '' }}"> </td>
        </tr>
        <tr>
        <tr>
            <td> <input type="submit" value="Simpan"> </td>
            <td><a href="{{ url('/siswa') }}"> Kembali </a></td>
        </tr>
    </table>
@endsection