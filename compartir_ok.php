<?php require_once('Connections/cone.php');
require("class.phpmailer.php");
	$nombre = $_POST['nombre'];
	$vid = $_POST['vid'];
	$emailto = trim($_POST['email']);
	$mensaje = $_POST['mensaje'];

		$body  = '<html><head><style type="text/css"> p,ul { font-family: Verdana; font-size: 11pt } </style></head><body>';
		$body .= '<p>';
		$body .= $mensaje.'<br><br></p>';
		$body .= '<a href="https://volvorepuestos.com.ar/producto.php?vid='.$vid.'">https://volvorepuestos.com.ar/producto.php?vid='.$vid.'</a>';
		$body .= '</body></html>';
		$asunto = $nombre.', te envía este producto de Volvo';
		
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = "mail.volvorepuestos.com.ar"; // SMTP a utilizar. Por ej. smtp.elserver.com
$mail->Username = "no-reply@volvorepuestos.com.ar"; // Correo completo a utilizar
$mail->Password = "HcP_U,b?-DfM"; // Contraseña
$mail->Port = 25; // Puerto a utilizar
$mail->From = "no-reply@volvorepuestos.com.ar"; // Desde donde enviamos (Para mostrar)
$mail->FromName = "no-reply@volvorepuestos.com.ar";
$mail->AddAddress($emailto); // Esta es la dirección a donde enviamos
$mail->IsHTML(true); // El correo se envía como HTML
$mail->Subject = $asunto; // Este es el titulo del email.
$mail->Body = $body; // Mensaje a enviar
$exito = $mail->Send(); // Envía el correo.
$mail->ClearAddresses();
//////////////////////////////////////////////////////////
			
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>VOLVO REPUESTOS</title>
<link href="styles.css" rel="stylesheet" type="text/css" />

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WGH59LV');</script>
<!-- End Google Tag Manager -->

</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WGH59LV"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div class="popup">
  <div class="reclamo_encabezado">POR FAVOR COMPLET&Aacute; LOS DATOS</div>
<br />
<br />
Muchas gracias por compartir nuestros productos<br />
<br />
   <br />
</div>

</body>
</html>
