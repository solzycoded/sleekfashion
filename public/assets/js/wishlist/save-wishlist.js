class SaveWishlist{
    toggle(_this){
        let productId = $(_this).attr('product-id');
        let data = {product_id: productId};

        const ajax = new Ajax('POST', '/add-to-wishlist', data);
        ajax.request();
    }
}