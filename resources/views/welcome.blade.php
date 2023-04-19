<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>EXPOLMAD 2023</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--tw-bg-opacity: 1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gray-100{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.border-gray-200{--tw-border-opacity: 1;border-color:rgb(229 231 235 / var(--tw-border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{--tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);--tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.text-center{text-align:center}.text-gray-200{--tw-text-opacity: 1;color:rgb(229 231 235 / var(--tw-text-opacity))}.text-gray-300{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity))}.text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}.text-gray-600{--tw-text-opacity: 1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-700{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity: 1;color:rgb(17 24 39 / var(--tw-text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--tw-bg-opacity: 1;background-color:rgb(31 41 55 / var(--tw-bg-opacity))}.dark\:bg-gray-900{--tw-bg-opacity: 1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:border-gray-700{--tw-border-opacity: 1;border-color:rgb(55 65 81 / var(--tw-border-opacity))}.dark\:text-white{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}}
        </style>
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

        <!-- SPLIDE -->

        <script src="
        https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js
        "></script>

        <link href="
        https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css
        " rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    </head>
    <body>

        <nav class="navbar navbar-expand-lg bg-dark sticky-top">
            <div class="container-fluid">
                <div class="col-md-0 p-2 ms-lg-3">
                    <a class="navbar-brand " href="/"> <img class="logo-img" src="{{ asset('images/LOGO.png') }}" height="40"> </a>
                </div>
                <button class="m-0 navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">

                    <ul class="nav navbar-nav navbar-left">
                        @if (session()->has('id'))
                            @if ($rol == 'admin')
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('adminInicio.index')}}">
                                    <p class="m-0 nav-txt"> Administrar </p>
                                </a>
                            </li>
                            @endif

                            @if ($rol == 'staff' || $rol == 'admin')
                                <li class="nav-item">
                                    <a class="nav-link " href="{{route('staffEvento.index')}}">
                                        <p class="m-0 nav-txt"> Marcar Asistencia </p>
                                    </a>
                                </li>
                            @endif

                            @if ($rol == 'teacher' || $rol == 'admin')
                            <li class="nav-item">
                                <a class="nav-link active" href="{{route('teacherRegistroExpositor.index')}}">
                                    <p class="m-0 nav-txt"> Registrar Expositores </p>
                                </a>
                            </li>
                            @endif

                            @if ($rol == 'expositor')
                                <li class="nav-item">
                                    <a class="nav-link " href="{{route('expositorQR.index')}}">
                                        <p class="m-0 nav-txt"> QR Expositor </p>
                                    </a>
                                </li>
                            @endif




                        @endif
                    </ul>
                    @if (!(session()->has('id')))
                        <ul class="nav navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('inicioSesion.index')}}">
                                    <p class="m-0 nav-txt"> INICIAR SESIÓN </p>
                                </a>
                            </li>
                        </ul>
                    @endif

                </div>

            </div>
        </nav>

        <div class="container-fluid min-vh-100 backgroundImg">
            <!--
            <div class="slider1">
                @if(count($conferencias) > 0)
                    <div class="row align-items-center p-5">
                        <h1 style="text-align: center;"> C o n f e r e n c i a s </h1>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-md-2 col-sm-12 my-5"></div>
                                <div id="carouselExampleCaptions1" class="carousel slide col-md-8" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            @foreach ( $conferencias as $conferencia)
                                            <div class="carousel-item {{$loop->first ? 'active': ''}}">

                                                <img src="{{ asset('storage/eventImages/'.$conferencia->image) }}" class="img-fluid d-block w-100" style="text-align: center; width: 100px; height:300px; object-fit: cover;">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h3 style="text-align: center; text-shadow: 0 0 10px #000;">{{$conferencia->eventName}}</h3>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>

                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions1" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions1" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>

                                    <div class="carousel-indicators">
                                        @foreach ( $conferencias as $conferencia)
                                        <button type="button" data-bs-target="#carouselExampleCaptions1" data-bs-slide-to="{{$loop->index}}" class="{{$loop->first ? 'active': ''}}" aria-current="true" aria-label="Slide 1"></button>
                                        @endforeach
                                    </div>

                            </div>
                        <div class="col-md-3"></div>
                    </div>
                @endif
            </div>

            <div class="slider2">
                @if(count($mesasRedondas) > 0)
                    <div class="row align-items-center p-5">
                        <h1 style="text-align: center;"> M e s a  R e d o n d a </h1>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-md-2 col-sm-12 my-5"></div>
                                <div id="carouselExampleCaptions2" class="carousel slide col-md-8" data-bs-ride="carousel">
                                <div id="carouselExampleCaptions2" class="carousel slide col-md-8" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            @foreach ( $mesasRedondas as $mesaRedonda)
                                            <div class="carousel-item {{$loop->first ? 'active': ''}}">
                                                <img src="{{ asset('storage/eventImages/'.$mesaRedonda->image) }}" class="img-fluid d-block w-100" style="text-align: center; width: 100px; height:300px; object-fit: cover;">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h3 style="text-align: center;text-shadow: 0 0 10px #000;">{{$mesaRedonda->eventName}}</h3>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>

                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide="prev">
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide="next">
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>

                                    <div class="carousel-indicators">
                                        @foreach ( $mesasRedondas as $mesaRedonda)
                                        <button type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="{{$loop->index}}" class="{{$loop->first ? 'active': ''}}" aria-current="true" aria-label="Slide 1"></button>
                                        @endforeach
                                    </div>

                            </div>
                        <div class="col-md-3"></div>
                    </div>
                @endif
            </div>
            -->
            <div class="slider3 pb-5">
                @if(count($allEvents) > 0)
                    <div class="row align-items-center" style="">
                        <h1 style="text-align: center"> Disfruta nuestros eventos</h1>

                        <div class="col-sm-10 col-12 mx-auto my-3" style="text-align: center;">

                            <div id="carouselExampleCaptions3" class="carousel slide" data-bs-ride="carousel">
                                <a class="carousel-control-prev" data-bs-target="#carouselExampleCaptions3" data-bs-slide="prev" style="opacity:1;">
                                    <i class="bi bi-arrow-left-circle" style="font-size: 2.0rem"></i>
                                </a>

                                <div id="event-carousel" class="carousel-inner p-3" style="text-align: -webkit-center;">
                                    @foreach ($allEvents as $event)
                                    @if($event->typeEvent != "Master Class" && $event->typeEvent != "Conferencia")
                                    <div class="carousel-item" style="align-content: center">
                                        <img src="{{ asset('storage/eventImages/'.$event->image) }}" class="img-fluid w-100 d-block CarouselImg" style="min-height: 25.0rem; max-height:25.0rem;object-fit: contain;">
                                        <div class="d-none d-md-block" style=" padding: 10px">
                                            <h1 style="text-align: center; display: inline-block;">{{$event->eventName}}</h1>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>

                                <a class="carousel-control-next" data-bs-target="#carouselExampleCaptions3" data-bs-slide="next" style="opacity:1;">
                                    <i class="bi bi-arrow-right-circle" style="font-size: 2.0rem"></i>
                                </a>



                            </div>

                        </div>

                    </div>
                @endif
            </div>
            <!--
            <div class="slider4">
                @if(count($torneos) > 0)
                    <div class="row align-items-center p-5">
                        <h1 style="text-align: center;"> T o r n e o s </h1>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-md-2 col-sm-12 my-5"></div>
                                <div id="carouselExampleCaptions4" class="carousel slide col-md-8" data-bs-ride="carousel">
                                <div id="carouselExampleCaptions4" class="carousel slide col-md-8" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            @foreach ( $torneos as $torneo)
                                            <div class="carousel-item {{$loop->first ? 'active': ''}}">
                                                <img src="{{ asset('storage/eventImages/'.$torneo->image) }}" class="img-fluid d-block w-100" style="text-align: center; width: 100px; height:300px; object-fit: cover;">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h3 style="text-align: center;text-shadow: 0 0 10px #000;">{{$torneo->eventName}}</h3>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>

                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions4" data-bs-slide="prev">
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions4" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions4" data-bs-slide="next">
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions4" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>

                                    <div class="carousel-indicators">
                                        @foreach ( $torneos as $torneo)
                                        <button type="button" data-bs-target="#carouselExampleCaptions4" data-bs-slide-to="{{$loop->index}}" class="{{$loop->first ? 'active': ''}}" aria-current="true" aria-label="Slide 1"></button>
                                        @endforeach
                                    </div>

                            </div>
                        <div class="col-md-3"></div>
                    </div>
                @endif
            </div>

            <div class="slider5">
                @if(count($otros) > 0)
                    <div class="row align-items-center p-5">
                        <h1 style="text-align: center;"> D e m á s  e v e n t o s </h1>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-md-2 col-sm-12 my-5"></div>
                                <div id="carouselExampleCaptions5" class="carousel slide col-md-8" data-bs-ride="carousel">
                                <div id="carouselExampleCaptions5" class="carousel slide col-md-8" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            @foreach ( $otros as $otro)
                                            <div class="carousel-item {{$loop->first ? 'active': ''}}">
                                                <img src="{{ asset('storage/eventImages/'.$otro->image) }}" class="img-fluid d-block w-100" style="text-align: center; width: 100px; height:300px; object-fit: cover;">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h3 style="text-align: center;text-shadow: 0 0 10px #000;">{{$otro->eventName}}</h3>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>

                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions5" data-bs-slide="prev" >
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions5" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>

                                    <div class="carousel-indicators">
                                        @foreach ( $otros as $otro)
                                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$loop->index}}" class="{{$loop->first ? 'active': ''}}" aria-current="true" aria-label="Slide 1"></button>
                                        @endforeach
                                    </div>

                            </div>
                        <div class="col-md-3"></div>
                    </div>
                @endif
            </div>

            -->
            <section class="splide my-2" aria-labelledby="carousel-heading" style="background-color: #000">
                <h2 id="carousel-heading" style="text-align: center; margin-bottom:15px">Entra a charlas y master classes</h2>
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach ($allEvents as $event)
                        @if($event->typeEvent == "Master Class" || $event->typeEvent == "Conferencia")
                        <li class="splide__slide">

                            <div class="card bg-dark" >
                                <img width="250" height="250" src="{{asset('storage/eventImages/'.$event->image)}}" class=" p-3" alt="{{$event->eventName}} image" style="align-self: center;">
                                <div class="card-body">
                                    <h5 class="card-title" style="
                                    display: inline-block;
                                    text-align:center;
                                    overflow: hidden;
                                    text-overflow: ellipsis;
                                    max-width: 20ch;
                                ">{{$event->eventName}}</h5>
                                </div>
                                <div class="card-footer text-muted text-center">
                                    {{$event->date}} <br> Hora Inicio: {{$event->startTime}} <br> Hora final: {{$event->endTime}}
                                </div>
                            </div>

                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </section>

            <div class="empresas mt-5" style="background-color: ">
                @if(count($companies) > 0)
                    <div class="row align-items-center p-5">
                        <h1 style="text-align: center;"> E m p r e s a s </h1>
                    </div>

                    <div class="row d-flex justify-content-center">
                    @foreach ($companies as $company )
                        <div class="col-md-3 col-sm-6 mt-5" style="text-align: center;">
                            <img src="https://placehold.co/200x200/000000/FFFFFF?text={{$company->nameCompany}}" class="img-fluid rounded-circle shadow p-3 mb-5" alt="{{$company->nameCompany}}" height="200">
                        </div>
                    @endforeach
                    </div>
                @endif
            </div>

            <div class="empresas">
                @if(count($companies) == 0 && count($otros) == 0 && count($torneos) == 0 && count($masterClasses) == 0 && count($mesasRedondas) == 0 && count($conferencias) == 0)
                    <div class="row align-items-center p-5">
                        <h1 style="text-align: center;"> Sin eventos registrados </h1>
                    </div>
                @endif
            </div>

        </div>
    </body>
</html>

<script>

    var carouselActive = function(){
        var carousel = $('#event-carousel > .carousel-item');
        var firstElement = carousel.first();

        firstElement.addClass('active');
    }

    var Interval = setInterval(carouselActive, 10);

    setInterval(function(){clearInterval(Interval)},1000);

    var splide = new Splide( '.splide', {
        perPage: 1,
        focus: 'center',
        autoWidth: true,
    } );


    splide.mount();

</script>
