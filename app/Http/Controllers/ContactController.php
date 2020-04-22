<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(){
        request()->validate([
            'name' => 'max:30|required',
            'email' => 'required|email',
            'message' => 'max:300|required'
        ]);
        return 'Datos validados';
    }
};
