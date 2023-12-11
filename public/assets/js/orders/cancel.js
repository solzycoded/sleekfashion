class CancelOrder{
    request(){
        $('.cancel-order-form').submit(function (e) { 
            e.preventDefault();
            
            let proceed = confirmRequest("This order will now be cancelled!");

            if(proceed){
                let url = $(this).attr('action');

                const ajax  = new Ajax("POST", url);
                ajax.request((new CancelOrder()).success);
            }
        });
    }

    success(response){
        window.location = "/dashboard/orders/?filter=cancelled";
    }
}