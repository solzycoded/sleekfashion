
    <x-alert class="success-alert" :bgColor="'green'" />
    <x-alert class="failure-alert" :bgColor="'red'" />

    <!-- ===============================================-->
    <!-- JavaScripts-->
    <!-- ===============================================-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script src="/vendors/@popperjs/popper.min.js"></script>
    <script src="/vendors/bootstrap/bootstrap.min.js"></script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    <script src="/vendors/is/is.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="/vendors/feather-icons/feather.min.js"></script>
    <script>
      feather.replace();
    </script>
    <script src="/assets/js/theme.js"></script>

    <!-- ===============================================-->
    <!--    custom scripts-->
    <!-- ===============================================-->
    <!-- products -->
    <script src="/assets/js/products/product-details.js"></script>
    <script src="/assets/js/products/products.js"></script>

    <!-- for the main page -->
    <script src="/assets/js/app/app.js"></script>

    {{-- request (ajax, ...) --}}
    <script src="/assets/js/request/ajax.js"></script>
    
    {{-- wishlist (toggle, display) --}}
    <script src="/assets/js/wishlist/index.js"></script>
    <script src="/assets/js/wishlist/save-wishlist.js"></script>
    <script src="/assets/js/wishlist/wishlist.js"></script>

    {{-- shopping cart --}}
    <script src="/assets/js/shoppingcart/toggle.js"></script>
    <script src="/assets/js/shoppingcart/index.js"></script>
    <script src="/assets/js/shoppingcart/shoppingcart.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
  </body>

</html>