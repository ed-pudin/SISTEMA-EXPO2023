@extends('expositor.struct')

@section('Content')
<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>


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

                        <div class="container text-center mt-5" hidden>
                            <a href="https://example.com">Networking</a>
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
                                            {{$projectStudent->attended}}
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

                      <div class="container text-center mt-5" hidden>
                        <a href="https://example.com">Networking</a>
                    </div>

                    @if(count($projects) > 0)
                        <div class="col-12 d-md-flex justify-content-center align-items-center mt-5" style="">
                            <hr class="colorfull col-md-11">
                            <h2 class="text-center"> Exposiciones del Alumno </h2>

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
                                            {{$projectStudent->attended}}
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
