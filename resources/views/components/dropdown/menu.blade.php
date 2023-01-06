<div class="menu">
    <button id="dropdownButton" data-dropdown-toggle="dropdown"
        class="inline-block text-[#f2f2f2] bg-[#28282E] hover:bg-gray-500 rounded-tr text-sm p-1.5"
        type="button">
        <span class="sr-only">Open dropdown</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path
                d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
            </path>
        </svg>
    </button>
    <!-- Dropdown menu -->
    <div id="dropdown"
        class="z-10 hidden text-base list-none divide-y divide-gray-100 rounded shadow w-44 bg-[#28282E]">
        <ul class="py-1 cursor-pointer" aria-labelledby="dropdownButton">

            {{$slot}}
        </ul>
    </div>
</div>