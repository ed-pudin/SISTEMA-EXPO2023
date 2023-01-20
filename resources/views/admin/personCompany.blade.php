@extends('admin.struct')

@section('Content')
@if(session()->has('status'))
        
        <script type="text/javascript">
            @if(session()->get('status') == "Registro exitoso")
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
            @elseif(session()->get('status') != null)
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

<div class="col p-3 min-vh-100 w-50 backgroundImg tab-pane">
    <div class="container-fluid" >
        <div class="row">
            <h5 class="text-center" style="font-size: 2rem; margin-bottom:20px; margin-top:20px; color:white">Empresa: {{$company->nameCompany}}</h5>
            <div class="p-3 div-colorfull">
                <form class="my-4 form-student" id="form-student" action="{{route('adminRegistroPersonaEmpresa.store')}}" method=post>
                @csrf
                    <div id="dynamicInputs">
                        
                        @foreach($companyPeople as $person)
                            <div class="row mx-md-5 mx-2">
                                <div class="col-md-2 col-0"></div>
                                <div class="col-md-6 col-10 my-2">
                                    <div class="form-floating" id="viewCompanyPeople_{{$person->id}}">
                                        <input type="text" class="form-control" id="{{$person->id}}" readonly placeholder="Nombre completo" value="{{$person->fullName}}">
                                        <label for="{{$person->id}}">Nombre completo</label>
                                    </div>
                                    <div class="form-floating" id="editCompanyPeople_{{$person->id}}" hidden>
                                        <input type="text" class="form-control" name="editNameCompanyPeople_{{$person->id}}" id="editNameCompanyPeople_{{$person->id}}" placeholder="Nombre completo" value="{{$person->fullName}}">
                                        <label for="editNameCompanyPeople_{{$person->id}}">Nombre completo</label>
                                    </div>
                                </div>
                                <div class="col-md-2 col-2" style="align-self: center;text-align-last: left;">
                                    <a name="editCompanyPersonButton" class="btn-table btn btn-primary col-12 m-auto"><i class="bi bi-pencil"></i></a>
                                </div>
                                <div class="col-md-2 col-0"></div>
                            </div>
                        @endforeach
                        <!--INPUTS DINAMICOS-->

                    </div>
                    <input hidden id="countInputs" name="countInputs">
                    <input hidden name="idCompany" id="idCompany" value="{{$company->id}}">

                    <div class="d-flex justify-content-center align-items-center">
                        <button id="sendPersonCompany" type="submit" class="btn btn-primary col-md-3 mt-3" disabled>Enviar</button>
                    </div>
                </form>
            </div>

            <div class="mt-5" style="text-align: -webkit-center;">
                    <div class="col-md-7 col-lg-6 col-xl-4 my-2">
                        <div class="form-floating m-auto ">
                            <input type="text" class="form-control" name="personCompany" id="addPerson" placeholder="Nombre completo">
                            <label for="addPerson">Nombre completo</label>
                        </div>
                    </div>
                    <button type="button" onclick=addPersonCompany() class="btn btn-primary col-md-3 mt-3">Añadir</button>
                    <div class="my-3" id="validatePerson" style="display: none; color: #39f6e4">
                        Llena el campo correspondiente.
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection