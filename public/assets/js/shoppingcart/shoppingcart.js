$(function(){
    // update cart
    (new SaveCart()).request();

    // perform an action, if the cart is now empty
    emptyCart();

    // checkout
    const checkout = new Checkout();

    checkout.updateTotal();
    checkout.payNow();
    checkout.openCheckoutModal();
});

const cart = function(_this){
    (new Cart()).request(_this);
}

const emptyCart = function(){
    // 1. retreive get request values (cart & show)
    let status = $("#cart-is-empty").attr("status");

    // 2. if cart==empty and show==true
    if(status==='true'){
        // a. trigger show-cart button
        $('#shoppingcartModal').modal('show');
    }
}