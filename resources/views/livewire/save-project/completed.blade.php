<div class=" px-4 py-2 text-sm hover:bg-[#000000]  hover:text-green-500 text-white flex items-center gap-1.5
    @if($comp->where('project_id', $projectId)->exists() == true) 
        text-green-500 
    @endif
">
    <i class="material-icons text-lg">
        check
    </i>
    <a href="#" wire:click.prevent="completed({{ $projectId }})">Lido</a>
</div>
