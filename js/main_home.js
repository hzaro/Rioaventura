// JavaScript Document
  (function(jQuery) {
  "use strict";
  //jQuery(document).ready(function(){
  

	/* Parallax Quote Start */
	/* for multiple parallax 
	function quote_para(para_img1_easing, para_img2_easing)
	*/
	function quote_para(para_img1_easing){
    //quote_para(para_img1_easing, para_img2_easing)
		jQuery('.parallex_folio').each(function() {
			var el = jQuery(this);
			//console.log( elements[i] , i );
			if (el.visible(true)) {
			el.parallax("50%", para_img1_easing);
			// add a div with class 'bg' above as a wrapper of .parallax_container and uncomment the below line
			//el.find('.bg').parallax("50%", para_img2_easing);
			}
		});
	}
	jQuery(window).scroll(function(event) {
		/* Calling function of multiple parallax
		quote_para(0.2, 0.6);
		*/
		quote_para(0.2);
	});
	/* Parallax Quote End */
	
	/* toggle_section_button Start */
	jQuery('.toggle_section_button').click(function(e){
		e.preventDefault();
		var $toggle_element = jQuery(this).attr('href');
		if($(this).hasClass('toggle_map_button')){
			jQuery($toggle_element).siblings('.map_mask').toggle('blind', {direction:'up'}, 1000);
			
			jQuery("#mapa2").toggle('blind', {direction:'up'}, 1000);
		}
		
		jQuery($toggle_element).toggle('blind', {direction:'up'}, 1000);
		
		jQuery("#map_contact").gmap3({trigger:"resize"});
		jQuery("#mapa2").gmap3({trigger:"resize"})
		var latLng = new google.maps.LatLng (-32.9283248, -69.2246883);
        jQuery("#mapa2").gmap3("get").setCenter(latLng);
		var latLng1 = new google.maps.LatLng (-32.8888048,-68.8492792);
        jQuery("#map_contact").gmap3("get").setCenter(latLng1);
		
		e.stopPropagation();

	});
	/* toggle_section_button End */
	
	/* header_toggle_menu Start */
	jQuery('.header_toggle_menu .toggle_top_menu_btn').click(function(e){
		var $nav_to = jQuery(this).parent().parent().siblings('.main-nav');
		jQuery(this).css('opacity', 0).css('z-index', 9);
		jQuery(this).siblings().css('opacity', 1).css('z-index', 10);
		jQuery(this).css('opacity', 0).css('z-index', 9);
		jQuery(this).siblings('.open_menu').css('opacity', 1).css('z-index', 10);
		$nav_to.toggle('slide', {direction:'right'}, 1000);
		e.stopPropagation();

	});
	/* header_toggle_menu End */
	
	/* Small Navigation */
	// Responsive Navigation Working
	jQuery('.toggle_main_menu_btn').click(function(e){
		if(viewport().width < 768){
			//console.log('View Port Widt = '+viewport().width);
			jQuery(this).css('opacity', 0).css('z-index', 9);
			jQuery(this).siblings().css('opacity', 1).css('z-index', 10);
			jQuery('#top-nav').slideToggle();
			e.stopPropagation();
		}
	});
	
	jQuery('#top-nav li').click(function(){
		if(viewport().width < 768){
//			alert('children ul length '+ jQuery(this).children('ul').length);
			if(jQuery(this).children('ul').length === 0){
				jQuery('#top-nav').slideToggle();
				jQuery('.toggle_main_menu_btn.close_menu').css('opacity', 0).css('z-index', 9);
				jQuery('.toggle_main_menu_btn.open_menu').css('opacity', 1).css('z-index', 10);
			}
		}
	});
	
	// When Resizing Window will show/hide the List of .top-menu
	jQuery(window).resize(function(){
			if(viewport().width >= 768){
				jQuery('.top-nav').css('display', 'block');
			}
			if(viewport().width <= 767){
				jQuery('.top-nav').css('display', 'none');
			}
		});
	
	/* Sticky Navigation */
	jQuery(".sticky-bar").sticky({ topSpacing: 0 });
	
	/* Scroll To Navigation */
	jQuery('#head-nav li').on('click', function(){
		jQuery('#top-nav').onePageNav({
			currentClass: 'current',
			changeHash: true,
			scrollSpeed: 800,
			scrollOffset: 0,
			scrollThreshold: 0.3, // how much part of the upper section has to be visible .5 = 50% it effects navigations active hash
			easing: 'swing',
			filter: ':not(.external)'
		});
	});
	jQuery('#top-nav li').on('click', function(){
		jQuery('#head-nav').onePageNav({
			currentClass: 'current',
			changeHash: true,
			scrollSpeed: 800,
			scrollOffset: 0,
			scrollThreshold: 0.3,
			easing: 'swing',
			filter: ':not(.external)',
			
		});
	});
	
		jQuery('#top-nav').onePageNav({
			currentClass: 'current',
			changeHash: true,
			scrollSpeed: 800,
			scrollOffset: 0,
			scrollThreshold: 0.3,
			easing: 'swing',
			filter: ':not(.external)'
		});
		jQuery('#head-nav').onePageNav({
			currentClass: 'current',
			changeHash: true,
			scrollSpeed: 800,
			scrollOffset: 0,
			scrollThreshold: 0.3,
			easing: 'swing',
			filter: ':not(.external)'
		});
		
	// Back to top
	jQuery('.back_to_top').click(function(){
    jQuery("html, body").animate({ scrollTop: 0 }, 750);

	});

	// Scroll to next and previous options and to particular id
	//scroll_to_id
	jQuery('.scroll_next_section').click(function(){
		var scroll_to_id = jQuery(this).data('scroll-id');
		if(scroll_to_id == true){
			jQuery('html,body').stop().animate({scrollTop: (jQuery(jQuery(this).attr('href')).offset().top)+'px'},500,'easeOutExpo');
		}else{
			var next_section;
			next_section = jQuery(this).parents('section').nextAll(".section_holder").first();
			//alert(next_section.nextAll(".section_container").first().prepend("<h1>hi aa</h1>"));
			jQuery('html,body').stop().animate({scrollTop: (next_section.offset().top)+'px'},500,'easeOutExpo');
		}
	});
	
	jQuery('.scroll_prev_section').click(function(){
		var prev_section;
		prev_section = jQuery(this).parents('section').prevAll(".section_container").first();
		//alert(next_section.nextAll(".section_container").first().prepend("<h1>hi aa</h1>"));
		jQuery('html,body').stop().animate({scrollTop: (prev_section.offset().top)+'px'},500,'easeOutExpo');
	});
	
	/* for playing video in curve */
	$(".button_holder a[rel^='prettyPhoto']").prettyPhoto({
		  social_tools: false,
		  slideshow: 4000, /* false OR interval time in ms */
		  opacity: 0.80, /* Value between 0 and 1 */
		  show_title: true, /* true/false */
		  allow_resize: true, /* Resize the photos bigger than viewport. true/false */
		  
		});			
		
	/* Portfolio Nav javascript */
		jQuery('.work_nav li a').click(function(){
			jQuery(this).parent('li').siblings().removeClass('current');
			jQuery(this).parent('li').addClass('current');
		});
		
	var viewport_width = viewport();	
	var column_width = 390;	
		//var column_width = viewport_width.width - 20;
		//console.log(viewport_width.width);
	
	/* Running Masanory 1st time */
	if(viewport_width.width >= 1200 ){
		console.log(column_width= 390);
		console.log(jQuery('.container').width());
		jQuery('.work_item').width(390);
		if(jQuery('.container').width() < 1170){
			
			column_width= 313;
			jQuery('.work_item').width(313);
		}
	}else if(viewport_width.width >=980 && viewport_width.width <= 1199 ){
		column_width= 313;
		jQuery('.work_item').width(313);
	}else if(viewport_width.width >=768 && viewport_width.width <= 979 ){
		column_width= 240;
		jQuery('.work_item').width(313);
	}else if(viewport_width.width <= 767 ){
		jQuery('.work_item').width('50%');
		column_width= jQuery('.work_item').width();
	}
	else if(viewport_width.width <= 480 ){
		column_width= 240;
		jQuery('.work_item').width(240);
	}

    /* Gallery Isotope Masonary */
    jQuery('#container').isotope({
      itemSelector : '.isotope-item',
      masonry: {
        columnWidth: column_width
      },   
      animationEngine : 'jquery'
    });
    
    /**Running masonary everytime window resizes */
    jQuery(window).resize(function(){	
      viewport_width = viewport();
      console.log("viewport_width = "+viewport_width.width);
      if(viewport_width.width >= 1200 ){
        column_width= 390;
		jQuery('.work_item').width(390);
        /*if(jQuery('.container').width() < 1170){
          column_width= 313;
		  jQuery('.work_item').width(313);
        }*/
      }else if(viewport_width.width >=992 && viewport_width.width <= 1199 ){
        column_width= 313;
		jQuery('.work_item').width(313);
      }else if(viewport_width.width >=768 && viewport_width.width <= 991 ){
        column_width= 240;
		jQuery('.work_item').width(240);
      }else if(viewport_width.width <= 767 ){
		column_width= 390;
		jQuery('.work_item').width('100%');
		/*jQuery('.work_item').width('50%');
		column_width= jQuery('.work_item').width();*/
	  }
	  else if(viewport_width.width <= 480 ){
		column_width= 300;
		jQuery('.work_item').width('100%');
	  }
      console.log("column_width = " + column_width);
      
      /* Gallery Isotope Masonary */
      jQuery('#container').isotope({
        itemSelector : '.isotope-item',
        masonry: {
          columnWidth: column_width
        }
      });
    });
	
		// filter items when filter link is clicked Masonary isotope
		jQuery('#filters a').click(function(){
			var selector = jQuery(this).attr('data-filter');
			jQuery('#container').isotope({ filter: selector });
			return false;
		});
	
	
  //});
  
	/* Google Map Loading */
	$('#map_contact').gmap3({
		map: {
			options: {
				maxZoom: 16,
				minZoom: 16,
				mapTypeId: "folio_map",
				mapTypeControlOptions: {
					mapTypeIds: ["folio_map", google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.SATELLITE, google.maps.MapTypeId.TERRAIN]
				}
			} 
		},
		styledmaptype:{
			id: "folio_map",
			options:{
				name: "Folio Map"
			},
			styles: [
				{
					featureType: "all",
					elementType: "all",
					stylers: [
						{ saturation: -100 },
						{ lightness: -50 }
					]
				}
			]
		},
		marker:{
			values: [
			  {
				latLng:[-32.8888048,-68.8492792],
				options:{
				  icon: "images/map_marker.png"
				}
			  }]
		},
	 
	},
	"autofit" );
	
	$('#mapa2').gmap3({
		map: {
			options: {
				center:[-32.9254917,-69.2278933],
				maxZoom: 16,
				minZoom: 16,
				mapTypeId: "folio_map",
				mapTypeControlOptions: {
					mapTypeIds: ["folio_map", google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.SATELLITE, google.maps.MapTypeId.TERRAIN]
				}
			} 
		},
		styledmaptype:{
			id: "folio_map",
			options:{
				name: "Folio Map"
			},
			styles: [
				{
					featureType: "all",
					elementType: "all",
					stylers: [
						{ saturation: -100 },
						{ lightness: -50 }
					]
				}
			]
		},
		marker:{
			values: [
			  {
				latLng:[-32.9283248, -69.2246883],
				options:{
				  icon: "images/map_marker.png"
				}
			  }]
		},
	 
	},
	"autofit" );
  
  })(jQuery);

	jQuery(window).load(function() { // makes sure the whole site is loaded
		jQuery("#status").fadeOut(); // will first fade out the loading animation
		jQuery("#preloader").delay(350).fadeOut("slow"); // will fade out the white DIV that covers the website.
	});

/* 
*
*
* viewport width 
*
*
*/
function viewport(){
	var e = window, a = 'inner';
	if ( !( 'innerWidth' in window ) )
	{
	a = 'client';
	e = document.documentElement || document.body;
	}
	return { width : e[ a+'Width' ] , height : e[ a+'Height' ] };
}
