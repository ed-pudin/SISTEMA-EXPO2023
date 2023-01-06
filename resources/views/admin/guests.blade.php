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

</script>

<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

<!-- --------------- -->
<!-- ADMIN INVITADOS -->
<div class="col-sm p-3 min-vh-100 backgroundImg tab-pane">
    <div class="container-fluid">
        <div class="row">
            <ul class="nav nav-tabs" id="tabAdminGuests" role="admin-guests">
                <li class="nav-item" role="admin-guests">
                    <button class="nav-link active" id="visualize-guests-tab" data-bs-toggle="tab" data-bs-target="#visualize-guests" type="button" role="tab" aria-controls="visualize-guests" aria-selected="true">Ver</button>
                </li>
                <li class="nav-item" role="admin-guests">
                    <button class="nav-link" id="register-guests-tab" data-bs-toggle="tab" data-bs-target="#register-guests" type="button" role="tab" aria-controls="register-guests" aria-selected="false">Registrar</button>
                </li>
            </ul>
        </div>
        <div class="row" >
            <div class="tab-content p-0">
                <div class="tab-pane fade show active" id="visualize-guests" role="tabpanel" aria-labelledby="visualize-guests-tab">
                    <div class="table-responsive">
                        <table class="table" style="text-align-last:center;">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Empresa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Invitado 0</td>
                                    <td>Empresa 0</td>
                                </tr>

                                <tr>
                                    <td>Invitado 1</td>
                                    <td>Empresa 1</td>
                                </tr>

                                <tr>
                                    <td>Invitado 2</td>
                                    <td>Empresa 3</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade show" id="register-guests" aria-labelledby="register-guests-tab">

                    <form class="row align-items-center p-5">
                        <h1 style="text-align: center;"> Registrando un Invitado </h1>

                        <div class="col-md-3"></div>
                        <div class=" col-md-6 col-sm-12 my-5">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="regGuestName" placeholder="Nombre del Evento">
                                <label for="regGuestName">Nombre del Invitado</label>
                            </div>
                        </div>
                        <div class="col-md-3"></div>

                        <div class="col-md-3"></div>
                        <div class="col-md-6 col-sm-12 my-5">
                            <div class="form-floating">
                                <select class="form-select" id="regGuestEntreprise">
                                    <option value="1">Ninguna</option>
                                    <option value="2">Empresa 1</option>
                                    <option value="3">Empresa 2</option>
                                </select>
                                <label for="regGuestEntreprise">Empresa</label>
                            </div>
                        </div>
                        <div class="col-md-3"></div>

                        <div class="col-12 my-5" style="text-align:center;">
                            <button id="regGuest" type="submit" class="col-md-4 col-sm-12 btn btn-primary">REGISTRAR</button>
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
