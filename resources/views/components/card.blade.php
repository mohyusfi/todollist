@props(['id', 'title', 'description', 'created', 'priority'])

@php
    $priorityColor;
    switch ($priority) {
        case 'low':
            $priorityColor = 'bg-green-400';
            break;
        case 'medium':
            $priorityColor = 'bg-yellow-400';
            break;
        case 'high':
            $priorityColor = 'bg-red-400';
            break;

        default:
            # code...
            break;
    }
@endphp


<div class="grid grid-cols-3 grid-cols-[3em_minmax(80%,_1fr)_1fr] border-b-2 border-gray-400 bg-blue-50 rounded-md">
    <div class="justify-self-center">
        <x-elements.radio-button
            class="cursor-pointer transition-all duration-[.2s]"
            value="{{ $id }}"
            {{ $attributes->whereStartsWith('wire:') }}
            />
    </div>
    <div class="grid grid-rows-3 grid-rows-[1.7em_2fr_2em] py-1" wire:poll.60s>
        <div class="text-gray-900 font-serif flex gap-2 md:gap-1 align-self-center">
            <h2>{{ $title }}</h2>
            <span>|</span>
            <span class="font-mono capitalize {{ $priorityColor }} text-center rounded-md px-2">{{ $priority }}</span>
        </div>
        <div class="text-gray-400 text-sm font-mono line-clamp-3 text-justify overflow-hidden pe-3 md:pe-0">
            {{ $description }}
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque voluptatum nihil eligendi placeat saepe ducimus cupiditate soluta aliquam sequi corporis error delectus illo, non voluptatibus vitae quo quam id tempore.
        </div>
        <div class="align-self-center">
            <cite class="text-red-400 text-xs">{{ $created }}</cite>
        </div>
    </div>
    <div class="">
        
    </div>
</div>
