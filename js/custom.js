// JavaScript Document


	$(window).on('load', function() {
	
		"use strict";

		/*----------------------------------------------------*/
		/*	Modal Window
		/*----------------------------------------------------*/
			
		setTimeout(function () {
		    $(".modal:not(.auto-off)").modal("show");
		},4600);
				
	});


	$(window).on('scroll', function() {
		
		"use strict";
					
		/*----------------------------------------------------*/
		/*	Navigtion Menu Scroll
		/*----------------------------------------------------*/	
		
		var b = $(window).scrollTop();
		
		if( b > 80 ){		
			$(".wsmainfull").addClass("scroll");
		} else {
			$(".wsmainfull").removeClass("scroll");
		}				

	});


	$(document).ready(function() {
			
		"use strict";


		$('#loading').hide();


		new WOW().init();


		/*----------------------------------------------------*/
		/*	Refresh the Screen on Browser Resize
		/*----------------------------------------------------*/
		$(function($){
		    var windowWidth = $(window).width();
		    var windowHeight = $(window).height();
		    $(window).resize(function() {
		      if(windowWidth != $(window).width() || windowHeight != $(window).height()) {
		        location.reload();
		      return;
		     }
		    });
		});


		/*----------------------------------------------------*/
		/*	Mobile Menu Toggle
		/*----------------------------------------------------*/

		if ( $(window).outerWidth() < 992 ) {
			$('.wsmenu-list li.nl-simple, .wsmegamenu li, .sub-menu li.h-link').on('click', function() {				
				 $('body').removeClass("wsactive");	
				 $('.sub-menu').slideUp('slow');
     			 $('.wsmegamenu').slideUp('slow');	
     			 $('.wsmenu-click').removeClass("ws-activearrow");
        		 $('.wsmenu-click02 > i').removeClass("wsmenu-rotate");
			});
		}

		if ( $(window).outerWidth() < 992 ) {
			$('.wsanimated-arrow').on('click', function() {				
				 $('.sub-menu').slideUp('slow');
     			 $('.wsmegamenu').slideUp('slow');	
     			 $('.wsmenu-click').removeClass("ws-activearrow");
        		 $('.wsmenu-click02 > i').removeClass("wsmenu-rotate");
			});
		}


		/*----------------------------------------------------*/
		/*	ScrollUp
		/*----------------------------------------------------*/
		
		$.scrollUp = function (options) {

			// Defaults
			var defaults = {
				scrollName: 'scrollUp', // Element ID
				topDistance: 600, // Distance from top before showing element (px)
				topSpeed: 800, // Speed back to top (ms)
				animation: 'fade', // Fade, slide, none
				animationInSpeed: 200, // Animation in speed (ms)
				animationOutSpeed: 200, // Animation out speed (ms)
				scrollText: '', // Text for element
				scrollImg: false, // Set true to use image
				activeOverlay: false // Set CSS color to display scrollUp active point, e.g '#00FFFF'
			};

			var o = $.extend({}, defaults, options),
				scrollId = '#' + o.scrollName;

			// Create element
			$('<a/>', {
				id: o.scrollName,
				href: '#top',
				title: o.scrollText
			}).appendTo('body');
			
			// If not using an image display text
			if (!o.scrollImg) {
				$(scrollId).text(o.scrollText);
			}

			// Minium CSS to make the magic happen
			$(scrollId).css({'display':'none','position': 'fixed','z-index': '99999'});

			// Active point overlay
			if (o.activeOverlay) {
				$("body").append("<div id='"+ o.scrollName +"-active'></div>");
				$(scrollId+"-active").css({ 'position': 'absolute', 'top': o.topDistance+'px', 'width': '100%', 'border-top': '1px dotted '+o.activeOverlay, 'z-index': '99999' });
			}

			// Scroll function
			$(window).on('scroll', function(){	
				switch (o.animation) {
					case "fade":
						$( ($(window).scrollTop() > o.topDistance) ? $(scrollId).fadeIn(o.animationInSpeed) : $(scrollId).fadeOut(o.animationOutSpeed) );
						break;
					case "slide":
						$( ($(window).scrollTop() > o.topDistance) ? $(scrollId).slideDown(o.animationInSpeed) : $(scrollId).slideUp(o.animationOutSpeed) );
						break;
					default:
						$( ($(window).scrollTop() > o.topDistance) ? $(scrollId).show(0) : $(scrollId).hide(0) );
				}
			});

		};
		
		$.scrollUp();


		/*----------------------------------------------------*/
		/*	Accordion
		/*----------------------------------------------------*/

		$(".accordion > .accordion-item.is-active").children(".accordion-panel").slideDown();
				
		$(".accordion > .accordion-item").on('click', function() {
			$(this).siblings(".accordion-item").removeClass("is-active").children(".accordion-panel").slideUp();
			$(this).toggleClass("is-active").children(".accordion-panel").slideToggle("ease-out");
		});


		/*----------------------------------------------------*/
		/*	Content Filtering
		/*----------------------------------------------------*/

		$('.filter-content').imagesLoaded(function () {

	        // filter items on button click
	        $('.filter-btns').on('click', 'button', function () {
	            var filterValue = $(this).attr('data-filter');
	            $grid.isotope({
	              filter: filterValue
	            });
	        });

	        // change is-checked class on buttons
	        $('.filter-btns button').on('click', function () {
	            $('.filter-btns button').removeClass('is-checked');
	            $(this).addClass('is-checked');
	            var selector = $(this).attr('data-filter');
	            $grid.isotope({
	              filter: selector
	            });
	            return false;
	        });

	        // init Isotope
	        var $grid = $('.filter-content').isotope({
	            itemSelector: '.filter-item',
	            percentPosition: true,
	            transitionDuration: '0.7s',
	            masonry: {
	              // use outer width of grid-sizer for columnWidth
	              columnWidth: '.filter-item',
	            }
	        });
	        
	    });


		/*----------------------------------------------------*/
		/*	Footer Accordion
		/*----------------------------------------------------*/

		$(".footer-links div h6.m-title").click(function(e) {
		    var $this = $(this);
		    if ($this.hasClass("expanded")) {
		        $this.removeClass("expanded");
		    } else {
		        $(".footer-links h6.expanded").removeClass("expanded");
		        $this.addClass("expanded");
		        $(".foo-links").filter(":visible").slideUp("normal");
		    }
		    $this.parent().children("ul").stop(true, true).slideToggle("normal");
		});


		/*----------------------------------------------------*/
		/*	Tabs
		/*----------------------------------------------------*/

		$('ul.tabs-1 li').on('click', function(){
			var tab_id = $(this).attr('data-tab');

			$('ul.tabs-1 li').removeClass('current');
			$('.tab-content').removeClass('current');

			$(this).addClass('current');
			$("#"+tab_id).addClass('current');
		});


		/*----------------------------------------------------*/
		/*	Single Image Lightbox
		/*----------------------------------------------------*/
				
		$('.image-link').magnificPopup({
		  type: 'image'
		});	


		/*----------------------------------------------------*/
		/*	Video Link #1 Lightbox
		/*----------------------------------------------------*/
		
		$('.video-popup1').magnificPopup({
		    type: 'iframe',		  	  
				iframe: {
					patterns: {
						youtube: {			   
							index: 'youtube.com',
							src: 'https://www.youtube.com/embed/SZEflIVnhH8'				
								}
							}
						}		  		  
		});


		/*----------------------------------------------------*/
		/*	Video Link #2 Lightbox
		/*----------------------------------------------------*/
		
		$('.video-popup2').magnificPopup({
		    type: 'iframe',		  	  
				iframe: {
					patterns: {
						youtube: {			   
							index: 'youtube.com',
							src: 'https://www.youtube.com/embed/7e90gBu4pas'				
								}
							}
						}		  		  
		});


		/*----------------------------------------------------*/
		/*	Video Link #3 Lightbox
		/*----------------------------------------------------*/
		
		$('.video-popup3').magnificPopup({
		    type: 'iframe',		  	  
				iframe: {
					patterns: {
						youtube: {			   
							index: 'youtube.com',
							src: 'https://www.youtube.com/embed/0gv7OC9L2s8'					
								}
							}
						}		  		  
		});


		/*----------------------------------------------------*/
		/*	Statistic Counter
		/*----------------------------------------------------*/
	
		$('.count-element').each(function () {
			$(this).appear(function() {
				$(this).prop('Counter',0).animate({
					Counter: $(this).text()
				}, {
					duration: 4000,
					easing: 'swing',
					step: function (now) {
						$(this).text(Math.ceil(now));
					}
				});
			},{accX: 0, accY: 0});
		});


		/*----------------------------------------------------*/
		/*	Testimonials Rotator
		/*----------------------------------------------------*/
	
		var owl = $('.reviews-carousel');
			owl.owlCarousel({
				items: 3,
				loop:false,
				autoplay:true,
				navBy: 1,
				autoplayTimeout: 4500,
				autoplayHoverPause: true,
				smartSpeed: 1500,
				responsive:{
					0:{
						items:1
					},
					767:{
						items:1
					},
					768:{
						items:1
					},
					991:{
						items:3
					},
					1000:{
						items:3
					}
				}
		});


		/*----------------------------------------------------*/
		/*	Brands Logo Rotator
		/*----------------------------------------------------*/
	
		var owl = $('.brands-carousel-5');
			owl.owlCarousel({
				items: 5,
				loop:true,
				autoplay:true,
				navBy: 1,
				nav:false,
				autoplayTimeout: 4000,
				autoplayHoverPause: true,
				smartSpeed: 2000,
				responsive:{
					0:{
						items:3
					},
					550:{
						items:3
					},
					767:{
						items:3
					},
					768:{
						items:5
					},
					991:{
						items:6
					},				
					1000:{
						items:5
					}
				}
		});


		/*----------------------------------------------------*/
		/*----------------------------------------------------*/
	
		var owl = $('.brands-carousel-pro');
			owl.owlCarousel({
				items: 4,
				loop:true,
				autoplay:true,
				navBy: 1,
				nav:false,
				autoplayTimeout: 4000,
				autoplayHoverPause: true,
				smartSpeed: 2000,
				responsive:{
					0:{
						items:3
					},
					550:{
						items:3
					},
					767:{
						items:3
					},
					768:{
						items:4
					},
					991:{
						items:4
					},				
					1000:{
						items:4
					}
				}
		});


		/*----------------------------------------------------*/
		/*	Brands Logo Rotator
		/*----------------------------------------------------*/
	
		var owl = $('.brands-carousel-6');
			owl.owlCarousel({
				items: 5,
				loop:true,
				autoplay:true,
				navBy: 1,
				nav:false,
				autoplayTimeout: 4000,
				autoplayHoverPause: false,
				smartSpeed: 2000,
				responsive:{
					0:{
						items:3
					},
					550:{
						items:3
					},
					767:{
						items:3
					},
					768:{
						items:5
					},
					991:{
						items:6
					},				
					1000:{
						items:6
					}
				}
		});


		/*----------------------------------------------------*/
		/*	Show Password
		/*----------------------------------------------------*/

	    var showPass = 0;
	    $('.btn-show-pass').on('click', function(){
	        if(showPass == 0) {
	            $(this).next('input').attr('type','text');
	            $(this).find('span.eye-pass').removeClass('flaticon-visibility');
	            $(this).find('span.eye-pass').addClass('flaticon-invisible');
	            showPass = 1;
	        }
	        else {
	            $(this).next('input').attr('type','password');
	            $(this).find('span.eye-pass').addClass('flaticon-visibility');
	            $(this).find('span.eye-pass').removeClass('flaticon-invisible');
	            showPass = 0;
	        }  
	    });


		/*----------------------------------------------------*/
		/*	Newsletter Subscribe Form
		/*----------------------------------------------------*/
	
		$('.newsletter-form').ajaxChimp({
        language: 'cm',
        url: 'https://dsathemes.us3.list-manage.com/subscribe/post?u=af1a6c0b23340d7b339c085b4&id=344a494a6e'
            //http://xxx.xxx.list-manage.com/subscribe/post?u=xxx&id=xxx
		});

		$.ajaxChimp.translations.cm = {
			'submit': 'Submitting...',
			0: 'We have sent you a confirmation email',
			1: 'Please enter your email address',
			2: 'An email address must contain a single @',
			3: 'The domain portion of the email address is invalid (the portion after the @: )',
			4: 'The username portion of the email address is invalid (the portion before the @: )',
			5: 'This email address looks fake or invalid. Please enter a real email address'
		};	


	});

	/*---------------------------------Review js custom --------------------------------------*/
	$('.reviews-carousel-customer').owlCarousel({
		items: 2,           // Show one item at a time
		loop: true,         // Enable looping through items
		margin: 10,         // Adjust margin between items if needed
		// nav: true,          // Show navigation arrows
		dots: true,         // Show dots for navigation
		autoplay: true,     // Enable autoplay
		autoplayTimeout: 4000, // Adjust autoplay speed (in milliseconds)
		autoplayHoverPause: true, // Pause on hover
		responsive:{
			0:{
				items:1
			},
			767:{
				items:1
			},
			768:{
				items:1
			},
			991:{
				items:2
			},
			1000:{
				items:2
			}
		}
	});

	/*---------------------------------Before After js custom --------------------------------------*/

	var owl = $('.reviews-carousel-after');
	owl.owlCarousel({
		items: 3,
		loop:false,
		autoplay:true,
		navBy: 1,
		autoplayTimeout: 4500,
		autoplayHoverPause: true,
		smartSpeed: 1500,
		responsive:{
			0:{
				items:1
			},
			767:{
				items:1
			},
			768:{
				items:1
			},
			991:{
				items:3
			},
			1000:{
				items:3
			}
		}
	});

	var owl = $('.reviews-carousel-after-home');
	owl.owlCarousel({
		items: 4,
		loop:false,
		margin: 20,
		autoplay:false,
		navBy: 1,
		autoplayTimeout: 4500,
		autoplayHoverPause: true,
		smartSpeed: 1500,
		responsive:{
			0:{
				items:1
			},
			767:{
				items:1
			},
			768:{
				items:1
			},
			991:{
				items:4
			},
			1000:{
				items:4
			}
		}
	});

	

	/*---------------------------------Anu video js custom --------------------------------------*/

	var owl = $('.reviews-carousel-anu');
	owl.owlCarousel({
		items: 2,
		loop:false,
		autoplay:true,
		navBy: 1,
		autoplayTimeout: 4500,
		autoplayHoverPause: true,
		smartSpeed: 1500,
		responsive:{
			0:{
				items:1
			},
			767:{
				items:1
			},
			768:{
				items:1
			},
			991:{
				items:2
			},
			1000:{
				items:2
			}
		}
	});

/*---------------------------------Banner js custom --------------------------------------*/

	var owl = $('.reviews-carousel-banner');
	owl.owlCarousel({
		items: 1,
		loop:true,
		autoplay:true,
		navBy: 1,
		dots: true,
		autoplayTimeout: 4500,
		autoplayHoverPause: true,
		smartSpeed: 1500,
		responsive:{
			0:{
				items:1
			},
			767:{
				items:1
			},
			768:{
				items:1
			},
			991:{
				items:1
			},
			1000:{
				items:1
			}
		}
	});
	


	/*---------------------------------Offer js custom --------------------------------------*/

	var owl = $('.reviews-carousel-offer');
	owl.owlCarousel({
		items: 3,
		loop:false,
		autoplay:true,
		navBy: 1,
		autoplayTimeout: 4500,
		autoplayHoverPause: true,
		smartSpeed: 1500,
		responsive:{
			0:{
				items:2
			},
			767:{
				items:2
			},
			768:{
				items:2
			},
			991:{
				items:3
			},
			1000:{
				items:3
			}
		}
	});
	
/*--------------------carousel for unwanted hairs------------------*/

document.addEventListener("DOMContentLoaded", function () {
	const learnMoreLinks = document.querySelectorAll('.learn-more');

	learnMoreLinks.forEach(link => {
		link.addEventListener('click', function (event) {
			event.preventDefault(); // Prevent default link behavior
			const fbox = this.closest('.fbox-4');
			fbox.classList.toggle('expanded');
			this.textContent = fbox.classList.contains('expanded') ? "Show less" : "Read more"; // Toggle link text
		});
	});
});

 /*------------------Unwanted Hairs-----------------*/
var owl = $('.reviews-carousel-unwanted');
owl.owlCarousel({
	items: 3,
	loop:false,
	autoplay:true,
	navBy: 1,
	autoplayTimeout: 4500,
	autoplayHoverPause: true,
	smartSpeed: 1500,
	responsive:{
		0:{
			items:1
		},
		767:{
			items:1
		},
		768:{
			items:2
		},
		991:{
			items:3
		},
		1000:{
			items:3
		}
	}
});

/*------------------Hair loss-----------------*/

var owl = $('.reviews-carousel-hairloss');
owl.owlCarousel({
	items: 3,
	loop:false,
	autoplay:true,
	navBy: 1,
	autoplayTimeout: 4500,
	autoplayHoverPause: true,
	smartSpeed: 1500,
	responsive:{
		0:{
			items:1
		},
		767:{
			items:1
		},
		768:{
			items:2
		},
		991:{
			items:3
		},
		1000:{
			items:3
		}
	}
});

/*------------------Product-----------------*/

var owl = $('.reviews-carousel-product');
owl.owlCarousel({
    items: 4,                // Show 4 items at a time
    margin: 20,              // Adds space between items
    loop: false,             // Disables infinite loop
    autoplay: false,          // Enables autoplay
    nav: true,               // Enables navigation arrows
    navText: [
        '<i class="owl-prev-btn prev-pro-btn">‹</i>', // Custom previous button
        '<i class="owl-next-btn next-pro-btn">›</i>'  // Custom next button
    ],
    navBy: 1,                // Moves 1 item per navigation click
    autoplayTimeout: 4500,   // Delay between auto transitions
    autoplayHoverPause: true,// Pauses autoplay on hover
    smartSpeed: 1500,        // Speed of transitions
    responsive: {            // Adjust items per screen size
        0: {
            items: 2
        },
        767: {
            items: 2
        },
        768: {
            items: 2
        },
        991: {
            items: 4
        },
        1000: {
            items: 4
        }
    }
});


var owl = $('.reviews-carousel-add');
owl.owlCarousel({
	items: 1,
	loop:false,
	autoplay:true,
	navBy: 1,
	autoplayTimeout: 4500,
	autoplayHoverPause: true,
	smartSpeed: 1500,
	responsive:{
		0:{
			items:1
		},
		767:{
			items:1
		},
		768:{
			items:1
		},
		991:{
			items:1
		},
		1000:{
			items:1
		}
	}
});

// home page video modal js
	
document.addEventListener('DOMContentLoaded', function () {
    const videoTriggers = document.querySelectorAll('.video-trigger');
    const videoOverlays = document.querySelectorAll('[data-trigger]');
    const modal = document.getElementById('videoModal');
    const modalVideoSource = document.getElementById('modalVideoSource');
    const modalVideo = document.getElementById('modalVideo');
    const productName = document.getElementById('productName');
    const productImage = document.getElementById('productImage');
    const productPrice = document.getElementById('productPrice');
    const productDesc = document.getElementById('productDesc');
    const productButton = document.getElementById('productButton');

    let productUrl = ''; // Store product URL separately
    let modalInstance = new bootstrap.Modal(modal, { keyboard: true });

    function openModal(trigger) {
        // Get product details from clicked video
        const videoSrc = trigger.getAttribute('data-video');
        const name = trigger.getAttribute('data-name');
        const price = trigger.getAttribute('data-price');
        const desc = trigger.getAttribute('data-desc');
        const image = trigger.getAttribute('data-image');
        productUrl = trigger.getAttribute('data-url');

        // Set video source
        modalVideoSource.src = videoSrc;
        modalVideo.load();

        // Set product details
        productName.textContent = name;
        productImage.src = image;
        productPrice.textContent = "Price: " + price;
        productDesc.textContent = desc;

        // Open modal
        modalInstance.show();
    }


    // Add event listener for each video trigger (Desktop)
    videoTriggers.forEach(trigger => {
        trigger.addEventListener('click', function (event) {
            event.preventDefault();
            openModal(this);
        });
    });

    // Add event listener for each overlay (Mobile)
    videoOverlays.forEach(overlay => {
        overlay.addEventListener('click', function (event) {
            event.preventDefault();
            const parentVideo = this.previousElementSibling; // Get associated video
            openModal(parentVideo);
        });
    });

    // Redirect when button is clicked
    productButton.addEventListener('click', function () {
        if (productUrl) {
            window.open(productUrl, '_blank');
        }
    });

    // Stop video playback when modal is closed
    modal.addEventListener('hidden.bs.modal', function () {
        modalVideo.pause();
        modalVideo.currentTime = 0;
        modalVideoSource.src = ''; // Stop buffering
    });
});
