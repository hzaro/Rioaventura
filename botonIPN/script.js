

  $("#frmCompra").submit(function(e){

      e.preventDefault();

      var formData = new FormData($("#frmCompra")[0]);
      formURL = $(this).attr("action");
      // $("#cargando").show();

      $.ajax({
        type: "POST",
        // url: "include/pagos/guarda_datos_popup.php",           
        url: formURL,           
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
        success:function(data, textStatus, jqXHR) 
        {            
          // $("#plan .close").click()
          $('#popupPago').modal()
          var montoPesos = data['monto'];
          var idParaPaypal = data['id'];             
          var montoPaypal =data['monto_dolares'];
          
           



                // $('#paypal-button div').remove(); 

                       // paypal.Button.render({

                       //        env: 'production', // Or 'sandbox'
                       //        style: {
                       //            label: 'paypal',
                       //            size:  'responsive',    // small | medium | large | responsive
                       //            shape: 'rect',     // pill | rect
                       //            color: 'blue',     // gold | blue | silver | black
                       //            tagline: false    
                       //        },
                       //        client: {
                       //            sandbox:    'AdgolH5rV1O7UX7UtPa-T0FBEkLSSUKptrFLGykpNi-OTswEkJGeLZCbpDigvyWyvYlfqKSQhUUa9IgL',
                       //            production: 'AXHIi00ueeVheQEPm51mb8VuCT-GZ6whe0qHxUg0uG8v3ENPeJcshYhjFB_lTMSBbGGXsmNvGzlZPLx2'
                       //        },

                       //        commit: true, // Show a 'Pay Now' button

                       //        payment: function(data, actions) {
                       //            return actions.payment.create({
                       //                payment: {
                       //                    transactions: [
                       //                        {
                       //                            amount: { total: montoPaypal, currency: 'USD' }
                       //                        }
                       //                    ]
                       //                }
                       //            });
                       //        },

                       //        onAuthorize: function(data, actions) {
                       //            return actions.payment.execute().then(function(payment) {

                       //              $.ajax({
                       //                  method: "POST",
                       //                  url: "paypal/pagado.php",
                       //                  data: { id: idParaPaypal }
                       //                })
                       //                  .done(function( msg ) {
                       //                   window.location.replace("gracias.php");
                       //                  });

                       //                // The payment is complete!
                       //                // You can now show a confirmation message to the customer
                       //            });
                       //        },
                       //        onCancel: function(data, actions) {
                       //              swal("No se ha terminado el proceso de pago", "", "error");
                       //            },

                       //            onError: function(err) {
                       //              $.ajax({
                       //                  method: "POST",
                       //                  url: "paypal/rechazado.php",
                       //                  data: { id: idParaPaypal }
                       //                })
                       //                  .done(function( msg ) {
                       //                    alert(msj);
                       //                    swal("Se registró un error intentelo nuevamente","" , "error");
                       //                  });
                       //            }

                       //    }, '#paypal-button');
             

          $( "#mercadopagoImagen" ).click(function() {
               $.ajax({
                  type: "POST",
                  url: "../include/pagos/pago_mercadopago.php",           
                  // url: formURL, 
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
                          window.location.replace("gracias.php");                    
                        }
                        else if(json.collection_status=='pending')
                        {
                          alert('El usuario no completó el pago');
                        }
                        else if(json.collection_status=='in_process')
                        {    
                          alert('El pago está siendo revisado');    
                        }
                        else if(json.collection_status=='rejected')
                        {
                          alert('El pago fué rechazado, el usuario puede intentar nuevamente el pago');
                        }
                        else if(json.collection_status==null)
                        {
                          alert('El usuario no completó el proceso de pago, no se ha generado ningún pago');
                        }
                      }
                    });
                  }
                })
                .fail(function() {
                  alert( "error" );
                  alert('holo');
                })
                .always(function() {
                  $("#cargando").hide();
                  //acá sacar el cargando
                });

          });   
          /*swal(data['id']);
          swal(data['monto']);*/
          
        }
      })
      .fail(function() {
        alert( "error3" );
      })
      .always(function() {
        $("#cargando").hide();
        //acá sacar el cargando
      });
  

  });
      
