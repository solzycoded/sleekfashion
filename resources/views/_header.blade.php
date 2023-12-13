<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 d-block" data-navbar-on-scroll="data-navbar-on-scroll">
  <div class="container">
    <x-application-logo />

    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

    <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item px-2"><a class="nav-link fw-medium active" aria-current="page" href="/?gender=female">Women</a></li>
        <li class="nav-item px-2"><a class="nav-link fw-medium" href="/?gender=male">Men</a></li>
        <li class="nav-item px-2"><a class="nav-link fw-medium" href="#collection">Collection</a></li>
        <li class="nav-item px-2"><a class="nav-link fw-medium" href="#outlet">Outlet</a></li>
        @guest
          <li class="nav-item px-2">
            <a class="nav-link fw-medium text-primary" href="/login">Login</a>
          </li>
          <li class="nav-item px-2">
            <a class="nav-link fw-medium text-primary" href="/register">Register</a>
          </li>
        @endguest
      </ul>
 
      <div class="d-flex">
        <a class="text-1000" href="#contact-us">
          <i class="bi bi-telephone nav-icon"></i>
        </a>

        {{-- cart --}}
        {{-- data-bs-toggle="modal" data-bs-target="#shoppingcartModal"  --}}
        <a class="text-1000" id="show-cart" role="button">
          <div>
            <i class="bi bi-cart3 nav-icon m-0" style="padding-right: 0 !important"></i>
            <sup>{{ $nCartItems }}</sup>
          </div>
        </a>

        <a class="text-1000" role="button" id="open-search-bar">
          <i class="bi bi-search nav-icon"></i>
        </a>

        <a class="text-1000" role="button" id="show-wishlist">
          <i class="bi bi-heart nav-icon"></i>
        </a>

        @auth
          <a class="text-1000" href="/dashboard">
            <i class="bi bi-person nav-icon"></i>
          </a>

          <!-- Authentication -->
          <form method="POST" action="logout">
            @csrf

            <button class="text-1000 btn btn-transparent p-0" type="submit">
              <i class="bi bi-box-arrow-right nav-icon"></i>
            </button>
          </form>

          <span class="d-none" id="logged-in">{{ isset(auth()->user()->id) ? 'true' : 'false' }}</span>
        @endauth
      </div>

    </div>
  </div>
</nav>