@extends('staff.struct')

@section('Content')

<div class="col-sm p-3 test">
    <div class="container-fluid" >
        <div class="row">
            <h5 class="text-center" style="font-size: 2rem; margin-bottom:20px; margin-top:20px; color:white">Empresa: {{$company->nameCompany}}</h5>
            <div class="p-3 div-colorfull">
                <form class="my-4 form-student" id="form-student" action="{{route('staffEmpresa.update', [$company->id] )}}" method="post">
                    @method('put')
                    @csrf
                    <div id="dynamicInputs">

                          @for ($i = 0; $i < count($companyPeople); $i++)
                            <div class="d-md-flex justify-content-center align-items-center">
                                <div class="col-md-7 col-lg-6 col-xl-4 my-2 mx-3 mx-xl-5">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="name{{{$i}}}" id="name{{$i}}" readonly placeholder="Nombre completo" value="{{$companyPeople[$i]->fullName}}">
                                        <label for="name{{$i}}">Nombre completo</label>
                                    </div>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="attendance{{$i}}" name="attendance{{$i}}" @if($companyPeople[$i]->attended == 1) checked @endif>
                                <label class="form-check-label text-light" for="attendance{{$i}}">
                                    Asistió
                                </label>
                            </div>
                        </div>
                        @endfor


                        <!--INPUTS DINAMICOS-->

                    </div>
                    <input hidden id="idCompany" name="idCompany" value="{{$company->id}}">
                    <input hidden id="countInputs" name="countInputs" value="{{count($companyPeople)}}">
                    <input hidden id="countInputsNew" name="countInputsNew" value="">
                    <input hidden id="countInputsOld" name="countInputsOld" value="{{count($companyPeople)}}">

                    <div class="d-md-flex justify-content-center align-items-center">
                        <button id="sendPersonCompany" type="submit"class="btn btn-primary col-md-3 mt-3"  {{ count($companyPeople) < 1 ? ' disabled' : '' }} >Enviar</button>
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
                    <button type="button" onclick=addPersonCompanyAttendance() class="btn btn-primary col-md-3 mt-3">Añadir</button>
                    <div class="my-3" id="validatePerson" style="display: none; color: #39f6e4">
                        Llena el campo correspondiente.
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection
