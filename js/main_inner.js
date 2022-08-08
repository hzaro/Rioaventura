// JavaScript Document
  (function(jQuery) {
  "use strict";
  //jQuery(document).ready(function(){
  

	/* toggle_section_button Start */
	jQuery('.toggle_section_button').click(function(e){
		e.preventDefault();
		var $toggle_element = jQuery(this).attr('href');
		if($(this).hasClass('toggle_map_button')){
			jQuery($toggle_element).siblings('.map_mask').toggle('blind', {direction:'up'}, 1000);
		}
		
		jQuery($toggle_element).toggle('blind', {direction:'up'}, 1000);
		
		jQuery("#map_contact").gmap3({trigger:"resize"});
		jQuery("#mapa2").gmap3({trigger:"resize"});
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
			//console.log('View Port Widt = '+viewport()['width']);
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
	
	/* Sticky Navigation */
	jQuery(".sticky-bar").sticky({ topSpacing: 0 });
	
	/** custom_accordion_widget Accordion **/
	jQuery('.custom_accordion_widget .accordion-group').each(function(){
		if(jQuery(this).children('.accordion-body').hasClass('in')===true ){
			jQuery(this).find('.accordion-toggle').addClass('active');
		}if(jQuery(this).children('.accordion-body').hasClass('in')===false ){
			jQuery(this).find('.accordion-toggle').addClass('deactive');
		}
	});
	
	jQuery('.custom_accordion_widget .accordion-toggle').on('click', function(){
			if( jQuery(this).hasClass('active')===true ){
				jQuery(this).addClass('deactive');
				jQuery(this).removeClass('active');
			}else if(jQuery(this).hasClass('deactive')===true ){
				jQuery(this).addClass('active');
				jQuery(this).removeClass('deactive');
				jQuery(this).parent('.accordion-heading').parent('.accordion-group').siblings().find('.accordion-toggle').addClass('deactive').removeClass('active');
			}
		});
	

	
	// Back to top
	jQuery('.back_to_top').click(function(){
    jQuery("html, body").animate({ scrollTop: 0 }, 750);
	});
	
	/* Window resize HTML 5 Video resize For Blog Posts */
	var $video_html5=jQuery('.post .featured_image').children('.video-js');
		if(viewport().width >= 1200){
			$video_html5.css('height', '430px');
		}
		if(viewport().width >= 980 && viewport().width <= 1199){
			$video_html5.css('height', '344px');
		}
		if(viewport().width >= 481 && viewport().width <=979){
			$video_html5.css('height', '262px');
		}
		if(viewport().width <= 480){
			$video_html5.css('height', '220px');
		}

	jQuery(window).resize(function(){
			if(viewport().width >= 1200){
				$video_html5.css('height', '430px');
			}
			if(viewport().width >= 980 && viewport().width <= 1199){
				$video_html5.css('height', '344px');
			}
			if(viewport().width >= 481 && viewport().width <=979){
				$video_html5.css('height', '262px');
			}
			if(viewport().width <= 480){
				$video_html5.css('height', '220px');
			}

		});
	
  
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

		/* Google Map Loading FOr Projects */
		$('#map_contact_project').gmap3({
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
				address: "Rivadavia 654, Mendoza, Argentina",
				options: {
					icon: new google.maps.MarkerImage(
						"../images/map_marker.png",
						new google.maps.Size(308, 105, "px", "px")
					)
				}
			},
		 
		},
		"autofit" );
				
  })(jQuery);
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
