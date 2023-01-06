@extends('staff.struct')

@section('Content')
<div class="col-sm p-3 test">
    <div class="container-fluid" >
        <div class="row">
            <h5 class="card-title text-center" style="font-size: 2rem; margin-bottom:20px; margin-top:20px; color:white">STAFF - EVENTOS</h5>
            <div>
                <div class="col-lg-5 my-3 search">
                    <div class="input-group rounded">
                        <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                        <span class="input-group-text border-0" id="search-addon">
                            <i class="bi bi-search"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped-columns" style="text-align-last:center;">
                    <thead>
                        <tr>
                            <th scope="col">Imagen</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Invitado</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" ><i class="bi bi bi-0-square-fill fs-1"></i></th>
                            <td>Evento 0</td>
                            <td>Jhon Lenon</td>
                            <td> <a href="{{route('staffEvento.show', 1)}}"><button type="button" class="btn btn-dark">Asistencia</button></td></a>
                        </tr>
                        <tr>
                        <th scope="row" ><i class="bi bi bi-1-square-fill fs-1"></i></th>
                            <td>Evento 1</td>
                            <td>Jhon Lenon</td>
                            <td><a href="{{route('staffEvento.show', 2)}}"><button type="button" class="btn btn-dark">Asistencia</button></td><a>
                        </tr>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
