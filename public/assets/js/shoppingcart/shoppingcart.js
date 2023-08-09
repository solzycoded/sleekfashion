$(function(){
    // update cart
    (new SaveCart()).request();

    // perform an action, if the cart is now empty
    openCart();

    // checkout
    const checkout = new Checkout();

    checkout.updateTotal();
    checkout.payNow();
    checkout.openCheckoutModal();

    (new ShoppingCart()).show();
});

const cart = function(_this){
    (new Cart()).request(_this);
}

const openCart = function(){ // opens up, (a. when the cart is empty or, b. when the user clicks on the cart icon, and there's an update)
    let status = $("#open-cart").attr("status");

    // 2. if cart==empty and show==true
    if(status==='true'){
        // a. trigger show-cart button
        $('#shoppingcartModal').modal('show');
    }
}