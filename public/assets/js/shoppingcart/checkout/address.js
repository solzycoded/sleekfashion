class CheckoutAddress{
    // door delivery
    save(){
        $('#form-customer-address').submit(function (e) { 
            e.preventDefault();

            let url = $(this).attr('action');
            let address = $.trim($('#new-address').val());

            if(address!==""){ // if address isn't empty
                let data = {address: address};
                const ajax = new Ajax('POST', url, data);

                const checkoutAddress = new CheckoutAddress();
                ajax.request(checkoutAddress.saveSuccessResponse, checkoutAddress.saveFailureResponse, data);
            }
        });
    }

    saveSuccessResponse(response, extra){
        // show success alert
        showAlert('.success-alert', 'bi-check2-circle', "Your new address was successfully added!");

        // add it to the list on the front-end
        (new CheckoutAddress()).appendAddress(extra.address);
    }

    appendAddress(address){
        address = '<li class="list-group-item align-items-start p-0 border-0">' +
                '<div class="form-check">' +
                    '<input class="form-check-input checkout-address" type="radio" name="customer-address" onchange="highlightAddress(this, \'.doordelivery-selected-address\')">' +
                    '<label class="form-check-label fw-normal">' + address + '</label>' +
                '</div>' +
            '</li>';

        $('.checkout-addresses').prepend(address);
        $('#new-address').val('');
    }

    saveFailureResponse(response){
        let message = response.exists ? "The address you provided, already exists" : "Your new address was not successfully added";

        // show failure alert
        showAlert('.failure-alert', 'bi-exclamation-circle-fill', message);
    }

    highlightAddress(_this, target){
        let address = $.trim($(_this).next().text());

        $(target).text(address);
    }

    // contact
    // do i enable the "payment" button (then display the errors, whenever they click it) or display errors which
    validation(){
        return{
            phoneNumber: function(input){
                var phoneno = /^\(?([0-9]{3})\)?([0-9]{10})$/;
                if(input.match(phoneno)) {
                    return true;
                }

                return false;
            }
        }
    }

    continueToPayment(){
        $('#continue-to-payment').click(function(){
            let addressIsSelected = $('.checkout-address:checked').length > 0;
            let paymentIsSelected = $('.checkout-payment-option:checked').length > 0;

            let phoneNumber = $.trim($('#checkout-phonenumber').val());

            const checkoutAddress = new CheckoutAddress();
            let phoneNumberIsValid = checkoutAddress.validation().phoneNumber(phoneNumber);

            if(addressIsSelected && paymentIsSelected && phoneNumberIsValid){
                $('#close-checkoutModal').click(); // close checkout modal
                $('#open-paystack').click(); // open paystack payment modal
                $('#checkout-error').addClass('d-none'); // hide error section

                checkoutAddress.displayCheckoutAmount();
            }
            else{
                $('#checkout-error').removeClass('d-none');
            }
        });
    }

    displayCheckoutAmount(){
        let total = $.trim($("#checkout-total").text());
        total = (total.replaceAll('$', '')).replaceAll(',', '');

        $("#checkout-amount").val(total);
    }
}