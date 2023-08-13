$(function(){
    // update cart
    (new SaveCart()).request();

    // perform an action, if the cart is now empty
    openModal('cart', 'shoppingcart');

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