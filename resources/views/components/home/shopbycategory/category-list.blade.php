@props(['categories', 'gender'])

@php
    $gender = $gender=='nav-women' ? 'women' : 'men';
@endphp

<ul class="nav nav-pills justify-content-center mb-5" id="pills-tab-{{ $gender }}" role="tablist">
    @foreach ($categories as $i => $category)
        <x-home.shopbycategory.category-card :category="$category" :gender="$gender" :pos="$i" />
    @endforeach
</ul>