<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\event;
use App\Models\company;

class WelcomeController extends Controller
{
    //
    public function index(){

        $conferencias = event::where('typeEvent','=', 'Conferencia')->get();

        $mesasRedondas = event::where('typeEvent','=', 'Mesa Redonda')->get();

        $masterClasses = event::where('typeEvent','=', 'Master Class')->get();

        $torneos = event::where('typeEvent','=', 'Torneo')->get();

        $otros = event::where('typeEvent','!=', 'Conferencia')
                ->where('typeEvent','!=', 'Mesa Redonda')
                ->where('typeEvent','!=', 'Master Class')
                ->where('typeEvent','!=', 'Torneo')
                ->get();

        $companies = company::all();

        if(session()->has('id')){
            $id = session()->get('id');
            $user = new User();
            $user = User::where('id', '=', $id)->first();
            if($user != null){
                $rol = $user->rol;
                return view('welcome', compact('rol', 'companies', 'conferencias', 'mesasRedondas', 'masterClasses', 'torneos', 'otros'));
            }
        }

        return view('welcome', compact('companies', 'conferencias', 'mesasRedondas', 'masterClasses', 'torneos', 'otros'));
    }
}
