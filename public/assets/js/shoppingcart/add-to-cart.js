class AddToCart{
    toggle(_this){
        let productId = $(_this).attr('product-id');
        let data = {product_id: productId};

        const ajax = new Ajax('POST', '/add-to-cart', data);
        ajax.request(this.successResponse, this.failureResponse);
    }

    successResponse(response){
        // display success message
        let addedToCart = response.addedToCart;

        let message = 'Item ' + (addedToCart ? 'added to' : 'removed from') + ' cart!';
        let icon = addedToCart ? 'check' : 'dash';

        showAlert('.success-alert', ('bi-cart-' + icon + '-fill'), message);
    }

    failureResponse(response){
        showAlert('.failure-alert', 'bi-cart-x-fill', 'Item wasn\'t added to cart! Please try again, later.');
    }
}