<?php
  // require_once("../../../botonIPN/includes/config.php");
  require_once("../includes/config.php");

  require_once("../../../botonIPN/includes/funciones.php");
  require_once("../includes/mercadopago/mercadopago.php");
  require_once("../includes/mail.php");

  session_start(); // inicio sesiones.
  $bd=conectar_bd();

  $mp = new MP(MP_CLIENT_ID, MP_CLIENT_SECRET);

  $bd=conectar_bd();

  if (!isset($_GET["data_id"]) || !ctype_digit($_GET["data_id"])) {
    http_response_code(400);
    return;
  }
  $payment_info = $mp->get_payment_info($_GET["data_id"]);

  if ($payment_info["status"] == 200) {

    //file_put_contents("/home/ipageldl/public_html/desarrollo/wakoCagon/botonIPN/action/a.txt",print_r($_GET["data_id"],true));die();


      $sql="INSERT INTO pagos (id_compra, id_mercadopago, status, transaction_amount) VALUES (:id_compra,:id_mercadopago,:status,:transaction_amount) ON DUPLICATE KEY UPDATE 
             id_compra=:id_compra,id_mercadopago=:id_mercadopago,status=:status,transaction_amount=:transaction_amount";

              $sth1=$bd->prepare($sql);
    
      $sth1->execute(array(
        ':id_mercadopago'=>$payment_info["response"]["collection"]["id"],
        ':id_compra'=>$payment_info["response"]["collection"]["external_reference"],
        ':status'=>$payment_info["response"]["collection"]["status"],
        ':transaction_amount'=>$payment_info["response"]["collection"]["transaction_amount"],
      ));
        
        
        if($sth1->rowCount()>0) //algo cambió
        {
          $estado=$payment_info["response"]["collection"]["status"];
          $numero=$payment_info["response"]["collection"]["id"];
          
          /*approved
          pending
          in_process
          rejected
          refunded
          cancelled
          in_mediation
          charged_back*/
          
          $pagado=0;
          
          switch($estado)
          {            
             
            case 'approved':

              $sql3="UPDATE
                      compras 
                    SET 
                      pagado=1
                    WHERE 
                      id=:external_reference";
              
              $sth3=$bd->prepare($sql3);
            
              $sth3->execute(array(
                ':external_reference'=>$payment_info["response"]["collection"]["external_reference"],
              ));

           
              $sql2="SELECT
                      *
                    FROM 
                      compras
                    WHERE 
                      id=:external_reference";
              
              $sth2=$bd->prepare($sql2);
            
              $sth2->execute(array(
                ':external_reference'=>$payment_info["response"]["collection"]["external_reference"], 
              ));
              $datosGuardados=$sth2->fetch(PDO::FETCH_ASSOC);



              if ($datosGuardados['pagado']=='1') {
                $opcionPago = 'Mercadopago';
              }
              elseif ($datosGuardados['pagado_paypal']=='1') {
                $opcionPago = 'Paypal';
              }
              elseif ($datosGuardados['cuenta']=='1') {
                $opcionPago = 'Cuenta';
              }

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
                                <li style="margin-bottom:5px;max-width:600px;"><b>Opción de Pago: </b>' . $opcionPago . '</li>
                                <li style="margin-bottom:5px;max-width:600px;"><b>Usuario: </b>' . $datosGuardados['usuario'] . '</li>
                              </ul>
                            </div>
                            <hr style="margin: 50px 0px 80px 0px;border:1px solid #e0e0e0;">
                          </div>
                        </body>
                      </html>';
              

              mandar_mail(MAIL_FROM,MAIL_TO,MAIL_REPLYTO,MAIL_SUBJECT,$textoMail_admin);
              mandar_mail(MAIL_FROM,'gabrielreta777@gmail.com',MAIL_REPLYTO,MAIL_SUBJECT,$textoMail_admin);
              // mandar_mail("aixanzr@gmail.com","achinazar@gmail.com","aixanzr@gmail.com","holo","holo no");
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

              $transporteContratado = $datosGuardados["transporte_contratado"]=="1" ? "Si" : "No";

              $mensaje_cliente_asunto ="Compra en Bikini Tours";
              $textoMail = '
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

              if(mandar_mail(MAIL_FROM,$datosGuardados['email_comprador'],MAIL_REPLYTO,$mensaje_cliente_asunto,$textoMail))
              // if(mandar_mail("aixanzr@gmail.com","achinazar@gmail.com","aixanzr@gmail.com","holo","holo no"))
                {

                    $sql4="UPDATE
                            compras 
                          SET 
                            mail_enviado=1
                          WHERE 
                            id=:external_reference";
                    
                    $sth4=$bd->prepare($sql4);
                  
                    $sth4->execute(array(
                      ':external_reference'=>$payment_info["response"]["collection"]["external_reference"],
                    ));
                
              }
              
            break;


            case 'in_process':
            break;             


            case 'pending':

             $asunto="Solicitud Pendiente de aprobación";
             $sql2="SELECT
                      *
                    FROM 
                      compras
                    WHERE 
                      id=:external_reference";
              
              $sth2=$bd->prepare($sql2);
            
              $sth2->execute(array(
                ':external_reference'=>$payment_info["response"]["collection"]["external_reference"], 
              ));
              $datosGuardados=$sth2->fetch(PDO::FETCH_ASSOC);


              $textoMail_comprador='
                      <html>
                        <head>
                            <title>Solicitud Pendiente</title>        
                        </head>
                        <body>  
                          <div style="text-align:center;width:-moz-fit-content;margin:0 auto;">
                            <hr style="margin: 80px 0px 50px 0px;border:1px solid #e0e0e0;">
                            <p style="font-size:30px;color:#67c49c;padding: 0 40px;">Solicitud de Compra Pendiente</p>
                            <div style="margin:0 auto;text-align: left;">
                              <p style="color:#484848;font-size: 19px;">Tu solicitud se encuentra pendiente de aprobación</p>
                            </div>
                            <hr style="margin: 50px 0px 80px 0px;border:1px solid #e0e0e0;">
                          </div>
                        </body>
                      </html>';               
 
              mandar_mail(MAIL_FROM,$datosGuardados['email_comprador'],MAIL_REPLYTO,$asunto,$textoMail_comprador);
              // mandar_mail(MAIL_FROM,MAIL_TO,MAIL_REPLYTO,$asunto,$textoMail_comprador);
              
            break; 

            case 'rejected':

              $asunto="Solicitud Rechazada";
              $sql2="SELECT
                      *
                    FROM 
                      compras
                    WHERE 
                      id=:external_reference";
              
              $sth2=$bd->prepare($sql2);
            
              $sth2->execute(array(
                ':external_reference'=>$payment_info["response"]["collection"]["external_reference"], 
              ));
              $datosGuardados=$sth2->fetch(PDO::FETCH_ASSOC);


              $textoMail_comprador='
                      <html>
                        <head>
                            <title>Solicitud Rechazada</title>        
                        </head>
                        <body>  
                          <div style="text-align:center;width:-moz-fit-content;margin:0 auto;">
                            <hr style="margin: 80px 0px 50px 0px;border:1px solid #e0e0e0;">
                            <p style="font-size:30px;color:#67c49c;padding: 0 40px;">Solicitud de Compra Rechazada</p>
                            <div style="margin:0 auto;text-align: left;">
                              <p style="color:#484848;font-size: 19px;">Tu solicitud fue Rechazada</p>
                            </div>
                            <hr style="margin: 50px 0px 80px 0px;border:1px solid #e0e0e0;">
                          </div>
                        </body>
                      </html>';

              mandar_mail(MAIL_FROM,$datosGuardados['email_comprador'],MAIL_REPLYTO,$asunto,$textoMail_comprador);
              // mandar_mail(MAIL_FROM,MAIL_TO,MAIL_REPLYTO,$asunto,$textoMail_comprador);
              
            break;
            case 'refunded':
              
            break;
            case 'cancelled':
              
            break;
            case 'in_mediation':
              
            break;
            case 'charged_back':
              
            break;
          }
        }
      }


      

  


?>