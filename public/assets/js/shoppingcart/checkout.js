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
        // load cart details, in checkout and open checkout modal
        // console.log($('#open-checkout'));
        (new Checkout()).triggerCheckout();
    }

    triggerCheckout(){
        const ajax = new Ajax("POST", "/open-checkout", {});
        ajax.request(function(response){
            window.location = "/?checkout=true";
        }, function(response){
            console.log(response);
        });
    }

    openCheckoutModal(){
        let checkout = retrieveGetParameter('checkout');

        if(checkout=="true"){
            let allowCheckout = $('#allow-checkout');

            if(allowCheckout.length > 0){
                allowCheckout = allowCheckout.attr('allow');

                if(allowCheckout=="true"){
                    $('#open-checkout').click();
                }
            }
            else{
                $("#show-cart").click();
            }
        }
    }
}