(function($){

	var HotelScripts = function(){		

		this.Stick_Navigation = function(){

			var is_fixed = 0;

			var sticky_class = 'all_sticky';

			if(hg_vars.sticky_menu === 'desktop' || hg_vars.sticky_menu === 'mobile'){

				sticky_class = 'desktop_mobile_sticky';

			}

			$(window).scroll(function(){
				var scroll = $(window).scrollTop();
				var menuHeight = $('.navbar').outerHeight();
				var headerHeight = $('.info-bar').outerHeight();
				var totalHeight =  menuHeight + headerHeight;				

				if( hg_vars.sticky_menu ){

					if(scroll>totalHeight){

						if(is_fixed==0){

							$('.site-header').hide().fadeIn(500).addClass(sticky_class);
							
							is_fixed=1;
						}

					}else if(scroll < menuHeight){

						is_fixed=0;

						$('.site-header').removeClass(sticky_class);

					}
				}
				
			});

		};
	};

	var newHotel = new HotelScripts();

	newHotel.Stick_Navigation();

})(jQuery);





jQuery(function($) {

	var mphb_room_list = jQuery('.inside-article' ).find('.mphb_sc_rooms-wrapper');
	var mphb_room_search = jQuery('.inside-article' ).find('.mphb_sc_search_results-wrapper');

	if(mphb_room_list.length || mphb_room_search.length){
		jQuery('.inside-article' ).css({"background-color": "unset", "padding":"0"});
	}
	

	/*--Menu Dropdown--------*/ 

	jQuery('.nav li.dropdown').hover(function() {
		jQuery(this).addClass('open');
	}, function() {
		jQuery(this).removeClass('open');
	}); 

	


	/*-----Datepicker js------*/


	
	/* Demo Scripts for Bootstrap Carousel and Animate.css */
	function doAnimations( elems ) {
		//Cache the animationend event in a variable
		var animEndEv = 'webkitAnimationEnd animationend';
		
		elems.each(function () {
			var $this = $(this),
			$animationType = $this.data('animation');
			$this.addClass($animationType).one(animEndEv, function () {
				$this.removeClass($animationType);
			});
		});
	}
	
	//Variables on page load 
	var $myCarousel = $('#home-slider'),
	$firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");

	//Initialize carousel 
	$myCarousel.carousel();
	
	//Animate captions in first slide on page load 
	doAnimations($firstAnimatingElems);
	
	//Pause carousel  
	$myCarousel.carousel('pause');
	
	
	//Other slides to be animated on carousel slide event 
	$myCarousel.on('slide.bs.carousel', function (e) {
		var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
		doAnimations($animatingElems);
	});  		
	

	/*-- Page Scroll To Top Section ---------------*/
	jQuery(window).scroll(function () {
		if (jQuery(this).scrollTop() > 100) {
			jQuery('.scroll-top').fadeIn();
		} else {
			jQuery('.scroll-top').fadeOut();
		}
	});
	
	jQuery('.scroll-top').click(function () {
		jQuery("html, body").animate({
			scrollTop: 0
		}, 600);
		return false;
	});
	// Home Room Carousel Js	
	$('#home-room .item').each(function(){

		var next = $(this).next();
		if (!next.length) {
			next = $(this).siblings(':first');
		}
		next.children(':first-child').clone().appendTo($(this));

		for (var i=0;i<1;i++) {
			next=next.next();
			if (!next.length) {
				next = $(this).siblings(':first');
			}
			
			next.children(':first-child').clone().appendTo($(this));
		}
	});
	// Tooltip js	
	$('[data-toggle="tooltip"]').tooltip(); 
	
			//Menu fixed top


			
		});

