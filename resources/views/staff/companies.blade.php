@extends('staff.struct')

@section('Content')
<div class="col-sm p-3 test">
    <div class="container-fluid" >
        <div class="row">
            <h5 class="text-center" style="font-size: 2rem; margin-bottom:20px; margin-top:20px; color:white">STAFF - EMPRESAS</h5>
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
            <div class="table-responsive" style="background-color: white">
                <table class="table table-striped-columns" style="text-align-last:center;">
                    <thead>
                        <tr>
                            <th scope="col">Empresa</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Evento 0</td>
                            <td> <a href="{{route('staffEmpresa.show', 1)}}"><button type="button" class="btn btn-dark">Asistencia</button></td></a>
                        </tr>
                        <tr>
                            <td>Evento 1</td>
                            <td> <a href="{{route('staffEmpresa.show', 2)}}"><button type="button" class="btn btn-dark">Asistencia</button></td></a>
                        </tr>
                        <tr>
                            <td>Evento 2</td>
                            <td> <a href="{{route('staffEmpresa.show', 3)}}"><button type="button" class="btn btn-dark">Asistencia</button></td></a>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
