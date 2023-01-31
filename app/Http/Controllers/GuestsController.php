<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\guest;

class GuestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = \App\Models\company::all();
        $guests = guest::with('company')->orderby('fullName', 'asc')->get();

        return view('admin.guests', compact('companies', 'guests'));
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
        //Crear invitado
        $guest = new guest();
        $guest->fullName = $request->regGuestName;
        $request->regGuestCmpany == 0 ?  $guest->company = null : $guest->company = $request->regGuestCmpany;

        if($guest->save()){
            session()->flash("status","Invitado registrado");
        }else{
            session()->flash("status","Hubo un problema en el registro");
        }
        return redirect()->route('adminRegistroInvitados.index');

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
        $guest = guest::find($id);

        $guest->fullName = $request->editGuestName;
        $request->editGuestCmpany == 0 ?  $guest->company = null : $guest->company = $request->editGuestCmpany;

        if($guest->save()){
            session()->flash("update","Edición en invitado exitosa");
        }else{
            session()->flash("update","Hubo un error, intente de nuevo");
        }
        return redirect()->route('adminRegistroInvitados.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guest = guest::find($id);

        if($guest->delete()){
            session()->flash("delete","Se ha eliminado correctamente $guest->fullName");
        }else{
            session()->flash("delete","Algo salió mal");
        }

        return redirect()->route('adminRegistroInvitados.index');
    }

    public function editarInvitado($guestToEdit) {
        $guest = guest::find($guestToEdit);
        $companies = \App\Models\company::all();

        return view('admin.edit.guest', compact('guest', 'companies'));
    }

}
