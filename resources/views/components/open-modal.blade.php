@props(['target'])

@php
    $target = 'open-' . $target;
@endphp

@if(session()->has($target))
    <span id="{{ $target }}" status="true" class="d-none"></span>
@endif