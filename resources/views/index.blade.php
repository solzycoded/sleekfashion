<x-layout.layout>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      @include('_header')

      <section class="py-11 bg-light-gradient border-bottom border-white border-5">
          <div class="bg-holder overlay overlay-light" style="background-image:url(assets/img/gallery/header-bg.png);background-size:cover;">
          </div>
          <!--/.bg-holder-->

          <div class="container">
              <div class="row flex-center">
              <div class="col-12 mb-10">
                  <div class="d-flex align-items-center flex-column">
                  <h1 class="fw-normal"> With an outstanding style, only for you</h1>
                  <h1 class="fs-4 fs-lg-8 fs-md-6 fw-bold">Exclusively designed for you</h1>
                  </div>
              </div>
              </div>
          </div>
      </section>

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-0" id="header" style="margin-top: -23rem !important;">

        <div class="container">
          <div class="row g-0">
            <div class="col-md-6">
              <div class="card card-span h-100 text-white"> <img class="img-fluid" src="assets/img/gallery/her.png" width="790" alt="..." />
                <div class="card-img-overlay d-flex flex-center"> <a class="btn btn-lg btn-light" href="/?gender=female">For Her</a></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card card-span h-100 text-white"> <img class="img-fluid" src="assets/img/gallery/him.png" width="790" alt="..." />
                <div class="card-img-overlay d-flex flex-center"> <a class="btn btn-lg btn-light" href="/?gender=male">For Him </a></div>
              </div>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-0">

        <div class="container">
          <div class="row h-100">
            <div class="col-lg-7 mx-auto text-center mt-7 mb-5">
              <h5 class="fw-bold fs-3 fs-lg-5 lh-sm">Best Deals</h5>
            </div>
            <div class="col-12">
              <div class="carousel slide" id="carouselBestDeals" data-bs-touch="false" data-bs-interval="false">
                <!-- BEST DEAL container -->

                <div class="carousel-inner">
                  <!-- best deal -->
                  @php
                    $index = 0;
                  @endphp

                  @for($i = 0; $i < 3; $i++)

                    <div class="carousel-item {{ $i==0 ? 'active' : ''}}" data-bs-interval="10000">
                      
                      <div class="row h-100 align-items-center g-2">

                        @for($in = $index; $in < count($bestDeals) && $in < ($index + 4); $in++)

                          <x-best-deal-card :product="$bestDeals[$in]"/>

                        @endfor

                      </div>

                    </div>

                    @php
                      $index = $index + 4;
                    @endphp
                    
                  @endfor
                  <!-- END best deal -->

                  <div class="row">

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselBestDeals" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#carouselBestDeals" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next </span>
                    </button>

                  </div>
                </div>
                
                <!-- end BEST DEAL container -->
              </div>
            </div>
            <div class="col-12 d-flex justify-content-center mt-5"> 
              <a class="btn btn-lg btn-dark view-all" role="button" data-bs-toggle="modal" data-bs-target="#allProductsModal">View All </a>
            </div>
          </div>
        </div>
        <!-- end of .container-->

        <!-- view all product modal -->
        <x-view-all-products :products="$allProducts" :allCategories="$allCategories" :allCollections="$allCollections" :allGenders="$allGenders" />
        <!-- END view all product modal -->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


      {{-- to be removed --}}
  <!-- Button trigger modal -->
  {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Launch static backdrop modal
  </button> --}}

  <!-- Modal -->
  {{-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem quisquam sit quas blanditiis natus ipsum eveniet, nemo iusto quod ea pariatur, esse qui nisi minus impedit dolor officia, officiis itaque.
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum voluptates dolorum ratione nobis aperiam id rem omnis laboriosam eveniet voluptas deleniti ex assumenda expedita, doloribus quod recusandae totam hic? Harum?
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt nisi veritatis quo, modi nihil harum molestiae dolores corrupti magnam aperiam laudantium, accusamus vel perferendis, perspiciatis omnis ad voluptatum earum veniam!
          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Corporis, tempora quidem nobis eum, nisi voluptatibus ad harum porro molestias ducimus quisquam doloribus quos illum nemo facere veniam optio ullam? Tempore.
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem quisquam sit quas blanditiis natus ipsum eveniet, nemo iusto quod ea pariatur, esse qui nisi minus impedit dolor officia, officiis itaque.
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum voluptates dolorum ratione nobis aperiam id rem omnis laboriosam eveniet voluptas deleniti ex assumenda expedita, doloribus quod recusandae totam hic? Harum?
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt nisi veritatis quo, modi nihil harum molestiae dolores corrupti magnam aperiam laudantium, accusamus vel perferendis, perspiciatis omnis ad voluptatum earum veniam!
          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Corporis, tempora quidem nobis eum, nisi voluptatibus ad harum porro molestias ducimus quisquam doloribus quos illum nemo facere veniam optio ullam? Tempore. Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem quisquam sit quas blanditiis natus ipsum eveniet, nemo iusto quod ea pariatur, esse qui nisi minus impedit dolor officia, officiis itaque.
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum voluptates dolorum ratione nobis aperiam id rem omnis laboriosam eveniet voluptas deleniti ex assumenda expedita, doloribus quod recusandae totam hic? Harum?
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt nisi veritatis quo, modi nihil harum molestiae dolores corrupti magnam aperiam laudantium, accusamus vel perferendis, perspiciatis omnis ad voluptatum earum veniam!
          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Corporis, tempora quidem nobis eum, nisi voluptatibus ad harum porro molestias ducimus quisquam doloribus quos illum nemo facere veniam optio ullam? Tempore. Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem quisquam sit quas blanditiis natus ipsum eveniet, nemo iusto quod ea pariatur, esse qui nisi minus impedit dolor officia, officiis itaque.
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum voluptates dolorum ratione nobis aperiam id rem omnis laboriosam eveniet voluptas deleniti ex assumenda expedita, doloribus quod recusandae totam hic? Harum?
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt nisi veritatis quo, modi nihil harum molestiae dolores corrupti magnam aperiam laudantium, accusamus vel perferendis, perspiciatis omnis ad voluptatum earum veniam!
          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Corporis, tempora quidem nobis eum, nisi voluptatibus ad harum porro molestias ducimus quisquam doloribus quos illum nemo facere veniam optio ullam? Tempore. Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem quisquam sit quas blanditiis natus ipsum eveniet, nemo iusto quod ea pariatur, esse qui nisi minus impedit dolor officia, officiis itaque.
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum voluptates dolorum ratione nobis aperiam id rem omnis laboriosam eveniet voluptas deleniti ex assumenda expedita, doloribus quod recusandae totam hic? Harum?
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt nisi veritatis quo, modi nihil harum molestiae dolores corrupti magnam aperiam laudantium, accusamus vel perferendis, perspiciatis omnis ad voluptatum earum veniam!
          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Corporis, tempora quidem nobis eum, nisi voluptatibus ad harum porro molestias ducimus quisquam doloribus quos illum nemo facere veniam optio ullam? Tempore. Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem quisquam sit quas blanditiis natus ipsum eveniet, nemo iusto quod ea pariatur, esse qui nisi minus impedit dolor officia, officiis itaque.
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum voluptates dolorum ratione nobis aperiam id rem omnis laboriosam eveniet voluptas deleniti ex assumenda expedita, doloribus quod recusandae totam hic? Harum?
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt nisi veritatis quo, modi nihil harum molestiae dolores corrupti magnam aperiam laudantium, accusamus vel perferendis, perspiciatis omnis ad voluptatum earum veniam!
          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Corporis, tempora quidem nobis eum, nisi voluptatibus ad harum porro molestias ducimus quisquam doloribus quos illum nemo facere veniam optio ullam? Tempore.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Understood</button>
        </div>
      </div>
    </div>
  </div> --}}
  {{-- to be removed --}}
 

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <x-collection.exclusive.section :exclusiveCollection="$exclusiveCollection" />
      <!-- <section> close ============================-->
      <!-- ============================================-->


      {{-- new arrivals --}}
      <x-home.new-arrivals.section :newArrivals="$newArrivals" />
      {{-- END new arrivals --}}

      {{-- shop by category --}}
      <x-home.shopbycategory.section /> 
      {{-- END shop by category --}}

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <x-home.doublecollection.section />
      <!-- <section> close ============================-->
      <!-- ============================================-->

      <x-home.products.bestsellers.section />

      <!-- ============================================-->
      <!-- <section SUMMER collection> begin ============================-->
      <x-collection.summer.section />
      <!-- <section> close ============================-->
      <!-- ============================================-->

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <x-collection.formal.section />
      <!-- <section> close ============================-->
      <!-- ============================================-->

      <x-home.outlets.section />

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <x-home.footer.section />
      <!-- <section> close ============================-->
      <!-- ============================================-->


    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->
    
    {{-- wishlist --}}
    <x-wishlist.page />

    {{-- shoppingcart --}}
    <x-shoppingcart.page :shoppingcart="$shoppingcart" />
</x-layout.layout>