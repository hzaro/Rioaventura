<?php
  @include_once("Html2Text.php");
  @include_once("PHPMailer/class.phpmailer.php");
  function mandar_mail($remitente,$destinatario,$responder_a,$asunto,$mensaje)
  { 
    try
    {      
      $html = new \Html2Text\Html2Text($mensaje);
      $mensaje_texto=$html->getText();
      
      $mail = new PHPMailer();
      if(MAIL_USE_SMTP)
      {
        $mail->isSMTP();
        $mail->Host=SMTP_HOST;
        $mail->SMTPAuth=SMTP_AUTH;
        $mail->Port=SMTP_PORT;
        if(SMTP_AUTH)
        {
          $mail->Username=SMTP_USER;
          $mail->Password=SMTP_PASS;
        }
        if(SMTP_SECURE)
        {
          $mail->SMTPSecure = SMTP_SECURE;
        }
      }

      $mail->setFrom($remitente,$remitente);
      $mail->addReplyTo($responder_a,$responder_a);
      
      $mail->addAddress($destinatario,$destinatario);
      
      $mail->Subject = $asunto;
      $mail->msgHTML($mensaje);
      $mail->AltBody = $mensaje_texto;
      
      $mail->CharSet = 'UTF-8';
      
      $mail->Send();

      return true;
    }
    catch (phpmailerException $e)
    {
      throw new Exception($e->errorMessage());
      //NO SE PUEDO MANDAR EL MAIL
    }
    catch (Exception $e)
    {
      throw new Exception($e->getMessage());
      //NO SE PUEDO MANDAR EL MAIL
    }
  }
?>
