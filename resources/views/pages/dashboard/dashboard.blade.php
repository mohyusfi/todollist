<x-layouts.app>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-2">
                <div class="p-6 text-gray-900">
                    {{ __('Today Todo') }}
                </div>
                @livewire('todolist-list')
            </div>
            <livewire:modal
                titleModal="Insert New Todo"
                btnOpen="add todo"
                btnClose="cancel"
                btnSubmit="Submit"
                method="create" />
        </div>
    </div>
</x-layouts.app>
