<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create(){
        return view('users.register');
    }

    public function register(Request $request){
        $data = $request->all();

        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()->route('user.login');
    }
}
