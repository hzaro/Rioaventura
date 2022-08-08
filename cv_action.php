<?php
include_once("PHPMailer/class.phpmailer.php");
if(isset($_POST['enviar']) && $_POST['enviar']=="1") {
     
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "ramoutdoor@gmail.com";
    $email_subject = "Contacto por oportunidades laborales desde la pagina web";
     
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
    
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $email=$_POST['email'];
    $experiencias=$_POST['experiencias'];
    
    
    
    $tiene_foto=false;
    $tiene_foto=isset($_POST['foto']) ? true : false;
	if($tiene_foto)
	{
		$foto=$_POST['foto'];
		
		$id_u=uniqid();
		
		$output_file="/tmp/{$id_u}.jpg";
		$data = explode(',', $foto);
		if($output_file!="")
		{
			$ifp = fopen($output_file, "wb"); 
			fwrite($ifp, base64_decode($data[1])); 
			fclose($ifp); 
		}
	}
     
    $altmsj .= "Nombre: ".clean_string($nombre)."\n";
    $altmsj .= "Apellido: ".clean_string($apellido)."\n";
    $altmsj .= "Email: ".clean_string($email)."\n";
    $altmsj .= "Experiencias: ".clean_string($experiencias)."\n";
    
    $htmlmsj .= "Nombre: ".clean_string($nombre)."<br />";
    $htmlmsj .= "Apellido: ".clean_string($apellido)."<br />";
    $htmlmsj .= "Email: ".clean_string($email)."<br />";
    $htmlmsj .= "Experiencias: ".clean_string(str_replace("\n","<br />",$experiencias))."<br />";

     
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
		
		if($tiene_foto)
		{
			$mail->addAttachment("/tmp/{$id_u}.jpg","Foto.jpg");
		}

		if (!$mail->send())
		{
			$respuesta["estado"]="err";
		}
		else
		{
			$respuesta["estado"]="ok";
		}
		
		if($tiene_foto)
		{
			unlink("/tmp/{$id_u}.jpg");
		}
		
		echo json_encode($respuesta);
}
?>






