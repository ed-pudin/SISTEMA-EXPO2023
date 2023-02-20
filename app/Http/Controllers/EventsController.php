<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;
use App\Models\eventStudent;
use App\Models\externalPeopleEvent;
use App\Models\eventGuest;
use App\Models\externalPeople;
use App\Models\student;
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
        $events = event::get();

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
        //$event->guest = $request->regEventGuest;
        $event->typeEvent = $request->regEventType;
        $event->image = $fileName;

        if($event->save()){

            //Guardar invitado evento
            foreach($request->regEventGuest as $requestEvents){
                $eventGuest = new eventGuest();
                $eventGuest->guest = $requestEvents;
                $eventGuest->event = $event->id;

                if($eventGuest->save())
                    session()->flash("status","Evento registrado");
                else
                    session()->flash("status","Hubo un problema en el registro");
            }

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
        $event = event::find($id);

        $guests = eventGuest::with('guest')->where('event', '=', $id)->get();

        $count = externalPeopleEvent::with('event')->whereHas('event', function ($query) use($id) {
            $query->where('id', '=', $id);
        })->where('attended', '=', true)->count();

        $count += eventStudent::with('event')->whereHas('event', function ($query) use($id) {
            $query->where('id', '=', $id);
        })->where('attended', '=', true)->count();

        $eventStudents = eventStudent::where('event', '=', $id)->get();

        $eventExternals = externalPeopleEvent::where('event', '=', $id)->get();

        $Students = student::join('event_students', 'students.enrollment', '=', 'event_students.student')->get();
        $Externals = externalPeople::join('external_people_events', 'external_people.id', '=', 'external_people_events.externalPeople')->get();

        return view('admin.edit.showEvent', compact('event', 'count', 'eventStudents', 'eventExternals', 'guests', 'Students', 'Externals'));
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
        //$event->guest = $request->editEventGuest;
        $event->typeEvent = $request->editEventType;

        $event->image = $fileName;

        if($event->save()) {
            session()->flash("update","Edición en evento exitosa");
        }else{
            session()->flash("update","Hubo un error, intente de nuevo");
        }
        return redirect()->route('adminRegistroEventos.index');
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

        $externalPeopleEvent = externalPeopleEvent::with('event')->whereHas('event', function ($query) use($id) {
            $query->where('id', '=', $id);
        })->count();

        $eventStudent = eventStudent::with('event')->whereHas('event', function ($query) use($id) {
            $query->where('id', '=', $id);
        })->count();

        if($externalPeopleEvent > 0 || $eventStudent > 0){
            //Checar relacion entre guest y events
            session()->flash("delete","El evento ya esta siendo asistido y no se puede eliminar");
        }else{
            if($event->delete()){
                session()->flash("delete","Se ha eliminado correctamente $event->eventName");
            }else{
                session()->flash("delete","Algo salió mal");
            }
        }

        return redirect()->route('adminRegistroEventos.index');
    }

    public function editarEvento($eventToEdit) {
        $guests = \App\Models\guest::all();
        $event = event::with('guest')->find($eventToEdit);

        return view('admin.edit.event', compact('event', 'guests'));
    }

}
