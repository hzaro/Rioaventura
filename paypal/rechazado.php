<?php
  require_once("../botonIPN/includes/config.php");
  require_once("../botonIPN/includes/funciones.php");
  require_once("../botonIPN/includes/mail.php");

  session_start(); // inicio sesiones.

  $bd=conectar_bd();


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


  $asunto="Solicitud Rechazada Paypal";

  $textoMail_cliente = '
          <html>
            <head>
                <title>Compra de Paquete en Bikini Tours</title>        
            </head>
            <body>  
              <div style="text-align:center;width:-moz-fit-content;margin:0 auto;">
                <hr style="margin: 80px 0px 50px 0px;border:1px solid #e0e0e0;">
                <p style="font-size:30px;color:#67c49c;padding: 0 40px;">Solicitud Rechazada</p>
                <div style="margin:0 auto;text-align: left;">
                  <p style="color:#484848;font-size: 19px;">Tu solicitud de pago con Paypal fue rechazada</p>
                </div>
                <hr style="margin: 50px 0px 80px 0px;border:1px solid #e0e0e0;">
              </div>
            </body>
          </html>';


  // $textoMail_comprador=file_get_contents("../botonIPN/plantillas_mail/mail_comprador_rechazado.html");  

  mandar_mail(MAIL_FROM,$datosGuardados['email_comprador'],MAIL_REPLYTO,$asunto,$textoMail_cliente);
  // mandar_mail(MAIL_FROM,MAIL_TO,MAIL_REPLYTO,$asunto,$textoMail_comprador);


  echo $_POST['id'];
      



?>