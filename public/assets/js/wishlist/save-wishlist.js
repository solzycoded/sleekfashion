class SaveWishlist{
    toggle(_this){
        let productId = $(_this).attr('product-id');
        let data = {product_id: productId};

        const ajax = new Ajax('POST', '/add-to-wishlist', data);
        ajax.request((new SaveWishlist()).successResponse, null, {selectedTag: _this, productId: productId});
    }

    successResponse(response, extra){
        let isSaved = response.isSaved;

        const saveWishlist = new SaveWishlist();

        saveWishlist.toggleWishlistIcon(isSaved, extra);

        // wishlist has been updated, reload the page, when the user clicks on the "wishlist" icon
        $('#show-wishlist').attr('href', '/?open-wishlist=true');

        saveWishlist.removeWishlistFromListing(isSaved, extra.selectedTag);
    }

    toggleWishlistIcon(isSaved, extra){
        let wishlistAltIcon = isSaved ? 'saved' : 'not-saved';
        let wishlistItems = $('.add-to-wishlist[product-id=' + extra.productId + ']')
            .not(extra.selectedTag)
            .parent()
            .children('.' + wishlistAltIcon); // find all the products, except the one that was selected, find the parent of these products, find the children of these products (depending on the action that was taken)

        wishlistItems.click();
    }

    removeWishlistFromListing(isSaved, selectedTag){
        if(!isSaved){
            let onWishListModal = $(selectedTag).hasClass('for-wishlist-item');
            if(onWishListModal){
                let wishListIndex = $('.for-wishlist-item').index(selectedTag);
                $('.wishlist-item').eq(index).remove();
            }
        }
    }
}