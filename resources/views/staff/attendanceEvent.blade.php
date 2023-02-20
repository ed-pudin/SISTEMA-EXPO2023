@extends('staff.struct')

@section('Content')

@if(session()->has('status'))

    <script type="text/javascript">
        @if(session()->get('status') == "Asistencia registrada")
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

        @if(session()->get('status') == "Hubo un problema en la asistencia" || session()->get('status') == "La persona ya asistió")
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

        @if(session()->get('status') == "La persona ya asistió")
        document.addEventListener("DOMContentLoaded", function(){
            Swal.fire({
                position: 'center',
                icon: 'info',
                iconColor:'#0de4fe',
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
            <h5 class="text-center" style="font-size: 2rem; margin-bottom:20px; margin-top:20px; color:white">Entrada para evento: {{$events->eventName}}</h5>
            <div class="container vh-80 div-colorfull">

                <div class="container py-5">

                    <div class="d-flex justify-content-center my-4">
                        <div>
                            <div class="form-check form-check-inline">
                                <input
                                class="form-check-input"
                                type="radio"
                                name="inlineRadioOptions"
                                id="inlineRadio1"
                                value="option1"
                                checked
                                onclick=studentCheck()
                                />
                                <label class="form-check-label" for="inlineRadio1">Alumno</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input
                                class="form-check-input"
                                type="radio"
                                name="inlineRadioOptions"
                                id="inlineRadio2"
                                value="option2"
                                onclick=externalCheck()
                                />
                                <label class="form-check-label" for="inlineRadio2">Externo</label>
                            </div>
                        </div>
                    </div>


                    <form class="my-4 form-student" id="studentEventAttendance" method="post" action="{{route('staffEvento.update', [$events->id ])}}">
                        @method('put')
                        @csrf
                        <div class="d-md-flex justify-content-center align-items-center">
                            <div class="col-md-3 col-lg-3 col-xl-2 my-2 mx-3 mx-xl-5">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="enrollmentStudentEvent" name="enrollmentStudentEvent" placeholder="Matricula" required>
                                    <label for="enrollmentStudentEvent">Matricula</label>
                                </div>
                            </div>

                            <div class="col-md-7 col-lg-6 col-xl-4 my-2 mx-3 mx-xl-5">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="fullNameStudentEvent" name="fullNameStudentEvent" placeholder="Nombre completo" required>
                                    <label for="fullNameStudentEvent">Nombre completo</label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center my-4">
                            <button type="submit" class="btn btn-primary col-md-6">Registrar entrada</button>
                        </div>
                    </form>

                    <form class="my-4 form-external" id="externalPeopleEventAttendance" method="post" action="{{route('staffEvento.update', [$events->id ])}}">
                        @method('put')
                        @csrf
                        <div class="d-md-flex justify-content-center align-items-center">
                            <div class="col-md-3 col-lg-3 col-xl-2 my-2 mx-3 mx-xl-5">
                                <div class="form-floating">
                                    <select class="form-select" id="genre" name="genre">
                                        <option value="Female">Femenino</option>
                                        <option value="Male">Masculino</option>
                                    </select>
                                    <label for="genre">Género</label>
                                </div>
                            </div>

                            <div class="col-md-7 col-lg-6 col-xl-4 my-2 mx-3 mx-xl-5">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="regEventExternal" id="regEventExternal" placeholder="Nombre completo" required>
                                    <label for="regEventExternal">Nombre completo</label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center my-4">
                            <button type="submit" class="btn btn-primary col-md-6">Registrar entrada</button>
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </div>
</div>
@endsection
