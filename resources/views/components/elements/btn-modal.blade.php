@php
    if ($logo == "create") {
        $logo = "fa fa-plus-square-o";
    } else if ($logo == "update") {
        $logo = "fa fa-pencil-square-o";
        $spanHidden = "hidden";
    }
@endphp



<div>
    <button {{ $attributes->merge() }}>
        <i class="{{ $logo }} fa-2x" aria-hidden="true"></i>
        <span class="{{ $spanHidden ?? "" }}">
            {{ $slot }}
        </span>
    </button>
</div>
