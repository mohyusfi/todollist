<div class="flex align-content-center p-2 px-5 border-b-2 border-gray-400 bg-blue-50 rounded-md">
    <div>
        <x-elements.radio-button class="cursor-pointer transition-all"></x-elements.radio-button>
    </div>
    <div class="ms-3">
        <div class="text-gray-900 font-serif">{{ $title }}</div>
        <div class="text-gray-400 text-sm font-mono">{{ $description }}</div>
        <cite class="text-red-400 text-xs">{{ $created }}</cite>
    </div>
</div>
