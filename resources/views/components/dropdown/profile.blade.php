<img id="avatarButton" type="button" src="{{ asset('img/guts.png') }}" alt="User dropdown"
data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start"
class="w-10 h-10 rounded-full cursor-pointer">

<!-- Dropdown menu -->
<div id="userDropdown" class="z-10 hidden divide-y divide-gray-600 rounded shadow w-44 bg-[#28282E]">
    <div class="py-1  text-base text-[#F2F2F2]">
        <a href="#" class="flex items-center gap-1.5 block px-4 py-2 text-base hover:bg-[#000000] text-white"><i class="material-icons text-lg">person</i> Perfil</a>
    </div>
    <ul class="py-1 cursor-pointer" aria-labelledby="avatarButton">
        {{$slot}}
    </ul>
    <div class="py-1">
        <a href="#" class="flex items-center gap-1.5 block px-4 py-2 text-base hover:bg-[#000000] text-white"><i class="material-icons text-lg">exit_to_app	</i> Logout</a>

    </div>
</div>