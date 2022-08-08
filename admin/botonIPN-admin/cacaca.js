$(function()
{
  $("#frmCompra").submit(function(e)
  {
    e.preventDefault();
    
    //acá mostrar un cargando
    
    postData = $(this).serializeArray();
    formURL = $(this).attr("action");
    
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
              e.preventDefault();
              window.location.replace("gracias.php");
              console.log('redirecciono');
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
              e.preventDefault();
              window.location.replace("gracias.php");
              console.log('redirecciono');
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
    })
    .done(function() {
      alert ("pagado de 10");
    });
  });


  
  $(".botonMP").on("click",function(e)
  {
    if(typeof $(this).data('monto')!=="undefined")
    {
      monto=$(this).data('monto');
      $("#txtMonto").val(monto);
    }
    
    if($("#txtMonto").val()=="")
    {
      alert("Ingresar monto");
      e.preventDefault();
      return false;
    }
  });
  
  $("#btnCalcular").on("click",function(e)
  {
    if($("#txtMonto").val()=="")
    {
      alert("Ingresar monto");
      return false;
    }
    
    if($("#txtCp").val()=="")
    {
      alert("Ingresar CP");
      return false;
    }
    
    $("#listaEnvio").empty();
    
    //acá mostrar un cargando
    
    monto=$("#txtMonto").val();
    cp=$("#txtCp").val();
    
    $.getJSON("action/calcularCostoEnvio.php",{monto:monto,me_cp:cp},function(data)
    {
      $.each(data.options,function(i,v){
        envio=v.name+": $"+v.cost+"("+(v.estimated_delivery_time.shipping < 24 ? 1 : Math.ceil(v.estimated_delivery_time.shipping/24))+" días habíles)";
        $("#listaEnvio").append(envio+"<br>");
      });
    })
    .fail(function() {
      alert("error");
    })
    .always(function() {
      //acá sacar el cargando
    });
  });
});
