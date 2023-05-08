@props(['filter', 'filterParts'])

<div style="margin-bottom: 20px;">
  <form action="{{ route('/') }}" method="get" class="form-products-filter form-inline row"> 

    <label class="sr-only col-12">Search & Filter</label>
    
    <div class="col-12 col-sm-6 col-md-4 mb-2 products-search-container">
      <div class="input-group mr-2" style="height: 100%;">

        <div class="input-group-prepend">
          <button type="submit" class="btn btn-primary mb-2 text-white fw-bold fs-30" style="height: 100%; border-radius: 0 !important;">
            <i class="bi bi-search"></i>
          </button>
        </div>

        <input type="search" class="form-control search-products" placeholder="Search for an item" style="margin-right: 10px; padding: 0 5px 0 5px;" id="search" name="search" value="{{ $filter['search'] }}">

      </div>
    </div>

    <!-- lowest price -->
    <div class="col-12 col-sm-6 col-md-4 mb-2">
      <div class="input-group mr-2" style="height: 100%; width: 100%;">

          <input type="number" class="form-control" placeholder="Lowest price" style="padding: 0 5px 0 5px;" id="filter-lowest-price" name="lowestPrice" value="{{ $filter['lowestPrice'] }}">

      </div>
    </div>

    <!-- highest price -->
    <div class="col-12 col-sm-6 col-md-4 mb-2">
      <div class="input-group mr-2" style="height: 100%; width: 100%;">

          <input type="number" class="form-control" placeholder="Highest price" style="padding: 0 5px 0 5px;" id="filter-highest-price" name="highestPrice" value="{{ $filter['highestPrice'] }}">

      </div>
    </div>

    <div class="col-12 col-sm-6 col-md-4 mb-2">
      <div class="input-group mr-2" style="height: 100%; width: 100%;">
        <select class="custom-select mr-sm-2 text-capitalize" style="padding: 0 5px 0 5px; height: inherit; width: inherit; border-color: lightgray; border-radius: 3px;" id="filter-category" name="category">
          <option value="">All categories</option>

          @foreach($filterParts['allCategories'] as $category)

            <option 
              class="text-capitalize" 
              value="{{ $category->id }}"
              {{ $filter['category']==$category->name ? 'selected' : '' }}>
              {{ $category->name }}
            </option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-md-4 mb-2">
      <div class="input-group mr-2" style="height: 100%; width: 100%;">
        <select class="custom-select mr-sm-2 text-capitalize" style="padding: 0 5px 0 5px; height: inherit; width: inherit; border-color: lightgray; border-radius: 3px;" id="filter-collection" name="collection">
          <option value="">All collections</option>

          @foreach($filterParts['allCollections'] as $collection)
            <option 
              class="text-capitalize" 
              value="{{ $collection->id }}"
              {{ $filter['collection']==$collection->name ? 'selected' : '' }}>
              {{ $collection->name }}
            </option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-md-4 mb-2">
      <div class="input-group mr-2" style="height: 100%; width: 100%;">
        <select class="custom-select mr-sm-2 text-capitalize" style="padding: 0 5px 0 5px; height: inherit; width: inherit; border-color: lightgray; border-radius: 3px;" id="filter-gender" name="gender">
          <option value="">All genders</option>

          @foreach($filterParts['allGenders'] as $gender)
            <option 
              class="text-capitalize" 
              value="{{ $gender->id }}"
              {{ $filter['gender']==$gender->sex ? 'selected' : '' }}>
              {{ $gender->sex }}
            </option>
          @endforeach
        </select>
        
      </div>
    </div>

  </form>
  <hr>
  <!-- filter values -->
  <div class="container-fluid">

    <div class="row product-filter-values">

      <!-- filter -->
      <x-product-filter :filterValue="$filter['search']" :filter="'search'" />

      <x-product-filter :filterValue="$filter['lowestPrice']" :filter="'filter-lowest-price'" />
      <x-product-filter :filterValue="$filter['highestPrice']" :filter="'filter-highest-price'" />
      <x-product-filter :filterValue="$filter['category']" :filter="'filter-category'" />
      <x-product-filter :filterValue="$filter['collection']" :filter="'filter-collection'" />
      <x-product-filter :filterValue="$filter['gender']" :filter="'filter-gender'" />
      <!-- END filter -->

      <!-- price range -->
      <!-- END price range -->

    </div>
  </div>
  <!-- END filter values -->
</div>