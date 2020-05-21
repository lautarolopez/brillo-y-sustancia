<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class ContactController extends Controller {


    public function send(Request $request){

        $mensajes = [ 
            "string" => "El campo :attribute debe ser un texto", 
            "email" => "El campo :attribute debe ser un email",
            "required" => "El campo :attribute no debe estar vacio"
        ];
        $this->validate($request, [
            'name'     =>  'required|string',
            'email'  =>  'required|email',
            'message' =>  'required|string'
        ], $mensajes);
     
        $data = array(
            'name'      =>  $request->input('name'),
            'email'  =>  $request->input('email'),
            'message'   =>   $request->input('message')
        );

        $email = 'edtejerina.work@gmail.com'; //email de prueba donde llegaran los formularios de contacto

        Mail::to($email)->send(new SendMail($data));

        return back()->with('success', 'Mensaje enviado exitosamente!');
    }
}

?>