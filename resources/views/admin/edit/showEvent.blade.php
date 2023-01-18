@extends('admin.struct')

@section('Content')

<div class="col p-3 min-vh-100 w-50 backgroundImg tab-pane show active">

    <div class="col-sm p-3 test">
        <div class="container-fluid" >
            <div class="row">
                <div class="card dashboard-t my-3 p-5">
                    <div class="row">
                        <div class="d-lg-flex justify-content-center">
                            
                            <div class="col-lg-4">
                                <img class="img-fluid rounded " src="{{ asset('storage/eventImages/'.$event->image) }}" width="450" height="300">
                            </div>
                            
                            <div class="col-lg-4">
                                <h5 class="text-center co-12" style="font-size: 2rem; margin-bottom:20px; margin-top:20px; color:white">{{$event->eventName}}</h5>
                                <hr class="colorfull">
                                <h5 class="text-center text-white col-12" style="text-shadow:unset" >Tipo de evento: {{$event->typeEvent}}</h5>
                                <h5 class="text-center text-white col-12" style="text-shadow:unset" >Invitado: {{$event->guest()->first()->fullName}}</h5>
                                <h5 class="text-center text-white col-12" style="text-shadow:unset" >Tipo de evento: {{$event->typeEvent}}</h5>
                                <h5 class="text-center text-white col-12" style="text-shadow:unset" >Fecha: {{$event->date}}</h5>
                                <h5 class="text-center text-white col-12" style="text-shadow:unset" >Hora inicio: {{$event->startTime}}</h5>
                                <h5 class="text-center text-white col-12" style="text-shadow:unset" >Hora fin: {{$event->endTime}}</h5>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection