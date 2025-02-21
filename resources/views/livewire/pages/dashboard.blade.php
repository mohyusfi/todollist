<div class="py-12 px-4 md:px-0">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-sm sm:rounded-t-lg bg-emerald-400">
            <div class="p-6 text-gray-900 font-serif">
                {{ __('Today Todo') }}
            </div>
        </div>
        <div class="shadow-lg">
            @foreach ($todos?->all() ?? [] as $todo)
                @livewire('todolist-list', [
                    "todo" => $todo
                ], key($todo->id))
            @endforeach
        </div>
        <livewire:modal
            for="create"
            :dropDownItems="['low', 'medium', 'high']"
            titleModal="Insert New Todo"
            btnOpen="create"
            btnSubmit="create"
            method="create" />
    </div>
</div>
