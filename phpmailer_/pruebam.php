<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';
//Librerías para el envío de mail
include_once('class.phpmailer.php');
include_once('class.smtp.php');


$form_name = $_POST['nombre'];
$form_phone = $_POST['telefono'];
$form_email = $_POST['email'];
$form_message = $_POST['consulta'];


$email_negocio= "ramoutdoor@gmail.com";
// $email_negocio= "aixanzr@gmail.com";



//  MAIL AL NEGOCIO
$asunto = "NUEVO CONTACTO WEB";

$mensaje = '
	<html>
	<head>
	  	<title>Contacto desde la pagina web</title>		  	
	</head>
	<body>	
		<div style="text-align:center;width:-moz-fit-content;margin:0 auto;">
			<hr style="margin: 80px 0px 50px 0px;border:1px solid #e0e0e0;">
			<p style="font-size:30px;color:#67c49c;padding: 0 40px;">Contacto desde la pagina web</p>
			<div style="margin:0 auto;text-align: left;">
				<p style="color:#484848;font-size: 19px;">A continuación se detallan los datos:</p>
				<ul style="color:#484848;font-size:16px;">
					<li style="margin-bottom:5px;"><b>Nombre: </b>' . $form_name . '</li>
					<li style="margin-bottom:5px;"><b>Telefono: </b>' . $form_phone . '</li>
					<li style="margin-bottom:5px;"><b>Email: </b>' . $form_email . '</li>		  	
					<li style="margin-bottom:5px;max-width:600px;"><b>Mensaje: </b>' . $form_message . '</li>
				</ul>
			</div>
			<hr style="margin: 50px 0px 80px 0px;border:1px solid #e0e0e0;">
		</div>
	</body>
	</html>';

 
//DATOS SMTP
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "bh-61.webhostbox.net ";
$mail->Port = 465;
$mail->From = 'reservas@rioaventuramendoza.com'; 
$mail->FromName = "Contacto Web";
 
$mail->Username ='reservas@rioaventuramendoza.com';
$mail->Password = 'mailrio159*';


//Nuestra cuenta
// $mail = new PHPMailer();
// $mail->IsSMTP();
// $mail->SMTPAuth = true;
// $mail->SMTPSecure = "ssl";
// $mail->Host = "ipage.com.ar";
// $mail->Port = 465;
// $mail->From = 'aixa.nazar@ipage.com.ar'; 
// $mail->FromName = "Ipage";
// $mail->addEmbeddedImage('../img/logo.png', 'probando');

// $mail->Username ='aixa.nazar@ipage.com.ar';
// $mail->Password = 'aixa123**'; 



///////////////////////////////////////////// ENVÍO DE MAIL A NEGOCIO /////////////////////////////////////////////

//Agregar destinatario
$mail->ClearAddresses();
$mail->clearAttachments();
$mail->AddAddress($email_negocio);
// $mail->AddAddress("aixa.nazar@ipage.com.ar");
// $mail->AddAddress("clientes.contacto@ipage.com.ar");
$mail->Subject = $asunto;
$mail->Body = $mensaje;


$mail->isHTML(true);

 
//Avisar si fue enviado o no y dirigir al index
if($mail->Send()){	
	$respuesta["estado"]="ok";
}
else{
	$respuesta["estado"]="err";
}

echo json_encode($respuesta);