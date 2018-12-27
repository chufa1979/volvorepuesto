<?php require_once('Connections/cone.php');

	$codigo = $_POST['codigo'];
	$id = $_POST['id'];
	
	
	mysql_select_db($database_cone, $cone);
	$query_rs = "SELECT * FROM volvo_pedido WHERE (id = '$id' AND codigo = '$codigo')";
	$rs = mysql_query($query_rs, $cone) or die(mysql_error());
	$row_rs = mysql_fetch_assoc($rs);
	$totalRows_rs = mysql_num_rows($rs);

	if ($totalRows_rs<>0) {
		
		$idpp = $row_rs['producto'];
		mysql_select_db($database_cone, $cone);
		$query_rs_2 = "SELECT * FROM volvo_productos WHERE (id = '$idpp')";
		$rs_2 = mysql_query($query_rs_2, $cone) or die(mysql_error());
		$row_rs_2 = mysql_fetch_assoc($rs_2);
		$totalRows_rs_2 = mysql_num_rows($rs_2);
		
		$tamano = $row_rs['tamano'];
		$cantidad = $row_rs['cantidad'];
		$producto = $row_rs_2['nombre'];		
		$descripcion = $row_rs_2['descripcion'];
		$precio = $row_rs_2['precio'];
				
		
		$nombre = $row_rs['nombre'];
		$apellido = $row_rs['apellido'];
		$nya = $apellido.', '.$nombre;
		$telefono = $row_rs['telefono'];
		$email_cli = $row_rs['email'];
		
		$id_pedido = $row_rs['idcon'];

		$fecha = date("Y-m-d");
		$hora = date("H:i:s");
		$id_pedido = $row_rs['id'];
		$id_concesionario = $row_rs['idcon'];
		$reclamotxt = $_POST['reclamotxt'];
		
		$iduser = $_POST['iduser'];
		$insertSQL = "INSERT INTO volvo_reclamos (iduser,codigo,id_codigo,id_pedido,id_concesionario,reclamo,fecha,hora)
		VALUES ('$iduser','$codigo','$id','$id','$id_concesionario','$reclamotxt','$fecha','$hora')";
		mysql_select_db($database_cone, $cone);
		$Result1 = mysql_query($insertSQL, $cone) or die(mysql_error());
	/**********************EMAIL********************/
	
	    mysql_select_db($database_cone, $cone);
	    $query_rs1 = "SELECT * FROM volvo_puntos_ventas WHERE id = '$id_concesionario'";
	    $rs1 = mysql_query($query_rs1, $cone) or die(mysql_error());
	    $row_rs1 = mysql_fetch_assoc($rs1);
	    $totalRows_rs1 = mysql_num_rows($rs1);
   		$emailcon = $row_rs1['email'];
		$consecionario = $row_rs1['puntoderetiro'];
		$direccion = $row_rs1['direccion'];
		$telefono = $row_rs1['telefono'];		
		$email_con = $row_rs['email'];
		// Mandamos el mail
	
		$headers = array
		(
			'From: www.volvorepuestos.com.ar <no-reply@volvorepuestos.com.ar>',
			'Reply-to: www.volvorepuestos.com.ar <no-reply@volvorepuestos.com.ar>',
			'Content-type: text/html',
		);
	
		$headers = join("\n",$headers)."\n\n";
	
		//$cadenars1  = $row_rs1['fecha'];
		list($anio,$mes,$dia)=explode("-",$fecha); 
		
		$nroorden = str_pad($row_rs['id'], 5, "0", STR_PAD_LEFT);
		
		$body  = '<html><head><style type="text/css"> p,ul { font-family: Verdana; font-size: 11pt } </style></head><body>';
		$body .= '<p>';
		$body .= '<b>Fecha: </b> '.$dia.".".$mes.".".$anio.'<br>';
		$body .= '<b>Hora: </b> '.$hora.'<br>';
		$body .= '<b>Nro Orden: </b> '.$row_rs['codigo'].'-'.$nroorden.'<br>';
/*PRODUCTOS*/
	$ultimo = $row_rs['id'];
	mysql_select_db($database_cone, $cone);
	$query_rspro = "SELECT * FROM volvo_pedidos_productos WHERE id_compra = '$ultimo'";
	$rspro = mysql_query($query_rspro, $cone) or die(mysql_error());
	$row_rspro = mysql_fetch_assoc($rspro);
	$totalRows_rspro = mysql_num_rows($rspro); 
	
	$body .= '
<table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="60" align="center">Cantidad</td>
              <td width="250">Producto</td>
              <td width="80" align="center">Precio Unitario</td>
              <td width="80" align="center">Precio Total</td>
              </tr>';
	do {
	$body .= '	
            <tr>
              <td align="center">'.$row_rspro['cantidad'].'</td>
              <td>'.$row_rspro['item'].' | '.$row_rspro['nombre'].'</td>
              <td align="center">$ '.$row_rspro['precio'].'</td>';
			  $ppre = ($row_rspro['cantidad']*$row_rspro['precio']);
	$body .= '	
              <td align="center"><div class="listado">$ '.$ppre.'</div></td>
            </tr>
			';
	} while ($row_rspro = mysql_fetch_assoc($rspro)); 
	$body .= '
            <tr bgcolor="#D2E4EE" class="listado_puntos">
              <td height="30" align="center">&nbsp;</td>
              <td height="30">&nbsp;</td>
              <td height="30" align="center"><strong>TOTAL &raquo;</strong></td>
              <td height="30" align="center">$ '.$row_rs1['total'].'</td>
            </tr></table>	
	';
		
		$body .= '<b>Punto de retiro</b><br>';
		$body .= '<b>Concesionario: </b> '.$consecionario.'<br>';
		$body .= '<b>Dirección: </b> '.$direccion.'<br>';
		$body .= '<b>Teléfono: </b> '.$telefono.'<br>';
		$body .= '<b>Email: </b> '.$email_con.'<br><br>';
		
		$body .= '<b>Datos del Cliente</b><br>';
		$body .= '<b>Nombre: </b> '.$nya.'<br>';
		$body .= '<b>Teléfono: </b> '.$telefono.'<br>';
		$body .= '<b>Email: </b> '.$email_cli.'<br><br>';		
		
		$body .= '</body></html>';
		

			
		
		$body_1 = '';
		//@mail('rubendariovega@gmail.com','Reclamo desde www.volvorepuestos.com.ar',$body,$headers);
		@mail($emailcon,'Reclamo desde www.volvorepuestos.com.ar',$body,$headers);
		//
		
		$para = 'acvolvo@volvo.com';
			
		@mail($para,'Alerta de Reclamo desde www.volvorepuestos.com.ar',$body_1,$headers);
		
		
	}


			
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
  <div class="reclamo_encabezado">CONFIRMACI&Oacute;N DE RECEPCI&Oacute;N DE RECLAMO</div>
<br />
  <?php if ($totalRows_rs==0) { ?>
  <br />
  <?php } else { ?>
   El reclamo se ha realizado con &eacute;xito.<br />
   <br />
  Nos pondremos en contacto  a la brevedad para solucionar el incoveniente.<br />
   <br />
  Muchas gracias.
<?php } ?>
</div>

</body>
</html>
