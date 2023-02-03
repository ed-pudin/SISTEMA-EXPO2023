<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\companyPeople;

class AdminPersonCompany extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        for($i = 0; $i < $request->countInputs; $i++){

            if(!(is_null($request->{'name'.$i}))) {
                $person = new companyPeople();

                $person->fullName = $request->{'name'.$i};
                $person->company = $request->idCompany;
                $person->attended = false;

                if(!($person->save())){
                    session()->flash("status","Hubo un problema. Verifique el nombre: ". $person->fullName);
                }
            }
        }

        session()->flash("status","Registro exitoso");
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
        //Mostrar el id de la empresa
        $company = \App\Models\company::find($id);
        $companyPeople = companyPeople::where('company', '=',$id)->get();

        return view('admin.personCompany', compact('company', 'companyPeople'));
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
        echo("Edit");
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
        $person = companyPeople::find($id);

        $person->fullName = $request->{'editNameCompanyPeople_'.$id};

        if($person->save()){
            session()->flash("update","Edición del nombre de la persona exitosa");
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
        //
    }
}
