$(function(){
    $("#paymentForm").submit(function(e){
        e.preventDefault();

        if((new CheckoutPayment()).nameIsValid){
            $("#close-paystackModal").click();
            payWithPaystack();
        }
    });
});

function payWithPaystack() {
    let handler = PaystackPop.setup({
        key: 'pk_test_31ba49f9101e3bc889048630affd62fe84774164', // Replace with your public key
        email: document.getElementById("email-address").value,
        amount: document.getElementById("checkout-amount").value * 100,
        ref: '' + Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
        // label: "Optional string that replaces customer email"
        onClose: function(){
            // alert('Window closed.');
            showAlert('.failure-alert', 'bi-exclamation-circle-fill', 'Payment was unsuccessful! Something went wrong.');
        },
        callback: function(response){
            (new CheckoutPayment()).createCustomerOrder(response.reference);
        }
    });

    handler.openIframe();
}