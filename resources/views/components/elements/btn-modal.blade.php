@props(["usename" => "hidden", "logo"])

@php
    if ($logo == "create") {
        $logo = "fa fa-plus-circle fa-1x";
    } else if ($logo == "update") {
        $logo = "fa fa-pencil-square-o";
        $spanHidden = "hidden";
    }
@endphp

<div>
    <button {{ $attributes->merge() }}>
        <i class="{{ $logo }}" aria-hidden="true"></i>
        <span class="{{ $usename }}">
            {{ $usename }}
        </span>
    </button>
</div>
