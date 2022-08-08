<?php
include_once("PHPMailer/class.phpmailer.php");
if(isset($_POST['enviar']) && $_POST['enviar']=="1") {
     
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "reservas@rioaventuramendoza.com";
    $email_subject = "Contacto desde la pagina web";
     
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
    
    $nombre=$_POST['nombre'];
    $telefono=$_POST['telefono'];
    $email=$_POST['email'];
    $consulta=$_POST['consulta'];
     
    $altmsj .= "Nombre: ".clean_string($nombre)."\n";
    $altmsj .= "Email: ".clean_string($email)."\n";
    $altmsj .= "Tel: ".clean_string($telefono)."\n";
    $altmsj .= "Consulta: ".clean_string($consulta)."\n";
    
    $htmlmsj .= "Nombre: ".clean_string($nombre)."<br />";
    $htmlmsj .= "Email: ".clean_string($email)."<br />";
    $htmlmsj .= "Tel: ".clean_string($telefono)."<br />";
    $htmlmsj .= "Consulta: ".clean_string(str_replace("\n","<br />",$consulta))."<br />";

     
// create email headers
//$headers = 'From: '.$email_from."\r\n".
//'Reply-To: '.$email_from."\r\n" .
//'X-Mailer: PHP/' . phpversion();
//@mail($email_to, $email_subject, $email_message, $headers); 
//$mensaje_texto=@html2text($mensaje);

$respuesta["estado"]="err";
		
		$mail = new PHPMailer();
		$mail->isSendmail();
		$mail->setFrom($email, $nombre." ".$apellido);
		$mail->addReplyTo($email, $nombre." ".$apellido);
		
		$mail->addAddress($email_to, $email_to);
		$mail->Subject = $email_subject;
		$mail->msgHTML($htmlmsj);
		$mail->AltBody = $altmsj;

		if (!$mail->send())
		{
			$respuesta["estado"]="err";
		}
		else
		{
			$respuesta["estado"]="ok";
		}
		
		echo json_encode($respuesta);
}
?>






