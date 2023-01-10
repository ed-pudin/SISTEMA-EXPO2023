@extends('staff.struct')

@section('Content')
<div class="col-sm p-3 test">
    <div class="container-fluid" >
        <div class="row">
            <h5 class="card-title text-center" style="font-size: 2rem; margin-bottom:20px; margin-top:20px; color:white">STAFF - EVENTOS</h5>
            <div>
                <div class="col-lg-5 my-3 search">
                    <form>
                        <div class="input-group rounded">
                            <div class="form-floating">
                                <input autocomplete="off" id="searchEvent" type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                <label for="searchEvent">Nombre del Evento</label>
                            </div>
                            <button type="submit" class="btn btn-primary bi bi-search p-1"><p class="m-0">Buscar</p> </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table" style="text-align-last:center;">
                    <thead>
                        <tr>
                            <th class="w-priority">Nombre</th>
                            <th class="w-priority">Invitado</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Evento 0</td>
                            <td>Jhon Lenon</td>
                            <td> <a href="{{route('staffEvento.show', 1)}}"><button type="button" class="btn btn-primary">Asistencia</button></td></a>
                        </tr>
                        <tr>
                            <td>Evento 1</td>
                            <td>Jhon Lenon</td>
                            <td><a href="{{route('staffEvento.show', 2)}}"><button type="button" class="btn btn-primary">Asistencia</button></td><a>
                        </tr>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
