@props(['categories', 'gender'])

@php
    $gender = $gender=='nav-women' ? 'women' : 'men';
@endphp

<div class="tab-content" id="pills-tabContent{{ $gender }}">
    @foreach ($categories as $i => $category)
        <x-home.shopbycategory.products.in-category class="{{ ($i==0 ? 'show active' : '') }}" :category="$category" :gender="$gender" />
    @endforeach
</div>