<div>
    <button {{ $attributes->merge() }}>
        <i class="fa fa-plus-circle" aria-hidden="true"></i>
        <span>
            {{ $slot }}
        </span>
    </button>
</div>
