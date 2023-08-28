(function ($) {
	"use strict";
	
	// meanmenu
	$('#mobile-menu').meanmenu({
		meanMenuContainer: '.mobile-menu',
		meanScreenWidth: "992"
	});
	
	// One Page Nav
	var top_offset = $('.header-area').height() - 10;
	$('.main-menu nav ul').onePageNav({
		currentClass: 'active',
		scrollOffset: top_offset,
	});
	
	
	$(window).on('scroll', function () {
		var scroll = $(window).scrollTop();
		if (scroll < 245) {
			$(".header-sticky").removeClass("sticky");
		} else {
			$(".header-sticky").addClass("sticky");
		}
	});
	
	
	
	
	
	// owlCarousel
	$('.slider-active').owlCarousel({
		loop:true,
		margin:0,
		items:1,
		navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
		nav:true,
		dots:true,
	})
	
		
	// owlCarousel
	$('.trending-active').owlCarousel({
		loop:true,
		margin:10,
		nav:false,
			dots:true,
			autoplay:true,
		responsive:{
			0:{
				items:1
			},
			767:{
				items:2
			},
			992:{
				items:3
			}
		}
	})




	// select
	
	$('select').niceSelect();
	
	
	//skillbar
	$(document).ready(function(){
		$('#bar1').barfiller({barColor: "#3A3A3B",duration: 3000});
		$('#bar2').barfiller({barColor: "#5C5C5C",duration: 3000});
		$('#bar3').barfiller({barColor: "#5C5C5C",duration: 3000});
		$('#bar4').barfiller({barColor: "#5C5C5C",duration: 3000});
		$('#bar5').barfiller({barColor: "#5C5C5C",duration: 3000});
		$('#bar6').barfiller({barColor: "#5C5C5C",duration: 3000});
		$('#bar7').barfiller({barColor: "#5C5C5C",duration: 3000});
		$('#bar8').barfiller({barColor: "#5C5C5C",duration: 3000});
	});
	

	
	
	 // counter-number
	 $('.counter-number').each(function () {
		$(this).prop('Counter',0).animate({
				Counter: $(this).text()
		}, {
				duration: 4000,
				easing: 'swing',
				step: function (now) {
						$(this).text(Math.ceil(now));
				}
		});
	});
	

	
	/* magnificPopup img view */
	$('.popup-image').magnificPopup({
		type: 'image',
		gallery: {
		  enabled: true
		}
	});
	
	/* magnificPopup video view */
	$('.popup-video').magnificPopup({
		type: 'iframe'
	});
	
	
	// isotop
	$('.grid').imagesLoaded( function() {
		// init Isotope
		var $grid = $('.grid').isotope({
		  itemSelector: '.grid-item',
		  percentPosition: true,
		  masonry: {
			// use outer width of grid-sizer for columnWidth
			columnWidth: '.grid-item',
		  }
		});
	});
	
	// filter items on button click
	$('.portfolio-menu').on( 'click', 'button', function() {
	  var filterValue = $(this).attr('data-filter');
	  $grid.isotope({ filter: filterValue });
	});
	
	//for menu active class
	$('.portfolio-menu button').on('click', function(event) {
		$(this).siblings('.active').removeClass('active');
		$(this).addClass('active');
		event.preventDefault();
	});
	
	
	
	
	// scrollToTop
	$.scrollUp({
		scrollName: 'scrollUp', // Element ID
		topDistance: '300', // Distance from top before showing element (px)
		topSpeed: 300, // Speed back to top (ms)
		animation: 'fade', // Fade, slide, none
		animationInSpeed: 200, // Animation in speed (ms)
		animationOutSpeed: 200, // Animation out speed (ms)
		scrollText: '<i class="icofont icofont-long-arrow-up"></i>', // Text for element
		activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	});
	
	// WOW active
	new WOW().init();
	
	
	})(jQuery);