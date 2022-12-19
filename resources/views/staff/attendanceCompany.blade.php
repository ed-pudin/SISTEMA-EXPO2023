@extends('staff.struct')

@section('Content')
<div class="col-sm p-3 test">
    <div class="container-fluid" >
        <div class="row">
            <h5 class="text-center" style="font-size: 2rem; margin-bottom:20px; margin-top:20px; color:white">Empresa: Accenture</h5>
            <div class="p-3" style="border: 1px solid white; border-radius:5px">
                <form class="my-4 form-student" id="form-student">

                    <div class="d-md-flex justify-content-center align-items-center">
                        <div class="col-md-7 col-lg-6 col-xl-4 my-2 mx-3 mx-xl-5">

                            <div class="form-floating">
                                <input type="text" class="form-control" id="name0" readonly placeholder="Nombre completo" value="Briam Alan Gonzalez Flores">
                                <label for="name0">Nombre completo</label>
                            </div>

                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="flexCheckDefault" >
                            <label class="form-check-label text-light" for="flexCheckDefault">
                                Asistió
                            </label>
                        </div>
                    </div>

                    

                    <!--INPUTS DINAMICOS-->
                </form>
            </div>

            <div class="mt-5" style="text-align: -webkit-center;">
                    <div class="col-md-7 col-lg-6 col-xl-4 my-2">
                        <div class="form-floating m-auto ">
                            <input type="text" class="form-control" name="personCompany" id="addPerson" placeholder="Nombre completo" required>
                            <label for="addPerson">Nombre completo</label>
                        </div>
                    </div>
                    <button type="button" onclick=addPersonCompany() class="btn btn-dark col-md-3 mt-3">Añadir</button>
            </div>
        </div>
    </div>
</div>

@endsection