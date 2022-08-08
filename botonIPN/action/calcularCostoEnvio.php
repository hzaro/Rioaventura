<?php
  require_once("../includes/config.php");
  require_once("../includes/mercadopago/mercadopago.php");
  
  try
  {
    if(!isset($_GET['monto']) || $_GET['monto']=="0" || !is_numeric($_GET['monto']))
    {
      throw new Exception("Monto incorrecto.");
    }
    
    if(!isset($_GET['me_cp']) || $_GET['me_cp']=="0")
    {
      throw new Exception("CP incorrecto.");
    }
    
    //si es un producto y no un botón para elegir cuánto pagar, el monto debería setearse acá desde la BD o fijo y no leer desde $_POST
    $monto=$_GET['monto'];
    
    $mp = new MP(MP_CLIENT_ID, MP_CLIENT_SECRET);
    
    $params = array(
      "dimensions" => PACKAGE_HEIGHT."x".PACKAGE_WIDTH."x".PACKAGE_DEPTH.",".PACKAGE_WEGHT,
      "zip_code" => $_GET['me_cp'],
      "item_price"=>$monto,
    );

    $response = $mp->get("/shipping_options", $params);

    $respuesta['estado']="ok";
    $respuesta['options']=$response['response']['options'];
  }  
  catch(Exception $e)
  {
    header("HTTP/1.0 503 Service Unavailable");
    $respuesta['estado']="error ".$e;
  }

  echo json_encode($respuesta);
?>
