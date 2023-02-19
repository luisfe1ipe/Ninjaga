<div class=" px-4 py-2 text-sm hover:bg-[#000000]  hover:text-slate-500 text-white flex items-center gap-1.5
    @if($stop->where('project_id', $projectId)->exists() == true) 
        text-slate-500 
    @endif
">
    <i class="material-icons text-lg">
        lock
    </i>
    <a href="#" wire:click.prevent="stop({{ $projectId }})">Parei</a>
</div>
