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

            //Preguntar si esta el estudante registrado
            $tempStudent = student::where('enrollment', '=', $request->enrollmentStudentEvent)->first();

            if($tempStudent == null){
                //No existe
                $student = new student();
                $student->enrollment = $request->enrollmentStudentEvent;
                $student->fullName = $request->fullNameStudentEvent;

                if(!($student->save()))
                    session()->flash("status","Hubo un problema en la asistencia");

            }else{
                //Existe estudiante
                $tempEvent = eventStudent::where('student', '=', $request->enrollmentStudentEvent)->where('event', '=', $id)->first();

                if($tempEvent != null){
                    //Asistencia repetida
                    session()->flash("status","La persona ya asistió");
                    return redirect()->back();
                }
            }


            $eventStudent = new eventStudent();
            $eventStudent->event = $id;
            $eventStudent->student = $request->enrollmentStudentEvent;
            $eventStudent->attended = true;

            if($eventStudent->save()){
                session()->flash("status","Asistencia registrada");
            }else{
                session()->flash("status","Hubo un problema en la asistencia");
            }

            return redirect()->back();

        }else{
            //REGISTRAR ENTRADA EXTERNO

            //Preguntar si esta el externo registrado
            $tempPeople = externalPeople::where('fullName', '=', $request->regEventExternal)->first();

            $idPeople;

            if($tempPeople == null){
                $externalPeople = new externalPeople();
                $externalPeople->fullName = $request->regEventExternal;
                $externalPeople->genre = $request->genre;

                if(!($externalPeople->save()))
                    session()->flash("status","Hubo un problema en la asistencia");
                $idPeople = $externalPeople->id;
            }else{
                $idPeople = $tempPeople->id;
            }

            $tempEvent = externalPeopleEvent::where('externalPeople', '=', $idPeople)->where('event', '=', $id)->first();

            if($tempEvent != null){
                //Asistencia repetida
                session()->flash("status","La persona ya asistió");
                return redirect()->back();
            }

            $externalPeopleEvent = new externalPeopleEvent();
            $externalPeopleEvent->externalPeople = $idPeople;
            $externalPeopleEvent->event = $id;
            $externalPeopleEvent->attended = true;

            if($externalPeopleEvent->save()){
                session()->flash("status","Asistencia registrada");
            }else{
                session()->flash("status","Hubo un problema en la asistencia");
            }

            return redirect()->back();

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
