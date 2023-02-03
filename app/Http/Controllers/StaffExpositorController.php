<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\projectStudent;

class StaffExpositorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Se muestra la pagina para leer el codigo qr
        return view('staff.attendanceExpositor');
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
        $projects = projectStudent::where('student', '=', $request->matricula)->get();

        if($projects != null){
            foreach ($projects as $projectStudent) {
                if($projectStudent->attended == true){
                    session()->flash("status","El alumno ya tiene asistencia");
                }else{
                    $projectStudent->attended = true;
                    if($projectStudent->save()){
                        session()->flash("status","Asistencia alumno ".$request->matricula);
                    }else{
                        session()->flash("status", "Hubo un problema en la asistencia");
                    }
                }

            }

        }else{
            session()->flash("status", "El alumno no es válido");
        }

        return redirect()->route('staffExpositor.index');
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
