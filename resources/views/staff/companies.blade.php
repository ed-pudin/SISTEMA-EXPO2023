@extends('staff.struct')

@section('Content')

@if(session()->has('status'))

<script type="text/javascript">
    @if(session()->get('status') == "Asistencia registrada.")
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

    @if(session()->get('status') == "Hubo un problema.")
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

<livewire:table-company-staff :companies="$companies"/>

@endsection
