@extends('admin.struct')

@section('Content')
<script>

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#regProjectImg').attr('src', e.target.result).width(300).height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

</script>

<style>
    div.test {
        background-image: url('background-1.png');
        background-repeat: no-repeat;
        background-size: cover;
    }
    
</style>

<div class="col-sm p-3 min-vh-100 test">
    <div class="container-fluid" >
        <div class="row">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="admin-event">
                    <button class="nav-link active" id="visualize-tab" data-bs-toggle="tab" data-bs-target="#visualize" type="button" role="tab" aria-controls="visualize" aria-selected="true">Ver</button>
                </li>
                <li class="nav-item" role="admin-event">
                    <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button" role="tab" aria-controls="register" aria-selected="false">Registrar</button>
                </li>
            </ul>
        </div>
        <div class="row" >
            <div class="tab-content">
                <div class="tab-pane fade show active" id="visualize" role="tabpanel" aria-labelledby="visualize-tab"> 
                    <div class="table-responsive" >
                        <table class="table table-striped-columns" style="text-align-last:center;">
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

                <div class="tab-pane fade show" id="register" aria-labelledby="register-tab">

                    <form class="row align-items-center p-5">
                        <h1 style="text-align: center;"> Registrando un Evento </h1>
                        <div class="col-sm-12 my-2">
                            <div>
                                
                                <div class="mb-4 d-flex justify-content-center">
                                    <img onclick="document.getElementById('regBtnProjectImg').click();" id="regProjectImg" src="https://placehold.co/300x200?text=Imagen+del+evento" alt="example placeholder"/>
                                    <!--<img onclick="document.getElementById('regBtnProjectImg').click();" id="regProjectImg" src="https://picsum.photos/300/200" alt="example placeholder"/>-->
                                </div>
                                <div class="d-flex justify-content-center">
                                    <div class="btn btn-primary btn-rounded" onclick="document.getElementById('regBtnProjectImg').click();">
                                        <label class="form-label text-white m-1" for="regBtnProjectImg"><i class="bi bi-image-fill"></i></label>
                                        <input accept="image/*" type="file" class="form-control d-none" id="regBtnProjectImg" onchange="readURL(this)"/>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-8 my-2">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="regProjectName" placeholder="Nombre del Evento">
                                <label for="regProjectName">Nombre del evento</label>
                            </div>
                        </div>

                        <div class="col-sm-4 my-2">
                            <label for="regProjectDate">Fecha</label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="bi bi-calendar-day-fill"></i></div>
                                <input type="date" class="form-control" id="regProjectDate">
                            </div>
                        </div>

                        <div class="col-sm-6 my-2">
                            <label for="regProjectDate">Hora Inicio</label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="bi bi-calendar-day-fill"></i></div>
                                <input type="time" class="form-control" id="regProjectStartHour" onchange="document.getElementById('aa').value = this.value">
                                <input type="text" id="aa" hidden>
                            </div>
                        </div>

                        <div class="col-sm-6 my-2">
                            <label for="regProjectDate">Hora Final</label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="bi bi-calendar-day-fill"></i></div>
                                <input type="time" class="form-control" id="regProjectEndHour" onchange="document.getElementById('bb').value = this.value">
                                <input type="text" id="bb" hidden>
                            </div>
                        </div>

                        <div class="col-sm-7 my-2">
                            <div class="form-floating">
                                <select class="form-select" id="regProjectGuest">
                                    <option value="1">Invitado 1</option>
                                    <option value="2">Invitado 2</option>
                                    <option value="3">Invitado 3</option>
                                </select>
                                <label for="regProjectGuest">Invitado</label>
                            </div>
                        </div>

                        <div class="col-sm-5 my-2">
                            <div class="form-floating">
                                <select class="form-select" id="regProjectType">
                                    <option value="1">Conferencia</option>
                                    <option value="2">Mesa Redonda</option>
                                    <option value="3">Otro</option>
                                </select>
                                <label for="regProjectType">Tipo</label>
                            </div>
                        </div>

                        <div class="col-12 my-2" style="text-align:center;">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                    </form>
                
                </div>

            </div>
        </div>
    </div>
</div>
@endsection