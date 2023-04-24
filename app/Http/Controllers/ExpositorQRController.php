<?php

namespace App\Http\Controllers;

use App\Models\project;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\student;
use App\Models\projectStudent;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Illuminate\Support\Arr;

class ExpositorQRController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Mostrar codigo QR - EXPOSITOR
        $attendedAllProjects = true;

        $user = User::where('id', session()->get('id'))->first();
        $student = student::where('enrollment', '=', $user->key)->first();

        $projects = projectStudent::where('student', '=', $student->enrollment)->get();

        foreach($projects as $projectStudent){
            if($projectStudent->attended != true)
            {
                $attendedAllProjects = false;
                break;
            }
        }

        return view('expositor.index', compact('student', 'projects', 'attendedAllProjects'));
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
    public function apiStoreNetworking(){

        $user = User::where('id', session()->get('id'))->first();
        $student = student::where('enrollment', '=', $user->key)->first();
        $year = Carbon::now()->format('Y');



        $client = new \GuzzleHttp\Client(['base_uri' => 'http://127.0.0.1:8000/api/']);
        $url = "http://127.0.0.1:8000/api/RegistrarAlumno";
        $response = $client->post($url, [
            'json' => [
                'regStudentName' => $student->fullName,
                'regStudentExpos' => $year,
            ]
        ]);
        $data = json_decode($response->getBody(), true);

        session()->flash("status", $data['status']);

        if(Arr::exists($data, 'correo')){
            session()->flash("correo", $data['correo']);
            session()->flash("contraseña", $data['contraseña']);
        }else{
            if(Arr::exists($data, 'msg')){
                session()->flash("msg", $data['msg']);
            }
        }

        return redirect()->route('expositorQR.index');
    }
}
