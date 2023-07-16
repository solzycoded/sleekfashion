@props(['category', 'gender'])

@php
  $id = ($gender=='women' ? 'w' : '') . $category->name;

  $gender = $gender=='women' ? 'female' : 'male';
  $products = $category->findProductsByGender($gender);

  $intervals = ['10000', '5000', '3000', '0'];
@endphp

<div {{ $attributes(["class" => "tab-pane fade"])}} id="pills-{{ $id }}" role="tabpanel" aria-labelledby="pills-{{ $id }}-tab">

  <div class="carousel slide" id="carouselCategory{{ $id }}" data-bs-touch="false" data-bs-interval="false">
    <div class="carousel-inner">

      @foreach ($products->chunk(4) as $i => $items)
        <x-home.shopbycategory.products.list :products="$items" data-bs-interval="{{ $intervals[$i] }}" class="{{ ($i==0 ? 'active' : '') }}" />
      @endforeach

    </div>
  </div>

  <div class="col-12 d-flex justify-content-center mt-5">
    <a class="btn btn-lg btn-dark" href="/?category={{ $category->name }}&gender={{ $gender }}">View All </a>
  </div>

</div>