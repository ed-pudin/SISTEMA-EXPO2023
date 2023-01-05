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

<!-- ------------- -->
<!-- ADMIN EVENTOS -->
<div class="col-sm p-3 min-vh-100 backgroundImg tab-pane show active">
    <div class="container-fluid" >
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
            <div class="tab-content p-0">
                <div class="tab-pane fade show active" id="visualize-event" role="tabpanel" aria-labelledby="visualize-event-tab">
                    <div class="table-responsive">
                        <table class="table table-light" style="text-align-last:center;">
                            <thead>
                                <tr>
                                    <th scope="col">Imagen</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Invitado</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Hora Inicio</th>
                                    <th scope="col">Hora Final</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row" ><i class="bi bi bi-0-square-fill fs-1"></i></th>
                                    <td>Evento 0</td>
                                    <td>Jhon Lenon</td>
                                    <td>Conferencia</td>
                                    <td>15/12/22</td>
                                    <td>13:00:00</td>
                                    <td>15:00:00</td>
                                </tr>
                                <tr>
                                <th scope="row" ><i class="bi bi bi-1-square-fill fs-1"></i></th>
                                    <td>Evento 1</td>
                                    <td>Jhon Lenon</td>
                                    <td>Conferencia</td>
                                    <td>15/12/22</td>
                                    <td>13:00:00</td>
                                    <td>15:00:00</td>
                                </tr>
                                <tr>
                                <th scope="row" ><i class="bi bi bi-2-square-fill fs-1"></i></th>
                                    <td>Evento 2</td>
                                    <td>Jhon Lenon</td>
                                    <td>Conferencia</td>
                                    <td>15/12/22</td>
                                    <td>13:00:00</td>
                                    <td>15:00:00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade show" id="register-event" aria-labelledby="register-event-tab">

                    <form class="row align-items-center p-5">
                        <h1 style="text-align: center;"> Registrando un Evento </h1>
                        <div class="col-sm-12 my-2">
                            <div>
                                <div class="mb-4 d-flex justify-content-center">
                                    <img onclick="document.getElementById('regBtnEventImg').click();" id="regEventImg" src="https://placehold.co/300x200?text=Imagen+del+evento" alt="example placeholder"/>
                                    <!--<img onclick="document.getElementById('regBtnEventImg').click();" id="regEventImg" src="https://picsum.photos/300/200" alt="example placeholder"/>-->
                                </div>
                                <div class="d-flex justify-content-center">
                                    <div class="btn btn-primary btn-rounded" onclick="document.getElementById('regBtnEventImg').click();">
                                        <label class="form-label text-white m-1" for="regBtnEventImg"><i class="bi bi-image-fill"></i></label>
                                        <input accept="image/*" type="file" class="form-control d-none" id="regBtnEventImg" onchange="readURL(this)"/>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-8 my-2">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="regEventName" placeholder="Nombre del Evento">
                                <label for="regEventName">Nombre del evento</label>
                            </div>
                        </div>

                        <div class="col-sm-4 my-2">
                            <label for="regEventDate">Fecha</label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="bi bi-calendar-day-fill"></i></div>
                                <input type="date" class="form-control" id="regEventDate">
                            </div>
                        </div>

                        <div class="col-sm-6 my-2">
                            <label for="regEventStartHour">Hora Inicio</label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="bi bi-alarm-fill"></i></div>
                                <input type="time" class="form-control" id="regEventStartHour" onchange="document.getElementById('aa').value = this.value">
                                <input type="text" id="aa" hidden>
                            </div>
                        </div>

                        <div class="col-sm-6 my-2">
                            <label for="regEventEndHour">Hora Final</label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="bi bi-alarm-fill"></i></div>
                                <input type="time" class="form-control" id="regEventEndHour" onchange="document.getElementById('bb').value = this.value">
                                <input type="text" id="bb" hidden>
                            </div>
                        </div>

                        <div class="col-sm-7 my-2">
                            <div class="form-floating">
                                <select class="form-select" id="regEventGuest">
                                    <option value="1">Invitado 1</option>
                                    <option value="2">Invitado 2</option>
                                    <option value="3">Invitado 3</option>
                                </select>
                                <label for="regEventGuest">Invitado</label>
                            </div>
                        </div>

                        <div class="col-sm-5 my-2">
                            <div class="form-floating">
                                <select class="form-select" id="regEventType">
                                    <option value="1">Conferencia</option>
                                    <option value="2">Mesa Redonda</option>
                                    <option value="3">Otro</option>
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

<!-- --------------- -->
<!-- ADMIN INVITADOS -->
<div class="col-sm p-3 min-vh-100 test tab-pane" hidden>
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
                        <table class="table table-light" style="text-align-last:center;">
                            <thead>
                                <tr>
                                    <th scope="col">Imagen</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Invitado</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Hora Inicio</th>
                                    <th scope="col">Hora Final</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row" ><i class="bi bi bi-0-square-fill fs-1"></i></th>
                                    <td>Invitado 0</td>
                                    <td>Jhon Lenon</td>
                                    <td>Conferencia</td>
                                    <td>15/12/22</td>
                                    <td>13:00:00</td>
                                    <td>15:00:00</td>
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
