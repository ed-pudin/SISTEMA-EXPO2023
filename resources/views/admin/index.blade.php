@extends('admin.struct')

@section('Content')

<script
    src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
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

        <div class="mt-3 card dashboard-t text-center text-white">
            <div class="row my-5">
                <div class="col-md-4 col-sm-12 justify-content-center">
                    <h2 style="font-size:7em; font-weight:bold;"> 12 </h2>
                    <h1 style="text-shadow:unset; font-size:2.0em;"> Cantidad eventos </h1> 
                </div>

                <div class="col-md-4 col-sm-12 justify-content-center">
                    <h2 style="font-size:7em; font-weight:bold;"> 48 </h2>      
                    <h1 style="text-shadow:unset; font-size:2.0em;"> Cantidad expositores </h1>       
                </div>

                <div class="col-md-4 col-sm-12 justify-content-center">
                    <h2 style="font-size:7em; font-weight:bold;"> 48 </h2>
                    <h1 style="text-shadow:unset; font-size:1.8em;"> Cantidad empresas </h1> 
                </div>
            </div>

            <div class="mt-3 mb-5 text-center text-white">
                <div id="legend-container"></div>
                <div class="col-sm-6 col-xs-12 mx-auto">
                <canvas id="pieChart"></canvas>
            </div>

        </div>


    </div>
</div>

    <script>

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
            let listContainer = legendContainer.querySelector('ul');

            if (!listContainer) {
                listContainer = document.createElement('ul');
                listContainer.style.display = 'flex';
                listContainer.style.flexDirection = 'row';
                listContainer.style.margin = 0;
                listContainer.style.padding = 0;

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
                    const li = document.createElement('li');
                    li.style.alignItems = 'center';
                    li.style.cursor = 'pointer';
                    li.style.display = 'flex';
                    li.style.flexDirection = 'row';
                    li.style.marginLeft = '10px';

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
                    const textContainer = document.createElement('p');
                    textContainer.style.color = item.fontColor;
                    textContainer.style.margin = 0;
                    textContainer.style.padding = 0;
                    textContainer.style.textDecoration = item.hidden ? 'line-through' : '';

                    const text = document.createTextNode(item.text);
                    textContainer.appendChild(text);

                    li.appendChild(boxSpan);
                    li.appendChild(textContainer);
                    ul.appendChild(li);
                });
            }
        };

        var data = {
            labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
            datasets: [{
                data: [300, 50, 100, 40, 120],
                backgroundColor: [chooseColor(), chooseColor(), chooseColor(), chooseColor(), chooseColor()],
                hoverBackgroundColor: [chooseColor(), chooseColor(), chooseColor(), chooseColor(), chooseColor()],
                borderWidth: 0,
            }]
        };

        var ctxP = document.getElementById("pieChart").getContext('2d');
        var myPieChart = new Chart(ctxP, {
            type: 'pie',
            data: data,
            options: {
                plugins: {
                    htmlLegend: {
                        // ID of the container to put the legend in
                        containerID: 'legend-container',
                    },
                    legend: {
                        labels: {
                            display: false
                        }
                    }
                }
            },

            plugins: [htmlLegendPlugin],
        });

    </script>

 @endsection