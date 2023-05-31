<div>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <x-my.title icon='bar_chart' colorIcon='text-red-500' sizeIcon='text-3xl' text='Mais Vistos' />

                <div class="flex items-center gap-8 w-full overflow-x-scroll pb-5">
                    @foreach ($mostFavoritesProjects as $favProject)
                        <x-my.card-project :project="$favProject"/>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
