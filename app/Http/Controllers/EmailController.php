<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Message;
use Illuminate\Support\Facades\Mail;
use App\Models\teacher;

class EmailController extends Controller
{
    public function email($id)
    {
        $teacher = teacher::where('id', '=', $id)->first();


        if(!(Mail::to($teacher->email)->send(new Message($id)))){
            session()->flash("email","Hubo un problema en el envio del correo");
        }else{
            session()->flash("email","Correo enviado exitosamente");
        }
        return redirect()->route('adminRegistroMaestros.index');
    }

}
