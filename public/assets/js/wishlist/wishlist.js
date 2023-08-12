$(function(){
    // const wishlist = new Wishlist();
    // wishlist.all();
});

const toggleWishlist = function(_this){
    (new SaveWishlist()).toggle(_this);
}