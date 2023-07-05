class SaveCart{
    request(){
        $('#update-cart').click(function(){
            let cartItems = $('.remove-from-cart');
            let cart = [];

            $.each(cartItems, function (i, cartItem) {
                let quantity = $.trim($('.cart-item-counter').eq(i).children('.product-quantity').children('strong').text()); // for each product id, retrieve the updated quantity
                let cartId = $(cartItem).attr('cart-id'); // get the product id

                cart.push({cart_id: cartId, quantity: quantity});
            });

            const ajax = new Ajax('POST', '/save-cart', {cart: cart});

            const saveCart = new SaveCart();
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
}