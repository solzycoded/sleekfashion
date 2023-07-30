class CheckoutAddress{
    save(){
        $('#form-customer-address').submit(function (e) { 
            e.preventDefault();

            let url = $(this).attr('action');
            let address = $.trim($('#new-address').val());

            if(address!==""){ // if address isn't empty
                const ajax = new Ajax('POST', url, {address: address});
                ajax.request((new CheckoutAddress()).saveSuccessResponse, function(response){console.log(response);});
            }
        });
    }

    saveSuccessResponse(response){
        console.log(response);
    }
}