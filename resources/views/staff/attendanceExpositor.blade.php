@extends('staff.struct')

@section('Content')

<link rel="stylesheet" href="{{ asset('css/qrReader.css') }}">

<div class="d-flex justify-content-center mt-4 flex-wrap">
    <h5 class="text-center col-12" style="font-size: 2rem; margin-bottom:20px; margin-top:20px; color:white">Asistencia expositor</h5>

    <form id="form" action="{{route('staffExpositor.store')}}" method="post" hidden>
        @csrf
        <input type="text" name="matricula" id="matricula">
        <button id="btnsend" type="submit"></button>
    </form>
    <div class="container col-12 col-md-8 d-flex justify-content-center p-5 mb-4 flex-wrap div-colorfull">    
        <div class="container-fluid m-0 p-0">
            <div id="reader"></div>
        </div>
        <div id="result"></div>
    </div>
    

</div>

<script type="text/javascript">

    let qrboxFunction = function(viewfinderWidth, viewfinderHeight) {
        let minEdgePercentage = 0.1; // 70%
        let minEdgeSize = Math.min(viewfinderWidth, viewfinderHeight);
        let qrboxSize = Math.floor(minEdgeSize * minEdgePercentage);
        return {
            width: qrboxSize,
            height: qrboxSize
        };
    }

    const scanner = new Html5QrcodeScanner('reader', {
        qrbox: {
            width: 1080,
            height: 1080
        },
        fps: 60,
    });

    scanner.render(success, error);

    function success(result) {
        //enviar resultado
        document.getElementById('result').innerHTML = `<hr> <h1> Alumno ${result} registrado </h1> <hr>`;
        document.getElementById("matricula").value = result;
        document.querySelector('form').submit();
        scanner.clear();
        document.getElementById('reader').remove();
    }

    function error(err) {
        
    }


    var camReader = document.getElementById('reader__dashboard_section_csr');
    var cameraPermissionButton = camReader.firstChild.firstChild;

    var fileReader = document.getElementById('reader__dashboard_section_swaplink');
    var videocontainer = document.getElementById('reader__scan_region');

    videocontainer.classList.add("container-fluid");
    cameraPermissionButton.classList.add("col-12");

    fileReader.style.display = 'none';

</script>
@endsection
