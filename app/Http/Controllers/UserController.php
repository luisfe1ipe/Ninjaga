<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

    }

    public function create(){
        return view('users.register');
    }

    public function store(Request $request){
        $data = $request->all();

        User::create($data);
    }

    public function edit(){
        
    }

    public function update(){

    }

    public function login(){

    }

    public function logout(){

    }

    public function destroy(){

    }
}
