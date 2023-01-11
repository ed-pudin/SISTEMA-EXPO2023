@extends('admin.struct')

@section('Content')

<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

<div class="col-sm p-3 min-vh-100 backgroundImg tab-pane">
    <div class="container-fluid">
        <h1 style="font-weight: bold; text-align:center"> Dashboard</h1>

        <div class="card dashboard-t my-3">
            <div class="card-body">
                <h2 class="text-center"> <b>TOTAL DE ASISTIDOS: </b> 9999</h2>
            </div>
        </div>

        <div class="col-12 d-md-flex justify-content-around">

            <div class="card dashboard-t col-12 col-md-5 my-3">
                <div class="card-body d-flex center-text-v flex-fill">
                    <h2 class="text-center"> <b> ALUMNOS: </b> <br> 9999</h2>
                </div>
            </div>

            <div class="card dashboard-t col-12 col-md-5 my-3">
                <div class="card-body flex-fill">
                    <h2 class="text-center p-1"> <b> EXTERNOS:</b> <br> 9999</h2>

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
            <div class="col-12 d-flex justify-content-center mt-5 mb-3">
                <h1 style="align-self:center; margin-right: 10px"> Cantidad eventos: </h1> 
                <h2 style="align-self:center;"> 12 </h2>          
            </div>

            <div class="col-12 d-flex justify-content-center my-3">
                <h1 style="align-self:center; margin-right: 10px"> Cantidad expositores: </h1> 
                <h2 style="align-self:center;"> 48 </h2>          
            </div>

            <div class="col-12 d-flex justify-content-center my-3">
                <h1 style="align-self:center; margin-right: 10px"> Cantidad empresas: </h1> 
                <h2 style="align-self:center;"> 48 </h2>          
            </div>

            <div class="col-sm-6 col-xs-12 mx-auto my-5">
                <canvas id="pieChart"></canvas>
            </div>

        <div>
    </div>

    <script
     src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script>

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
                responsive: true,
                legend: {
                    labels: {
                        generateLabels: function(chart) {
                            var data = chart.data;
                            if (data.labels.length && data.datasets.length) {
                                return data.labels.map(function(label, i) {
                                    var meta = chart.getDatasetMeta(0);
                                    var ds = data.datasets[0];
                                    var arc = meta.data[i];
                                    var custom = arc && arc.custom || {};
                                    var getValueAtIndexOrDefault = Chart.helpers.getValueAtIndexOrDefault;
                                    var arcOpts = chart.options.elements.arc;
                                    var fill = custom.backgroundColor ? custom.backgroundColor : getValueAtIndexOrDefault(ds.backgroundColor, i, arcOpts.backgroundColor);
                                    var stroke = custom.borderColor ? custom.borderColor : getValueAtIndexOrDefault(ds.borderColor, i, arcOpts.borderColor);
                                    var bw = custom.borderWidth ? custom.borderWidth : getValueAtIndexOrDefault(ds.borderWidth, i, arcOpts.borderWidth);

                                    // We get the value of the current label
                                    var value = chart.config.data.datasets[arc._datasetIndex].data[arc._index];
                                    debugger;

                                    return {
                                        // Instead of `text: label,`
                                        // We add the value to the string
                                        text: label + " : " + value,
                                        fillStyle: fill,
                                        strokeStyle: stroke,
                                        lineWidth: 0,
                                        hidden: isNaN(ds.data[i]) || meta.data[i].hidden,
                                        index: i
                                    };
                                });
                            } else {
                                return [];
                            }
                        },
                        fontColor:'rgba(255,0,0,1)'
                    },
                }
            }
        });

    </script>

 @endsection