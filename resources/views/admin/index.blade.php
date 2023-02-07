@extends('admin.struct')

@section('Content')

@if(session()->has('status'))

    <script type="text/javascript">
        @if(session()->get('status') == "Cuenta generada")
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

        @if(session()->get('status') == "Hubo un problema en la generación de la cuenta")
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
        @endif

    </script>
        @php
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        @endphp
@endif

@if(session()->has('delete'))

        <script type="text/javascript">

        @if(session()->get('delete') == "Hubo un error, intente de nuevo")
        document.addEventListener("DOMContentLoaded", function(){
            Swal.fire({
                position: 'center',
                icon: 'error',
                iconColor:'#a70202',
                title: `{{ session()->get('delete') }}`,
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
                title: `{{ session()->get('delete') }}`,
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

<script
    src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>


<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

<div class="col-sm p-3 min-vh-100 backgroundImg tab-pane">
    <div class="container-fluid">
        <h1 style="font-weight: bold; text-align:center"> Dashboard</h1>

        <div class="card dashboard-t my-3">
            <div class="card-body">
                <div class="col-12 justify-content-center">
                        <h2 class="text-center" style="font-size:8em; font-weight:bold;"> @if ($finalCount <= 0) — @else{{$finalCount}}@endif </h2>
                        <h1 class="text-center" style="text-shadow:unset; font-size:1.5em;"> <b> TOTAL DE ASISTIDOS </b> </h1>
                </div>
            </div>
        </div>

        <div class="container-fluid justify-content-around">
            <div class="row">
                <div class="card dashboard-t col-12 col-md-12 col-lg-5 my-3">
                    <div class="card-body row d-flex center-text-v flex-fill">
                        <div class="col-12 justify-content-center">
                            <h2 class="text-center" style="font-size:6em; font-weight:bold;"> @if ($studentsCount <= 0) — @else{{$studentsCount}}@endif  </h2>
                        </div>
                        <div class="col-12 justify-content-center">
                            <h1 class="text-center" style="text-shadow:unset; font-size:1.8em;"> <b> ALUMNOS </b> </h1>
                        </div>
                    </div>
                </div>

                <div class="col"> </div>

                <div class="card dashboard-t col-12 col-md-12 col-lg-5 my-3">
                    <div class="card-body flex-fill">
                        <div class="col-12 justify-content-center">
                            <h2 class="text-center" style="font-size:6em; font-weight:bold;"> @if ($externalCount <= 0) — @else{{$externalCount}}@endif </h2>
                            <h1 class="text-center" style="text-shadow:unset; font-size:1.8em;"> <b> EXTERNOS </b> </h1>
                        </div>

                        <div class="container col-12 d-md-flex mt-4">
                            <div class="col-12 col-md-6 justify-content-center">
                                <h2 class="text-center" style="font-size:3em; font-weight:bold;"> @if ($femaleExternalCount <= 0) — @else{{$femaleExternalCount}}@endif </h2>
                                <h1 class="text-center" style="text-shadow:unset; font-size:1.0em;"> <b> FEMENINO </b> </h1>
                            </div>

                            <div class="col-12 col-md-6 justify-content-center">
                                <h2 class="text-center" style="font-size:3em; font-weight:bold;"> @if ($maleExternalCount <= 0) — @else{{$maleExternalCount}}@endif </h2>
                                <h1 class="text-center" style="text-shadow:unset; font-size:1.0em;"> <b> MASCULINO </b> </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="my-3 card dashboard-t text-center text-white">
            <div class="row my-5">
                <div class="col-md-4 col-sm-12 justify-content-center">
                    <h2 style="font-size:5em; font-weight:bold;"> @if ($eventCount <= 0) — @else{{$eventCount}}@endif </h2>
                    <h1 style="text-shadow:unset; font-size:2.0em;"> Cantidad eventos </h1>
                </div>

                <div class="col-md-4 col-sm-12 justify-content-center">
                    <h2 style="font-size:5em; font-weight:bold;">@if ($expositorCount <= 0) — @else{{$expositorCount}}@endif   </h2>
                    <h1 style="text-shadow:unset; font-size:2.0em;"> Cantidad expositores </h1>
                </div>

                <div class="col-md-4 col-sm-12 justify-content-center">
                    <h2 style="font-size:5em; font-weight:bold;"> @if ($companyCount <= 0) — @else{{$companyCount}}@endif </h2>
                    <h1 style="text-shadow:unset; font-size:1.8em;"> Cantidad empresas </h1>
                </div>
            </div>

            <div class="row mt-3 mb-5 text-center text-white">
                <div id="legend-container" class="container-fluid col-12 mb-5"></div>
                <div class="col-sm-6 col-xs-12 m-auto">
                    <canvas id="pieChart"></canvas>
                </div>
            </div>

        </div>

        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button href="table-staff-accounts" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        <h2 style="font-weight: bold; text-align:center"> Cuentas de staff </h2>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="text-center text-white py-2 mb-4">

                            <div class="table-responsive col-11 mx-auto" id="table-staff-accounts">
                                <table class="table" style="text-align-last:center;">
                                    <thead>
                                        <tr>
                                            <th>Clave</th>
                                            <th>Contraseña</th>
                                            <th>Editar</th>
                                            <th>Borrar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($accounts as $account )
                                        <tr>
                                            <td>{{$account->key}}</td>
                                            <td>{{$account->password}}</td>
                                            <td>
                                                <a href="#" class="btn-table btn btn-primary col-12 m-auto"><i class="bi bi-pencil"></i></a>
                                            </td>
                                            <td>
                                                <form action="{{route('adminStaff.destroy', [$account->id])}}" method="POST" hidden>
                                                    @method('DELETE')
                                                    @csrf
                                                        <button id="formAdminDeleteBtn_{{$account->id}}" type="submit"> DESTROY </button>
                                                    </form>
            
                                                <a onclick="confirmDialog(`formAdminDeleteBtn_{{$account->id}}`)"  class="btn-table btn btn-primary col-12 m-auto"><i class="bi bi-trash"></i></a>
                                            </td>
                                        </tr>
            
                                        @endforeach
            
                                    </tbody>
                                </table>
            
                            </div>
            
                            <div class="col-12 my-2">
                                <form action="{{route('adminStaff.store')}}" method="POST">
                                    @csrf
                                    <button id="regEvent" type="submit" class="btn btn-primary">Generar cuenta</button>
                                </form>
                            </div>
                
                        </div>
                    </div>
                </div>

            </div>
            
        </div>

        


    </div>
</div>
    <script>

        function confirmDialog(triggerBtnId) {
            Swal.fire({
                title: '¿Confirmar cambios?',
                showDenyButton: false,
                showCancelButton: true,
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(triggerBtnId).click();
                }
            })
        }
        function chooseColor() {
            const colors = ["#59ffee", "#39f6e4", "#21decb",
                            "#f04f97", "#e23a87", "#c9206c",
                            "#befa7a", "#a7ee54", "#83c932",
                            "#ffcff1", "#f5b1e2", "#de83c4",
                            "#3d3d3d", "#202020",
                            "#c53aff", "#8476ff", "#0de4fe"];
            let len = colors.length;
            var randIndex = Math.round(Math.random()*(len-1));

            var choosedColor = colors[randIndex];

            return (choosedColor);
        }

        const getOrCreateLegendList = (chart, id) => {
            const legendContainer = document.getElementById(id);
            let listContainer = legendContainer.querySelector('div');

            if (!listContainer) {
                listContainer = document.createElement('div');
                listContainer.style.margin = 0;
                listContainer.style.padding = 0;
                listContainer.classList.add("row");

                legendContainer.appendChild(listContainer);
            }

            return listContainer;
        };

        const htmlLegendPlugin = {
            id: 'htmlLegend',
            afterUpdate(chart, args, options) {
                const ul = getOrCreateLegendList(chart, args.containerID);

                // Remove old legend items
                while (ul.firstChild) {
                    ul.firstChild.remove();
                }

                // Reuse the built-in legendItems generator
                const items = chart.options.legend.labels.generateLabels(chart);

                items.forEach(item => {
                    const li = document.createElement('div');
                    li.style.alignItems = 'center';
                    li.style.cursor = 'pointer';
                    li.classList.add("col-lg-2");
                    li.classList.add("col-sm-6");
                    li.classList.add("col-6");
                    li.style.textAlign = 'center';


                    li.onclick = () => {
                        const {type} = chart.config;
                        if (type === 'pie' || type === 'doughnut') {
                        // Pie and doughnut charts only have a single dataset and visibility is per item
                            chart.getDatasetMeta(0).data[item.index].hidden = !chart.getDatasetMeta(0).data[item.index].hidden
                        } else {
                        chart.setDatasetVisibility(item.datasetIndex, !chart.isDatasetVisible(item.datasetIndex));
                        }
                        chart.update();
                    };

                    // Color box
                    const boxSpan = document.createElement('span');
                    boxSpan.style.background = item.fillStyle;
                    boxSpan.style.borderColor = item.strokeStyle;
                    boxSpan.style.borderWidth = item.lineWidth + 'px';
                    boxSpan.style.display = 'inline-block';
                    boxSpan.style.height = '20px';
                    boxSpan.style.marginRight = '10px';
                    boxSpan.style.width = '20px';

                    // Text
                    const textContainer = document.createElement('a');
                    textContainer.style.color = item.fontColor;
                    textContainer.style.margin = 0;
                    textContainer.style.padding = 0;
                    textContainer.style.width = 'fit-content';
                    textContainer.style.textDecoration = item.hidden ? 'line-through' : '';

                    const text = document.createTextNode(item.text);
                    textContainer.appendChild(text);

                    li.appendChild(boxSpan);
                    li.appendChild(textContainer);
                    ul.appendChild(li);
                });
            }
        };

        var array = [];

        for(let i = 0; i < {{count($eventsTotalCount)}}; i++){
            array.push(chooseColor());
        }
        console.log(array);

        var data = {
            labels: {!!json_encode($eventsName)!!},
            datasets: [{
                data: {!!json_encode($eventsTotalCount)!!},
                backgroundColor: array,
                hoverBackgroundColor: array,
                borderWidth: 0,
            }]
        };

        var ctxP = document.getElementById("pieChart").getContext('2d');
        var myPieChart = new Chart(ctxP, {
            type: 'pie',
            data: data,
            options: {
                legend: {
                    display: false,
                },

                plugins: {
                    htmlLegend: {
                        // ID of the container to put the legend in
                        containerID: 'legend-container',
                    },
                }
            },

            plugins: [htmlLegendPlugin],
        });

    </script>

 @endsection
