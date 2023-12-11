$(function(){
    const cancelOrder = new CancelOrder();
    cancelOrder.request();

    const addOrderItemsToCart = new AddOrderItemsToCart();
    addOrderItemsToCart.request();
});

const confirmRequest = function(msg){
    return confirm(msg);
}