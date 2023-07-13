@props(['category', 'gender', 'pos'])

@php
    $id = ($gender ? 'w' : '') . $category->name;
@endphp

<li class="nav-item" role="presentation">
    <button class="nav-link text-capitalize {{ ($pos==0 ? 'active' : '') }}"
        id="pills-{{ $id }}-tab" 
        data-bs-toggle="pill" 
        data-bs-target="#pills-{{ $id }}" 
        type="button" role="tab" 
        aria-controls="pills-{{ $id }}" 
        aria-selected="true">

        {{ $category->name }}
    </button>
</li>