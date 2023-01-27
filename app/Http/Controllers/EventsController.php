<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;
use App\Models\eventStudent;
use App\Models\externalPeopleEvent;
use Illuminate\Support\Facades\Storage;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Regresar los invitados
        $guests = \App\Models\guest::all();
        //Vista de eventos
        $events = event::with('guest')->orderby('eventName', 'asc')->get();

        return view('admin.events', compact('guests', 'events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $event = new event();

        //Nombre de archivo
        $fileName = time().'_'.$request->file('regBtnEventImg')->getClientOriginalName();
        //Guardar archivo
        Storage::disk('public')->put($fileName, file_get_contents($request->file('regBtnEventImg')));

        $event->eventName = $request->regEventName;
        $event->date =  $request->regEventDate;
        $event->startTime = $request->regEventStartHour;
        $event->endTime = $request->regEventEndHour;
        $event->guest = $request->regEventGuest;
        $event->typeEvent = $request->regEventType;
        $event->image = $fileName;

        if($event->save()){
            session()->flash("status","Evento registrado");
        }else{
            session()->flash("status","Hubo un problema en el registro");
        }
        return redirect()->route('adminRegistroEventos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = event::with('guest')->find($id);

        $count = externalPeopleEvent::with('event')->whereHas('event', function ($query) use($id) {
            $query->where('id', '=', $id);
        })->where('attended', '=', true)->count();

        $count += eventStudent::with('event')->whereHas('event', function ($query) use($id) {
            $query->where('id', '=', $id);
        })->where('attended', '=', true)->count();

        return view('admin.edit.showEvent', compact('event', 'count'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = event::find($id);

        if($request->file('editBtnEventImg') != null) {
            //Nombre de archivo
            $fileName = time().'_'.$request->file('editBtnEventImg')->getClientOriginalName();
            //Guardar archivo

            Storage::disk('public')->delete('/'.$event->image);

            Storage::disk('public')->put($fileName, file_get_contents($request->file('editBtnEventImg')));
        } else {
            $fileName = $request->originalImage;
        }

        $event->eventName = $request->editEventName;
        $event->date = $request->editEventDate;
        $event->startTime = $request->editEventStartHour;
        $event->endTime = $request->editEventEndHour;
        $event->guest = $request->editEventGuest;
        $event->typeEvent = $request->editEventType;

        $event->image = $fileName;

        if($event->save()) {
            session()->flash("update","Edición en evento exitosa");
            return redirect()->route('adminRegistroEventos.index');
        }else{
            session()->flash("update","Hubo un error, intente de nuevo");
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = event::find($id);

        if($event->delete()){
            session()->flash("delete","Se ha eliminado correctamente $event->eventName");
        }else{
            session()->flash("delete","Algo salió mal");
        }

        return redirect()->back();
    }

    public function editarEvento($eventToEdit) {
        $guests = \App\Models\guest::all();
        $event = event::with('guest')->find($eventToEdit);

        return view('admin.edit.event', compact('event', 'guests'));
    }

}
