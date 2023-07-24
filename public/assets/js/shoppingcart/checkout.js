class Checkout{
    updateTotal(){
        $('.shoppingcart-counter').click(function() {
            let cartItemsSum = $('.cart-item-total');
            let total = 0;

            $.each(cartItemsSum, function (i, value) { 
                let cartItemTotalFormatted = $.trim($(value).text());
                let cartItemTotal = Number(cartItemTotalFormatted.replaceAll(',', ''));

                total += cartItemTotal;
            });

            $('.checkout-total').text(total.toLocaleString());
        });
    }

    request(){
        // 1. update the quantity of the "cartItems"
        // 2. create the order
        // 3. open the "order" page / modal
    }

    payNow(){
        $('#checkout-cart').click(function(){
            (new SaveCart()).save((new Checkout()).payNowSuccessResponse);
        });
    }

    payNowSuccessResponse(response){
        // console.log($('#open-checkout'));
        $('#open-checkout').click();
        $('.close-cart').click();
    }
}