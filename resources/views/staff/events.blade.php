@extends('staff.struct')

@section('Content')
<script src="{{ asset('js/staffEvent.js') }}"></script>


@if(session()->has('update'))

<script type="text/javascript">
    @if(session()->get('update') == "Edición en empresa exitosa")
    document.addEventListener("DOMContentLoaded", function(){
        Swal.fire({
            position: 'center',
            icon: 'success',
            iconColor: '#0de4fe',
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

<livewire:table-event-staff :events="$events"/>


@endsection
