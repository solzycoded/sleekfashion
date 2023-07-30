class Countries {
    // load the json file, containing the COUNTRIES & STATES
    loadJson(){
        let all_countries = [];

        // $.ajax({
        //     url: '/assets/js/location/json/countries+states.json',
        //     dataType: "json", // <== JSON-P request
        //     success: function(data){
        //         // alert(weblink); // this statement doesn't show up
        //         $.each(data.result, function(entryIndex, entry){ // <=== Note, `data.results`, not just `data`
        //             console.log(entry.name); // <=== Or `entry.from_user` would also work (although `entry['from_user']` is just fine)
        //         });
        //         // alert(userList); // <== Note I've moved this (see #2 above)
        //     },
        //     failure: function(resp){
        //         console.log(resp);
        //     }
        // });

        $.getJSON('/assets/js/location/json/countries+states.json', {format: "json"}, function (data) {
            $.each(data, function(entryIndex, entry){
                console.log(entry);
            });
            // $.each(resp.items, function(key, val) {
            //     alert(val.fname);
            //     alert(val.lname);
            // });
            // console.log('here');
            // const _countries = new Countries();

            // for (let i = 0; i < resp.length; ++i) {
            //     let states = [];

            //     let country = resp[i];

            //     let json_states = country.states;
            //     if(json_states[0]===undefined)
            //         continue;

            //     for (let i = 0; i < json_states.length; ++i) {
            //         let state = json_states[i].name;

            //         states.push(state);
            //     }

            //     let pair = {country: country.name, phone_code: country.phone_code, states: states};
            //     all_countries.push(pair);

            //     _countries.append_select(pair.country, "#countries"); // show all the countries for packages
            // }

            // // show the country of a profile
            // _countries.edit_country();
        }).done(function(data) {
            $.each(data.items, function(i, item) {
                console.log(item);
            });
        }).fail(function(resp) {
            // console.log(resp);
        }).catch(function(resp) {
            console.log(resp);
        });

        return all_countries;
    }

    findCountry(countries, selected_country){
        const found = countries.find(element => element.country==selected_country);

        return found;
    }

    append_states(country){
        const _countries = new Countries();

        if(country!==undefined){
            let states = country.states;

            for (var i = 0; i < states.length; i++) {
                let state = states[i];

                _countries.append_select(state, "#package-state");
            }
        }
        else{
            let default_option = "<option value='' selected>Select State</option>";
            $("#package-state").html(default_option);
        }
    }

    showStates(countries){
        const _countries = new Countries();

        $("#package-country, #profile-country").on('change', function(){
            let country = $(this).val();

            _countries.append_statestoselect(countries, country);
        });
    }

    append_statestoselect(countries, country){
        // if a country is selected
        if(country!='Select Country'){
            const _countries = new Countries();

            let found = _countries.findCountry(countries, country); 

            let default_option = "<option value='' selected>Select State</option>";
            $("#package-state").html(default_option);

            _countries.append_states(found);
            _countries.show_phonecode(found); // show phone code only, on update profile page
        }
    }

    append_select(option_value, sel){

        let option = "<option value='"+option_value+"'>"+option_value+"</option>";
        console.log(option);
        $(sel).append(option);
    }

    // PHONE CODE
    show_phonecode(country){
        let phone_code_sel = $('.phone-code');
        
        if(phone_code_sel.length > 0){
            let phone_code = country.phone_code;
            
            phone_code_sel.val(phone_code);
            $("#phone-code").html(phone_code);
        }
    }

    // PROFILE
    edit_country(){
        let country = $.trim($('#profile-country').next('input').val());

        $('#profile-country').val(country);
    }
}