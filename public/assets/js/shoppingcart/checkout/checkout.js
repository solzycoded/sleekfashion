$(function(){
    const checkoutAddress = new CheckoutAddress();
    checkoutAddress.save();

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

// payment
const selectPayNow = function(){
    $('#checkout-pay-now').on('change', function(){
        $('#open-paystack').click();
    });
}