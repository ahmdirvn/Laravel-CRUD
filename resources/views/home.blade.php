@extends('navigation')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Selamat datang di Website Laravelku</h1>
                <h6 class="text-center">Selamat datang <b>{{ Auth::user()->name }}</b> anda login sebagai  <b>{{ Auth::user()->role }}</b></h6>
                <p class="text-center">Website ini dibuat dengan Laravel 10</p>
            </div>
        </div>
    </div>
@endsection