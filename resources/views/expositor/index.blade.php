@extends('expositor.struct')

@section('Content')
<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>

@if(session()->has('status'))

    <script type="text/javascript">
        @if(session()->get('status') == "Alumno registrado")
        document.addEventListener("DOMContentLoaded", function(){
            Swal.fire({
                position: 'center',
                icon: 'success',
                iconColor:'#0de4fe',
                title: `{{ session()->get('status') }}`,
                html: `Correo: {{ session()->get('correo') }} <br><br>
                Contraseña: {{session()->get('contraseña')}}`,
                showConfirmButton: false,
                timer: 2500
            })

        });
        @endif

        @if(session()->get('status') == "Expo añadida al alumno")
        document.addEventListener("DOMContentLoaded", function(){
            Swal.fire({
                position: 'center',
                icon: 'success',
                iconColor:'#0de4fe',
                title: `{{ session()->get('status') }}`,
                html: `Correo: {{ session()->get('correo') }} <br><br>
                Contraseña: {{session()->get('contraseña')}}`,
                showConfirmButton: false,
                timer: 2500
            })

        });
        @endif

        @if(session()->get('status') == "Alumno previamente registrado")
        document.addEventListener("DOMContentLoaded", function(){
            Swal.fire({
                position: 'center',
                icon: 'info',
                iconColor:'#0de4fe',
                title: `{{ session()->get('status') }}`,
                html: `Correo: {{ session()->get('correo') }} <br><br>
                Contraseña: {{session()->get('contraseña')}}`,
                showConfirmButton: false,
                timer: 2500
            })

        });
        @endif

        @if(session()->has('msg'))
        document.addEventListener("DOMContentLoaded", function(){
            Swal.fire({
                position: 'center',
                icon: 'error',
                iconColor:'red',
                title: `{{ session()->get('status') }}`,
                html: `{{ session()->get('msg') }}`,
                showConfirmButton: false,
                timer: 2500
            })

        });
        @else
        document.addEventListener("DOMContentLoaded", function(){
            Swal.fire({
                position: 'center',
                icon: 'error',
                iconColor:'red',
                title: `{{ session()->get('status') }}`,
                showConfirmButton: false,
                timer: 2500
            })

        });
        @endif

    </script>
    @php
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    @endphp
@endif


<div class="col-sm p-3 min-vh-80">
    <div class="container-fluid" style="height:80vh">
        <div class="row" style="justify-content: center; height: 80vh">
            <div class="card mb-3 d-none d-lg-block d-xl-block d-md-block bg-dark" style="width: 80%;">
                <div class="card-body">
                    <h5 class="card-title sm-bg text-center" style="color:#fcfcfc;font-size: 2rem">Código QR</h5>
                        <div class="col-11 mx-auto" style="margin-bottom:20px">
                            <div class="container" style="display: flex; font-size:1.5rem">
                                <p style="flex-grow: 1; margin-bottom: 0px;">
                                    <b>Nombre estudiante</b>
                                </p>
                                <p>
                                    <b>Matricula</b>
                                </p>
                            </div>
                            <div class="container" style="display: flex;">
                                <h4 style="flex-grow: 1">{{$student->getFullName()}}</h4>
                                <h4>{{$student->enrollment}}</h4>
                            </div>
                        </div>
                        <div class="col-12 d-md-flex justify-content-center align-items-center" style="margin-bottom:20px">
                            <hr class="colorfull col-md-11">
                        </div>
                        <div class="container"  style="display: flex; justify-content:center">
                            <div id="qrcode-2" style="padding: 15px; background: linear-gradient(to bottom,  #0de5ff 0%,#9564ff 50%,#c43afe 100%);"></div>
                            <img class="logo-img" src="{{ asset('images/LOGO.png') }}" style="
                            background: black;
                            position: absolute;
                            height: 5%;
                            margin: auto;
                            transform: translate(0%, 300%);
                            padding: 5px;">

                        </div>

                        @if($attendedAllProjects == true)
                            <div class="container text-center mt-3">
                                <a href="{{route('RegistroNetworking')}}">Registrarse al Networking</a>
                                <p> Al registrarse usted oficialmente acepta que su información personal será de visualización pública.
                                    <i class="bi bi-exclamation-triangle-fill" style="color: orange"></i>
                                </p>
                            </div>
                        @endif


                        <div class="row d-md-flex justify-content-center align-items-center" style="margin-top:10px">
                        <div class="col-1 d-md-flex justify-content-center align-items-center" style="margin-top:1px">
                            <button type="button" class="btn btn-primary" onClick="window.location.reload();">
                            <svg width="20" height="20" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                            <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                            </svg>
                            </button>
                        </div>
                        </div>

                        @if(count($projects) > 0)
                        <div class="col-12 d-md-flex justify-content-center align-items-center" style="margin-top:20px">
                            <hr class="colorfull col-md-11">
                        </div>
                        <div class="table-responsive my-3 col-11 m-auto">
                            <h2 class="text-center"> Exposiciones del Alumno </h2>

                            <table class="table" style="text-align-last:center;">
                                <thead>
                                    <tr>
                                        <th class="w-priority">Proyecto</th>
                                        <th class="w-priority">Asistencia</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($projects as $projectStudent)
                                    <tr>
                                        <td>{{$projectStudent->project()->first()->subject}}</td>
                                        <td>
                                            <input onclick="return false;" class="form-check-input" type="checkbox" id="attendance" name="attendance" @if($projectStudent->attended == 1) checked @endif>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif

                </div>
            </div>

            <div class="d-sm-block d-lg-none d-xl-none d-md-none" style="background-color: black;">
                <h5 class="card-title text-center" style="font-size: 2rem; margin-bottom:20px; margin-top:20px">Código QR</h5>
                <div class="container text-center" style="display: block; font-size:1.5rem; margin-bottom:40px">
                    <div>
                        <p>
                            <b>Nombre estudiante</b>
                            <p style="flex-grow: 1">{{$student->getFullName()}}</p>
                        </p>
                        <p>
                            <b>Matricula</b>
                            <p>{{$student->enrollment}}</p>
                        </p>
                    </div>
                        <div class="container"  style="justify-content:center">
                            <div id="qrcode-3" style="height: auto;width: fit-content;padding: 15px;background: linear-gradient(to bottom,  #0de5ff 0%,#9564ff 50%,#c43afe 100%);margin: auto;"></div>
                            <img class="logo-img" src="{{ asset('images/LOGO.png') }}" style="
                            background: black;
                            position: absolute;
                            height: 5%;
                            margin: auto;
                            transform: translate(-50%, -475%);
                            padding: 5px;">
                        </div>

                        @if ($attendedAllProjects == true)
                            <div class="container text-center mt-3">
                                <a href="{{route('RegistroNetworking')}}">Registrarse al Networking</a>
                                <p> Al registrarse usted oficialmente acepta que su información personal será de visualización pública.
                                    <i class="bi bi-exclamation-triangle-fill" style="color: orange"></i>
                                </p>
                            </div>
                        @endif

                    <div class="row d-md-flex justify-content-center align-items-center" style="margin-top:10px">
                    <div class="col-1 d-md-flex justify-content-center align-items-center" style="margin-top:1px">
                        <button type="button" class="btn btn-primary" onClick="window.location.reload();">
                        <svg width="20" height="20" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                        <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                        </svg>
                        </button>
                    </div>
                    </div>

                    @if(count($projects) > 0)
                        <div class="col-12 d-md-flex justify-content-center align-items-center mt-5" style="">
                            <hr class="colorfull col-md-11">
                            <h2 class="text-center"> Exposiciones del Alumno</h2>

                        </div>
                        <div class="table-responsive my-3 col-11 m-auto">

                            <table class="table" style="text-align-last:center;">
                                <thead>
                                    <tr>
                                        <th class="w-priority">Proyecto</th>
                                        <th class="w-priority">Asistencia</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($projects as $projectStudent)
                                    <tr>
                                        <td>{{$projectStudent->project()->first()->subject}}</td>
                                        <td>
                                            <input onclick="return false;" class="form-check-input" type="checkbox" id="attendance" name="attendance" @if($projectStudent->attended == 1) checked @endif>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    @endif

                </div>

            </div>
    </div>
</div>

<script type="text/javascript">
    var qrcode = new QRCode(document.getElementById("qrcode-2"), {
        text: '{{$student->enrollment}}',
        padding: 4,
        width: 256,
        height: 256,
        colorDark : "#000000",
        colorLight : "#ffffff",
        correctLevel : QRCode.CorrectLevel.H
    });

    var qrcode = new QRCode(document.getElementById("qrcode-3"), {
        text: '{{$student->enrollment}}',
        padding: 4,
        width: 256,
        height: 256,
        colorDark : "#000000",
        colorLight : "#ffffff",
        correctLevel : QRCode.CorrectLevel.H
    });
</script>


@endsection
