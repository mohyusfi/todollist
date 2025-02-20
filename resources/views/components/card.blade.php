@props(['id', 'title', 'description', 'created'])


<div class="flex align-content-center p-2 px-5 border-b-2 border-gray-400 bg-blue-50 rounded-md">
    <div>
        <x-elements.radio-button
            class="cursor-pointer transition-all duration-[.2s]"
            value="{{ $id }}"
            {{ $attributes->whereStartsWith('wire:') }}
            />
    </div>
    <div class="ms-3" wire:poll.60s>
        <div class="text-gray-900 font-serif">{{ $title }}</div>
        <div class="text-gray-400 text-sm font-mono">{{ $description }}</div>
        <cite class="text-red-400 text-xs">{{ $created }}</cite>
    </div>
</div>
