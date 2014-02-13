jQuery(document).ready(function($) {

	// $(window).scroll(function() {
	//   if ($(document).scrollTop() >= 200) {
	//     $('#main_nav_persistent').animate({top: "0"}, 500);
	//   } else {
	//     $('#main_nav_persistent').animate({top: "-96"}, 500);
	//   }
	// });

$(window).on("scroll",function() { 
   if(window.scrollY > 200 && !$('#main_nav_persistent').hasClass('persistent_visible')) {
   		$('#main_nav_persistent').removeClass('persistent_hidden');
      $('#main_nav_persistent').addClass('persistent_visible');
      $('#main_nav_persistent').animate({top: "0"}, 250);
      console.log('here');
   }
   else if(window.scrollY < 200 && !$('#main_nav_persistent').hasClass('persistent_hidden')){
   		$('#main_nav_persistent').removeClass('persistent_visible');
   		$('#main_nav_persistent').addClass('persistent_hidden');
      $('#main_nav_persistent').animate({top: "-96"}, 250);
   }
});


});