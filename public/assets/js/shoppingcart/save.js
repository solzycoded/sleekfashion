class SaveCart{
    request(){
        $('#update-cart').click(function(){
            const saveCart = new SaveCart();

            let cartItems = $('.remove-from-cart');
            let cart = saveCart.getCartDetails(cartItems);

            const ajax = new Ajax('POST', '/save-cart', {cart: cart});
            ajax.request(saveCart.successResponse, saveCart.failureResponse);
        });
    }

    successResponse(response){
        // display success message
        showAlert('.success-alert', 'bi-check2-circle', "Cart successfully updated!");
    }

    failureResponse(response){
        showAlert('.failure-alert', 'bi-exclamation-circle-fill', 'Cart was not successfully updated');
    }

    getCartDetails(cartItems){
        let cart = [];

        $.each(cartItems, function (i, cartItem) {
            let quantity = $.trim($('.cart-item-counter').eq(i).children('.product-quantity').children('strong').text()); // for each product id, retrieve the updated quantity
            let cartId = $(cartItem).attr('cart-id'); // get the product id

            cart.push({cart_id: cartId, quantity: quantity});
        });

        return cart;
    }
}