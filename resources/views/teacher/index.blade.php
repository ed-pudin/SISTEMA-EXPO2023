@extends('teacher.struct')

@section('Content')
<div class="col-sm p-3">
    <div class="container-fluid" >
        <div class="row">
            <h5 class="text-center" style="font-size: 2rem; margin-bottom:20px; margin-top:20px; color:white">Registro expositores</h5>

            <!--DROP DOWNS-->

            <div class="d-flex justify-content-center flex-wrap">
                <div class="col-12 col-md-3 col-lg-2 col-xl-1 m-2">
                    <div class="form-floating">
                        <select class="form-select" id="semesterCmb" onchange=updateInput()>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                        <label for="semesterCmb">Semestre</label>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 col-xl-3 m-2">
                    <div class="form-floating">
                        <select class="form-select" id="UACmb" onchange=updateInput()>
                            <option value="1">Programacion web capa intermedia</option>
                            <option value="2">Realidad Virtual</option>
                            <option value="3">Optimizacion de videojuegos</option>
                        </select>
                        <label for="UACmb">Materia</label>
                    </div>
                </div>

                <!--<div class="col-12 col-md-3 col-lg-3 m-2 form-floating">
                    <input type="text" onkeypress='return event.charCode >= 49 && event.charCode <= 57' class="form-control" id="teamNum" placeholder="Num. Equipos">
                    <label for="teamNum">Num. Equipos</label>
                </div>-->

            </div>

            <div class="p-3 my-4 div-colorfull" style="">
                <form class="my-4 form-student" id="form-student" action="{{route('teacherRegistroExpositor.store')}}" method=post>

                @csrf
                    <!--HIDDEN INPUTS-->

                    <input type="text" value="1" name="semester" id="semester" hidden>
                    <input type="text" value="Programacion web capa intermedia" name="UA" id="UA" hidden>
                    <input type="text" id="inputCount" name="inputCount" value=1 hidden>

                    <div class="d-flex justify-content-center flex-wrap">
                        <div class="col-12 col-md-6 col-lg-6 m-2 form-floating">
                            <input type="text" class="form-control" name="nameProject" id="nameProject" placeholder="Nombre del proyecto" required>
                            <label for="nameProject">Nombre del proyecto</label>
                        </div>

                        <div class="col-12 col-md-3 col-lg-2 m-2">
                            <div class="form-floating">
                                <select class="form-select" id="membersCmb" onchange=setDynamicInputs()>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                </select>
                                <label for="membersCmb">Num. Intergantes</label>
                            </div>
                        </div>

                    </div>

                    <div class="col-12 d-md-flex justify-content-center align-items-center">
                        <hr class="colorfull col-md-8 col-12 mt-4">
                    </div>

                    <div class="d-flex justify-content-center flex-wrap m-t3">

                        <div class="col-12 col-md-2 my-2 mx-3 mx-xl-5">
                            <div class="form-floating">
                                <input required onchange="checkNum(this)" type="number" class="form-control" name="enrollment0" id="enrollment0" placeholder="Matricula" value="" required>
                                <label for="enrollment0">Matricula</label>
                            </div>

                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" name="attendance0" id="attendance0" >
                                <label class="form-check-label text-light" for="attendance0">
                                    Comprobar
                                </label>
                            </div>

                        </div>
                        <div class="col-12 col-md-7 col-lg-6 col-xl-4 my-2 mx-3 mx-xl-5">
                            <div class="form-floating">
                                <input onclick="this.value = generateName()" type="text" class="form-control" name="name0" id="name0" readonly placeholder="Nombre completo">
                                <label for="name0">Nombre completo</label>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3" id="dynamicInputs">


                        <!--INPUTS DINAMICOS-->

                    </div>
                    
                    <!--                       key      |      password         -->
                    <!-- User Student ->    matrícula   | apellidos_matrícula   -->

                    <div class="col-12 my-2" style="text-align:center;">
                        <a onclick="checkDuplicated()" class="col-md-4 col-sm-12 btn btn-primary">Registrar equipo</a>
                        <button id="regGuest" type="submit" class="col-md-4 col-sm-12 btn btn-primary" hidden>Registrar equipo</button>
                    </div>

                    <div id="duplicatedAlert" class="col-12 my-2" style="text-align:center;" hidden>
                        <h5 style="color: #39f6e4; text-shadow:0px 0px 20px grey; font-weight:normal;"> Comprueba que no se repitan matrículas </h5>
                    </div>

                </form>
            </div>


        </div>
    </div>
</div>

@endsection
