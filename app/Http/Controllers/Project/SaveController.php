<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Completed;
use App\Models\Favorite;
use App\Models\Project;
use App\Models\Read;
use App\Models\Stop;
use Illuminate\Http\Request;
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


    public function store(Request $request)
    {
        $data = $request->all();
        $project = Project::find($data['project_id']);
        
        $userId = Auth::user()->id;

        
        $projectFav = Favorite::where('project_id', $project->id)->where('user_id', $userId)->exists();
        $projectComp = Completed::where('project_id', $project->id)->where('user_id', $userId)->exists();
        $projectRead = Read::where('project_id', $project->id)->where('user_id', $userId)->exists();
        $projectStop = Stop::where('project_id', $project->id)->where('user_id', $userId)->exists();


        if ($data['save'] == 'read' or $data['save'] == 'stop' or $data['save'] == 'favorite' or $data['save'] == 'completed') {
            if ($projectFav) {
                Favorite::where('project_id', $project->id)->where('user_id', Auth::user()->id)->delete();
            }

            if ($projectComp) {
                Completed::where('project_id', $project->id)->where('user_id', Auth::user()->id)->delete();
            }

            if ($projectRead) {
                Read::where('project_id', $project->id)->where('user_id', Auth::user()->id)->delete();
            }

            if ($projectStop) {
                Stop::where('project_id', $project->id)->where('user_id', Auth::user()->id)->delete();
            }

            if ($data['save'] == 'read') {
                if ($projectRead) {
                    Read::where('project_id', $project->id)->where('user_id', $userId)->delete();
                    return back()->with('deleted', "$project->title removido dos lerei.");
                } else {
                    $project->read()->create($data);
                    return back()->with('success', "$project->title adicionado aos lerei.");
                }
            } else if ($data['save'] == 'stop') {
                if ($projectStop) {
                    Stop::where('project_id', $project->id)->where('user_id', $userId)->delete();
                    return back()->with('deleted', "$project->title removido dos parei.");
                } else {
                    $project->stop()->create($data);
                    return back()->with('success', "$project->title adicionado aos parei.");
                }
            } else if ($data['save'] == 'completed') {
                if ($projectComp) {
                    Completed::where('project_id', $project->id)->where('user_id', $userId)->delete();
                    return redirect()->back()->with('deleted', "$project->title removido dos lidos.");
                } else {
                    $project->completed()->create($data);
                    return back()->with('success', "$project->title adicionado aos lidos.");
                }
            } else if ($data['save'] == 'favorite') {
                if ($projectFav) {
                    Favorite::where('project_id', $project->id)->where('user_id', Auth::user()->id)->delete();
                    return back()->with('deleted', "$project->title removido dos favoritos.");
                } else {
                    $project->favorite()->create($data);
                    return back()->with('success', "$project->title adicionado aos favoritos.");
                }
            }
        }
    }

}
