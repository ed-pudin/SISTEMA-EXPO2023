<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Message;
//se App\Mail\Controllers\Mail;
use Illuminate\Support\Facades\Mail;
class EmailController extends Controller
{
        public function email($email)
    {
        Mail::to('edna_alex@hotmail.es')->send(new Message());
    }

}
