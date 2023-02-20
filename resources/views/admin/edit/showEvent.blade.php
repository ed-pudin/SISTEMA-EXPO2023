@extends('admin.struct')

@section('Content')

<div class="col p-3 min-vh-100 w-50 backgroundImg tab-pane show active">

    <div class="col-sm p-3 test">
        <div class="container-fluid" >
            <div class="row">
                <div class="card dashboard-t my-3 p-md-5 p-0">
                    <div class="row">

                        <div class="col-lg-6 m-auto text-center">
                            <img class="img-fluid rounded " src="{{ asset('storage/eventImages/'.$event->image) }}">
                        </div>

                        <div class="col-lg-6 m-auto">
                            <h5 class="text-center co-12" style="font-size: 2rem; margin-bottom:20px; margin-top:20px; color:white">{{$event->eventName}}</h5>
                            <hr class="colorfull">
                            <div class="row">
                                <div class="col-xl-4 col-md-5 col-12 mx-auto mb-md-0 mb-5 mt-2">
                                    <label for="viewEventType">Tipo de Evento</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="bi bi-calendar2-heart-fill" style="color:#e23a87"></i></div>
                                        <input disabled autocomplete="off" value="{{$event->typeEvent}}" type="text" class="form-control" name="viewEventType" id="viewEventType" placeholder="Nombre del Evento" required>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-5 col-12 mx-auto mb-md-0 mb-1 mt-2">

                                    <label for="viewEventDate">Cantidad total</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="bi bi-people-fill" style="color:#e23a87"></i></div>
                                        <input disabled value="{{$count}}" required type="text" class="form-control" >
                                    </div>

                                </div>

                                <div class="col-xl-10 col-md-11 col-12 mx-auto my-5">
                                    <label for="viewEventDate">Fecha</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="bi bi-calendar-day-fill" style="color:#e23a87"></i></div>
                                        <input disabled value="{{$event->date}}" type="date" class="form-control" id="viewEventDate" name="viewEventDate">
                                    </div>
                                </div>

                                <div class="col-xl-4 col-md-5 col-12 my-2 mx-auto">
                                    <label for="viewEventStartHour">Hora Inicio</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="bi bi-alarm-fill" style="color:#e23a87"></i></div>
                                        <input disabled value="{{$event->startTime}}" required type="time" class="form-control" name="viewEventStartHour" id="viewEventStartHour">
                                    </div>
                                </div>

                                <div class="col-xl-4 col-md-5 col-12 my-2 mx-auto">
                                    <label for="viewEventEndHour">Hora Final</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="bi bi-alarm-fill" style="color:#e23a87"></i></div>
                                        <input disabled value="{{$event->endTime}}" required type="time" class="form-control" name="viewEventEndHour" id="viewEventEndHour">
                                    </div>
                                </div>

                                @foreach ($guests as $guest)
                                    <div class="col-xl-10 col-md-11 col-12 mx-auto mt-2">
                                        <label for="viewEventGuest">Invitado</label>
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="bi bi-person-fill" style="color:#e23a87"></i></div>
                                            <input disabled autocomplete="off" value="{{$guest->guest()->first()->fullName}}" type="text" class="form-control" name="viewEventGuest" id="viewEventGuest" placeholder="Nombre del Invitado" required>
                                        </div>
                                    </div>
                                @endforeach



                            </div>


                        </div>

                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-10 mx-auto" style="text-align-last: end">
                            <button onclick="Export()" class="btn btn-secondary mx-auto">Exportar EXCEL</button>
                        </div>
                    </div>

                    <hr class="colorfull col-11 mx-auto">

                    <div class="row">

                        <div class="col-10 mx-auto my-5">
                            <div class="table-responsive">
                                <table class="table" style="text-align-last:center;">
                                    <h2 style="text-align: center"> Alumnos en este evento </h2>
                                    <thead>
                                        <tr>
                                            <th>Matrícula</th>
                                            <th class="w-priority">Nombre</th>
                                            <th>Asistencia</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($eventStudents as $eventStudent)
                                        <tr>
                                            <td>{{$eventStudent->thisStudent()->first()->enrollment}}</td>
                                            <td>{{$eventStudent->thisStudent()->first()->getFullName()}}</td>
                                            <td>
                                                <input onclick="return false;" class="form-check-input" type="checkbox" id="attendance" name="attendance" @if($eventStudent->attended == 1) checked @endif>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <hr class="colorfull col-11 mx-auto">

                        <div class="col-10 mx-auto my-5">
                            <div class="table-responsive">
                                <table class="table" style="text-align-last:center;">
                                    <h2 style="text-align: center"> Externos en este evento </h2>
                                    <thead>
                                        <tr>
                                            <th class="w-priority">Nombre</th>
                                            <th>Género</th>
                                            <th>Asistencia</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($eventExternals as $eventExternal)
                                        <tr>
                                            <td>{{$eventExternal->externalPeople()->first()->getFullName()}}</td>
                                            <td>
                                                @if($eventExternal->externalPeople()->first()->genre == "female")
                                                Femenino
                                                @elseif ($eventExternal->externalPeople()->first()->genre == "male")
                                                Masculino
                                                @else
                                                No binario
                                                @endif
                                            </td>
                                            <td>
                                                <input onclick="return false;" class="form-check-input" type="checkbox" id="attendance" name="attendance" @if($eventExternal->attended == 1) checked @endif>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <hr class="colorfull col-11 mx-auto">
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.1/xlsx.full.min.js"></script> 


<script>
    function Export()
    {
        var filename='Asistencia Evento {{$event->eventName}}.xlsx';

        var dataStudents = {!! json_encode($Students) !!};
        var dataExternals = {!! json_encode($Externals) !!};

        /*dataStudents.forEach(element => {
            element.splice(2, element.length);
        }); 

        dataExternals.forEach(element => {
            element.splice(2, element.length);
        }); */

        var ws = XLSX.utils.json_to_sheet(dataStudents);
        var wb = XLSX.utils.book_new();
        var ws_2 = XLSX.utils.json_to_sheet(dataExternals);
        XLSX.utils.book_append_sheet(wb, ws, "Estudiantes");
        XLSX.utils.book_append_sheet(wb, ws_2, "Externos");
        XLSX.writeFile(wb,filename);
    }

</script>

@endsection
