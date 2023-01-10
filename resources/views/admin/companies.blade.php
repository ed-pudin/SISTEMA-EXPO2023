@extends('admin.struct')

@section('Content')
<script>

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#regEventImg').attr('src', e.target.result).width(300).height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

</script>

<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

<!-- --------------- -->
<!-- ADMIN COMPAÑÍAS -->
<div class="col p-3 min-vh-100 w-50 backgroundImg tab-pane">
    <div class="container-fluid">
        <div class="row">
            <ul class="nav nav-tabs" id="tabAdminCompany" role="admin-company">
                <li class="nav-item" role="admin-company">
                    <button class="nav-link active" id="visualize-company-tab" data-bs-toggle="tab" data-bs-target="#visualize-company" type="button" role="tab" aria-controls="visualize-company" aria-selected="true">Ver</button>
                </li>
                <li class="nav-item" role="admin-company">
                    <button class="nav-link" id="register-company-tab" data-bs-toggle="tab" data-bs-target="#register-company" type="button" role="tab" aria-controls="register-company" aria-selected="false">Registrar</button>
                </li>
            </ul>
        </div>
        <div class="row" >
            <div class="tab-content p-0">
                <div class="tab-pane fade show active" id="visualize-company" role="tabpanel" aria-labelledby="visualize-company-tab">
                    <div class="table-responsive">
                        <table class="table" style="text-align-last:center;">
                            <thead>
                                <tr>
                                    <th class="w-priority">Nombre de la Empresa</th>
                                    <th>Editar</th>
                                    <th>Borrar</th>
                                    <th>Info</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Empresa Agrícola Sustentable del Mundo</td>
                                    <td>
                                        <a class="btn-table btn btn-primary col-12 m-auto"><i class="bi bi-pencil"></i></a>
                                    </td>
                                    <td>
                                        <a class="btn-table btn btn-primary col-12 m-auto"><i class="bi bi-trash"></i></a>
                                    </td>
                                    <td>
                                        <a class="btn-table btn btn-primary col-12 m-auto"><i class="bi bi-eye"></i></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Componentes electrónicos SA de CV</td>
                                    <td>
                                        <a class="btn-table btn btn-primary col-12 m-auto"><i class="bi bi-pencil"></i></a>
                                    </td>
                                    <td>
                                        <a class="btn-table btn btn-primary col-12 m-auto"><i class="bi bi-trash"></i></a>
                                    </td>
                                    <td>
                                        <a class="btn-table btn btn-primary col-12 m-auto"><i class="bi bi-eye"></i></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Happy Company</td>
                                    <td>
                                        <a class="btn-table btn btn-primary col-12 m-auto"><i class="bi bi-pencil"></i></a>
                                    </td>
                                    <td>
                                        <a class="btn-table btn btn-primary col-12 m-auto"><i class="bi bi-trash"></i></a>
                                    </td>
                                    <td>
                                        <a class="btn-table btn btn-primary col-12 m-auto"><i class="bi bi-eye"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade show" id="register-company" aria-labelledby="register-company-tab">

                    <form class="row align-items-center p-5">
                        <h1 class="mb-5" style="text-align: center;"> Registrando Empresa </h1>

                        <div class="col-md-3"></div>
                        <div class=" col-md-6 col-sm-12 my-5">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="regCompanyName" placeholder="Nombre de la Empresa">
                                <label for="regCompanyName">Nombre de la Empresa</label>
                            </div>
                        </div>
                        <div class="col-md-3"></div>


                        <div class="col-12 my-5" style="text-align:center;">
                            <button id="regCompany" type="submit" class="col-md-4 col-sm-12 btn btn-primary">REGISTRAR</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
<!-- ADMIN COMPAÑÍAS -->
<!-- --------------- -->


@endsection
