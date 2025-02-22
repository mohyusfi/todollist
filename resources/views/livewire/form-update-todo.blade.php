<form wire:submit.prevent="{{ $method }}">
    @if (session()->has('success'))
        <x-alert
            :message="session('success')"
            type="alert-success" />
    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $index => $message)
            @if ($index === 0)
            <x-alert
                :message="$message"
                type="alert-error" />
            @endif
        @endforeach
    @endif
    <x-elements.text-input
        placeholder="Update new todo"
        class="border-b-4 border-x-0 border-t-0 focus:ring-0 focus:outline-none w-[100%] text-black"
        type="text"
        wire:model="form.title"
        name="title"/>

    <x-elements.text-area
        placeholder="Description"
        class="border-b-4 border-x-0 border-t-0 rounded-md focus:ring-0 focus:outline-none w-[100%] scrollbar-hidden text-gray-600"
        wire:model="form.description"
        name="description" />

    <div class="mb-3 flex gap-5 items-end">
        <x-elements.input-date
            type="date"
            wire:model="form.deadline"
            name="deadline"
            class="rounded-md"
            label="Deadline:" />

        <x-dropdown-menu
            :items="$dropDownItems"
            dropDown="Priority"
            :defaultValue="$olderTodo->priority"
            wire:model="form.priority"
            name="priority"/>

            {{-- {{ $olderTodo->priority }} --}}
    </div>

    <div class="flex gap-3">
        <x-elements.btn-modal
            logo="update"
            type="submit"
            btn="update"
            usename="update"
            class="btn btn-accent"
        />
    </div>
</form>
