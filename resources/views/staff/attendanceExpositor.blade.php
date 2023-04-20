@extends('staff.struct')

@section('Content')
@if(session()->has('status'))

<script type="text/javascript">

    @if(session()->get('status') == "Hubo un problema en la asistencia" || session()->get('status') == "El alumno ya tiene asistencia" || session()->get('status') =="El alumno no es válido")
    document.addEventListener("DOMContentLoaded", function(){
        Swal.fire({
            position: 'center',
            icon: 'error',
            iconColor:'#a70202',
            title: `{{ session()->get('status') }}`,
            showConfirmButton: false,
            timer: 1500
        })

    });
    @else
        document.addEventListener("DOMContentLoaded", function(){
            Swal.fire({
                position: 'center',
                icon: 'success',
                iconColor: '#0de4fe',
                title: `{{ session()->get('status') }}`,
                showConfirmButton: false,
                timer: 1500
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

<link rel="stylesheet" href="{{ asset('css/qrReader.css') }}">

<div class="d-flex justify-content-center mt-4 flex-wrap">
    <h5 class="text-center col-12" style="font-size: 2rem; margin-bottom:20px; margin-top:20px; color:white">Asistencia expositor</h5>

    <form id="form" action="{{route('staffExpositor.store')}}" method="post" hidden>
        @csrf
        <input type="text" name="matricula" id="matricula">
        <button id="btnsend" type="submit"></button>
    </form>
    <!--<div class="col-12 col-md-8 d-flex justify-content-center p-5 mb-4 flex-wrap div-colorfull">
        <div class="container-fluid m-0 p-0">
            <div id="reader"></div>
        </div>
        <div id="result"></div>
    </div>-->
    <div class="div-colorfull p-5">
        <div class="row">
            <div class="col-12">
                <div id="reader"></div>
            </div>
            <div class="col-12" style="padding: 30px">
                <div id="result">
                </div>
            </div>
        </div>
    </div>


</div>

<script type="text/javascript">
    /*
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
            width: 360,
            height: 640
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


    videocontainer.classList.add("container-fluid");
    cameraPermissionButton.classList.add("col-12");

    fileReader.style.display = 'none';
    */

   // When scan is successful fucntion will produce data
    function onScanSuccess(qrCodeMessage) {
        //document.getElementById("result").innerHTML =
       //     '<span class="result">' + qrCodeMessage + "</span>";

        //document.getElementById('result').innerHTML = `<hr> <h1> Alumno ${qrCodeMessage} registrado </h1> <hr>`;
        document.getElementById("matricula").value = qrCodeMessage;
        document.querySelector('form').submit();
        scanner.clear();
        document.getElementById('reader').remove();
    }

    // When scan is unsuccessful fucntion will produce error message
    function onScanError(errorMessage) {
    // Handle Scan Error
    }

    // Setting up Qr Scanner properties
    var html5QrCodeScanner = new Html5QrcodeScanner("reader", {
        fps: 10,
        qrbox: 250
    });

    // in
    html5QrCodeScanner.render(onScanSuccess, onScanError);

    var videocontainer = document.getElementById('reader__scan_region');
    videocontainer.style.height = "auto";

</script>
@endsection
