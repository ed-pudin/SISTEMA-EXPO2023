@extends('staff.struct')

@section('Content')

<div class="d-flex justify-content-center mt-4 flex-wrap">
    <h5 class="text-center col-12" style="font-size: 2rem; margin-bottom:20px; margin-top:20px; color:white">Asistencia expositor</h5>

    <div class="container col-12 col-md-8 d-flex justify-content-center p-5 mb-4 flex-wrap div-colorfull">    
        <div class="col-12 col-md-8" id="reader">

        </div>
    </div>


</div>

<script type="text/javascript">
    function onScanSuccess(decodedText, decodedResult) {
        console.log(`Code scanned = ${decodedText}`, decodedResult);
    }
    var html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", { fps: 10, qrbox: 250},
        );
    html5QrcodeScanner.render(onScanSuccess);

</script>
@endsection
