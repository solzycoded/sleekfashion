class Cart{
    request(_this){
        let productId = $(_this).attr('product-id');
        let data = {product_id: productId};

        const ajax = new Ajax('POST', '/add-to-cart', data);
        ajax.request(this.successResponse, this.failureResponse, {selectedTag: _this, productId: productId});
    }

    successResponse(response, extra){
        const cart = new Cart();

        let addedToCart = response.addedToCart;

        // display success message
        cart.showSuccessAlert(addedToCart);

        // when the item has been removed from cart, while on the cart modal
        cart.removedFromCart(extra.selectedTag);

        // make the action (add to or remove from cart), reflect on other products on the page
        cart.toggle(addedToCart, extra);

        // update cart nitems
        cart.updateNCart(addedToCart);
    }

    updateNCart(addedToCart){
        let nCartItems = $("#show-cart div sup");

        let total      = Number($.trim(nCartItems.text()));
        let newTotal   = addedToCart ? ++total : --total;

        nCartItems.text(newTotal);

        // auto reload the page and display the cart, when the cart icon is clicked
        $("#show-cart").attr('href', "/?open-cart=true");
    }

    showSuccessAlert(addedToCart){
        let message = 'Item ' + (addedToCart ? 'added to' : 'removed from') + ' cart!';
        let icon = addedToCart ? 'check' : 'dash';

        showAlert('.success-alert', ('bi-cart-' + icon + '-fill'), message);
    }

    toggle(addedToCart, extra){
        let inCart = addedToCart ? 'in-cart' : 'not-in-cart';
        let cartItems = $('.add-to-cart[product-id=' + extra.productId + ']')
            .not(extra.selectedTag)
            .parent()
            .children('.' + inCart); // find all the products, except the one that was selected, find the parent of these products, find the children of these products (depending on the action that was taken)

        cartItems.click();
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

            if(cartItems.length <= 1){
                window.location = "/?open-cart=true";
            }
        }
    }
}