<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;


class ContactController extends Controller
{
    public function store(ContactRequest $request){
        $reqAux = $request->validated();
        dd($reqAux);
        // return 'Datos validados';  
    }
};
