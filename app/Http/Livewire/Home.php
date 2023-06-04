<?php

namespace App\Http\Livewire;

use App\Models\Chapter;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $mostFavoritesProjects = Project::where('visible', '=', 1)
            ->with('type')
            ->take(10)
            ->get();

        $recentProjects = Project::with(['type', 'chapters'])
            ->leftJoinSub(function ($query) {
                $query->select('project_id', DB::raw('MAX(created_at) as latest_chapter_created_at'))
                    ->from('chapters')
                    ->groupBy('project_id');
            }, 'latest_chapters', 'projects.id', '=', 'latest_chapters.project_id')
            ->orderByDesc('latest_chapters.latest_chapter_created_at')
            ->paginate(15);

        return view('livewire.home', [
            'mostFavoritesProjects' => $mostFavoritesProjects,
            'recentProjects' => $recentProjects,
        ]);
    }

    public function openProject($id)
    {
        redirect()->route('project.show', ['id' => $id]);
    }

    public function openChapter($projectId, $chapterId)
    {
        redirect()->route('chapter.show', ['id' => $projectId, 'chapterId' => $chapterId]);
    }
}
