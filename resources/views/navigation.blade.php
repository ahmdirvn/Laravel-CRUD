<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravelku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.0/css/dataTables.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Website Laravelku</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ url('/home') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/about') }}">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/siswa') }}">Siswa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/guru') }}">Guru</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/kelas') }}">Kelas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/laporan') }}">Laporan</a>
              </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{Auth::user()->name}}
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      <li class="dropdown-item text-center"><a>Level: {{Auth::user()->role}}</a></li>
                      <li role="separator" class="dropdown-divider"></li>
                      <li class="text-center"><a href="{{route('actionlogout')}}"><i class="fa fa-power-off"></i> Log Out</a></li>
                  </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      @yield('content')
</body>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      
      <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
      <script src="https://cdn.datatables.net/2.1.0/js/dataTables.min.js"></script>

</html>
