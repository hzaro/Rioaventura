<?php
  require_once("../botonIPN-admin/includes/config.php");
  require_once("../botonIPN-admin/includes/funciones.php");
  require_once("../botonIPN-admin/includes/mail.php");

  session_start(); // inicio sesiones.

  $user="";
  if (isset($_SESSION['user'])) {    
    $user = $_SESSION['usuario'];
  }

  $bd=conectar_bd();

  $sql4="SELECT
          * 
        FROM 
          usuarios
        WHERE 
          user=:user";
  
  $sth4=$bd->prepare($sql4);
  $sth4->execute(array(
    ':user'=>$user,
  ));
  $datosGuardados4=$sth4->fetch(PDO::FETCH_ASSOC);

  $email_user = $datosGuardados4['email'];
  

  $bd=conectar_bd();

  $sql3="UPDATE
          compras 
        SET 
          cuenta=1
        WHERE 
          id=:external_reference";
  
  $sth3=$bd->prepare($sql3);

  $sth3->execute(array(
    ':external_reference'=>$_POST['id'],
  ));


  $sql2="SELECT
          *
        FROM 
          compras
        WHERE 
          id=:external_reference";
  
  $sth2=$bd->prepare($sql2);

  $sth2->execute(array(
    ':external_reference'=>$_POST['id'], 
  ));
  $datosGuardados=$sth2->fetch(PDO::FETCH_ASSOC);


  // Mail ADMIN

  $transporteContratado = $datosGuardados["transporte_contratado"]=="1" ? "Si" : "No";

  $textoMail_admin = '
        <html>
          <head>
              <title>Compra de Paquete en Bikini Tours</title>        
          </head>
          <body>  
            <div style="text-align:center;width:-moz-fit-content;margin:0 auto;">
              <hr style="margin: 80px 0px 50px 0px;border:1px solid #e0e0e0;">
              <p style="font-size:30px;color:#67c49c;padding: 0 40px;">Nueva Compra de Paquete en Bikini Tours</p>
              <div style="margin:0 auto;text-align: left;">
                <p style="color:#484848;font-size: 19px;">A continuación se detallan sus datos:</p>
                <ul style="color:#484848;font-size:16px;">
                  <li style="margin-bottom:5px;"><b>Nombre: </b>' . $datosGuardados["nombre_comprador"] . '</li>
                  <li style="margin-bottom:5px;"><b>Email: </b>' . $datosGuardados["email_comprador"] . '</li>        
                  <li style="margin-bottom:5px;"><b>Telefono: </b>' . $datosGuardados["telefono_comprador"] . '</li>
                  <li style="margin-bottom:5px;"><b>Fecha de Reserva: </b>' . $datosGuardados["fecha_reserva"] . '</li>
                  <li style="margin-bottom:5px;"><b>Cantidad de Personas: </b>' . $datosGuardados["cantidad_personas"] . '</li>
                  <li style="margin-bottom:5px;"><b>Paquete Elegido: </b>' . $datosGuardados["paquete_elegido"] . '</li>
                  <li style="margin-bottom:5px;"><b>Recorrido Elegido: </b>' . $datosGuardados["recorrido_elegido"] . '</li>
                  <li style="margin-bottom:5px;"><b>Costo del Paquete: </b>' . $datosGuardados["costo_paquete"] . '</li>
                  <li style="margin-bottom:5px;"><b>Transporte Contratado: </b>' . $transporteContratado . '</li>
                  <li style="margin-bottom:5px;max-width:600px;"><b>Mensaje: </b>' . $datosGuardados["mensaje"] . '</li>
                  <li style="margin-bottom:5px;max-width:600px;"><b>Precio por Persona: </b>' . $datosGuardados["precio_persona"] . '</li>
                  <li style="margin-bottom:5px;max-width:600px;"><b>Precio Total: </b>' . $datosGuardados["precio_total"] . '</li>
                  <li style="margin-bottom:5px;max-width:600px;"><b>Comprado por panel: </b>Si</li>
                  <li style="margin-bottom:5px;max-width:600px;"><b>Opción de Pago: </b> A cuenta </li>
                  <li style="margin-bottom:5px;max-width:600px;"><b>Usuario: </b>' . $datosGuardados['usuario'] . '</li>
                </ul>
              </div>
              <hr style="margin: 50px 0px 80px 0px;border:1px solid #e0e0e0;">
            </div>
          </body>
        </html>';  

      mandar_mail(MAIL_FROM,MAIL_TO,MAIL_REPLYTO,MAIL_SUBJECT,$textoMail_admin);
      mandar_mail(MAIL_FROM,'gabrielreta777@gmail.com',MAIL_REPLYTO,MAIL_SUBJECT,$textoMail_admin);
      // mandar_mail(MAIL_FROM,'aixanzr@gmail.com',MAIL_REPLYTO,MAIL_SUBJECT,$textoMail_admin);

      if (!isset($_SESSION['admin'])) {    
        $user = $datosGuardados['usuario'];

        $sql_correo="SELECT
                * 
              FROM 
                usuarios
              WHERE 
                user=:user";
        
        $sth_correo=$bd->prepare($sql_correo);
        $sth_correo->execute(array(
          ':user'=>$user,
        ));
        $datosGuardados_correo=$sth_correo->fetch(PDO::FETCH_ASSOC);

        $email_user = $datosGuardados_correo['email'];
        mandar_mail(MAIL_FROM,$email_user,MAIL_REPLYTO,MAIL_SUBJECT,$textoMail_admin);
      }


  // Mail Cliente

  $transporteContratado = $datosGuardados["transporte_contratado"]=="1" ? "Si" : "No";

  $mensaje_cliente_asunto ="Compra en Bikini Tours";
  $textoMail_cliente = '
          <html>
            <head>
                <title>Compra de Paquete en Bikini Tours</title>        
            </head>
            <body>  
              <div style="text-align:center;width:-moz-fit-content;margin:0 auto;">
                <hr style="margin: 80px 0px 50px 0px;border:1px solid #e0e0e0;">
                <p style="font-size:30px;color:#67c49c;padding: 0 40px;">Hiciste una Compra en Bikini Tours</p>
                <div style="margin:0 auto;text-align: left;">
                  <p style="color:#484848;font-size: 19px;">A continuación se detallan sus datos:</p>
                  <ul style="color:#484848;font-size:16px;">
                    <li style="margin-bottom:5px;"><b>Fecha de Reserva: </b>' . $datosGuardados["fecha_reserva"] . '</li>
                    <li style="margin-bottom:5px;"><b>Cantidad de Personas: </b>' . $datosGuardados["cantidad_personas"] . '</li>
                    <li style="margin-bottom:5px;"><b>Paquete Elegido: </b>' . $datosGuardados["paquete_elegido"] . '</li>
                    <li style="margin-bottom:5px;"><b>Recorrido Elegido: </b>' . $datosGuardados["recorrido_elegido"] . '</li>
                    <li style="margin-bottom:5px;"><b>Costo del Paquete: </b>$' . $datosGuardados["costo_paquete"] . '</li>
                    <li style="margin-bottom:5px;"><b>Transporte Contratado: </b>' . $transporteContratado . '</li>
                    <li style="margin-bottom:5px;max-width:600px;"><b>Precio por Persona: </b>$' . $datosGuardados["precio_persona"] . '</li>
                    <li style="margin-bottom:5px;max-width:600px;"><b>Precio Total: </b>$' . $datosGuardados["precio_total"] . '</li>
                    <li style="margin-bottom:5px;max-width:600px;"><b>Mensaje: </b>' . $datosGuardados["mensaje"] . '</li>
                  </ul>
                </div>
                <hr style="margin: 50px 0px 80px 0px;border:1px solid #e0e0e0;">
              </div>
            </body>
          </html>';

         
  if(mandar_mail(MAIL_FROM,$datosGuardados['email_comprador'],MAIL_REPLYTO,$mensaje_cliente_asunto,$textoMail_cliente)){

    $sql4="UPDATE
            compras 
          SET 
            mail_enviado=1
          WHERE 
            id=:external_reference";
    
    $sth4=$bd->prepare($sql4);
  
    $sth4->execute(array(
      ':external_reference'=>$_POST['id'],
    ));  

  }


  $sql7="INSERT INTO pagos (id_compra, pagado_usuario) VALUES (:id_compra,:pagado_usuario) ON DUPLICATE KEY UPDATE id_compra=:id_compra,pagado_usuario=:pagado_usuario";

  $sth7=$bd->prepare($sql7);

  $sth7->execute(array(
    ':id_compra'=>$_POST['id'],
    // ':external_reference'=>$_POST['id'],  
    // ':id_compra'=>$payment_info["response"]["collection"]["external_reference"],  
    // ':pagado_paypal_si'=>1,
    // ':monto_paypal'=>$payment_info["response"]["collection"]["status"],
    ':pagado_usuario'=>$_POST['monto'],
  ));


?>