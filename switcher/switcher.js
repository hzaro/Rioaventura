/*-----------------------------------------------------------------------------------
/* Styles Switcher
-----------------------------------------------------------------------------------*/

window.console = window.console || (function(){
  var c = {}; c.log = c.warn = c.debug = c.info = c.error = c.time = c.dir = c.profile = c.clear = c.exception = c.trace = c.assert = function(){};
  return c;
})();

(function ($) {
  "use strict";
  
  jQuery(document).ready(function($) {
    
    // Color Changer
    // it exists then update it
    /*if(jQuery('head').find('#layout-css')){//else if #layout-css not exists then create it
				$('head').append('<link href="css/colors/pink_style.css" rel="stylesheet" type="text/css" id="layout-css" />');
			}*/
    var path = $(location).attr('pathname');
    $('select[name="URL"] option').each(function() 
                                        {
                                          if(path.indexOf($(this).val()) >= 0){
                                            $(this).attr('selected', 'selected');
                                          }
                                        });
    var color_presets_html = $.cookie('color_presets_html');
    // Checking if color presets in cookie then set it
    if(color_presets_html>''){
      $("link#layout-css").attr("href", 'css/colors/'+color_presets_html+'.css');
	  $("link#layout-css-project").attr("href", '../css/colors/'+color_presets_html+'.css');
      $('#color1 [href^="'+color_presets_html+'"]').parent().parent().find('a').removeClass('active');
      $('#color1 [href^="'+color_presets_html+'"]').addClass('active');

      $('#map_contact').gmap3({
        marker:{
          address: "Av Sarmiento 784, Mendoza, Argentina",
          options: {
            icon: new google.maps.MarkerImage(
              "images/map_marker_"+color_presets_html+".png",
              new google.maps.Size(308, 105, "px", "px")
            )
          }
        },
        
      },
                              "autofit" );
	  $('#map_contact_project').gmap3({
        marker:{
          address: "Av Sarmiento 784, Mendoza, Argentina",
          options: {
            icon: new google.maps.MarkerImage(
              "../images/map_marker_"+color_presets_html+".png",
              new google.maps.Size(308, 105, "px", "px")
            )
          }
        },
        
      },
                              "autofit" );
      
    }
    
    
    
    $("#color1 a").click(function(e) {
      e.preventDefault();
      // if layout-css not exists then create it
      /*if(!$('#layout-css').length){//else if #layout-css not exists then create it
					$('head').append('<link href="css/colors/orange.css" rel="stylesheet" type="text/css" id="layout-css" />');
				}*/
      color_presets_html = $(this).attr('href');
      $.cookie("color_presets_html",color_presets_html, {expires: 7, path: '/'});
      $("link#layout-css").attr("href", 'css/colors/'+color_presets_html+'.css');
	  $("link#layout-css-project").attr("href", '../css/colors/'+color_presets_html+'.css');
      
      
      $('#map_contact').gmap3({
        marker:{
		  address: "Av Sarmiento 784, Mendoza, Argentina",
          options: {
            icon: new google.maps.MarkerImage(
              "images/map_marker_"+color_presets_html+".png",
              new google.maps.Size(308, 105, "px", "px")
            )
          }
        },
        
      },
                              "autofit" );
							  
	  $('#map_contact_project').gmap3({
        marker:{
		  address: "Av Sarmiento 784, Mendoza, Argentina",
          options: {
            icon: new google.maps.MarkerImage(
              "../images/map_marker_"+color_presets_html+".png",
              new google.maps.Size(308, 105 , "px", "px")
            )
          }
        },
        
      },
                              "autofit" );
      
      return false;
    });
    
    $('.colors li a').click(function(e){
      e.preventDefault();
      $(this).parent().parent().find('a').removeClass('active');
      $(this).addClass('active');
    });
    
    
    
    
    // Reseting to default
    $('#reset a').click(function(){
      // deleting cookies
    $("#color1 li:first-child a").click();
      $.removeCookie('color_presets_html', { path: '/' });
      
    });
    
    // Style Switcher	
    $('#style-switcher').animate({
      left: '-290px'
    });
    
    $('#style-switcher h2 a').click(function(e){
      e.preventDefault();
      var div = $('#style-switcher');
      //console.log(div.css('left'));
      if (div.css('left') === '-290px') {
        $('#style-switcher').animate({
          left: '0px'
        }); 
      } else {
        $('#style-switcher').animate({
          left: '-290px'
        });
      }
    });
    
  });
})(jQuery);
