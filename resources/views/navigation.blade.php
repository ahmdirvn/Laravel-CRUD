<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Laravel ku </title>
</head>
<body>
    <h1> Website laravelku </h1>
    <hr>
    <a href="{{ url('/home') }}"> Home </a> |
    <a href="{{ url('/about') }}"> About </a> |
    <a href="{{ url('/contact') }}"> Contact </a>
    <a href="{{ url('/siswa') }}"> Siswa </a>
    <a href="{{ url('/guru') }}"> Guru </a>
    <a href="{{ url('/kelas') }}"> Kelas </a>

    <hr>

    @yield('content')

</body>
</html>