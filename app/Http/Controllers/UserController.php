<?php

namespace App\Http\Controllers;

use App\Models\Completed;
use App\Models\Favorite;
use App\Models\Read;
use App\Models\Stop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show($id)
    {
        if (!$user = User::with(['favorites', 'completeds', 'reads', 'stops'])->first()) {
            return redirect()->back();
        }

        $favorites = Favorite::where('user_id', Auth::user()->id)->with(['project'])->orderBy('updated_at', 'desc')->limit(10)->get();
        $completeds = Completed::where('user_id', Auth::user()->id)->with(['project'])->orderBy('updated_at', 'desc')->limit(10)->get();
        $reads = Read::where('user_id', Auth::user()->id)->with(['project'])->orderBy('updated_at', 'desc')->limit(10)->get();
        $stops = Stop::where('user_id', Auth::user()->id)->with(['project'])->orderBy('updated_at', 'desc')->limit(10)->get();


        return view('users.profile', compact('user', 'favorites', 'completeds', 'reads', 'stops'));
    }
}
