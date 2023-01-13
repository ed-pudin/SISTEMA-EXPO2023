@extends('admin.struct')

@section('Content')
<script>



    function generatePassword() {
        var chars = "0123456789abcdefghijklmnopqrstuvwxyz!@#$%_-&*()ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        var passwordLength = 12;
        var password = "";

        for (var i = 0; i <= passwordLength; i++) {
            var randomNumber = Math.floor(Math.random() * chars.length);
            password += chars.substring(randomNumber, randomNumber +1);
        }

    }

</script>

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

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
                                <tr>
                                    <td>Maestro 0</td>
                                    <td>Correo</td>
                                    <td>Usuario 0</td>
                                    <td>Password_0</td>
                                    <td>
                                        <a class="btn-table btn btn-primary col-12 m-auto"><i class="bi bi-pencil"></i></a>
                                    </td>
                                    <td>
                                        <a class="btn-table btn btn-primary col-12 m-auto"><i class="bi bi-trash"></i></a>
                                    </td>
                                    <td>
                                        <a class="btn-table btn btn-primary col-12 m-auto"><i class="bi bi-send"></i></a>
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade show" id="register-teacher" aria-labelledby="register-teacher-tab">

                    <form class="row align-items-center p-5" id="registroMaestro" action="{{route('adminRegistroEmpresas.store')}}" method="post">
                    @csrf
                        <h1 style="text-align: center;"> Registrando Maestro </h1>

                        <div class="col-md-3"></div>
                            <div class=" col-md-6 col-sm-12 my-5">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="regTeacherName" placeholder="Nombre del Maestro" required>
                                    <label for="regTeacherName">Nombre del Maestro</label>
                                </div>
                            </div>
                        <div class="col-md-3"></div>

                        <div class="col-md-3"></div>

                        <div class=" col-md-6 col-sm-12 mt-3">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="regTeacherCorreo" placeholder="Correo del Maestro" required onkeypress=generatePassword();>
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
