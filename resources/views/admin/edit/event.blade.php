@extends('admin.struct')

@section('Content')

@if(session()->has('status'))
        
        <script type="text/javascript">
            @if(session()->get('status') == "Edición en evento exitosa")
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

            @if(session()->get('status') == "Hubo un problema en la edición")
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
                $('#editEventImg').attr('src', e.target.result).width(300).height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

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

</script>

<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

<!-- ------------- -->
<!-- ADMIN EVENTOS -->
<div class="col p-3 min-vh-100 w-50 backgroundImg tab-pane show active">
    <div class="container-fluid">
        <div class="row" >
            
            <form class="row align-items-center py-5 px-lg-5 px-md-3 px-sm-0" id="editarEvento" method="POST" enctype="multipart/form-data" action="{{route('adminRegistroEventos.update',[$event->id])}}">
                @method('PUT')    
                @csrf
                <h1 style="text-align: center;"> Editando un Evento </h1>
                <div class="col-sm-12 my-2">
                    <div>
                        <div class="mb-4 d-flex justify-content-center">
                            <img src="{{ asset('storage/eventImages/'.$event->image) }}" width="300" height="200" onclick="document.getElementById('editBtnEventImg').click();" name="editEventImg" id="editEventImg" src="https://placehold.co/300x200?text=Imagen+del+evento" alt="example placeholder"/>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="btn btn-primary btn-rounded" onclick="document.getElementById('editBtnEventImg').click();">
                                <label class="form-label text-white m-1" for="editBtnEventImg"><i class="bi bi-image-fill"></i></label>
                                <input accept="image/*" type="file" class="form-control d-none" name="editBtnEventImg" id="editBtnEventImg" onchange="readURL(this)"/>
                                <input name="originalImage" id="originalImage" type="text" value="{{$event->image}}" hidden></input>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-sm-8 my-2">
                    <div class="form-floating">
                        <input autocomplete="off" value="{{$event->eventName}}" type="text" class="form-control" name="editEventName" id="editEventName" placeholder="Nombre del Evento" required>
                        <label for="editEventName">Nombre del evento</label>
                    </div>
                </div>

                <div class="col-sm-4 my-2">
                    <label for="editEventDate">Fecha</label>
                    <div class="input-group">
                        <div class="input-group-text"><i class="bi bi-calendar-day-fill"></i></div>
                        <input value="{{$event->date}}" type="date" class="form-control" id="editEventDate" name="editEventDate" >
                    </div>
                </div>

                <div class="col-sm-6 my-2">
                    <label for="editEventStartHour">Hora Inicio</label>
                    <div class="input-group">
                        <div class="input-group-text"><i class="bi bi-alarm-fill"></i></div>
                        <input value="{{$event->startTime}}" required type="time" class="form-control" name="editEventStartHour" id="editEventStartHour" onchange="document.getElementById('aa').value = this.value">
                        <input type="text" id="aa" hidden>
                    </div>
                </div>

                <div class="col-sm-6 my-2">
                    <label for="editEventEndHour">Hora Final</label>
                    <div class="input-group">
                        <div class="input-group-text"><i class="bi bi-alarm-fill"></i></div>
                        <input value="{{$event->endTime}}" required type="time" class="form-control" name="editEventEndHour" id="editEventEndHour" onchange="document.getElementById('bb').value = this.value">
                        <input type="text" id="bb" hidden>
                    </div>
                </div>

                <div class="col-sm-7 my-2">
                    <div class="form-floating">
                        <select class="form-select" id="editEventGuest" name="editEventGuest">
                            @foreach ($guests as $guest) 
                                <option value="{{$guest->id}}" @if($event->guest()->first()->fullName == $guest->fullName) selected @endif >{{$guest->fullName}}</option>
                            @endforeach
                        </select>
                        <label for="editEventGuest">Invitado</label>
                    </div>
                </div>

                <div class="col-sm-5 my-2">
                    <div class="form-floating">
                        <select class="form-select" name="editEventType" id="editEventType">
                            <option value="Conferencia" @if($event->typeEvent == "Conferencia") selected @endif >Conferencia</option>
                            <option value="Mesa Redonda" @if($event->typeEvent == "Mesa Redonda") selected @endif >Mesa Redonda</option>
                            <option value="Master Class" @if($event->typeEvent == "Master Class") selected @endif >Master Class</option>
                            <option value="Torneo" @if($event->typeEvent == "Torneo") selected @endif >Torneo</option>
                            <option value="Otro" @if($event->typeEvent == "Otro") selected @endif >Otro</option>
                        </select>
                        <label for="editEventType">Tipo</label>
                    </div>
                </div>

                <div class="col-12 my-2" style="text-align:center;">
                    <button id="editEvent" type="submit" class="col-md-4 col-sm-12 btn btn-primary">Confirmar Edición</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- ADMIN EVENTOS -->
<!-- ------------- -->


@endsection
