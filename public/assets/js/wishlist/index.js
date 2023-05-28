class Wishlist{
    all(){
        $('#show-wishlist').click(function(){
            const ajax = new Ajax('GET', '/show-wishlist', {});
            ajax.request();
        });
    }
}