@extends('admin.struct')

@section('Content')
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

    function generatePassword() {
        var chars = "0123456789abcdefghijklmnopqrstuvwxyz!@#$%_-&*()ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        var passwordLength = 12;
        var password = "";

        for (var i = 0; i <= passwordLength; i++) {
            var randomNumber = Math.floor(Math.random() * chars.length);
            password += chars.substring(randomNumber, randomNumber +1);
        }

        document.getElementById("regTeacherPassword").value = password;

    }

</script>

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

<!-- --------------- -->
<!-- ADMIN INVITADOS -->
<div class="col-sm p-3 min-vh-100 backgroundImg tab-pane">
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
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Usuario</th>
                                    <th scope="col">Contraseña</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Maestro 0</td>
                                    <td>Usuario 0</td>
                                    <td>Password_0</td>
                                </tr>

                                <tr>
                                    <td>Maestro 1</td>
                                    <td>Usuario 1</td>
                                    <td>Password_1</td>
                                </tr>

                                <tr>
                                    <td>Maestro 2</td>
                                    <td>Usuario 2</td>
                                    <td>Password_2</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade show" id="register-teacher" aria-labelledby="register-teacher-tab">

                    <form class="row align-items-center p-5">
                        <h1 style="text-align: center;"> Registrando Maestro </h1>

                        <div class="col-md-3"></div>
                        <div class=" col-md-6 col-sm-12 my-5">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="regTeacherName" placeholder="Nombre del Maestro">
                                <label for="regTeacherName">Nombre del Maestro</label>
                            </div>
                        </div>
                        <div class="col-md-3"></div>

                        <h4 class="mb-2" style="text-align: center;"> Generar Usuario </h4>

                        <div class="col-md-3"></div>
                        <div class=" col-md-6 col-sm-12 mb-2">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="regTeacherUsername" placeholder="Usuario">
                                <label for="regTeacherUsername">Usuario</label>
                            </div>
                        </div>
                        <div class="col-md-3"></div>

                        <div class="col-md-3"></div>
                        <div class=" col-md-4 col-sm-12 mb-2">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="regTeacherPassword" placeholder="Contraseña">
                                <label for="regTeacherPassword">Contraseña</label>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12 mb-2 align-items-center">
                            <button id="autoPassword" class="btn btn-primary" onclick="generatePassword()">Generar Contraseña</button>
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
<!-- ADMIN INVITADOS -->
<!-- --------------- -->


@endsection
