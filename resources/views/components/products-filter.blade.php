@props(['filterParts'])

<div style="margin-bottom: 20px;">
  <form action="{{ route('/') }}" method="get" class="form-products-filter form-inline row"> 

    <label class="sr-only col-12">Search & Filter</label>

    <!-- AT THE END OF THIS PROJECT, YOU NEED TO COME BACK AND WORK ON THE USER INTERFACE, IT DOESN'T LOOK GOOD AT ALL -->
    <div class="col-12 col-sm-2 col-md-1">
      <div class="input-group" style="height: 100%;">

        <div class="input-group-prepend">
          <button type="submit" class="btn btn-primary mb-1 text-white fw-bold" style="height: 100%; border-radius: 0 !important; padding: 0 10px">
            <i class="bi bi-filter" style="font-size: 40px"></i>
          </button>
        </div>

      </div>
    </div>

    <div class="col-12 col-sm-10 col-md-11 row">

      <!-- search -->
      <div class="col-12 col-sm-6 col-md-4 mb-1 products-search-container">
        <div class="input-group" style="height: 100%;">

          <input type="search" class="form-control search-products" placeholder="What would you like to see?" 
          style="padding: 10px 5px;" id="search" name="search" value="{{ request('search') }}">

        </div>
      </div>

      <!-- lowest price -->
      <div class="col-12 col-sm-6 col-md-4 mb-1">
        <div class="input-group" style="height: 100%; width: 100%;">

            <input type="number" class="form-control" placeholder="Lowest price" style="padding: 0 5px 0 5px;" id="filter-lowest-price" name="lowestPrice" 
            value="{{ request('lowestPrice') }}">

        </div>
      </div>

      <!-- highest price -->
      <div class="col-12 col-sm-6 col-md-4 mb-1">
        <div class="input-group" style="height: 100%; width: 100%;">

            <input type="number" class="form-control" placeholder="Highest price" style="padding: 0 5px 0 5px;" id="filter-highest-price" name="highestPrice" 
            value="{{ request('highestPrice') }}">

        </div>
      </div>

      <!-- category -->
      <div class="col-12 col-sm-6 col-md-4 mb-1">
        <div class="input-group" style="height: 100%; width: 100%;">
          <select class="custom-select text-capitalize" 
            style="padding: 10px 5px; height: inherit; width: inherit; border-color: lightgray; border-radius: 3px;" 
            id="filter-category" 
            name="category">

            <option value="">All categories</option>

            @foreach($filterParts['allCategories'] as $category)

              <option 
                class="text-capitalize" 
                value="{{ $category->id }}"
                {{ request('category')==$category->name ? 'selected' : '' }}>
                {{ $category->name }}
              </option>
            @endforeach
          </select>
        </div>
      </div>

      <!-- collection -->
      <div class="col-12 col-sm-6 col-md-4 mb-1">
        <div class="input-group" style="height: 100%; width: 100%;">
          <select class="custom-select text-capitalize" style="padding: 0 5px 0 5px; height: inherit; width: inherit; border-color: lightgray; border-radius: 3px;" id="filter-collection" name="collection">
            <option value="">All collections</option>

            @foreach($filterParts['allCollections'] as $collection)
              <option 
                class="text-capitalize" 
                value="{{ $collection->id }}"
                {{ request('collection')==$collection->name ? 'selected' : '' }}>
                {{ $collection->name }}
              </option>
            @endforeach
          </select>
        </div>
      </div>

      <!-- gender -->
      <div class="col-12 col-sm-6 col-md-4 mb-1">
        <div class="input-group" style="height: 100%; width: 100%;">
          <select class="custom-select text-capitalize" style="padding: 0 5px 0 5px; height: inherit; width: inherit; border-color: lightgray; border-radius: 3px;" id="filter-gender" name="gender">
            <option value="">All genders</option>

            @foreach($filterParts['allGenders'] as $gender)
              <option 
                class="text-capitalize" 
                value="{{ $gender->id }}"
                {{ request('gender')==$gender->sex ? 'selected' : '' }}>
                {{ $gender->sex }}
              </option>
            @endforeach
          </select>
          
        </div>
      </div>

    </div>

  </form>

  <hr>

  <!-- filter values -->
  <div class="container-fluid">

    <div class="row product-filter-values">

      <!-- filter -->
      <x-product-filter :filterValue="request('search')" :filter="'search'" />

      <x-product-filter :filterValue="request('lowestPrice')" :filter="'filter-lowest-price'" />
      <x-product-filter :filterValue="request('highestPrice')" :filter="'filter-highest-price'" />
      <x-product-filter :filterValue="request('category')" :filter="'filter-category'" />
      <x-product-filter :filterValue="request('collection')" :filter="'filter-collection'" />
      <x-product-filter :filterValue="request('gender')" :filter="'filter-gender'" />
      <!-- END filter -->

      <!-- price range -->
      <!-- END price range -->

    </div>
  </div>
  <!-- END filter values -->
</div>