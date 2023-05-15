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