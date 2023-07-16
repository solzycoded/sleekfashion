@props(['categories'])

<div {{ $attributes(["class" => "tab-pane fade"]) }} role="tabpanel">
    {{-- categories --}}
    <x-home.shopbycategory.category-list :categories="$categories" :gender="$attributes['id']" />

    {{-- content --}}
    <x-home.shopbycategory.products.section :categories="$categories" :gender="$attributes['id']" />
</div>