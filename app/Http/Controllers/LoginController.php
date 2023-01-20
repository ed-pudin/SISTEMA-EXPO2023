<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->exists('id')){
            session()->flush();
        }
        return view('login');
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
        $user = new User();
        $user = User::where('key', '=', $request->key, 'and')->where('password', '=', $request->pas)->first();

        if($user != null){

            $request->session()->put('id', $user->id);
            session()->save();
            if($user->rol == 'admin'){
                return redirect()->route('adminInicio.index');
            }else if ($user->rol == 'staff'){
                return redirect()->route('staffEmpresa.index');
            }else if ($user->rol == 'expositor'){
                return redirect()->route('expositorQR.index');
            }else if($user->rol == 'teacher'){
                return redirect()->route('teacherRegistroExpositor.index');
            }
        }
        else{
            session()->flash("userStatus","Contraseña o clave incorrecta");
            return redirect()->route('inicioSesion.index');
        }
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

    public function logOut(){

        return redirect('/');
    }
}
