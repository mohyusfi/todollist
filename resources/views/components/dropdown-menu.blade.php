<select {{ $attributes->only('wire:model')->class('w-[8em] h-[2.5em] rounded-md') }}>
    <option value="" hidden selected>{{ $dropDown }}</option>
    @foreach ($items as $index => $value)
        <option value="{{ $value }}" class="capitalize">{{ $value }}</option>
    @endforeach
</select>
