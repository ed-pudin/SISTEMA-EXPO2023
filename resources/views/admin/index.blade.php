@extends('admin.struct')

@section('Content')

<script>
var ctxP = document.getElementById("pieChart").getContext('2d');
  var myPieChart = new Chart(ctxP, {
    type: 'pie',
    data: {
      labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
      datasets: [{
        data: [300, 50, 100, 40, 120],
        backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
        hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
      }]
    },
    options: {
      responsive: true
    }
  });
</script>


<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

<div class="col-sm p-3 min-vh-100 backgroundImg tab-pane">
    <div class="container-fluid">
        <h1 style="font-weight: bold"> Dashboard</h1>

        <div class="card dashboard-t my-3">
            <div class="card-body">
                <h1 class="text-center"> <b>TOTAL DE ASISTIDOS: </b> 9999</h1>
            </div>
        </div>

        <div class="col-12 d-md-flex justify-content-around">

            <div class="card dashboard-t col-12 col-md-5 my-3">
                <div class="card-body d-flex center-text-v flex-fill">
                    <h1 class="text-center"> <b> ALUMNOS: </b> <br> 9999</h1>
                </div>
            </div>

            <div class="card dashboard-t col-12 col-md-5 my-3">
                <div class="card-body flex-fill">
                    <h1 class="text-center p-1"> <b> EXTERNOS:</b> <br> 9999</h1>

                    <div class="container col-12 d-md-flex mt-4">
                        <div class="col-12 col-md-6 text-center text-white">
                            <h3 class="text-center"> <b>FEMENINO: </b> <br> 9999</h3>
                        </div>

                        <div class="col-12 col-md-6 text-center text-white">
                            <h3 class="text-center"> <b> MASCULINO:</b> <br> 9999</h3>
                        </div>

                    </div>
                </div>
            </div>
            
        </div>

        <div class="mt-3 div-colorfull text-center text-white">
            <div class="col-12 d-flex justify-content-center">
                <h2 style="font-weight:bold; margin-right: 10px"> Cantidad eventos: </h2> 
                <h2> 12 </h2>          
            </div>

            <div class="col-12 d-flex justify-content-center">
                <h2 style="font-weight:bold; margin-right: 10px"> Cantidad expositores: </h2> 
                <h2> 48 </h2>          
            </div>

            <div class="col-12 d-flex justify-content-center">
                <h2 style="font-weight:bold; margin-right: 10px"> Cantidad empresas: </h2> 
                <h2> 48 </h2>          
            </div>

            <div>
                <canvas id="pieChart"></canvas>
            </div>

        <div>
    </div>
@endsection