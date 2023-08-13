$(function(){
    (new Wishlist()).show();

    // open wishlist modal
    openModal('wishlist', 'wishlist');
});

const toggleWishlist = function(_this){
    (new SaveWishlist()).toggle(_this);
}