class AddOrderItemsToCart{
    request(){
        $('.add-order-to-cart-form').submit(function (e) { 
            e.preventDefault();
            
            let proceed = confirmRequest("The products in this order, will now be added to cart.");

            if(proceed){
                let url = $(this).attr('action');

                const ajax  = new Ajax("POST", url);
                ajax.request((new AddOrderItemsToCart()).success, function(response){console.log(response);});
            }
        });
    }

    success(response){
        window.location = "/dashboard/orders";
    }
}