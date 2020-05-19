<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    public function index(){
        $users = User::where('id', '!=', Auth::user()->id)->get();
        return view('admin.usersIndex', [
            'users' => $users,
        ]);
    }

    public function changePermissions (User $user) {
        $user->update([
            'isAdmin' => !$user->isAdmin,
        ]);
        return redirect()->route('users.index');
    }

    public function editarPerfil(Request $form){

        $reglas = [
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
        $this->validate($form, $reglas);
            
        $ruta = $form->file('profile_img')->store('public/user_profile_pictures');
        $user = User::find($form->id);
        $user->name = $form->name;
        $user->last_name = $form->last_name;
        $user->email = $form->email;
        $user->profile_img_url = basename($ruta);
        if($form->password){
            $user->password = Hash::make($form->password);
        }
        $user->save();

        return redirect('/perfil');
    }
}
