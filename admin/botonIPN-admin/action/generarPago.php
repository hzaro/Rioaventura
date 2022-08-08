<?php
  require_once("../includes/config.php");
  require_once("../../../botonIPN/includes/funciones.php");
  require_once("../includes/mercadopago/mercadopago.php");
  session_start(); // inicio sesiones.
  
  try
  {
   $bd=conectar_bd();





$caca = $_POST['planNumero'];
              $sql2="SELECT
                      monto, id
                    FROM 
                      planes
                    WHERE 
                      id = $caca";
              $sth2=$bd->prepare($sql2);
            
              $sth2->execute(array());
              $plan=$sth2->fetch(PDO::FETCH_ASSOC);



             












    // Esto hay que sacarlo de la base de datos. Falta hacerlo

    
    // if(!isset($_POST['monto']) || $_POST['monto']=="0" || !is_numeric($_POST['monto']))
    // {
    //   throw new Exception("Monto incorrecto.");
    // }
    
    // if(isset($_POST['me']) && $_POST['me']==1 && ($_POST['me_cp']=="" || $_POST['me_cp']==0))
    // {
    //   throw new Exception("CP incorrecto.");
    // }
    

    //si es un producto y no un botón para elegir cuánto pagar, el monto debería setearse acá desde la BD o fijo y no leer desde $_POST
    
    
    //Leo los campos del formulario y los guardo

    $nombre_mascota = $_POST['nombre_mascota'];
    $tipo = $_POST['tipo'];
    $sexo = $_POST['sexo'];
    $raza = $_POST['raza'];
    $latitud_perdido = $_POST['latitudPerdido'];
    $longitud_perdido = $_POST['longitudPerdido'];
    $fecha_perdido = $_POST['fecha_perdido'];
    $hora_perdido = $_POST['hora_perdido'];
    $info_adicional = $_POST['info_adicional'];
    $nombre = $_POST['nombre_dueno'];
    $email = $_POST['email_dueno'];
    $telefono = $_POST['telefono_dueno'];
    $usuario_facebook = $_POST['usuario_facebook'];
    $usuario_instagram = $_POST['usuario_instagram'];
    $idPlanBaseDatos=$plan['id'];
    $fechaActual=date("Y-m-d H:i:s");

    if (isset($_POST['recompensaCheck'])) 
      {
         $recompensa_monto = $_POST['recompensa'];
         $recompensa=1;
      }else
      {
        $recompensa=0;
        $recompensa_monto = 0;
      }

    $recompensa_si = $_POST['recompensa'];

    $email_negocio = "federico.gispert@gmail.com";


    $sql="INSERT INTO solicitudes (fecha_alta, nombre_mascota, tipo_mascota, sexo_mascota, raza_mascota, latitud_perdido, longitud_perdido, fecha_perdido, hora_perdido, recompensa, recompensa_monto, info_adicional, nombre_dueno, email_dueno, telefono_dueno, facebook_dueno, instagram_dueno, id_plan) VALUES ('$fechaActual', '$nombre_mascota', '$tipo', '$sexo', '$raza', '$latitud_perdido', '$longitud_perdido', '$fecha_perdido', '$hora_perdido', '$recompensa', '$recompensa_monto', '$info_adicional', '$nombre', '$email', '$telefono', '$usuario_facebook', '$usuario_instagram', '$idPlanBaseDatos')";
    
    $sth1=$bd->prepare($sql);
  
    $sth1->execute();
    
    //El id lo uso como external_referenca
    $id_nuevo=$bd->lastInsertId();

    $_SESSION['id_pago']=$id_nuevo;

    foreach ($_FILES["imagen"]["error"] as $key => $error) {
        if ($error == UPLOAD_ERR_OK) {
            
        $path = $_FILES["imagen"]['name'][$key];
        $ext = pathinfo($path, PATHINFO_EXTENSION);

        //ACA CREAS LAS VARIABLE PARA GUARDARLO
        $directorio="../../perdidos"; 
        $archivo=$_FILES["imagen"]['tmp_name'][$key]; 
        $nombrearchivo="image_".uniqid().".".$ext;

        //ACA LO GUARDAS EN UNA CARPETA
        move_uploaded_file($archivo, $directorio."/".$nombrearchivo); 
        $directorio=$directorio."/".$nombrearchivo;
            
            // basename() puede evitar ataques de denegación de sistema de ficheros;
            // podría ser apropiada más validación/saneamiento del nombre del fichero
            
            $sql_imagenes="INSERT INTO imagenes_solicitudes (id_solicitud, imagen) VALUES ( '$id_nuevo', '$nombrearchivo' )";    
            $sth_imagenes=$bd->prepare($sql_imagenes);           
            $sth_imagenes->execute();          

        }
    }


    
    $mp = new MP(MP_CLIENT_ID, MP_CLIENT_SECRET);
    
    // Mercado envíos, si no se quiere usar no hay que hacer nada, simplemente no mandarle estas variables desde el html
    $shipments=array();
    if(isset($_POST['me']) && $_POST['me']==1)
    {
      $shipments=array(
        "mode" => "me2",
        "dimensions" => PACKAGE_HEIGHT."x".PACKAGE_WIDTH."x".PACKAGE_DEPTH.",".PACKAGE_WEGHT,
        "local_pickup" => LOCAL_PICKUP,
        "receiver_address" => array(
          "zip_code" => $_POST["me_cp"]
        )
      );
    }
    // Fin mercado envíos
    
    $preference_data = array(
      "items" => array(
        array(
          "title" => "Pago de ".$plan['monto']." pesos",
          "currency_id" => "ARS",
          "category_id" => "Category",
          "quantity" => 1,
          "unit_price" => floatval($plan['monto'])
        )
      ),
      "notification_url" => MP_IPN,
      "external_reference" => $id_nuevo, //Acá se puede poner cualquier cosa para después poder identificar el pago, en este caso uso el id de lo que guardé en la bd
      "expires" => false,
      "expiration_date_from" => null,
      "expiration_date_to" => null,
      "shipments" => $shipments
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
