$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }    
});

$(function(){
	const productDetails = new ProductDetails();

	productDetails.view(); 
    productDetails.allProductsPagination();
    productDetails.displayViewAllProducts();

    productDetails.removeFilter();
    // productDetails.filterProducts();
    // toggle display the back button, when the product modal shows
    // productDetails.whenProductDetailShows();
});	