@extends('admin.struct')

@section('Content')
@if(session()->has('update'))
        
        <script type="text/javascript">
            @if(session()->get('update') == "Edición en maestro exitosa")
            document.addEventListener("DOMContentLoaded", function(){
                Swal.fire({
                position: 'center',
                icon: 'success',
                iconColor: '#30a702',
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
    @endif

<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

<!-- --------------- -->
<!-- ADMIN MAESTROS  -->
<div class="col p-3 min-vh-100 w-50 backgroundImg tab-pane">
    <div class="container-fluid">
        <div class="row">

            <form class="row align-items-center p-5" id="registroMaestro" action="{{route('adminRegistroMaestros.update',[$teacher->id])}}" method="post">
            @method('PUT')
            @csrf
                <h1 style="text-align: center;"> Editando Maestro </h1>

                <div class="col-md-3"></div>
                    <div class=" col-md-6 col-sm-12 my-5">
                        <div class="form-floating">
                            <input autocomplete="off" value="{{$teacher->fullName}}" type="text" class="form-control" name="editTeacherName"  id="editTeacherName" placeholder="Nombre del Maestro" required>
                            <label for="editTeacherName">Nombre del Maestro</label>
                        </div>
                    </div>
                <div class="col-md-3"></div>

                <div class="col-md-3"></div>

                <div class=" col-md-6 col-sm-12 mt-3 my-5">
                    <div class="form-floating">
                        <input autocomplete="off" value="{{$teacher->email}}" type="email" class="form-control" name="editTeacherEmail" id="editTeacherEmail" placeholder="Correo del Maestro" required>
                        <label for="editTeacherEmail">Correo del Maestro</label>
                    </div>
                </div>

                <div class="col-md-3"></div>

                <div class="col-md-3"></div>

                <div class=" col-md-6 col-sm-12 mt-3 my-5">
                    <div class="form-floating">
                        <input autocomplete="off" value="{{$user->key}}" class="form-control" name="editTeacherUser" id="editTeacherUser" placeholder="Usuario del Maestro" required>
                        <label for="editTeacherUser">Usuario Generado</label>
                    </div>
                </div>

                <div class="col-md-3"></div>

                <div class="col-md-3"></div>

                <div class=" col-md-6 col-sm-12 mt-3 my-5">
                    <div class="form-floating">
                        <input autocomplete="off" value="{{$user->password}}" class="form-control" name="editTeacherPassword" id="editTeacherPassword" placeholder="Correo del Maestro" required>
                        <label for="editTeacherPassword">Contraseña Generada</label>
                    </div>
                </div>

                <div class="col-md-3"></div>

                <div class="col-12 my-5" style="text-align:center;">
                    <button id="regTeacher" type="submit" class="col-md-4 col-sm-12 btn btn-primary">Confirmar Edición</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- ADMIN MAESTROS  -->
<!-- --------------- -->


@endsection
