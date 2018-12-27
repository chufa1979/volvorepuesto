<?php require_once('Connections/cone.php');

	$vid = $_GET['vid'];
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
  <div class="reclamo_encabezado">POR FAVOR COMPLET&Aacute; LOS DATOS</div>
<form id="form1" name="form1" method="post" action="compartir_ok.php">
  <br />
    <input name="vid" type="hidden" id="vid" value="<?php echo $_GET['vid'];?>" />
    <table border="0" align="center" cellpadding="0" cellspacing="0">
      <?php if (isset($_GET['tamano'])) {?>
      <?php } ?>
      <tr>
        <td width="300" align="left" valign="top"><input name="nombre" type="text" class="reclamo_campos" id="nombre" required="required" placeholder="Tu nombre"/></td>
      </tr>
      <tr>
        <td align="left" valign="top"><input name="email" type="text" class="reclamo_campos" id="email" required="required" placeholder="Email destinatario"/></td>
      </tr>
      <tr>
        <td align="left" valign="top"><textarea name="mensaje" cols="15" rows="3" class="reclamo_campos" id="mensaje" placeholder="Mensaje"></textarea></td>
      </tr>
      <tr>
        <td><input name="button" type="submit" class="enviar" id="button" value="ENVIAR &gt;"/></td>
      </tr>
    </table>
  </form>
</div>

</body>
</html>
