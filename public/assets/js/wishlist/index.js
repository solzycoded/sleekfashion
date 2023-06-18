class Wishlist{
    all(){
        $('#show-wishlist').click(function(){
            let loggedIn = $.trim($('#logged-in').text());
            const wishlist = new Wishlist();

            if(loggedIn=='true'){
                const ajax = new Ajax('GET', '/show-wishlist', {});
    
                ajax.request(wishlist.successResponse, wishlist.failureResponse);
            }
            else{
                let login = '<div class="text-center">' +
                        'You have to <a href="/login" class="fw-bold btn text-primary p-0 m-0">Log in</a> to see your wishlist.' +
                    '</div>';
                
                $('#wishlist-data').html(login);
            }
        });
    }

    failureResponse(response){
        let productsWishlist = response.wishlist;

        if(productsWishlist.length==0){
            let allProductsBtn = '<button type="button" class="btn fw-bold text-primary" data-bs-target="#allProductsModal"' + 
                'data-bs-toggle="modal" data-bs-dismiss="modal" style="font-size: 16px; padding: 0;">' +
                    'here' +
                '</button>';
            let noWishlist = '<div class="text-center">' +
                    'You currently have no products in your wishlist.<br>You can add a product ' + allProductsBtn + '.' +
                '</div>';
            
            $('#wishlist-data').html(noWishlist);

            return;
        }
    }

    successResponse(response){
        // YOU'LL RE-DO THIS ENTIRE THING, WITH ALPINE.JS (if it's possible)
        let wishlist = $('#wishlist-data');
        wishlist.html(''); // reset the container

        let productsWishlist = response.wishlist;
        for (let index = 0; index < productsWishlist.length; index++){
            let item = productsWishlist[index];
            
            (new Wishlist()).displayWishlist(wishlist, item);
        }
    }

    displayWishlist(container, product){
        let content = this.wishlistItem(product);

        $(container).append(content);
    }

    wishlistItem(product){
        let productTag = '<div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-60" style="margin-bottom: 10px !important">' + 
            '<div class="card card-span h-60 text-white">' + 
                '<img class="img-fluid img-thumbnail h-60" src="' + product.product_images[0].image + '" alt="Sleekfashion product item" style="height: 200px" />' + 
                
                this.icon(product) +

                '<div class="card-body ps-0 bg-200 product-details-container bg-transparent">' + 
                    '<h5 class="fw-bold text-1000 text-truncate product-Title">' + product.title + '</h5>' + 

                    '<div class="fw-bold">' +
                        '<span class="text-primary">$' + this.numberFormat(product.price) + '</span>' +
                    '</div>' +
                '</div>' +

                '<a class="stretched-link view-product from-all-products" role="button" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#productModal"></a>' +

            '</div>' +
        '</div>';
        
        return productTag;
    }

    numberFormat($number){
        return $number.toLocaleString();
    }

    icon(product){
        let saved = (product.wishlist).length > 0;

        let icon = '<div x-data="{saved: ' + (saved) + '}">' +
                '<div class="add-to-wishlist card-img-overlay ps-0" @click="saved = !saved" product-id="' + product.id + '" onclick="toggleWishlist(this)">' +
                    '<div class="wrapper">' +
                        '<div class="icon-wishlist">' +
                            '<i class="bi ms-2 mt-2"' +
                                ':class="saved ? \'bi-heart-fill saved-to-wishlist\' : \'bi-heart removed-from-wishlist\'"></i>' +
                        '</div>' +
                    '</div>' +
                '</div>' +
            '</div>';

        return icon;
    }
}