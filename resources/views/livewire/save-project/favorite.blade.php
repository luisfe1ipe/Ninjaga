<div class=" px-4 py-2 text-sm hover:bg-[#000000]  hover:text-red-500 text-white flex items-center gap-1.5
    @if($fav->where('project_id', $projectId)->exists() == true) 
        text-red-500 
    @endif
">
    <i class="material-icons text-lg">
        favorite
    </i>
    <a href="#" wire:click.prevent="favorite({{ $projectId }})">Favorito</a>
</div>
