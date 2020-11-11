function toggleMenu() {
	$("#wrapper").toggleClass("toggled");
}

function checkToggle() {
	if($( "#wrapper" ).hasClass( "toggled" )) {
		toggleMenu();
	}
}
	
$(document).ready(function(){	
	$(window).click(function() {
		checkToggle();
	});

	/*$('#wrapper').click(function(event){
		checkToggle();
		event.stopPropagation();
	});*/
		
	$('#menu-icon-id').click(function(event){
		toggleMenu();
		event.stopPropagation();
	});	
	
	
	// get a reference to an element
	var stage = $('.leftoverlay')[0];

	// create a manager for that element
	var mc = new Hammer.Manager(stage);

	// create a recognizer
	var Swipe = new Hammer.Swipe();

	// add the recognizer
	mc.add(Swipe);

	// subscribe to events
	mc.on('swipeleft', function(e) {
		checkToggle();
	});
	// subscribe to events
	mc.on('swiperight', function(e) {
		toggleMenu();
	});
	// da qui in basso codice per bottone back on top
	
	// hide #back-top first
	$("#back-top").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#back-top a').click(function () {
			/*$('body,html').animate({
				scrollTop: 0
			}, 800);*/
			focusOnTop();
			return false;
		});
	});
});		

		
		