<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;
use App\Models\student;
use App\Models\externalPeople;
use App\Models\eventStudent;
use App\Models\externalPeopleEvent;

class StaffEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Mostrar todos los eventos
        $events = event::with('guest')->get();

        return view('staff.events', compact('events'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Mostrar 1 evento
        $events = event::where('id', $id)->first();
        return view('staff.attendanceEvent', compact('events') );
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
        if($request->has('enrollmentStudentEvent')){
            //REGISTRAR ENTRADA ESTUDIANTE

            $student = new student();
            $student->enrollment = $request->enrollmentStudentEvent;
            $student->fullName = $request->fullNameStudentEvent;

            if($student->save()){
                $eventStudent = new eventStudent();
                $eventStudent->event = $id;
                $eventStudent->student = $request->enrollmentStudentEvent;
                $eventStudent->attended = true;

                if($eventStudent->save()){
                    session()->flash("status","Asistencia registrada");
                }else{
                    session()->flash("status","Hubo un problema en la asistencia");
                }

                return redirect()->route('staffEvento.index');

            }else{
                session()->flash("status","Hubo un problema en la asistencia");
            }

        }else{
            //REGISTRAR ENTRADA EXTERNO

            $externalPeople = new externalPeople();
            $externalPeople->fullName = $request->regEventExternal;
            $externalPeople->genre = $request->genre;

            if($externalPeople->save()){
                $externalPeopleEvent = new externalPeopleEvent();
                $externalPeopleEvent->externalPeople = $externalPeople->id;
                $externalPeopleEvent->event = $id;
                $externalPeopleEvent->attended = true;

                if($externalPeopleEvent->save()){
                    session()->flash("status","Asistencia registrada");
                }else{
                    session()->flash("status","Hubo un problema en la asistencia");
                }

                return redirect()->route('staffEvento.index');

            }else{
                session()->flash("status","Hubo un problema en la asistencia");
            }
        }

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
