@extends('staff.struct')

@section('Content')

@if(session()->has('status'))

<script type="text/javascript">
    @if(session()->get('status') == "Asistencia registrada.")
    document.addEventListener("DOMContentLoaded", function(){
        Swal.fire({
        position: 'center',
        icon: 'success',
        iconColor: '#0de4fe',
        title: `{{ session()->get('status') }}`,
        showConfirmButton: false,
        timer: 1500
        })

    });
    @endif

    @if(session()->get('status') == "Hubo un problema.")
    document.addEventListener("DOMContentLoaded", function(){
        Swal.fire({
        position: 'center',
        icon: 'error',
        iconColor:'#a70202',
        title: `{{ session()->get('status') }}`,
        showConfirmButton: false,
        timer: 1500
        })

    });
    @endif

</script>
@endif

<div class="col-sm p-3 test">
    <div class="container-fluid" >
        <div class="row">
            <h5 class="text-center" style="font-size: 2rem; margin-bottom:20px; margin-top:20px; color:white">STAFF - EMPRESAS</h5>
            <div>
                <div class="col-lg-5 my-3 search">
                    <form>
                        <div class="input-group rounded">
                            <div class="form-floating">
                                <input autocomplete="off" id="searchCompany" type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                <label for="searchCompany">Nombre de la Empresa</label>
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
                            <th class="w-priority">Empresa</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($companies as $company)
                        <tr>
                            <td>{{$company->nameCompany}}</td>
                            <td> <a href="{{route('staffEmpresa.show', [$company->id])}}"><button type="button" class="btn btn-primary">Asistencia</button></td></a>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
