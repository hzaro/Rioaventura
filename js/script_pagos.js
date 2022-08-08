function validar_ipage(){ 
		
        // var formData = new FormData($("#form_modalCompra")[0]);
      	var formData = new FormData($("#form_modalCompraWeb")[0]);
        // $("#cargando").show();
        $.ajax({
          type: "POST",
          url: "include/pagos/guarda_datos_popup.php",           
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success:function(data, textStatus, jqXHR){            

            // $('#modalCompraWeb').closeModal();
            $('#modalCompraWeb').modal('toggle');
            // $('#modalMetodoPagoWeb').openModal();
            $('#modalMetodoPagoWeb').modal('toggle');
            var montoPesos = data['monto'];
            var idParaPaypal = data['id']; // Tambien lo usa mercadopago!            
            var montoPaypal =data['monto_dolares'];
                    
            $('#paypal-button-web div').remove();

            paypal.Button.render({

                env: 'production', // Or 'sandbox'
                style: {
                    label: 'paypal',
                    size:  'responsive',    // small | medium | large | responsive
                    shape: 'rect',     // pill | rect
                    color: 'blue',     // gold | blue | silver | black
                    tagline: false    
                },
                client: {
                    sandbox:    'AdZzvJwfVDPQTVxhVMMO0fiQ8jhFqBWG_aBAd9NhPD7fLbbkafB5oazDAfWD77UB8z4FWh7NxiR0ftpi',
                    production: 'AeAp85q3hb4ymu86UnRRictX943UdHGiBnS-m2FlUfgB7L1-OZq3w7SEm7iDX3V6HCX9cVd_Ho-bY_6q'
                },

                commit: true, // Show a 'Pay Now' button

                payment: function(data, actions) {
                    return actions.payment.create({
                        payment: {
                            transactions: [
                                {
                                    amount: { total: montoPaypal, currency: 'USD' }
                                }
                            ]
                        }
                    });
                },

                onAuthorize: function(data, actions) {
                    return actions.payment.execute().then(function(payment) {

                      $.ajax({
                          method: "POST",
                          url: "paypal/pagado.php",
                          data: { id: idParaPaypal, monto_paypal: montoPaypal }
                        })
                          .done(function( msg ) {
                          	// preventDefault();
                          	swal("Compra Realizada!", "Se envió un email al comprador", "success");
                            $('#modalMetodoPagoWeb').modal('toggle');
                            $('#modal_info').modal('toggle');
                            // window.location.replace("comprar_paquetes.php");
                          });

                        // The payment is complete!
                        // You can now show a confirmation message to the customer
                    });
                },
                onCancel: function(data, actions) {
                  swal("No se ha terminado el proceso de pago", "", "error");
                },

                onError: function(err) {
                  $.ajax({
                      method: "POST",
                      url: "paypal/rechazado.php",
                      data: { id: idParaPaypal }
                    })
                      .done(function( msg ) {
                        alert(msj);
                        swal("Se registró un error intentelo nuevamente","" , "error");
                      });
                }

              }, '#paypal-button-web');               

            
            $( "#mercadopagoImagenWeb" ).click(function() {
                // $('#modalMetodoPagoWeb').closeModal();
                // $('#modalMetodoPagoWeb').modal('toggle');
                // $("#modalMetodoPago .close").click()
                $.ajax({
                    type: "POST",
                    url: "include/pagos/pago_mercadopago.php",           
                    data: {id: data['id'] , monto: data['monto'] },
                     success:function(resp, textStatus, jqXHR) 
                      {
                      var data = $.parseJSON(resp);
                      $MPC.openCheckout({
                        url: data.ipoint,
                        mode: "modal",
                        onreturn: function(json) {                    	
                          if (json.collection_status=='approved')
                          {
                          	// return false;
                            swal("Compra Realizada!", "Se envió un email al comprador", "success");
                            $('#modalMetodoPagoWeb').modal('toggle');
                            $('#modal_info').modal('toggle');
                            // window.setTimeout(slowAlert, 2000);
                            setTimeout(window.location.replace("index.php"), 3000);
                            // setTimeout();                    
                          }
                          else if(json.collection_status=='pending')
                          {
                          	swal("El usuario no completó el pago","" , "error");
                            // alert('El usuario no completó el pago');
                          }
                          else if(json.collection_status=='in_process')
                          {    
                          	swal("El pago está siendo revisado","" , "warning");                          	
                            // alert('El pago está siendo revisado');    
                          }
                          else if(json.collection_status=='rejected')
                          {
                          	swal("El pago fué rechazado","el usuario puede intentar nuevamente el pago" , "error");
                            // alert('El pago fué rechazado, el usuario puede intentar nuevamente el pago');
                          }
                          else if(json.collection_status==null)
                          {
                          	swal("El usuario no completó el proceso de pago","no se ha generado ningún pago" , "error");
                            // alert('El usuario no completó el proceso de pago, no se ha generado ningún pago');
                          }
                        }
                      });
                    }
                  })
                  .fail(function() {
                    // alert( "error2" );
                    swal("Se registró un error","intentelo nuevamente" , "error");
                  })
                  .always(function() {
                    $("#cargando").hide();
                  });
            });

          }
        })
        .fail(function() {
          swal("Se registró un error","Por favor, intente nuevamente" , "error");
          // alert( "error1" );
        })
        .always(function() {
          // $("#cargando").hide();
          //acá sacar el cargando
        });
}