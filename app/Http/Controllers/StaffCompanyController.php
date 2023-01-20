<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\companyPeople;

class StaffCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = \App\Models\company::all();

        return view('staff.companies', compact('companies'));
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
        //id
        $company = \App\Models\company::find($id);
        $companyPeople = companyPeople::where('company', '=',$id)->get();

        return view('staff.attendanceCompany', compact('company', 'companyPeople'));
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
        //MARCAR ASISTENCIA 
        //Obtener el id de la company_people con el where de company
       
        $companyPeople = companyPeople::where('company', '=',$id)->get();
        //lista

        for($i= 0; $i < $request->countInputsOld; $i++)
        {
            $companyPeople[$i]->fullName = $request->{'name'.$i};
            $companyPeople[$i]->company = $request->idCompany;

            if($request->has('attendance'.$i))
            {
                //checkbox active 
                $companyPeople[$i]->attended = true;
                if(!($companyPeople[$i]->save())){
                    session()->flash("status","Hubo un problema.");
                    return redirect()->back();
                }
            }else{
                $companyPeople[$i]->attended = false;
                if(!($companyPeople[$i]->save())){
                    session()->flash("status","Hubo un problema.");
                    return redirect()->back();
                }
            }
            
        }

        if($request->countInputsNew > 0){
            for($j= $request->countInputsOld; $j <= $request->countInputsOld- $request->newInputs; $j++)
            {
                $companyPeople = new companyPeople();
    
                $companyPeople->fullName = $request->{'name'.$j};
                $companyPeople->company = $request->idCompany;
                $companyPeople->attended = false;
    
                if($request->has('attendance'.$j))
                {
                    //checkbox active 
                    $companyPeople->attended = true;
                    if(!($companyPeople->save())){
                        session()->flash("status","Hubo un problema.");
                        return redirect()->back();
                    }
                }else{
                    $companyPeople->attended = false;
                    if(!($companyPeople->save())){
                        session()->flash("status","Hubo un problema.");
                        return redirect()->back();
                    }
                }
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
