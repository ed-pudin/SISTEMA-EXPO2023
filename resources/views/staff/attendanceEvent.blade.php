@extends('staff.struct')

@section('Content')
<div class="col-sm p-3 test">
    <div class="container-fluid" >
        <div class="row">
            <h5 class="text-center" style="font-size: 2rem; margin-bottom:20px; margin-top:20px; color:white">Entrada para evento: Evento 0</h5>
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

                    
                    <form class="my-4 form-student">
                        <div class="d-md-flex justify-content-center align-items-center">
                            <div class="col-md-3 col-lg-3 col-xl-2 my-2 mx-3 mx-xl-5">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="regProjectName" placeholder="Matricula" required>
                                    <label for="regProjectName">Matricula</label>
                                </div>
                            </div>
                            
                            <div class="col-md-7 col-lg-6 col-xl-4 my-2 mx-3 mx-xl-5">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="regProjectName" placeholder="Nombre completo" required>
                                    <label for="regProjectName">Nombre completo</label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center my-4">
                            <button type="submit" class="btn btn-primary col-md-6">Registrar entrada</button>
                        </div>
                    </form>

                    <form class="my-4 form-external">   
                        <div class="d-md-flex justify-content-center align-items-center">
                            <div class="col-md-8 my-2 mx-3 mx-xl-5">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="regProjectName" placeholder="Nombre completo" required>
                                        <label for="regProjectName">Nombre completo</label>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center my-4">
                                <button type="submit" class="btn btn-primary col-md-6">Registrar entrada</button>
                            </div>
                        </div>
                    </form>
                    
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
