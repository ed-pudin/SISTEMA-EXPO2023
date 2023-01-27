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
                                    <label for="viewEventGuest">Invitado</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="bi bi-person-fill" style="color:#e23a87"></i></div>
                                        <input disabled autocomplete="off" value="{{$event->guest()->first()->fullName}}" type="text" class="form-control" name="viewEventGuest" id="viewEventGuest" placeholder="Nombre del Evento" required>
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

                                <div class="col-xl-10 col-md-11 col-12 mx-auto my-5">
                                    <label for="viewEventDate">Cantidad total</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="bi bi-people-fill" style="color:#e23a87"></i></div>
                                        <input disabled value="{{$count}}" required type="text" class="form-control" >
                                    </div>
                                </div>

                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
