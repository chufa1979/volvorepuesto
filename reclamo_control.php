<?php require_once('Connections/cone.php');


	$codigo = $_POST['codigo'];
	$id = $_POST['id'];
	
	mysql_select_db($database_cone, $cone);
	$query_rs_pe = "SELECT * FROM volvo_pedido WHERE (id = '$id' AND codigo = '$codigo')";
	$rs_pe = mysql_query($query_rs_pe, $cone) or die(mysql_error());
	$row_rs_pe = mysql_fetch_assoc($rs_pe);
	$totalRows_rs_pe = mysql_num_rows($rs_pe);
	
	if ($totalRows_rs_pe<>0) {
		
	$nroorden = str_pad($row_rs_pe['id'], 5, "0", STR_PAD_LEFT);
	$id_concesionario = $row_rs_pe['idcon'];
	
	mysql_select_db($database_cone, $cone);
	$query_rs1 = "SELECT * FROM volvo_puntos_ventas WHERE id = '$id_concesionario'";
	$rs1 = mysql_query($query_rs1, $cone) or die(mysql_error());
	$row_rs1 = mysql_fetch_assoc($rs1);
	$totalRows_rs1 = mysql_num_rows($rs1);
	$emailcon = $row_rs1['email'];
	$consecionario = $row_rs1['puntoderetiro'];
	$direccion = $row_rs1['direccion'];
	$telefono = $row_rs1['telefono'];		
	$email_con = $row_rs1['email'];
			
	
	$vid = $_POST['vid'];
	mysql_select_db($database_cone, $cone);
	$query_rs = "SELECT * FROM volvo_productos WHERE id = '$vid'";
	$rs = mysql_query($query_rs, $cone) or die(mysql_error());
	$row_rs = mysql_fetch_assoc($rs);
	$totalRows_rs = mysql_num_rows($rs);


	mysql_select_db($database_cone, $cone);
	$query_rs2 = "SELECT * FROM volvo_puntos_ventas ORDER BY puntoderetiro ASC";
	$rs2 = mysql_query($query_rs2, $cone) or die(mysql_error());
	$row_rs2 = mysql_fetch_assoc($rs2);
	$totalRows_rs2 = mysql_num_rows($rs2);		
	
	}
		
			
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>VOLVO REPUESTOS</title>
<link href="styles.css" rel="stylesheet" type="text/css" />
<link href="styles-media.css" rel="stylesheet" type="text/css" />
<script>
	function valida(){ 
		//valido el nombre 
		if (document.form1.puntoderetiro.value == 0) { 
		   alert("Debe seleccionar un Punto de Retiro") ;
		   document.form1.puntoderetiro.focus() ;
		   return false;
		} else {	
			return true; 
		}
	}
</script>

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
  <div class="reclamo_encabezado">POR FAVOR COMPLET&Aacute; TU RECLAMO<br />
  </div>
<?php if ($totalRows_rs_pe<>0) { ?>
  <form id="form1" name="form1" method="post" action="reclamo_ok.php">
    <br />
    <table border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="150" class="pedido_label">N&deg; Orden</td>
        <td><strong><?php echo $row_rs_pe['codigo'];?> - <?php echo $nroorden; ?></strong></td>
      </tr>
      <tr>
        <td class="pedido_label">Punto de Retiro</td>
        <td><strong><?php echo $consecionario;?>&nbsp;</strong></td>
      </tr>
      <tr>
        <td class="pedido_label">Direcci&oacute;n</td>
        <td><strong><?php echo $direccion; ?>&nbsp;</strong></td>
      </tr>
      <tr>
        <td class="pedido_label">Tel&eacute;fono</td>
        <td><strong><?php echo $telefono; ?></strong></td>
      </tr>
      <tr>
        <td class="pedido_label">E-mail</td>
        <td><strong><?php echo $email_con; ?></strong></td>
      </tr>
      <tr>
        <td class="pedido_label">RECLAMO*</td>
        <td width="60%"><textarea name="reclamotxt" cols="10" rows="2" required="required" class="reclamo_campos" id="reclamotxt"></textarea></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td height="20">* obligatorio</td>
      </tr>
      <tr>
        <td height="20" colspan="2" align="right" valign="top" class="pedido_info"><input name="iduser" type="hidden" id="iduser" value="<?php echo $row_rs_pe['iduser']; ?>" />
        
          <input name="codigo" type="hidden" id="codigo" value="<?php echo $_POST['codigo']; ?>" />
        <input name="id" type="hidden" id="id" value="<?php echo $_POST['id']; ?>" /></td>
      </tr>
      <tr>
        <td colspan="2"><input name="button" type="submit" class="enviar" id="button" value="ENVIAR &gt;"/></td>
      </tr>
    </table>
  </form>
  <?php } else { ?>
<br />El N&deg; Orden de pedido no existe. Por favor y vuelva a intentarlo.<br />
  <br />
    <a href="reclamo.php" class="bot_seguir">VOLVER</a><br />
  <?php }  ?>
</div>

</body>
</html>
