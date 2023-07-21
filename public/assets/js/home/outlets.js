class Outlets{
    seeAddresses(_this, data){
        if(data!=undefined){
          let city = data.city;
          $('#storeAddressesModalLabel .store-city').text(city);
          
          this.loadAddresses(city, data.addresses);
        }
    }

    loadAddresses(city, addresses){
        $('ol.city-addresses').empty(); // clear "previous addresses"
        
        (addresses).forEach(el => { // load "new addresses"
            let address = el.address;
            let li = '<li class="list-group-item d-flex justify-content-between align-items-start">' +
                '<div class="ms-2 me-auto">' +
                  '<div class="fw-lighter">' + address + '</div>' +
                '</div>' +
                '<a target="_blank" href="https://www.google.com/maps/place/' + address + ' ' + city + '" class="badge bg-primary rounded-pill"><i class="bi bi-arrow-right"></i></a>' +
              '</li>';

            $('ol.city-addresses').append(li); // display an address
        });
    }
}