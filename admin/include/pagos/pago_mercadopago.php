<?php  
  require_once("../../botonIPN-admin/includes/config.php");
  // require_once("../../botonIPN-admin/includes/funciones.php");
  require_once("../../../botonIPN/includes/funciones.php");
  require_once("../../botonIPN-admin/includes/mercadopago/mercadopago.php");
  session_start(); // inicio sesiones.
  
  try
  {

    
       
    $mp = new MP(MP_CLIENT_ID, MP_CLIENT_SECRET);
    
      
    
    $preference_data = array(
      "items" => array(
        array(
          "title" => "Pago de ".$_POST['monto']." pesos",
          "currency_id" => "ARS",
          "category_id" => "Category",
          "quantity" => 1,
          "unit_price" => floatval($_POST['monto'])
        )
      ),
      "notification_url" => MP_IPN,
      "external_reference" => $_POST['id'], //Acá se puede poner cualquier cosa para después poder identificar el pago, en este caso uso el id de lo que guardé en la bd
      "expires" => false,
      "expiration_date_from" => null,
      "expiration_date_to" => null,
      // "shipments" => $shipments
    );

    $preference = $mp->create_preference($preference_data);

    $respuesta['estado']="ok";
    $respuesta['ipoint']=$preference["response"]["init_point"];
  }  
  catch(Exception $e)
  {
    header("HTTP/1.0 503 Service Unavailable");
    $respuesta['estado']="error ".$e;
  }

  echo json_encode($respuesta);
?>