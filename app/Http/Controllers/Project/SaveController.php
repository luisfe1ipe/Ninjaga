<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Completed;
use App\Models\Favorite;
use App\Models\Project;
use App\Models\Read;
use App\Models\Stop;
use Illuminate\Support\Facades\Auth;

class SaveController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
    }

    public function index($type)
    {
        if($type == 'favorites'){
            $favorites =  Favorite::where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->get();
            return view('save.index', compact('favorites'));
        }else if($type == 'completeds'){
            $completeds = Completed::where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->get();
            return view('save.index', compact('completeds'));
        }else if($type == 'reads'){
            $reads = Read::where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->get();
            return view('save.index', compact('reads'));
        }else if($type == 'stops'){
            $stops = Stop::where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->get();
            return view('save.index', compact('stops'));
        }
    }
}
