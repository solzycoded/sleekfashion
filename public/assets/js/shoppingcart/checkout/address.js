class CheckoutAddress{
    save(){
        $('#form-customer-address').submit(function (e) { 
            e.preventDefault();

            let url = $(this).attr('action');
            let address = $.trim($(this).children('#new-address').val());

            if(address!==""){ // if address isn't empty
                const ajax = new Ajax('POST', url, {address: address});
                ajax.request((new CheckoutAddress()).saveSuccessResponse)
            }
        });
    }

    saveSuccessResponse(response){
        console.log(response);
    }
}