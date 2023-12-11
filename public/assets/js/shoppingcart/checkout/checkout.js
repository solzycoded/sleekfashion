$(function(){
    const checkoutAddress = new CheckoutAddress();
    checkoutAddress.save();
    
    continueToPayment();
    // checkoutAddress.contactNoIsValid();

    // const checkoutPayment = new CheckoutPayment();

    // checkoutPayment.toggleBtn();

    // selectPayNow();

    // const countries = new Countries();

    // let locations = countries.loadJson();
    // countries.showStates();
 
    // printJSON();
});

// async function printJSON() {
//     const response = await fetch("/assets/js/location/json/countries+states.json");
//     const json = await response.json();
//     console.log(json);
// }

const highlightAddress = function(_this, target){
    (new CheckoutAddress()).highlightAddress(_this, target);
}

const validation = function(){
    return{
        phoneNumber: function(input){
            var phoneno = /^\(?[0-9]{1}\)?([0-9]{10})$/;
            if(input.match(phoneno)) {
                return true;
            }

            return false;
        }
    }
}

const continueToPayment = function(){
    $('#continue-to-payment').click(function(){
        let addressIsSelected = $('.checkout-address:checked').length > 0;
        let paymentIsSelected = $('.checkout-payment-option:checked').length > 0;

        let phoneNumber = $.trim($('#checkout-phonenumber').val());
        let phoneNumberIsValid = validation().phoneNumber(phoneNumber);

        if(addressIsSelected && paymentIsSelected && phoneNumberIsValid){
            (new CustomerContact()).request(phoneNumber, continueToPaymentSuccess);
        }
        else{
            $('#checkout-error').removeClass('d-none');
        }
    });
}

const continueToPaymentSuccess = function(response){
    $('#close-checkoutModal').click(); // close checkout modal
    $('#open-paystack').click(); // open paystack payment modal
    $('#checkout-error').addClass('d-none'); // hide error section

    displayCheckoutAmount();
}

const displayCheckoutAmount = function(){
    let total = $.trim($("#checkout-total").text());
    total = (total.replaceAll('$', '')).replaceAll(',', '');

    $("#checkout-amount").val(total);
}

// payment
// const selectPayNow = function(){
//     $('#checkout-pay-now').on('change', function(){
//         $('#open-paystack').click();
//     });
// }