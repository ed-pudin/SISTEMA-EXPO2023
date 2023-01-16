<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;
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
        $events = event::with('guest')->get();
        
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
        return redirect()->back(); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
