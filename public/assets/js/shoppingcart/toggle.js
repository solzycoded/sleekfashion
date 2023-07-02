class Cart{
    request(_this){
        let productId = $(_this).attr('product-id');
        let data = {product_id: productId};

        const ajax = new Ajax('POST', '/add-to-cart', data);
        ajax.request(this.successResponse, this.failureResponse, _this);
    }

    successResponse(response, selectedTag){
        // display success message
        let addedToCart = response.addedToCart;
        let message = 'Item ' + (addedToCart ? 'added to' : 'removed from') + ' cart!';
        let icon = addedToCart ? 'check' : 'dash';

        showAlert('.success-alert', ('bi-cart-' + icon + '-fill'), message);

        // when the item has been removed from cart, while on the cart modal
        (new Cart()).removedFromCart(selectedTag);
    }

    failureResponse(response){
        showAlert('.failure-alert', 'bi-cart-x-fill', 'Item wasn\'t added to cart! Please try again, later.');
    }

    removedFromCart(_this){
        let onCartModal = $(_this).hasClass('remove-from-cart');
        if(onCartModal){
            let cartItems = $('.cart-item');

            let cartIndex = $('.remove-from-cart').index(_this); // find the index of the selected cart item
            cartItems.eq(cartIndex).remove(); // remove the item from display

            // MAYBE you should delay this...
                // 1. first display that the cart is now empty for like 10 seconds... 
                // 2. before you reload the page
            if(cartItems.length <= 1){
                window.location = "/";
            }
        }
    }
}