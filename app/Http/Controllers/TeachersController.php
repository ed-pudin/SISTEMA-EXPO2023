<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User; 
use App\Models\teacher; 

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = teacher::with('user')->get();

        return view('admin.teachers', compact('teachers'));
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
        $randomKey = random_int(1000000, 9999999);

        $user = new User(['key'=> $randomKey, 
                    'password' => Str::random(13), 
                    'rol' => 'teacher', 
                    'permanent'=> true]);

        if($user->save()){

            //Crear maestro
            $teacher = new teacher();
            $teacher->fullName = $request->regTeacherName;
            $teacher->email = $request->regTeacherCorreo;        
            $teacher->user = $user->id;
            
            if($teacher->save()){
                session()->flash("status","Maestro registrado");
            }else{
                session()->flash("status","Hubo un problema en el registro");
            }
            return redirect()->back(); 

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
