@extends('admin.struct')

@section('Content')

@if(session()->has('update'))

    <script type="text/javascript">
        @if(session()->get('update') == "Edición en evento exitosa")
        document.addEventListener("DOMContentLoaded", function(){
            Swal.fire({
                position: 'center',
                icon: 'success',
                iconColor: '#0de4fe',
                title: `{{ session()->get('update') }}`,
                showConfirmButton: false,
                timer: 1500
            })

        });
        @endif

        @if(session()->get('update') == "Hubo un error, intente de nuevo")
        document.addEventListener("DOMContentLoaded", function(){
            Swal.fire({
                position: 'center',
                icon: 'error',
                iconColor:'#a70202',
                title: `{{ session()->get('update') }}`,
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

    @if(session()->get('status') == "Hubo un error, intente de nuevo")
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

    @if(session()->get('delete') == "Hubo un error, intente de nuevo" || session()->get('delete') == "El evento ya esta siendo asistido y no se puede eliminar")
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

                    <div class="row mt-3">
                        <div class="col-10 mx-auto" style="text-align-last: end">
                            <button onclick="Export()" class="btn btn-secondary mx-auto">Exportar EXCEL</button>
                        </div>
                    </div>


                    <div class="table-responsive">
                        <table class="table" style="text-align-last:center;">
                            <thead>
                                <tr>
                                    <th class="w-priority">Nombre</th>
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
                                    <td>{{$event->typeEvent}}</td>
                                    <td>{{$event->date}}</td>
                                    <td>{{$event->startTime}}</td>
                                    <td>{{$event->endTime}}</td>
                                    <td>
                                        <a href="{{route('editarEvento', [$event->id])}}" class="btn-table btn btn-primary col-12 m-auto"><i class="bi bi-pencil"></i></a>
                                    </td>
                                    <td>
                                        <form action="{{route('adminRegistroEventos.destroy', [$event->id])}}" method="POST" hidden>
                                        @method('DELETE')
                                        @csrf
                                            <button id="deleteEvent_{{$event->id}}" type="submit"> DESTROY </button>
                                        </form>

                                        <a onclick="confirmDialog(`deleteEvent_{{$event->id}}`)" class="btn-table btn btn-primary col-12 m-auto"><i class="bi bi-trash"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{route('adminRegistroEventos.show', [$event->id])}}" class="btn-table btn btn-primary col-12 m-auto"><i class="bi bi-eye"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if(count($events) == 0)
                            <h6 style="text-align: center;"> No hay eventos registrados </h6>
                        @endif
                    </div>
                </div>

                <div class="tab-pane fade show" id="register-event" aria-labelledby="register-event-tab">

                    <form class="row py-5 px-lg-5 px-md-3 px-sm-0" id="registroEventos" method="POST" enctype="multipart/form-data" action="{{route('adminRegistroEventos.store')}}">
                        @csrf
                        <h1 style="text-align: center;"> Registrando un Evento </h1>
                        <div class="col-sm-12 my-2">
                            <div>
                                <div class="mb-4 d-flex justify-content-center">
                                    <img onclick="document.getElementById('regBtnEventImg').click();" name="regEventImg" id="regEventImg" src="https://placehold.co/300x200?text=Imagen+del+evento&font=roboto" alt="example placeholder" style="object-fit: contain"/>
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
                                <select class="form-select" id="regEventGuest" name="regEventGuest[]" multiple="multiple" size="5" style="overflow-y: auto">
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.1/xlsx.full.min.js"></script>

<script>
    $("#regEventGuest").mousedown(function(e) {
        selections = $(this).val();

      }).click(function() {

        if (selections == null) {
          var selected = -1;
          selections = [];
        } else
          var selected = selections.indexOf($.isArray($(this).val()) ? $(this).val()[$(this).val().length - 1] : $(this).val());

        if (selected >= 0)
          selections.splice(selected, 1);
        else
          selections.push($(this).val()[0]);

        $('#regEventGuest option').each(function() {
          $(this).prop('selected', selections.indexOf($(this).val()) >= 0);
        });
      });

      function Export()
        {
            @if(count($events) > 0)
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
            @endif
        }

  </script>
@endsection
