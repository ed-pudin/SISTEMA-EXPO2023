<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\student;
use App\Models\project;
use App\Models\projectStudent;

class TeacherCreatesExpositorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Crear expositor - TEACHER
        return view('teacher.index');
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
        $numStudents = $request->inputCount;
        $semester = $request->semester;
        $ua = $request->UA;
        $projectName = $request->nameProject;

        $project = new project();
        $project->semester = $semester;
        $project->subject = $ua;
        $project->nameProject = $projectName;

        $project->save();

        for($i = 0; $i < $numStudents; $i++) {

            $fullName = $request->{"name".$i};
            $arrayName = explode(" ",$fullName);
            $enrollment = $request->{"enrollment".$i};

            $firstName = $arrayName[0];
            $lastName = $arrayName[1]." ".$arrayName[2];

            $user = new User(['key'=> $enrollment,
                'password' => (strtolower(str_replace(' ', '', $lastName))."_".$enrollment),
                'rol' => 'expositor', 
                'permanent'=> false
            ]);

            if($user->save()) {
                $student = new student();

                $student->enrollment = $enrollment;
                $student->fullName = $fullName;

                $student->save();

                $projectStudent = new projectStudent();
                $projectStudent->project = $project->id;
                $projectStudent->student = $enrollment;
                $projectStudent->attended = false;
                                
                $projectStudent->save();
            }

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
