class SaveCart{
    request(){
        $('#update-cart').click(function(){
            let cartItems = $('.remove-from-cart');
            let cart = [];

            $.each(cartItems, function (i, cartItem) {
                let quantity = $.trim($('.cart-item-counter').eq(i).children('.product-quantity').children('strong').text()); // for each product id, retrieve the updated quantity
                let productId = $(cartItem).attr('product-id'); // get the product id

                cart.push({product_id: productId, quantity: quantity});
            });

            const ajax = new Ajax('POST', '/save-cart', {cart: cart});

            const saveCart = new SaveCart();
            ajax.request(saveCart.successResponse, saveCart.failureResponse);
        });
    }

    successResponse(response){
        console.log(response);
        // display success message
        // let addedToCart = response.addedToCart;
        // let message = 'Item ' + (addedToCart ? 'added to' : 'removed from') + ' cart!';
        // let icon = addedToCart ? 'check' : 'dash';

        // showAlert('.success-alert', ('bi-cart-' + icon + '-fill'), message);

        // // when the item has been removed from cart, while on the cart modal
        // (new Cart()).removedFromCart(selectedTag);
    }

    failureResponse(response){
        console.log(response);
        // showAlert('.failure-alert', 'bi-cart-x-fill', 'Item wasn\'t added to cart! Please try again, later.');
    }
}