class Wishlist{
    show(){
        $('#show-wishlist').click(function(e){
            e.preventDefault();

            let href = $(this).attr('href');
            if(href!="" && href!=undefined){
                window.location = "/?open-wishlist=true";
            }
            else{
                $("#wishlistModal").modal('show');
            }
        });
    }
}