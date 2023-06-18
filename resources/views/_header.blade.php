<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 d-block" data-navbar-on-scroll="data-navbar-on-scroll">
  <div class="container">
    <a class="navbar-brand d-inline-flex" href="index.html">
      <img class="d-inline-block" src="/assets/img/gallery/logo.png" alt="logo" />
      <span class="text-1000 fs-0 fw-bold ms-2">Majestic</span>
    </a>
    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon">
      </span>
    </button>

    <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item px-2"><a class="nav-link fw-medium active" aria-current="page" href="#categoryWomen">Women</a></li>
        <li class="nav-item px-2"><a class="nav-link fw-medium" href="#header">Men</a></li>
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

      <form class="d-flex">
        <a class="text-1000" href="#!">
          <i class="bi bi-telephone nav-icon"></i>
        </a>

        <a class="text-1000" href="#!">
          <i class="bi bi-cart3 nav-icon"></i>
        </a>

        <a class="text-1000" role="button" id="open-search-bar">
          <i class="bi bi-search nav-icon"></i>
        </a>

        <a class="text-1000" role="button" data-bs-toggle="modal" data-bs-target="#wishlistModal" id="show-wishlist">
          <i class="bi bi-heart nav-icon"></i>
        </a>

        @auth
          <a class="text-1000" href="/dashboard">
            <i class="bi bi-person nav-icon"></i>
          </a>

          <a class="text-1000" href="/logout">
            <i class="bi bi-box-arrow-right nav-icon"></i>
          </a>
          <span class="d-none" id="logged-in">{{ isset(auth()->user()->id) ? 'true' : 'false' }}</span>
        @endauth
      </form>

    </div>
  </div>
</nav>