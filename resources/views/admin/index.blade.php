@extends('admin.struct')

@section('Content')
<div class="col-sm p-3 min-vh-100">
    <div class="container-fluid">
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
        <div class="row">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="visualize" role="tabpanel" aria-labelledby="visualize-tab"> 
                    <div class="table-responsive">
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
                    <div class="col-sm-8 my-2">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="regProyectName" placeholder="Nombre del Proyecto">
                            <label for="regProyectName">Nombre del proyecto</label>
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
                            <input type="time" class="form-control" id="regProjectStartHour">
                        </div>
                    </div>

                    <div class="col-sm-6 my-2">
                        <label for="regProjectDate">Hora Final</label>
                        <div class="input-group">
                            <div class="input-group-text"><i class="bi bi-calendar-day-fill"></i></div>
                            <input type="time" class="form-control" id="regProjectEndHour">
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

                    <div class="col-auto my-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="autoSizingCheck2">
                            <label class="form-check-label" for="autoSizingCheck2">
                                Remember me
                            </label>
                        </div>
                    </div>

                    <div class="col-auto my-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                
                </div>

            </div>
        </div>
    </div>
</div>
@endsection