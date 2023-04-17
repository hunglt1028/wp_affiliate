function affiliate_review_menu_open_nav() {
	window.affiliate_review_responsiveMenu=true;
	jQuery(".sidenav").addClass('show');
}
function affiliate_review_menu_close_nav() {
	window.affiliate_review_responsiveMenu=false;
 	jQuery(".sidenav").removeClass('show');
}

jQuery(function($){
 	"use strict";
 	jQuery('.main-menu > ul').superfish({
		delay: 500,
		animation: {opacity:'show',height:'show'},  
		speed: 'fast'
 	});
});

jQuery(document).ready(function () {
	window.affiliate_review_currentfocus=null;
  	affiliate_review_checkfocusdElement();
	var affiliate_review_body = document.querySelector('body');
	affiliate_review_body.addEventListener('keyup', affiliate_review_check_tab_press);
	var affiliate_review_gotoHome = false;
	var affiliate_review_gotoClose = false;
	window.affiliate_review_responsiveMenu=false;
 	function affiliate_review_checkfocusdElement(){
	 	if(window.affiliate_review_currentfocus=document.activeElement.className){
		 	window.affiliate_review_currentfocus=document.activeElement.className;
	 	}
 	}
 	function affiliate_review_check_tab_press(e) {
		"use strict";
		// pick passed event or global event object if passed one is empty
		e = e || event;
		var activeElement;

		if(window.innerWidth < 999){
		if (e.keyCode == 9) {
			if(window.affiliate_review_responsiveMenu){
			if (!e.shiftKey) {
				if(affiliate_review_gotoHome) {
					jQuery( ".main-menu ul:first li:first a:first-child" ).focus();
				}
			}
			if (jQuery("a.closebtn.mobile-menu").is(":focus")) {
				affiliate_review_gotoHome = true;
			} else {
				affiliate_review_gotoHome = false;
			}

		}else{

			if(window.affiliate_review_currentfocus=="responsivetoggle"){
				jQuery( "" ).focus();
			}}}
		}
		if (e.shiftKey && e.keyCode == 9) {
		if(window.innerWidth < 999){
			if(window.affiliate_review_currentfocus=="header-search"){
				jQuery(".responsivetoggle").focus();
			}else{
				if(window.affiliate_review_responsiveMenu){
				if(affiliate_review_gotoClose){
					jQuery("a.closebtn.mobile-menu").focus();
				}
				if (jQuery( ".main-menu ul:first li:first a:first-child" ).is(":focus")) {
					affiliate_review_gotoClose = true;
				} else {
					affiliate_review_gotoClose = false;
				}
			
			}else{

			if(window.affiliate_review_responsiveMenu){
			}}}}
		}
	 	affiliate_review_checkfocusdElement();
	}
});

jQuery('document').ready(function($){
  setTimeout(function () {
		jQuery("#preloader").fadeOut("slow");
  },1000);
});

jQuery(document).ready(function () {
	jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 100) {
      jQuery('.scrollup i').fadeIn();
    } else {
      jQuery('.scrollup i').fadeOut();
    }
	});
	jQuery('.scrollup i').click(function () {
    jQuery("html, body").animate({
      scrollTop: 0
    }, 600);
    return false;
	});
});

jQuery(document).ready(function () {
	  function affiliate_review_search_loop_focus(element) {
	  var affiliate_review_focus = element.find('select, input, textarea, button, a[href]');
	  var affiliate_review_firstFocus = affiliate_review_focus[0];  
	  var affiliate_review_lastFocus = affiliate_review_focus[affiliate_review_focus.length - 1];
	  var KEYCODE_TAB = 9;

	  element.on('keydown', function affiliate_review_search_loop_focus(e) {
	    var isTabPressed = (e.key === 'Tab' || e.keyCode === KEYCODE_TAB);

	    if (!isTabPressed) { 
	      return; 
	    }

	    if ( e.shiftKey ) /* shift + tab */ {
	      if (document.activeElement === affiliate_review_firstFocus) {
	        affiliate_review_lastFocus.focus();
	          e.preventDefault();
	        }
	      } else /* tab */ {
	      if (document.activeElement === affiliate_review_lastFocus) {
	        affiliate_review_firstFocus.focus();
	          e.preventDefault();
	        }
	      }
	  });
	}
	jQuery('.search-box a').click(function(){
    jQuery(".serach_outer").slideDown(1000);
  	affiliate_review_search_loop_focus(jQuery('.serach_outer'));
  });

  jQuery('.closepop a').click(function(){
    jQuery(".serach_outer").slideUp(1000);
  });
});

jQuery(function($) {

	//slider
	var carousel_thumbs = jQuery("#carousel-thumbs").owlCarousel({
		autoplay:true,
		autoplayTimeout:4000,
		autoplayHoverPause:true,
		loop: true,
		nav:true,
		slide:1,
		responsive: {
	    0: {
	      items: 1
	    },
	    600: {
	      items: 1
	    },
	    1000: {
	      items: 2
	    }
	  },
		navText : ["",""]
	  
	});

	$('#carousel-thumbs .owl-item.active:first').addClass('vw-review-center');

	$('#carousel-thumbs .owl-item.active:first').addClass('vw-review-center');

	carousel_thumbs.on('changed.owl.carousel', function(event) {
	 
	  $('#carousel-thumbs .owl-item').removeClass('vw-review-center');

	  // $('#carousel-thumbs .owl-item.active:first').next().addClass('vw-review-center');
	  setTimeout(function(){
	   	$('#carousel-thumbs .owl-item.active').first().addClass('vw-review-center');
	 	},50)
	 
	  $('#carouselExampleInterval [data-bs-slide="next"]').trigger('click');
	});


	$(document).on('click', '.owl-item>div', function() {
	  // see https://owlcarousel2.github.io/OwlCarousel2/docs/api-events.html#to-owl-carousel
	  var $speed = 300;  // in ms,

	  $owl.trigger('to.owl.carousel', [$(this).data( 'position' ), $speed] );
	});

  $('button#prev').click(function(){
    carousel_thumbs.trigger('#carousel-thumbs button.owl-prev');
    $('#carousel-thumbs .owl-item').removeClass('vw-review-center');
    $('#carousel-thumbs .owl-item.active:first').addClass('vw-review-center');
  });
   
  $('button#next').click(function(){
  	carousel_thumbs.trigger('#carousel-thumbs button.owl-next');
    $('#carousel-thumbs .owl-item').removeClass('vw-review-center');
   	$('#carousel-thumbs .owl-item.active:first').addClass('vw-review-center');
  });

});