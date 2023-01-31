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
        @php
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        @endphp
@endif

<script>

    function personCompanySwap(id=0) {
        var form = document.getElementById("form-personCompany");
        var thisButton = document.getElementById("editCompanyPersonButton_"+id);
        var editCompanyPeople = document.getElementById("editCompanyPeople_"+id);
        var viewCompanyPeople = document.getElementById("viewCompanyPeople_"+id);
        var editNameCompanyPeople = document.getElementById("editNameCompanyPeople_"+id);
        var thisIcon = document.getElementById("editCompanyPersonButton_"+id).firstChild;
        var sendButton = document.getElementById("sendPersonCompany");
        var addPersonBtn = document.getElementById("addPersonBtn");
        var addPersonInput = document.getElementById("addPerson");

        var editButtons = document.getElementsByName("editCompanyPersonButton");

        if(form.action == "{{route('adminRegistroPersonaEmpresa.store')}}") {
            // Si está en modo "Agregar persona", cámbialo a "Editar persona singular"

                // Cambiar la ruta
            var url = "{{route('adminRegistroPersonaEmpresa.update', [':id'])}}";
                // -- Esto se hace para poder agregar la variable id
            url = url.replace(':id', id);
            form.action = url;

                // Desactivamos botones y activamos el de enviar
            addPersonBtn.setAttribute("disabled","");
            addPerson.setAttribute("disabled","");
            editButtons.forEach(btn => {
                btn.setAttribute("disabled","");
            });

            thisButton.removeAttribute("disabled");
            sendButton.removeAttribute("disabled");

            sendButton.innerHTML = "Confirmar Edición";


                // Cambiamos el ícono
            thisIcon.classList.remove("bi-pencil");
            thisIcon.classList.add("bi-x-lg");

                // Y mostramos el form a editar
            editCompanyPeople.removeAttribute("hidden");
            viewCompanyPeople.setAttribute("hidden","");

                // Quitamos todos los nuevos nombres, por si acaso
            for(var i = 0; i < count; i++) {
                var section = document.getElementById("viewNewCompanyPeople_"+i);
                if(section != null) {
                    section.remove();
                }
            }
            form.innerHTML += ` @method('patch') `;

        } else {
            // En vez de cancelar, se refresca la página, para evitar errores
            location.reload();
        }

    }

    function focusandselect(element) {
        element.focus();
        element.select();
    }

</script>

<div class="col p-3 min-vh-100 w-50 backgroundImg tab-pane">
    <div class="container-fluid" >
        <div class="row">
            <h5 class="text-center" style="font-size: 2rem; margin-bottom:20px; margin-top:20px; color:snow">Empresa: {{$company->nameCompany}}</h5>
            <div class="p-3 div-colorfull">
                <form class="my-4" id="form-personCompany" action="{{route('adminRegistroPersonaEmpresa.store')}}" method=post>
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
                                    <a onclick="if(!this.hasAttribute('disabled')) { personCompanySwap('{{$person->id}}'); focusandselect(document.getElementById('editNameCompanyPeople_{{$person->id}}')); }" name="editCompanyPersonButton" id="editCompanyPersonButton_{{$person->id}}" class="btn-table btn btn-primary col-12 m-auto"><i class="bi bi-pencil"></i></a>
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
                    <button id="addPersonBtn" type="button" onclick=addPersonCompany() class="btn btn-primary col-md-3 mt-3">Añadir</button>
                    <div class="my-3" id="validatePerson" style="display: none; color: #39f6e4">
                        Llena el campo correspondiente.
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection
