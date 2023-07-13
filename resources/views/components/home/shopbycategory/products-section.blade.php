@props(['category', 'gender'])

<div class="tab-content" id="pills-tabContentWomen">
    <div class="tab-pane fade" id="pills-dresses" role="tabpanel" aria-labelledby="pills-dresses-tab">

      <div class="carousel slide" id="carouselCategoryDresses" data-bs-touch="false" data-bs-interval="false">
        <div class="carousel-inner">
        
          {{-- <div class="carousel-item active" data-bs-interval="10000">
            <div class="row h-100 align-items-center g-2">
              <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                <div class="card card-span h-100 text-white"><img class="img-fluid h-100" src="/assets/img/gallery/shirt-1.png" alt="..." />
                  <div class="card-img-overlay ps-0"> </div>
                  <div class="card-body ps-0 bg-200">
                    <h5 class="fw-bold text-1000 text-truncate">Shirt</h5>
                    <div class="fw-bold"><span class="text-600 me-2 text-decoration-line-through">$200</span><span class="text-primary">$175</span></div>
                  </div><a class="stretched-link" href="#"></a>
                </div>
              </div>
              <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                <div class="card card-span h-100 text-white"><img class="img-fluid h-100" src="/assets/img/gallery/shirt-2.png" alt="..." />
                  <div class="card-img-overlay ps-0"> </div>
                  <div class="card-body ps-0 bg-200">
                    <h5 class="fw-bold text-1000 text-truncate">Gray Shirt</h5>
                    <div class="fw-bold"><span class="text-600 me-2 text-decoration-line-through">$200</span><span class="text-primary">$175</span></div>
                  </div><a class="stretched-link" href="#"></a>
                </div>
              </div>
              <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                <div class="card card-span h-100 text-white"><img class="img-fluid h-100" src="/assets/img/gallery/shirt-3.png" alt="..." />
                  <div class="card-img-overlay ps-0"> </div>
                  <div class="card-body ps-0 bg-200">
                    <h5 class="fw-bold text-1000 text-truncate">White Shirt</h5>
                    <div class="fw-bold"><span class="text-600 me-2 text-decoration-line-through">$200</span><span class="text-primary">$175</span></div>
                  </div><a class="stretched-link" href="#"></a>
                </div>
              </div>
              <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                <div class="card card-span h-100 text-white"><img class="img-fluid h-100" src="/assets/img/gallery/shirt-4.png" alt="..." />
                  <div class="card-img-overlay ps-0"> </div>
                  <div class="card-body ps-0 bg-200">
                    <h5 class="fw-bold text-1000 text-truncate">Black Shirt</h5>
                    <div class="fw-bold"><span class="text-600 me-2 text-decoration-line-through">$500</span><span class="text-primary">$275</span></div>
                  </div><a class="stretched-link" href="#"></a>
                </div>
              </div>
            </div>
          </div>

          <div class="carousel-item" data-bs-interval="5000">
            <div class="row h-100 align-items-center g-2">
              <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                <div class="card card-span h-100 text-white"><img class="img-fluid h-100" src="/assets/img/gallery/shirt-1.png" alt="..." />
                  <div class="card-img-overlay ps-0"> </div>
                  <div class="card-body ps-0 bg-200">
                    <h5 class="fw-bold text-1000 text-truncate">Shirt</h5>
                    <div class="fw-bold"><span class="text-600 me-2 text-decoration-line-through">$200</span><span class="text-primary">$175</span></div>
                  </div><a class="stretched-link" href="#"></a>
                </div>
              </div>
              <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                <div class="card card-span h-100 text-white"><img class="img-fluid h-100" src="/assets/img/gallery/shirt-2.png" alt="..." />
                  <div class="card-img-overlay ps-0"> </div>
                  <div class="card-body ps-0 bg-200">
                    <h5 class="fw-bold text-1000 text-truncate">Gray Shirt</h5>
                    <div class="fw-bold"><span class="text-600 me-2 text-decoration-line-through">$200</span><span class="text-primary">$175</span></div>
                  </div><a class="stretched-link" href="#"></a>
                </div>
              </div>
              <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                <div class="card card-span h-100 text-white"><img class="img-fluid h-100" src="/assets/img/gallery/shirt-3.png" alt="..." />
                  <div class="card-img-overlay ps-0"> </div>
                  <div class="card-body ps-0 bg-200">
                    <h5 class="fw-bold text-1000 text-truncate">White Shirt</h5>
                    <div class="fw-bold"><span class="text-600 me-2 text-decoration-line-through">$200</span><span class="text-primary">$175</span></div>
                  </div><a class="stretched-link" href="#"></a>
                </div>
              </div>
              <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                <div class="card card-span h-100 text-white"><img class="img-fluid h-100" src="/assets/img/gallery/shirt-4.png" alt="..." />
                  <div class="card-img-overlay ps-0"> </div>
                  <div class="card-body ps-0 bg-200">
                    <h5 class="fw-bold text-1000 text-truncate">Black Shirt</h5>
                    <div class="fw-bold"><span class="text-600 me-2 text-decoration-line-through">$500</span><span class="text-primary">$275</span></div>
                  </div><a class="stretched-link" href="#"></a>
                </div>
              </div>
            </div>
          </div>

          <div class="carousel-item" data-bs-interval="3000">
            <div class="row h-100 align-items-center g-2">
              <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                <div class="card card-span h-100 text-white"><img class="img-fluid h-100" src="/assets/img/gallery/shirt-1.png" alt="..." />
                  <div class="card-img-overlay ps-0"> </div>
                  <div class="card-body ps-0 bg-200">
                    <h5 class="fw-bold text-1000 text-truncate">Shirt</h5>
                    <div class="fw-bold"><span class="text-600 me-2 text-decoration-line-through">$200</span><span class="text-primary">$175</span></div>
                  </div><a class="stretched-link" href="#"></a>
                </div>
              </div>
              <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                <div class="card card-span h-100 text-white"><img class="img-fluid h-100" src="/assets/img/gallery/shirt-2.png" alt="..." />
                  <div class="card-img-overlay ps-0"> </div>
                  <div class="card-body ps-0 bg-200">
                    <h5 class="fw-bold text-1000 text-truncate">Gray Shirt</h5>
                    <div class="fw-bold"><span class="text-600 me-2 text-decoration-line-through">$200</span><span class="text-primary">$175</span></div>
                  </div><a class="stretched-link" href="#"></a>
                </div>
              </div>
              <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                <div class="card card-span h-100 text-white"><img class="img-fluid h-100" src="/assets/img/gallery/shirt-3.png" alt="..." />
                  <div class="card-img-overlay ps-0"> </div>
                  <div class="card-body ps-0 bg-200">
                    <h5 class="fw-bold text-1000 text-truncate">White Shirt</h5>
                    <div class="fw-bold"><span class="text-600 me-2 text-decoration-line-through">$200</span><span class="text-primary">$175</span></div>
                  </div><a class="stretched-link" href="#"></a>
                </div>
              </div>
              <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                <div class="card card-span h-100 text-white"><img class="img-fluid h-100" src="/assets/img/gallery/shirt-4.png" alt="..." />
                  <div class="card-img-overlay ps-0"> </div>
                  <div class="card-body ps-0 bg-200">
                    <h5 class="fw-bold text-1000 text-truncate">Black Shirt</h5>
                    <div class="fw-bold"><span class="text-600 me-2 text-decoration-line-through">$500</span><span class="text-primary">$275</span></div>
                  </div><a class="stretched-link" href="#"></a>
                </div>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="row h-100 align-items-center g-2">
              <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                <div class="card card-span h-100 text-white"><img class="img-fluid h-100" src="/assets/img/gallery/shirt-1.png" alt="..." />
                  <div class="card-img-overlay ps-0"> </div>
                  <div class="card-body ps-0 bg-200">
                    <h5 class="fw-bold text-1000 text-truncate">Shirt</h5>
                    <div class="fw-bold"><span class="text-600 me-2 text-decoration-line-through">$200</span><span class="text-primary">$175</span></div>
                  </div><a class="stretched-link" href="#"></a>
                </div>
              </div>
              <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                <div class="card card-span h-100 text-white"><img class="img-fluid h-100" src="/assets/img/gallery/shirt-2.png" alt="..." />
                  <div class="card-img-overlay ps-0"> </div>
                  <div class="card-body ps-0 bg-200">
                    <h5 class="fw-bold text-1000 text-truncate">Gray Shirt</h5>
                    <div class="fw-bold"><span class="text-600 me-2 text-decoration-line-through">$200</span><span class="text-primary">$175</span></div>
                  </div><a class="stretched-link" href="#"></a>
                </div>
              </div>
              <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                <div class="card card-span h-100 text-white"><img class="img-fluid h-100" src="/assets/img/gallery/shirt-3.png" alt="..." />
                  <div class="card-img-overlay ps-0"> </div>
                  <div class="card-body ps-0 bg-200">
                    <h5 class="fw-bold text-1000 text-truncate">White Shirt</h5>
                    <div class="fw-bold"><span class="text-600 me-2 text-decoration-line-through">$200</span><span class="text-primary">$175</span></div>
                  </div><a class="stretched-link" href="#"></a>
                </div>
              </div>
              <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                <div class="card card-span h-100 text-white"><img class="img-fluid h-100" src="/assets/img/gallery/shirt-4.png" alt="..." />
                  <div class="card-img-overlay ps-0"> </div>
                  <div class="card-body ps-0 bg-200">
                    <h5 class="fw-bold text-1000 text-truncate">Black Shirt</h5>
                    <div class="fw-bold"><span class="text-600 me-2 text-decoration-line-through">$500</span><span class="text-primary">$275</span></div>
                  </div><a class="stretched-link" href="#"></a>
                </div>
              </div>
            </div>
          </div> --}}

          <div class="row">
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselCategoryDresses" data-bs-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="visually-hidden">Previous</span></button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselCategoryDresses" data-bs-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="visually-hidden">Next </span></button>
          </div>
        </div>
      </div>

      <div class="col-12 d-flex justify-content-center mt-5"> <a class="btn btn-lg btn-dark" href="#!">View All </a></div>
    </div>

</div>