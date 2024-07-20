@extends('navigation')
@section('content')

<h1> Tambah data Kelas </h1>
<form method="post">
    @csrf
    <table>
        <tr>
            <td> Nama Kelas </td>
            <td> <input type="text" name="nama_kelas" value= "{{ (isset($kelas)) ? $kelas->nama_kelas : '' }}"> </td>
        </tr>
        <tr>
            <td> <input type="submit" value="Simpan"> </td>
            <td><a href="{{ url('/kelas') }}"> Kembali </a></td>
        </tr>
    </table>
</form>
@endsection