<?php
  // require_once("../../botonIPN/includes/config.php");
  // require_once("../../botonIPN-admin/includes/funciones.php");
  // session_start(); // inicio sesiones.  

  // $usuario = $_SESSION['usuario'];
?>

<?php

    $iD = $_POST['id_var'];
    $categoria = $_POST['categoria_var'];
    
    
  include("../../db.php");

  $bd=conectar_bd();

    if ($categoria=="Paquete") {
        
      $query = "SELECT * FROM paquetes_bikini_tours WHERE id=$iD ";
      $sql2 = $query;

      $sth2=$bd->prepare($sql2);
      $sth2->execute(array()); 
      $paquete=$sth2->fetch(PDO::FETCH_ASSOC);

    }
    else{

      $sql2="SELECT 
          recorridos_especiales.id_especial,recorridos_especiales.id_recorrido_principal,recorridos_especiales.nombre_recorrido_especial,recorridos_especiales.precio_recorrido_especial,paquetes_bikini_tours.titulo AS nombre_paquete, paquetes_bikini_tours.tiene_transporte AS tiene_transporte_paquete, paquetes_bikini_tours.precio_transporte AS precio_transporte_paquete
        FROM 
          recorridos_especiales
        LEFT JOIN 
          paquetes_bikini_tours ON (recorridos_especiales.id_recorrido_principal=paquetes_bikini_tours.id)
        WHERE 
          recorridos_especiales.habilitado=1 AND recorridos_especiales.id_especial=".$iD."";
          
      $sth2=$bd->prepare($sql2);
      $sth2->execute();
      $paquete=$sth2->fetch(PDO::FETCH_ASSOC);

    }


?>

<?php 
  try
  {
   // $bd=conectar_bd();

    // $id = $_POST['id'];
    //           $sql2="SELECT
    //                   *
    //                 FROM 
    //                   paquetes_bikini_tours
    //                 WHERE 
    //                   id = $id";
    //           $sth2=$bd->prepare($sql2);
            
    //           $sth2->execute(array());
    //           $paquete=$sth2->fetch(PDO::FETCH_ASSOC);

    $email_negocio = "aixanzr@gmail.com";
    
    
    //Leo los campos del formulario y los guardo

    $nombre_comprador = $_POST['nombre_comprador'];
    $email_comprador = $_POST['email_comprador'];
    $telefono_comprador = $_POST['telefono_comprador'];    

    $fecha_reserva = $_POST['fecha'];    
    $cantidad_personas = $_POST['cant_personas'];    
    $paquete_elegido= isset($paquete['titulo']) ? $paquete['titulo'] : $paquete['nombre_paquete'];     
    $eligio_transporte= $_POST['precio_transporte'];

    $mensaje = $_POST['mensaje'];

    if ($eligio_transporte !=="0" ) {  
      $transporte_contratado = 1;    
      $precio_transporte = isset($paquete['precio_transporte_paquete']) ? $paquete['precio_transporte_paquete'] : $paquete['precio_transporte'];
    }
    else{
      $transporte_contratado = 0;
      $precio_transporte = 0;
    }

    $recorrido_elegido = isset($paquete['nombre_recorrido_especial']) ? $paquete['nombre_recorrido_especial'] : "";
    $costo_paquete = isset($paquete['precio']) ? $paquete['precio'] : $paquete['precio_recorrido_especial'];
    $precio_persona = $costo_paquete + $precio_transporte;
    $precio_total = $precio_persona*$cantidad_personas;


    $sql="INSERT INTO compras (   
      nombre_comprador,
      email_comprador, 
      telefono_comprador,
      fecha_reserva, 
      cantidad_personas, 
      paquete_elegido, 
      recorrido_elegido, 
      costo_paquete, 
      transporte_contratado, 
      mensaje,
      precio_persona,
      precio_total,comprado_panel,usuario) 
      VALUES (
      '$nombre_comprador',
      '$email_comprador', 
      '$telefono_comprador',
      '$fecha_reserva', 
      '$cantidad_personas', 
      '$paquete_elegido', 
      '$recorrido_elegido',
      '$costo_paquete',
      '$transporte_contratado',
      '$mensaje',
      '$precio_persona',
      '$precio_total','0','webpage')";
    
    $sth1=$bd->prepare($sql);
  
    $sth1->execute();
    
    //El id lo uso como external_referenca
    $id_nuevo=$bd->lastInsertId();

    $_SESSION['id_pago']=$id_nuevo;

    
    }
      catch(Exception $e)
  {
    header("HTTP/1.0 503 Service Unavailable");
    $respuesta['estado']="error ".$e;
  }


    // Json para sacar valor dólar
    // fuente: http://wp.geeklab.com.ar/gl/2013/02/14/api-json-para-cotizacion-del-dolar-en-argentina/
    $data_in = "http://ws.geeklab.com.ar/dolar/get-dolar-json.php";
    $data_json = @file_get_contents($data_in);
    if(strlen($data_json)>0)
    {
      $data_out = json_decode($data_json,true);
     
      if(is_array($data_out))
      {
        if(isset($data_out['libre'])) $dolar_hoy = $data_out['libre'];        
        // if(isset($data_out['libre'])) print "Libre: ".$data_out['libre']."<br>\n";
        // if(isset($data_out['blue'])) print "Blue: ".$data_out['blue']."<br>\n";
      }
    }


    // $sql_dolar="SELECT valor FROM valor_dolar WHERE id=1";    
    // $sth_dolar=$bd->prepare($sql_dolar);
    // $sth_dolar->execute(array());
    // $dolar=$sth_dolar->fetch(PDO::FETCH_ASSOC);
    // $valor_dolar = $dolar['valor'];

    $respuesta['estado']="ok";
    $respuesta['id']=$id_nuevo;
    $respuesta['monto']=$precio_total;
    // $respuesta['monto_dolares']= bcdiv($precio_total, $valor_dolar, 2);
    $respuesta['monto_dolares']= bcdiv($precio_total, $dolar_hoy, 2);

  echo json_encode($respuesta);
?>