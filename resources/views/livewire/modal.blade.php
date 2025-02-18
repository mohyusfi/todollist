<div>
    <x-elements.btn-modal wire:click="openModal" class="btn btn-primary">{{ $btnOpen }}</x-elements.btn-modal>
    @if ($isOpen)
        <div class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
            <div class="container max-w-[40%] min-w-50 bg-white rounded-xl py-3 px-3">
                <form wire:submit.prevent="{{ $method }}">
                    <x-elements.text-input
                        placeholder="Enter Your Title Todo"
                        class="border-none focus:ring-0 focus:outline-none w-[100%] text-black"
                        wire:model='title'
                        name="title"
                        />

                    <x-elements.text-area
                        placeholder="Description"
                        class="border-none focus:ring-0 focus:outline-none w-[100%] scrollbar-hidden text-black"
                     />

                    <div class="flex gap-3">
                        <x-elements.btn-modal type="button" wire:click="closeModal" class="btn btn-outline btn-error">{{ $btnClose }}</x-elements.btn-modal>
                        <x-elements.btn-modal type="submit" class="btn btn-primary">{{ $btnSubmit }}</x-elements.btn-modal>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
