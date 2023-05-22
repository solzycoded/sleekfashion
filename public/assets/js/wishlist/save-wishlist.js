class SaveWishlist{
    toggle(){
        $('.add-to-wishlist').on('click', function(){
            let productId = $(this).attr('product-id');
            let data = {product_id: productId};

            const ajax = new Ajax('POST', '/add-to-wishlist', data);
            ajax.request((new SaveWishlist()).response);
        });
    }

    response(response){
        // successfully saved, message
    }
}