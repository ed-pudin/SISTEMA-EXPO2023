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
        <div class="row" >
            
            <form class="row align-items-center p-5" id="registroInvitados"action="{{route('adminRegistroInvitados.store')}}" method="post">
                <h2>{{$guest}}</h2>
                @csrf
                <h1 style="text-align: center;"> Editando un Invitado </h1>

                <div class="col-md-3"></div>
                <div class=" col-md-6 col-sm-12 my-5">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="editGuestName" id="editGuestName" placeholder="Nombre del Evento" required>
                        <label for="editGuestName">Nombre del Invitado</label>
                    </div>
                </div>
                <div class="col-md-3"></div>

                <div class="col-md-3"></div>
                    <div class="col-md-6 col-sm-12 my-5">
                        <div class="form-floating">
                            <select class="form-select" id="regGuestCmpany" name="regGuestCmpany" value="{{$guest->company()->first()->id}}">
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
<!-- ADMIN INVITADOS -->
<!-- --------------- -->


@endsection
