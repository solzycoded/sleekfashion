class ProductDetails{
	view(){
		$('.view-product').click(function(){
			let productId = $(this).attr('product-id');

			const ajax = new Ajax("POST", "/product-details", {product_id: productId});

			const productDetails = new ProductDetails();
			ajax.request(productDetails.viewSuccessResponse, function(response){}, {sel: this, productId: productId});
        });
	}

	viewSuccessResponse(response, extra){
		const productDetails = new ProductDetails();

		// set product_id for wishlist and shopping cart icons
		// wishlist
		let isSaved = response.isSaved;
		productDetails.toggleWishlistIcon(isSaved);

		// shopping cart
		let inCart = response.inCart;
		productDetails.toggleCartIcon(inCart);

		$('.product-icon-wishlist, .product-cart-icon').attr('product-id', extra.productId);

		// display product details
		let product = response.productDetails;
		productDetails.displayProduct(product);

		productDetails.toggleAllProductsBackBtn(extra.sel); // toggle "all products" back btn
	}

	toggleWishlistIcon(isSaved){
		let wishlistIsSaved = $(".product-icon-wishlist i").hasClass('saved-to-wishlist');
		if((isSaved && !wishlistIsSaved) || (!isSaved && wishlistIsSaved)){ // if product is saved in the database and wishlist icon isn't "indicating" saved, click the icon
			$(".product-icon-wishlist").click();
		}
	}

	toggleCartIcon(inCart){
		let productInCart = $(".product-cart-icon i").hasClass('in-cart');
		let cartIconContainer = $("#shopping-cart-container");

		if(inCart && !productInCart){ // if product is saved in the database and wishlist icon isn't "indicating" saved, click the icon
			// $(".product-cart-icon").click();
			cartIconContainer.children('.product-in-cart').click();
		}
		else if(!inCart && productInCart){
			cartIconContainer.children('.product-not-in-cart').click();
		}
	}

	displayProduct(product){
		$('.modal-product-title').text(product.title); // product title

		// product image (replace with displayProductImages, later)
		let productImage = product.product_images[0].image;
		$('.modal-product-image').attr('src', productImage);

		// price
		$('.modal-product-price').text('$' + (product.price).toLocaleString());

		// stockleft
		$('.modal-product-stockLeft').text(product.quantity);

		// product category
		let category = product.category.name;
		let categorySelector = '.modal-product-category';

		$(categorySelector).text(category);
		$(categorySelector).attr('href', '?category=' + category);

		// product sex
		let sex = product.product_genders[0].gender.sex;
		let sexSelector = '.modal-product-sex';

		$(sexSelector).text(sex);
		$(sexSelector).attr('href', '?gender=' + sex);

		// description
		$('.modal-product-details').text(product.details);
	}

	whenProductDetailShows(){
		// let productModal = document.getElementById('productModal');

		// $('#productModal').on('shown.bs.modal', function(){
		// 	alert('here');
		// });
		// var myModal = document.getElementById('productModal');

		// myModal.addEventListener('hidden.bs.modal', function () {
		// 	alert('here');
		// });
	}

	toggleAllProductsBackBtn(_this){
		let fromAllProducts = $(_this).hasClass('from-all-products');
		let backToAllProducts = $('.back-to-allproducts');

		if(!fromAllProducts){ // if product details wasn't selected, from the "all products" modal
			backToAllProducts.addClass('d-none');
		}
		else{
			backToAllProducts.removeClass('d-none');
		}
	}

	allProductsPagination(){
		$('.all-products-links nav ul a').click(function(e){
			e.preventDefault();

			let href = $(this).attr('href');

			(new ProductDetails()).reloadAllProducts(href);
		});
	}
	
	// getCurrentURL(){
	// 	return window.location.href;
	// }

	reloadAllProducts(href = ""){
		let data = {target: '.view-all'}; // trigger the target, so the modal pops up
        let url = "/store-viewall-trigger";
        
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            success: function(response){ 
                if(response.success && href!==""){
					window.location = href;
				}
            }
            ,
            error: function (xhr) {
                console.log(xhr.responseText);
            }
        });
	}

	displayViewAllProducts(){
		let target = $('#trigger-show-all');

		if(target.length > 0){
			target = target.text();

			$(target)[0].click();
		}
	}

	removeFilter(){
		$('.remove-filter').click(function(){
			let filterId = $(this).attr('filter-id');
			
			$('#' + filterId).val('');
			$('.form-products-filter').submit();
		});
	}

	filterProducts(){
		$('.form-products-filter').submit(function(e){
	        // e.preventDefault();
	        
	  //       const productDetails = new ProductDetails();

			// productDetails.reloadAllProducts();
		});
	}

	// getFilterData(_this){
	// 	const productDetails = new ProductDetails();

	// 	let search = productDetails.filterData(_this, '.products-search-container', 'input.search-products');
	// 	// let search = productDetails.filterData(_this, '.products-search-container', 'input.search-products');
		
	// 	return {search: search};
	// }

	// filterData(_this, container, input){
	// 	let inputContainer = $(_this).children(container).children('div');

	// 	let value = $.trim(inputContainer.children(input).val());
		
	// 	return value;
	// }

	// displayProductImages(productImages){ // you'll use this later

	// }
}