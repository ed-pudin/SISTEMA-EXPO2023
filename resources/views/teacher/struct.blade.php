<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <!-- JavaScript Bundle with Popper -->
    <script
    class="jsbin"
    src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"
  ></script>
  <script
    class="jsbin"
    src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"
  ></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="{{ asset('js/teacherIndex.js') }}"></script>

</head>
<body style="background-image: url('images/backgroundimg.png');  background-repeat: no-repeat; background-size: cover; background-position:center; background-attachment: fixed;">
    <nav class="navbar navbar-expand-lg bg-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"> <img class="logo-img" src="{{ asset('images/LOGO.png') }}" height="30"> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a class="nav-link active" href="{{route('teacherRegistroExpositor.index')}}">
                            <p class="m-0 nav-txt"> Registrar Expositores </p>
                        </a>
                    </li>
                </ul>

                <ul class="nav navbar-nav ms-auto">
                    <li>
                        <a class="nav-link active" href="{{ route('cerrarSesion') }}">
                            <p class="m-0 nav-txt"> Salir </p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('Content')
</body>
</html>
