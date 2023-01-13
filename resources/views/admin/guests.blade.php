@extends('admin.struct')

@section('Content')
  @if(session()->has('status'))
        
        <script type="text/javascript">
            @if(session()->get('status') == "Invitado registrado")
            document.addEventListener("DOMContentLoaded", function(){
                Swal.fire({
                position: 'center',
                icon: 'success',
                iconColor: '#30a702',
                title: `{{ session()->get('status') }}`,
                showConfirmButton: false,
                timer: 1500
                })
            
            });
            @endif

            @if(session()->get('status') == "Hubo un problema en el registro")
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
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

<!-- --------------- -->
<!-- ADMIN INVITADOS -->
<div class="col p-3 min-vh-100 w-50 backgroundImg tab-pane">
    <div class="container-fluid">
        <div class="row">
            <ul class="nav nav-tabs" id="tabAdminGuests" role="admin-guests">
                <li class="nav-item" role="admin-guests">
                    <button class="nav-link active" id="visualize-guests-tab" data-bs-toggle="tab" data-bs-target="#visualize-guests" type="button" role="tab" aria-controls="visualize-guests" aria-selected="true">Ver</button>
                </li>
                <li class="nav-item" role="admin-guests">
                    <button class="nav-link" id="register-guests-tab" data-bs-toggle="tab" data-bs-target="#register-guests" type="button" role="tab" aria-controls="register-guests" aria-selected="false">Registrar</button>
                </li>
            </ul>
        </div>
        <div class="row" >
            <div class="tab-content p-0">
                <div class="tab-pane fade show active" id="visualize-guests" role="tabpanel" aria-labelledby="visualize-guests-tab">
                    <div class="table-responsive">
                        <table class="table" style="text-align-last:center;">
                            <thead>
                                <tr>
                                    <th class="w-priority">Nombre</th>
                                    <th class="w-priority">Empresa</th>
                                    <th>Editar</th>
                                    <th>Borrar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($guests as $guest)                                

                                <tr>
                                    <td>{{$guest->fullName}}</td>
                                    @if($guest->company()->first() != null)
                                        <td>{{$guest->company()->first()->nameCompany}}</td>
                                    @else
                                        <td class="text-secondary">Sin empresa</td>
                                    @endif
                                    <td>
                                        <a class="btn-table btn btn-primary col-12"><i class="bi bi-pencil"></i></a>
                                    </td>
                                    <td>
                                        <a class="btn-table btn btn-primary col-12"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade show" id="register-guests" aria-labelledby="register-guests-tab">

                    <form class="row align-items-center p-5" id="registroInvitados"action="{{route('adminRegistroInvitados.store')}}" method="post">
                        @csrf
                        <h1 style="text-align: center;"> Registrando un Invitado </h1>

                        <div class="col-md-3"></div>
                        <div class=" col-md-6 col-sm-12 my-5">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="regGuestName" id="regGuestName" placeholder="Nombre del Evento" required>
                                <label for="regGuestName">Nombre del Invitado</label>
                            </div>
                        </div>
                        <div class="col-md-3"></div>

                        <div class="col-md-3"></div>
                        <div class="col-md-6 col-sm-12 my-5">
                            <div class="form-floating">
                                <select class="form-select" id="regGuestCmpany" name="regGuestCmpany">
                                    <option value="0">Ninguna</option>
                                    @foreach ($companies as $company) 
                                        <option value="{{$company->id}}">{{$company->nameCompany}}</option>
                                    @endforeach
                                </select>
                                <label for="regGuestCmpany">Empresa</label>
                            </div>
                        </div>
                        <div class="col-md-3"></div>

                        <div class="col-12 my-5" style="text-align:center;">
                            <button id="regGuest" type="submit" class="col-md-4 col-sm-12 btn btn-primary">REGISTRAR</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
<!-- ADMIN INVITADOS -->
<!-- --------------- -->


@endsection
