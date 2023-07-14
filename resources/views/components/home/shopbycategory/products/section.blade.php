@props(['categories', 'gender'])

@php
    $gender = $gender=='nav-women' ? 'women' : 'men';
@endphp

<div class="tab-content" id="pills-tabContent{{ $gender }}">
    @foreach ($categories as $category)
        <x-home.shopbycategory.products.in-category :category="$category" :gender="$gender" />
    @endforeach
</div>