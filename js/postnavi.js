
/*************SCROLL JS**************/

jQuery(document).ready(function($) {
	$(".tabber").click(function(event){		
		event.preventDefault();
		$('html,body').animate({scrollTop:$(this.hash).offset().top-200}, 500);
	});
});

jQuery(document).ready(function() {
    'use strict';
    var windowwith = jQuery(window).width();
    if (windowwith < 1034) {
    	jQuery('.post_navi_title').click(function(){
    		jQuery('.postul').slideToggle();
    	});
    }
});