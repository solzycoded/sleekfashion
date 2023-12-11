@props(['name', 'color'])

<div>
    <a href="/dashboard/orders/{{ ($name!="all" ? ('?filter=' . $name) : '') }}" 
        {{ $attributes(["class" => ((request()->has('filter') && request('filter')==$name) ? 'disabled ' : '') . "btn text-white btn-" . $color . " me-3 text-capitalize"]) }}>
        {{ $name }}
    </a>
</div>