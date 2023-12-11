class CheckoutPayment{
    nameIsValid(){
        let name = this.name();

        return !(this.empty(name.first_name) && this.empty(name.last_name));
    }

    name(){
        let firstName = this.val('#first-name');
        let lastName = this.val('#last-name');

        return {first_name: firstName, last_name: lastName};
    }

    val(selector){
        return $.trim($(selector).val());
    }

    empty(val){
        return val=='' || val==null;
    }

    orderDetails(reference){
        let address     = $.trim($('.checkout-address:checked').next().text());
        let phoneNumber = this.val('#checkout-phonenumber');

        return Object.assign(this.name(), {address: address, phone_number: phoneNumber, reference: reference});
    }

    createCustomerOrder(reference){
        let data = this.orderDetails(reference);
        let ajax = new Ajax('POST', '/orders/create', data);

        ajax.request(this.success);
    }

    success(response){
        $("#close-paystackModal").click(); // close the paystack window

        $('.paystack-payment-reference').text('Reference: ' + response.reference); // display payment reference
        $('.customer-order-display b').text(response.order_tag); // display order tag

        $("#paymentSuccessfulModal").modal('show'); // show the payment confirmation modal

        const checkOutPayment = new CheckoutPayment();

        checkOutPayment.countDownToReload();
        setTimeout(checkOutPayment.reloadPage, 11000);
    }

    reloadPage(){
        window.location = '/';
    }

    countDownToReload(){
        setInterval(() => {
            let counter = $('.payment-countdown');
            let secs = parseInt($.trim(counter.text()));

            counter.text(secs - 1);
        }, 1000);
    }
}