<div class="col-sm p-3 test">
    <div class="container-fluid" >
        <div class="row">
            <h5 class="card-title text-center" style="font-size: 2rem; margin-bottom:20px; margin-top:20px; color:white">STAFF - EVENTOS</h5>
            <div>
                <div class="col-lg-5 my-3 search">
                    <form>
                        <div class="input-group rounded">
                            <div class="form-floating">
                                <input autocomplete="off" id="searchEvent" type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="search-addon" wire:model="searchTxt" wire:keyup="search"/>
                                <label for="searchEvent">Nombre del Evento</label>
                            </div>
                            <button type="button" wire:click="search"class="btn btn-primary bi bi-search p-1"><p class="m-0">Buscar</p> </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <table id="event-staff-table" class="table" style="text-align-last:center;">
                    <thead>
                        <tr>
                            <th class="w-priority">Nombre</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < count($events); $i++)
                                <tr>
                                    <td class="page-{{intdiv($i+$pageSize,$pageSize)}}">{{$events[$i]->eventName}}</td>
                                    <td class="page-{{intdiv($i+$pageSize,$pageSize)}}"> <a href="{{route('staffEvento.show', [$events[$i]->id ])}}"><button type="button" class="btn btn-primary">Asistencia</button></td></a>
                                </tr>
                        @endfor
                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        @for ($i = 0; $i < count($events)/$pageSize; $i++)
                            <li class="page-item"><a onclick="changeActivePage(this)" class="page-link btn btn-primary @if($i==0) active @endif" href="#">{{$i+1}}</a></li>
                        @endfor
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
