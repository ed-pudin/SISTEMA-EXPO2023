<!DOCTYPE html>
<html lang="en">
<head>
    @livewireStyles
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/staffEvent.css') }}">
    <link rel="stylesheet" href="{{ asset('css/staffAttendanceEvent.css') }}">
    <link rel="stylesheet" href="{{ asset('css/staffAttendanceExpositor.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>
    <script src="{{ asset('js/staffAttendanceEvent.js') }}"></script>
    <script src="{{ asset('js/staffAttendanceCompany.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">


    <script
      class="jsbin"
      src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"
    ></script>
    <script
      class="jsbin"
      src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"
    ></script>


</head>
<body style="background-image: url('../images/backgroundimg.png');  background-repeat: no-repeat; background-size: cover; background-position:center; background-attachment: fixed;">
    <nav class="navbar navbar-expand-lg bg-dark sticky-top">
        <div class="container-fluid">

            <a class="navbar-brand" href="/"> <img class="logo-img" src="{{ asset('images/LOGO.png') }}" height="30"> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="nav navbar-nav navbar-left">

                    @php
                    if(session()->has('id')){
                        $id = session()->get('id');
                        $user = new App\Models\User();
                        $user = App\Models\User::where('id', '=', $id)->first();
                        if($user != null){
                            $rol = $user->rol;
                        }
                    }
                    @endphp

                    @if ($rol == 'admin')
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('adminInicio.index')}}">
                            <p class="m-0 nav-txt"> Administrar </p>
                        </a>
                    </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('staffEvento.index')}}">
                            <p class="m-0 nav-txt"> Eventos </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('staffEmpresa.index')}}">
                            <p class="m-0 nav-txt"> Empresas </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('staffExpositor.index')}}">
                            <p class="m-0 nav-txt"> Expositor </p>
                        </a>
                    </li>
                </ul>

                <ul class="nav navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cerrarSesion') }}">
                            <p class="m-0 nav-txt"> Salir </p>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
    @yield('Content')
    @livewireScripts
</body>
</html>
