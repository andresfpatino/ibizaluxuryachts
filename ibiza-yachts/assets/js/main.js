jQuery(document).ready(function($) { 
	
	// Slick Blog slide
	$('body.home .ibz-blog-list').slick({
		dots: true,
		arrows: false,
		draggable: true,
		infinite: true,
		autoplay: true,
  		autoplaySpeed: 5000,
		speed: 1000,
		slidesToShow: 3,
		slidesToScroll: 3,
		respondTo : 'window',
		responsive: [
			{
				breakpoint: 767,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		]
	});		
	
	// Slick Yates grid
	$('.ibz-yates-grid').slick({
		dots: true,
		arrows: false,
		draggable: true,
		infinite: true,
		autoplay: true,
  		autoplaySpeed: 5000,
		speed: 2000,
		slidesToShow: 2,
		slidesToScroll: 1,
		respondTo : 'window',
		responsive: [
			{
				breakpoint: 650,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		]
	});	
	
	// Slick Yates destacados
	$('.ibz-yates-destacados').slick({
		dots: true,
		arrows: true,
		prevArrow: '<img class="slick-prev" src="/wp-content/themes/ibiza-yachts/assets/img/prev.png">',
		nextArrow: '<img class="slick-next" src="/wp-content/themes/ibiza-yachts/assets/img/next.png">',
		draggable: true,
		infinite: true,
		autoplay: true,
  		autoplaySpeed: 8000,
		speed: 2000,
		slidesToShow: 1,
		slidesToScroll: 1,
		respondTo : 'window',
		responsive: [
			{
				breakpoint: 767,
				settings: {
					arrows: false
				}
			}
		]
	});	
		
	// Fancybox Gallery Yatch
	$(".yatch-gallery-rel").fancybox({
		openEffect : 'fade', 
		closeEffect	: 'fade',
		closeBtn: false,
		padding: 0,
		preload: 15,
		mouseWheel: true,
		helpers : {
			title : {
		    	type : 'over',
				position: 'top'
		    },
			buttons	: {},
			overlay : {
				css : {
			    	'background' : 'rgba(0,0,0,0.7)'					
				}
        	}					
		}			    	
	});	

	// Fancybox Plano Yatch
	$(".yatch-plane-rel").fancybox({
		openEffect : 'fade', 
		closeEffect	: 'fade',
		closeBtn: false,
		padding: 0,
		preload: 5,
		mouseWheel: true,
		helpers : {
			overlay : {
				css : {
			    	'background' : 'rgba(0,0,0,0.7)'					
				}
        	}					
		}			    	
	});	
		
  	/* Load more Gallery Yatch */
  	$(".wrap_photo").slice(0, 8).show();
    if ($(".wrap_photo").length != 0) {
		$("#loadMore").show();
    }   
    $("#loadMore").on('click', function (e) {
		e.preventDefault();
      	$(".wrap_photo:hidden").slice(0, 4).slideDown();
      	if ($(".wrap_photo:hidden").length == 0) {
        	$("#loadMore").attr("disabled", "disabled");
      	}
    });		

	// Close tab RGPD
	setTimeout(function() { 
		$('.rgpd .elementor-tab-title, .faq .elementor-tab-title').removeClass('elementor-active');
		$('.rgpd .elementor-tab-content, .faq .elementor-tab-content').css('display', 'none');
	}, 100); 

	// Ancla scroll
    $(".ancla-scroll").click(function(scroll){
      scroll.preventDefault();
      var codigo = "#" + $(this).data("ancla");
      $("html,body").animate({
		  scrollTop: $(codigo).offset().top - 150
	  }, 1300);
    });	

});