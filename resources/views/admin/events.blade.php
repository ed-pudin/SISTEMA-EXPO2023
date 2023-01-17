@extends('admin.struct')

@section('Content')

@if(session()->has('status'))
        
        <script type="text/javascript">
            @if(session()->get('status') == "Evento registrado")
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

            @if(session()->get('status') == "Hubo un problema en el registro")
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
    @endif

<script>

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#regEventImg').attr('src', e.target.result).width(300).height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

</script>

<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

<!-- ------------- -->
<!-- ADMIN EVENTOS -->
<div class="col p-3 min-vh-100 w-50 backgroundImg tab-pane show active">
    <div class="container-fluid">
        <div class="row">
            <ul class="nav nav-tabs" id="tabAdminEvent" role="admin-event">
                <li class="nav-item" role="admin-event">
                    <button class="nav-link active" id="visualize-event-tab" data-bs-toggle="tab" data-bs-target="#visualize-event" type="button" role="tab" aria-controls="visualize-event" aria-selected="true">Ver</button>
                </li>
                <li class="nav-item" role="admin-event">
                    <button class="nav-link" id="register-event-tab" data-bs-toggle="tab" data-bs-target="#register-event" type="button" role="tab" aria-controls="register-event" aria-selected="false">Registrar</button>
                </li>
            </ul>
        </div>
        <div class="row" >
            <div class="tab-content">
                <div class="tab-pane fade show active" id="visualize-event" role="tabpanel" aria-labelledby="visualize-event-tab">
                    <div class="table-responsive">
                        <table class="table" style="text-align-last:center;">
                            <thead>
                                <tr>
                                    <th class="w-priority">Nombre</th>
                                    <th>Invitado</th>
                                    <th>Tipo</th>
                                    <th>Fecha</th>
                                    <th>Hora Inicio</th>
                                    <th>Hora Final</th>
                                    <th>Editar</th>
                                    <th>Borrar</th>
                                    <th>Info</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($events as $event)
                                <tr>
                                    <td>{{$event->eventName}}</td>
                                    <td>{{$event->guest()->first()->fullName}}</td>
                                    <td>{{$event->typeEvent}}</td>
                                    <td>{{substr($event->date, 0, 10)}}</td>
                                    <td>{{$event->startTime}}</td>
                                    <td>{{$event->endTime}}</td>
                                    <td>
                                        <a class="btn-table btn btn-primary col-12 m-auto"><i class="bi bi-pencil"></i></a>
                                    </td>
                                    <td>
                                        <a class="btn-table btn btn-primary col-12 m-auto"><i class="bi bi-trash"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{route('adminRegistroEventos.show', [$event->id])}}" class="btn-table btn btn-primary col-12 m-auto"><i class="bi bi-eye"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade show" id="register-event" aria-labelledby="register-event-tab">

                    <form class="row align-items-center py-5 px-lg-5 px-md-3 px-sm-0" id="registroEventos" method="POST" enctype="multipart/form-data" action="{{route('adminRegistroEventos.store')}}">
                        @csrf
                        <h1 style="text-align: center;"> Registrando un Evento </h1>
                        <div class="col-sm-12 my-2">
                            <div>
                                <div class="mb-4 d-flex justify-content-center">
                                    <img onclick="document.getElementById('regBtnEventImg').click();" name="regEventImg" id="regEventImg" src="https://placehold.co/300x200?text=Imagen+del+evento" alt="example placeholder"/>
                                    <!--<img onclick="document.getElementById('regBtnEventImg').click();" id="regEventImg" src="https://picsum.photos/300/200" alt="example placeholder"/>-->
                                </div>
                                <div class="d-flex justify-content-center">
                                    <div class="btn btn-primary btn-rounded" onclick="document.getElementById('regBtnEventImg').click();">
                                        <label class="form-label text-white m-1" for="regBtnEventImg"><i class="bi bi-image-fill"></i></label>
                                        <input accept="image/*" type="file" class="form-control d-none" name="regBtnEventImg" id="regBtnEventImg" onchange="readURL(this)" required/>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-8 my-2">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="regEventName" id="regEventName" placeholder="Nombre del Evento" required>
                                <label for="regEventName">Nombre del evento</label>
                            </div>
                        </div>

                        <div class="col-sm-4 my-2">
                            <label for="regEventDate">Fecha</label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="bi bi-calendar-day-fill"></i></div>
                                <input type="date" class="form-control" id="regEventDate" name="regEventDate" >
                            </div>
                        </div>

                        <div class="col-sm-6 my-2">
                            <label for="regEventStartHour">Hora Inicio</label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="bi bi-alarm-fill"></i></div>
                                <input required type="time" class="form-control" name="regEventStartHour" id="regEventStartHour" onchange="document.getElementById('aa').value = this.value">
                                <input type="text" id="aa" hidden>
                            </div>
                        </div>

                        <div class="col-sm-6 my-2">
                            <label for="regEventEndHour">Hora Final</label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="bi bi-alarm-fill"></i></div>
                                <input required type="time" class="form-control" name="regEventEndHour" id="regEventEndHour" onchange="document.getElementById('bb').value = this.value">
                                <input type="text" id="bb" hidden>
                            </div>
                        </div>

                        <div class="col-sm-7 my-2">
                            <div class="form-floating">
                                <select class="form-select" id="regEventGuest" name="regEventGuest">
                                    @foreach ($guests as $guest) 
                                        <option value="{{$guest->id}}">{{$guest->fullName}}</option>
                                    @endforeach
                                </select>
                                <label for="regEventGuest">Invitado</label>
                            </div>
                        </div>

                        <div class="col-sm-5 my-2">
                            <div class="form-floating">
                                <select class="form-select" name="regEventType" id="regEventType">
                                    <option value="Conferencia">Conferencia</option>
                                    <option value="Mesa Redonda">Mesa Redonda</option>
                                    <option value="Master Class">Master Class</option>                                 
                                    <option value="Torneo">Torneo</option>
                                    <option value="Otro">Otro</option>
                                </select>
                                <label for="regEventType">Tipo</label>
                            </div>
                        </div>

                        <div class="col-12 my-2" style="text-align:center;">
                            <button id="regEvent" type="submit" class="col-md-4 col-sm-12 btn btn-primary">REGISTRAR</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
<!-- ADMIN EVENTOS -->
<!-- ------------- -->


@endsection
