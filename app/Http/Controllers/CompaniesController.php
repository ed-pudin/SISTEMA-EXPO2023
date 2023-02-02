<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\company;
use \App\Models\guest;
use \App\Models\companyPeople;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Obtener empresas

        $companies = \App\Models\company::orderby('nameCompany', 'asc')->get();

        return view('admin.companies', compact('companies'));

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
        //Crear empresa
        $company = new \App\Models\company();
        $company->nameCompany = $request->regCompanyName;

        if($company->save()){
            session()->flash("status","Empresa registrada");
        }else{
            session()->flash("status","Hubo un problema en el registro");
        }
        return redirect()->route('adminRegistroEmpresas.index');
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
        $company = company::find($id);
        $company->nameCompany = $request->editCompanyName;

        if($company->save()){
            session()->flash("update","Edición en empresa exitosa");
        }else{
            session()->flash("update","Hubo un error, intente de nuevo");
        }
        return redirect()->route('adminRegistroEmpresas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = company::find($id);

        $companyPeople = companyPeople::with('company')
        ->whereHas('company', function ($query) use($id) {
            $query->where('id', '=', $id);
        })->count();

        $guest = guest::with('company')
        ->whereHas('company', function ($query) use($id) {
            $query->where('id', '=', $id);
        })->count();


        if($companyPeople > 0 || $guest > 0){
            //Checar relacion entre guest y events
            session()->flash("delete","La empresa pertenece a alguien y no puede ser eliminada");
        }else{

            if($company->delete()){
                session()->flash("delete","Se ha eliminado correctamente $company->nameCompany");
            }else{
                session()->flash("delete","Algo salió mal");
            }
        }
        return redirect()->route('adminRegistroEmpresas.index');
    }
}
