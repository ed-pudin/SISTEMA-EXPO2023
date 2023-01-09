<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXPO LMAD 2023</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <link
      class="jsbin"
      href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css"
      rel="stylesheet"
      type="text/css"
    />
    <script
      class="jsbin"
      src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"
    ></script>
    <script
      class="jsbin"
      src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"
    ></script>

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

</head>
<body>
<div class="container-fluid">
    
    <div class="row">
        
        <div class="col-sm-auto bg-dark sticky-top">
            <div class="d-flex flex-sm-column flex-row flex-nowrap bg-dark align-items-center sticky-top">
                <a href="{{ route('adminInicio.index') }}" class="d-block p-3 link-dark text-decoration-none" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only">
                    <!-- AQUI VA EL LOGO!!!!!! -->
                    <img class="logo-img" src="{{ asset('images/LOGO.png') }}" height="30">
                </a>

                <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center align-items-center">
                    <li>
                        <a href="{{ route('adminRegistroEventos.index') }}" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
                            <i class="bi bi-calendar2-heart-fill fs-5">
                                <p class="d-none d-sm-block nav-txt">Evento</p>
                            </i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('adminRegistroInvitados.index') }}" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Dashboard">
                            <i class="bi bi-people-fill fs-3">
                                <p class="d-none d-sm-block nav-txt">Invitados</p>
                            </i>
                            
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('adminRegistroEmpresas.index') }}" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Orders">
                            <i class="bi bi-buildings-fill fs-3">
                                <p class="d-none d-sm-block nav-txt">Empresas</p>
                            </i>
                            
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('adminRegistroMaestros.index') }}" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Products">
                            <i class="bi bi-mortarboard-fill fs-3">
                                <p class="d-none d-sm-block nav-txt">Maestros</p>
                            </i>
                            
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Customers">
                            <i class="bi bi-x-circle-fill fs-3">
                                <p class="d-none d-sm-block nav-txt">Salir</p>
                            </i>
                        </a>
                    </li>
                </ul>
                
            </div>
        </div>
        @yield('Navbar')
        
        @yield('Content')
    </div>
</div>
</body>
</html>