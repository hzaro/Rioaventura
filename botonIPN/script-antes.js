$(function()
{
  $("#frmCompra").submit(function(e)
  {
    e.preventDefault();
    
    //acá mostrar un cargando
    // var formData = new FormData($("#frmCompra")[0]);
    postData = $(this).serializeArray();
    formURL = $(this).attr("action");
    alert('holo');
    
    $.ajax({
      type: "POST",
      url: formURL,
      data: postData,
      dataType: 'json',
      success:function(data, textStatus, jqXHR) 
      {
        $MPC.openCheckout({
          url: data.ipoint,
          mode: "modal",
          onreturn: function(json) {
            if (json.collection_status=='approved')
            {
              alert('Pago completado. Hacer algo.');
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
    })
    .always(function() {
      //acá sacar el cargando
    });
  });
  
  // $(".botonMP").on("click",function(e)
  // {
  //   if(typeof $(this).data('monto')!=="undefined")
  //   {
  //     monto=$(this).data('monto');
  //     $("#txtMonto").val(monto);
  //   }
    
  //   if($("#txtMonto").val()=="")
  //   {
  //     alert("Ingresar monto");
  //     e.preventDefault();
  //     return false;
  //   }
  // });
  
  // $("#btnCalcular").on("click",function(e)
  // {
  //   if($("#txtMonto").val()=="")
  //   {
  //     alert("Ingresar monto");
  //     return false;
  //   }
    
  //   if($("#txtCp").val()=="")
  //   {
  //     alert("Ingresar CP");
  //     return false;
  //   }
    
  //   $("#listaEnvio").empty();
    
  //   //acá mostrar un cargando
    
  //   monto=$("#txtMonto").val();
  //   cp=$("#txtCp").val();
    
  //   $.getJSON("action/calcularCostoEnvio.php",{monto:monto,me_cp:cp},function(data)
  //   {
  //     $.each(data.options,function(i,v){
  //       envio=v.name+": $"+v.cost+"("+(v.estimated_delivery_time.shipping < 24 ? 1 : Math.ceil(v.estimated_delivery_time.shipping/24))+" días habíles)";
  //       $("#listaEnvio").append(envio+"<br>");
  //     });
  //   })
  //   .fail(function() {
  //     alert("error");
  //   })
  //   .always(function() {
  //     //acá sacar el cargando
  //   });
  // });

});
