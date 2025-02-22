@props(['defaultValue' => null, 'dropDown', 'items'])

<select {{ $attributes->only('wire:model')->class('w-[8em] h-[2.5em] rounded-md') }}>
    {{-- <option value="" hidden {{ $defaultValue === null ? "selected" : "" }}>{{ $dropDown }}</option> --}}
    @foreach ($items as $index => $value)
        <option value="{{ $value }}" class="capitalize"
        @if(strtolower($defaultValue) === strtolower($value)) selected @endif>
            {{ $value }}
        </option>
    @endforeach
</select>
