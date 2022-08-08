$( document ).ready(function() {
   
	$('#modalCompra').on('input', '#cant_personas', function(){
	    var precioPaquete = $('#precio_paquete').html();
	    var cantPersonas = $('#cant_personas').val();
	    var precioTransporte = $('#precio_transporte').val();
	    var porPersona = parseInt(precioTransporte) + parseInt(precioPaquete);
	    // $('#subtotal').html(porPersona);
	    $('#subtotal').html(Number(precioTransporte)+Number(precioPaquete));
	    $('#total').html((cantPersonas*precioTransporte)+(cantPersonas*precioPaquete));
	});
    $('#modalCompra').on('change', '#precio_transporte', function(){
	    var precioPaquete = $('#precio_paquete').html();
	    var cantPersonas = $('#cant_personas').val();
	    var precioTransporte = $('#precio_transporte').val();
	    var porPersona = parseInt(precioTransporte) + parseInt(precioPaquete);
	    // $('#subtotal').html(porPersona);
	    $('#subtotal').html(Number(precioTransporte)+Number(precioPaquete));
	    $('#total').html((cantPersonas*precioTransporte)+(cantPersonas*precioPaquete));
	});
    




});
