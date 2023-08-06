class CustomerContact{
    request(phone, successfn){
        const ajax = new Ajax("POST", "/add-customer-contact", {phone: phone});
        ajax.request(successfn, successfn);
    }
}