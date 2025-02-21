<div>
    @if ($btnOpen == "create")
        <x-elements.btn-modal
            logo="create"
            wire:click="openModal"
            class="btn btn-accent my-2">
            {{ $btnOpen }}
        </x-elements.btn-modal>
    @elseif ($btnOpen == "update")
        <x-elements.btn-modal
            logo="update"
            wire:click="openModal"
            styleLogo="w-[2em] h-[2em]"
            class="btn btn-accent my-2" />
    @endif

    @if ($isOpen)
        <div class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center transition-all"
            wire:click="closeModal">
            <div class="container absolute top-20 md:top-[2em] max-w-[100%] md:max-w-[60%] lg:max-w-[50%] bg-white rounded-xl py-[2em] px-[2em]" @click.stop>
                <x-elements.btn-close
                    wire:click='closeModal'
                    class="absolute top-2 right-4 cursor-pointer" />

                @switch($for)
                    @case('create')
                        <livewire:form-create-todo
                            :btnSubmit="$btnSubmit"
                            :dropDownItems="$dropDownItems"
                            :method="$method" />
                        @break
                    @case('update')
                        <livewire:form-update-todo
                            :btnSubmit="$btnSubmit"
                            :dropDownItems="$dropDownItems"
                            :method="$method" />
                        @break
                    @default
                        
                @endswitch

            </div>
        </div>
    @endif
</div>
