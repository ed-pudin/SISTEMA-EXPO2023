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
    <script src="sweetalert2.all.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">

    <script>
        if(`{{ session()->get('userStatus') }}` == "Contraseña o clave incorrecta") {
            document.addEventListener("DOMContentLoaded", function(){
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    iconColor:'#a70202',
                    title: `{{ session()->get('userStatus') }}`,
                    showConfirmButton: false,
                    timer: 1500
                })
            
            });
        }
    </script>

</head>
<body style="background-image: url('images/backgroundimg.png');  background-repeat: no-repeat; background-size: cover; background-position:center; background-attachment: fixed;">
    <nav class="navbar navbar-expand-lg bg-dark sticky-top">
        <div class="container-fluid">
            <div class="col-md-0">
                    <a class="m-0 navbar-brand align: center" href="/"> <img class="logo-img" src="{{ asset('images/LOGO.png') }}" height="30"> </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
            </div>
        </div>
    </nav>

    <div class="col-sm p-3 test">
        <div class="container-fluid" >
            <div class="row">
                <h5 class="text-center" style="font-size: 2rem; margin-bottom:20px; margin-top:20px; color:white">Iniciar sesión</h5>
                <div class="container vh-80 div-colorfull">

                    <div class="container py-5">
                        
                        <form class="my-4 form-login" id="login" action="{{route('inicioSesion.store')}}" method="post">
                            @csrf
                            <div class="col-12 d-flex justify-content-center my-5">
                                <img class="logo-img col-10 col-md-4" src="{{ asset('images/LOGO.png') }}">
                            </div>

                            <div class="d-flex justify-content-center">
                                
                                <div class="col-md-10 my-4 mx-3">
                                    <div class="" syle="transform-origin: unset;">
                                        <input type="text" class="form-control text-center" name="key" id="key" placeholder="Clave de inicio de sesión" required>
                                    </div>
                                </div>

                            </div>

                            <div class="d-flex justify-content-center">

                                <div class="col-md-10 my-4 mx-3">
                                        <div class="" syle="transform-origin: unset;">
                                            <input type="password" class="form-control text-center" name="pas" id="pas" placeholder="Contraseña" required>
                                        </div>
                                </div>

                            </div>
    

                            <div class="d-flex justify-content-center my-4">
                                <button type="submit" class="btn btn-primary col-md-6">Iniciar sesión</button>
                            </div>
                        </form>

                    
                        
                    </div>

                </div>

            </div>
        </div>
    </div>

</body>
</html>