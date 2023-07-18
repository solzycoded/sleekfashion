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
      <section>

        <div class="container">
          <div class="row h-100 g-0">
            <div class="col-md-6">
              <div class="bg-300 p-4 h-100 d-flex flex-column justify-content-center">
                <h1 class="fw-semi-bold lh-sm fs-4 fs-lg-5 fs-xl-6">Gentle Formal Looks </h1>
                <p class="mb-5 fs-1">We provide the top formal apparel package to make your job look confident and comfortable. Stay connect.</p>
                <div class="d-grid gap-2 d-md-block"><a class="btn btn-lg btn-dark" href="#!" role="button">Explore Collection</a></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card card-span h-100 text-white"><img class="card-img h-100" src="/assets/img/gallery/sharp-dress.png" alt="..." /><a class="stretched-link" href="#!"></a></div>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


      <section class="py-11">
        <div class="bg-holder overlay overlay-0" style="background-image:url(/assets/img/gallery/cta.png);background-position:center;background-size:cover;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="carousel slide carousel-fade" id="carouseCta" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active" data-bs-interval="10000">
                    <div class="row h-100 align-items-center g-2">
                      <div class="col-12">
                        <div class="text-light text-center py-2">
                          <h5 class="display-4 fw-normal text-400 fw-normal mb-4">visit our Outlets in</h5>
                          <h1 class="display-1 text-white fw-normal mb-8">London</h1><a class="btn btn-lg text-light fs-1" href="#!" role="button">See Addresses
                            <svg class="bi bi-arrow-right-short" xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"> </path>
                            </svg></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item" data-bs-interval="5000">
                    <div class="row h-100 align-items-center g-2">
                      <div class="col-12">
                        <div class="text-light text-center py-2">
                          <h5 class="display-4 fw-normal text-400 fw-normal mb-4">visit our Outlets in</h5>
                          <h1 class="display-1 text-white fw-normal mb-8">Bristol</h1><a class="btn btn-lg text-light fs-1" href="#!" role="button">See Addresses
                            <svg class="bi bi-arrow-right-short" xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"> </path>
                            </svg></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item" data-bs-interval="3000">
                    <div class="row h-100 align-items-center g-2">
                      <div class="col-12">
                        <div class="text-light text-center py-2">
                          <h5 class="display-4 fw-normal text-400 fw-normal mb-4">visit our Outlets in</h5>
                          <h1 class="display-1 text-white fw-normal mb-8">Birmingham</h1><a class="btn btn-lg text-light fs-1" href="#!" role="button">See Addresses
                            <svg class="bi bi-arrow-right-short" xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"> </path>
                            </svg></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouseCta" data-bs-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="visually-hidden">Previous</span></button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouseCta" data-bs-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="visually-hidden">Next </span></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-0 pt-7">

        <div class="container">
          <div class="row">
            <div class="col-6 col-lg-2 mb-3">
              <h5 class="lh-lg fw-bold text-1000">Company Info</h5>
              <ul class="list-unstyled mb-md-4 mb-lg-0">
                <li class="lh-lg"><a class="text-800 text-decoration-none" href="#!">About Us</a></li>
              </ul>
            </div>
            <div class="col-6 col-lg-2 mb-3">
              <h5 class="lh-lg fw-bold text-1000">Help &amp; Support</h5>
              <ul class="list-unstyled mb-md-4 mb-lg-0">
                <li class="lh-lg"><a class="text-800 text-decoration-none" href="#!">Shipping Info</a></li>
                <li class="lh-lg"><a class="text-800 text-decoration-none" href="#!">Refunds</a></li>
                <li class="lh-lg"><a class="text-800 text-decoration-none" href="#!">How to Order</a></li>
              </ul>
            </div>
            <div class="col-6 col-lg-2 mb-3">
              <h5 class="lh-lg fw-bold text-1000">Customer Care</h5>
              <ul class="list-unstyled mb-md-4 mb-lg-0">
                <li class="lh-lg"><a class="text-800 text-decoration-none" href="#!">Contact Us</a></li>
                <li class="lh-lg"><a class="text-800 text-decoration-none" href="#!">Payment Methods</a></li>
              </ul>
            </div>
            <div class="col-sm-6 col-lg-auto ms-auto">
              <h5 class="lh-lg fw-bold text-1000">Signup For The Latest News</h5>
              <div class="row input-group-icon mb-5">
                <div class="col-12">
                  <input class="form-control input-box" type="email" placeholder="Enter Email" aria-label="email" />
                  <svg class="bi bi-arrow-right-short input-box-icon" xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="#424242" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"> </path>
                  </svg>
                </div>
              </div>
              <p class="text-800">
                <svg class="feather feather-phone me-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                </svg><span class="text-800">+3930219390</span>
              </p>
              <p class="text-800">
                <svg class="feather feather-mail me-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                  <polyline points="22,6 12,13 2,6"></polyline>
                </svg><span class="text-800">sleekfashion@gmail.com</span>
              </p>
            </div>
          </div>
          <div class="border-bottom border-3"></div>
          <div class="row flex-center my-3">
            <div class="col-md-6 order-1 order-md-0">
              <p class="my-2 text-1000 text-center text-md-start"> Made with&nbsp;
                <svg class="bi bi-suit-heart-fill" xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#EB6453" viewBox="0 0 16 16">
                  <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"></path>
                </svg>&nbsp;by&nbsp;<a class="text-800" href="https://thesolomonfidelis.com/" target="_blank">Solomon Fidelis</a>
              </p>
            </div>
            <div class="col-md-6">
              <div class="text-center text-md-end"><a href="#!"><span class="me-4" data-feather="facebook"></span></a><a href="#!"> <span class="me-4" data-feather="instagram"></span></a><a href="#!"> <span class="me-4" data-feather="youtube"></span></a><a href="#!"> <span class="me-4" data-feather="twitter"></span></a></div>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
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