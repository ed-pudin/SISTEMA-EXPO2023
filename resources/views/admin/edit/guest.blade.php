@extends('admin.struct')

@section('Content')
  @if(session()->has('update'))
        
        <script type="text/javascript">
            @if(session()->get('update') == "Edición en invitado exitosa")
            document.addEventListener("DOMContentLoaded", function(){
                Swal.fire({
                position: 'center',
                icon: 'success',
                iconColor: '#30a702',
                title: `{{ session()->get('update') }}`,
                showConfirmButton: false,
                timer: 1500
                })
            
            });
            @endif

            @if(session()->get('update') == "Hubo un error, intente de nuevo")
            document.addEventListener("DOMContentLoaded", function(){
                Swal.fire({
                position: 'center',
                icon: 'error',
                iconColor:'#a70202',
                title: `{{ session()->get('update') }}`,
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
            
            <form class="row align-items-center p-5" id="registroInvitados"action="{{route('adminRegistroInvitados.update', [$guest->id])}}" method="post">
                @method('PUT')
                @csrf
                <h1 style="text-align: center;"> Editando un Invitado </h1>

                <div class="col-md-3"></div>
                <div class=" col-md-6 col-sm-12 my-5">
                    <div class="form-floating">
                        <input autocomplete="off" value="{{$guest->fullName}}" type="text" class="form-control" name="editGuestName" id="editGuestName" placeholder="Nombre del Evento" required>
                        <label for="editGuestName">Nombre del Invitado</label>
                    </div>
                </div>
                <div class="col-md-3"></div>

                <div class="col-md-3"></div>
                    <div class="col-md-6 col-sm-12 my-5">
                        <div class="form-floating">
                            <select class="form-select" id="editGuestCmpany" name="editGuestCmpany">
                                <option value="0">Ninguna</option>
                                @foreach ($companies as $company) 
                                    <option value="{{$company->id}}" 
                                    @if($guest->company()->first() != null) 
                                        @if($company->id == $guest->company()->first()->id) 
                                            selected 
                                        @endif 
                                    @endif>
                                    {{$company->nameCompany}}</option>
                                @endforeach
                            </select>
                            <label for="editGuestCmpany">Empresa</label>
                        </div>
                    </div>
                <div class="col-md-3"></div>

                <div class="col-12 my-5" style="text-align:center;">
                    <button id="regGuest" type="submit" class="col-md-4 col-sm-12 btn btn-primary"> Confirmar Edición </button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- ADMIN INVITADOS -->
<!-- --------------- -->


@endsection
