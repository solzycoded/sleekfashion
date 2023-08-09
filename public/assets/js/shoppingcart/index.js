class ShoppingCart{
    show(){
        $("#show-cart").click(function(e){
            e.preventDefault();

            let href = $(this).attr('href');
            if(href!="" && href!=undefined){
                window.location = href;
            }
            else{
                $("#shoppingcartModal").modal('show');
            }
        });
    }
}