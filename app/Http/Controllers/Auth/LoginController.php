<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('users.login');
    }

    public function auth(Request $request)
    {
        if (Auth::attempt(['email' => $request->email , 'password' => $request->password])) {
            return redirect()->route('project.index')->with('success', 'Login feito com sucesso.');
        }
    }
}
