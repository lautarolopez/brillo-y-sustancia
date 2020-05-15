<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
}
