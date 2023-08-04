$(function(){
	openSearchBar();
});

const openSearchBar = function(){
	$('#open-search-bar').click(function(){	
		// display the "view all products" modal
		$('.view-all')[0].click();

		// search bar
		let searchBar = $('#search'); // focus on the search bar

		// searchBar.focus(); // I'LL RESOLVE THIS LATER
		// increase the size of the search bar, to fill up right side of the page, animate it and make it slow...

		// hide the rest of the search filters, with a "filter icon", to display the rest of the "hidden filters"
	});
}
// 

// ALERT
const setAlertTimer = function(sel='', icon = ''){
    setTimeout(resetAlert, 7000, sel, icon); // change the TIME LIMIT
    clearTimeout(this);
}

const resetAlert = function(sel, icon){
    $(sel).removeClass('fade-in'); // hide alert
	setAlertIcon(sel, icon); // remove alert icon
}

const showAlert = function(sel, icon, message){
	sel = '.alert-message' + sel;
    $(sel).addClass('fade-in');

	setAlertContent(sel, icon, message);

    // remove alert, after * seconds
    setAlertTimer(sel, icon);
}

const setAlertContent = function(sel, icon, message){
	$(sel + ' .alert-message-container').children('.alert-message-content').text(message); // display alert message
	setAlertIcon(sel, icon) // add alert icon
}

const setAlertIcon = function(sel, icon){
	$(sel + ' .alert-message-container').children('.alert-message-icon').toggleClass(icon);
}

// get "GET" request value
const retrieveGetParameter = function(name){
    const urlParams = new URLSearchParams(window.location.search);

    return urlParams.get(name);
}