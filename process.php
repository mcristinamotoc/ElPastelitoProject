<!-- Including the database connection file -->
<?php include("./connection.php"); ?>
<?php

	if (isset($_POST['submit'])){
		$nombres=htmlentities($_POST['name']);
		$email_cliente=htmlentities($_POST['email']);
		$telefono=htmlentities($_POST['phone']);
		$subject=utf8_decode($_POST['subject']);
		$rations=htmlentities($_POST['rations']);
		$cake=htmlentities($_POST['cake']);
		$cream=htmlentities($_POST['cream']);
		$mensaje=htmlentities($_POST['textarea']);
	
	/* Recoger datos para la Función MAIL*/
	$message = 'Nuevo Email El pastelito';
	$message .= '<p>Hola, ha sido registrado un nuevo mensaje desde el formulario de contacto del sitio web, según el detalle siguiente:</p> ';
	$message .= '<p>Cliente: '.$nombres.'</p> ';
	$message .= '<p>Email: '.$email_cliente.'</p> ';
	$message .= '<p>Teléfono: '.$telefono.'</p> ';
	$message .= '<p>Asunto: '.$subject.'</p> ';
	$message .= '<p>Número de raciones: '.$rations.'</p> ';
	$message .= '<p>Masa Bizcocho: '.$cake.'</p> ';
	$message .= '<p>Relleno Crema: '.$cream.'</p> ';
	$message .= '<p>Mensaje: '.$mensaje.'</p> ';

	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=UTF-8\r\n";
	$headers .= "From: ". $nombres . " <" . $email_cliente . ">\r\n";
	$emailAdmin   = "mcristinamotoc@gmail.com";
			
	if (mail($emailAdmin,$subject,$message,$headers)){
		echo "<div style ='color: blue'<b> Su mensaje ha sido enviado correctamente. Nos pondremos en contacto a la mayor brevedad posible.</b></div>";
	}	 else {
		echo 'No se ha podido enviar el mensaje.';
	}
	}
?>