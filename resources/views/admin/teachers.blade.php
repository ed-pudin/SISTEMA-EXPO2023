@extends('admin.struct')

@section('Content')
@if(session()->has('status'))
        
        <script type="text/javascript">
            @if(session()->get('status') == "Maestro registrado")
            document.addEventListener("DOMContentLoaded", function(){
                Swal.fire({
                position: 'center',
                icon: 'success',
                iconColor: '#30a702',
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

<link rel="stylesheet" href="{{ asset('css/admin.css') }}">


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

</script>

<!-- --------------- -->
<!-- ADMIN MAESTROS  -->
<div class="col p-3 min-vh-100 w-50 backgroundImg tab-pane">
    <div class="container-fluid">
        <div class="row">
            <ul class="nav nav-tabs" id="tabAdminTeacher" role="admin-teacher">
                <li class="nav-item" role="admin-teacher">
                    <button class="nav-link active" id="visualize-teacher-tab" data-bs-toggle="tab" data-bs-target="#visualize-teacher" type="button" role="tab" aria-controls="visualize-teacher" aria-selected="true">Ver</button>
                </li>
                <li class="nav-item" role="admin-teacher">
                    <button class="nav-link" id="register-teacher-tab" data-bs-toggle="tab" data-bs-target="#register-teacher" type="button" role="tab" aria-controls="register-teacher" aria-selected="false">Registrar</button>
                </li>
            </ul>
        </div>
        <div class="row" >
            <div class="tab-content p-0">
                <div class="tab-pane fade show active" id="visualize-teacher" role="tabpanel" aria-labelledby="visualize-teacher-tab">
                    <div class="table-responsive">
                        <table class="table" style="text-align-last:center;">
                            <thead>
                                <tr>
                                    <th class="w-priority">Nombre</th>
                                    <th class="w-priority">Correo</th>
                                    <th class="w-priority">Usuario</th>
                                    <th class="w-priority">Contraseña</th>
                                    <th>Editar</th>
                                    <th>Borrar</th>
                                    <th>Enviar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teachers as $teacher)                                
                                    <tr>
                                        <td>{{$teacher->fullName}}</td>
                                        <td>{{$teacher->email}}</td>
                                        <td>{{$teacher->user()->first()->key}}</td>
                                        <td>{{$teacher->user()->first()->password}}</td>
                                        <td>
                                            <a href="{{ route('editarMaestro', $teacher->id) }}" class="btn-table btn btn-primary col-12 m-auto"><i class="bi bi-pencil"></i></a>
                                        </td>
                                        <td>
                                            <form action="{{route('adminRegistroMaestros.destroy', [$teacher->id])}}" method="POST" hidden>
                                            @method('DELETE')
                                            @csrf
                                                <button id="deleteTeacher_{{$teacher->id}}" type="submit"> DESTROY </button>
                                            </form>

                                            <a onclick="confirmDialog(`deleteTeacher_{{$teacher->id}}`)" class="btn-table btn btn-primary col-12 m-auto"><i class="bi bi-trash"></i></a>
                                        </td>
                                        <td>
                                            <a class="btn-table btn btn-primary col-12 m-auto" name="sendMailBtn"><i class="bi bi-send">
                                            </i></a>
                                            @if(isset($_POST['sendMailBtn']))
                                                <script src="https://smtpjs.com/v3/smtp.js">
                                                    function sendMsg(e){
                                                        Email.send({
                                                            Host : "smtp.elasticemail.com",
                                                            Username : "{{$teacher->fullName}}",
                                                            Password : "{{$teacher->user()->first()->password}}",
                                                            To : "{{$teacher->email}}",
                                                            From : "EXPO@isp.com",
                                                            Subject : "This is the subject",
                                                            Body : "And this is the body"
                                                        }).then(
                                                        message => alert(message)
                                                        );
                                                    }
                                                </script>
                                                
                                            @endif
                                        </td>
                                    </tr>

                                @endforeach
                                
                            </tbody>
                        </table>
                        @if(count($teachers) == 0)
                            <h6 style="text-align: center;"> No hay maestros registrados </h6>
                        @endif
                    </div>
                </div>
                
                <div class="tab-pane fade show" id="register-teacher" aria-labelledby="register-teacher-tab">

                    <form class="row align-items-center p-5" id="registroMaestro" action="{{route('adminRegistroMaestros.store')}}" method="post">
                    @csrf
                        <h1 style="text-align: center;"> Registrando Maestro </h1>

                        <div class="col-md-3"></div>
                            <div class=" col-md-6 col-sm-12 my-5">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="regTeacherName"  id="regTeacherName" placeholder="Nombre del Maestro" required>
                                    <label for="regTeacherName">Nombre del Maestro</label>
                                </div>
                            </div>
                        <div class="col-md-3"></div>

                        <div class="col-md-3"></div>

                        <div class=" col-md-6 col-sm-12 mt-3">
                            <div class="form-floating">
                                <input type="email" class="form-control" name="regTeacherCorreo" id="regTeacherCorreo" placeholder="Correo del Maestro" required>
                                <label for="regTeacherCorreo">Correo del Maestro</label>
                            </div>
                        </div>

                        <div class="col-md-3"></div>

                        <div class="col-12 my-5" style="text-align:center;">
                            <button id="regTeacher" type="submit" class="col-md-4 col-sm-12 btn btn-primary">REGISTRAR</button>
                        </div>
                    </form>

                </div>
               
            </div>
        </div>
    </div>
</div>
<!-- ADMIN MAESTROS  -->
<!-- --------------- -->


@endsection
