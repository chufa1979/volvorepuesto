<?php require_once('Connections/cone.php');
	
	mysql_select_db($database_cone, $cone);
	$query_rs_b2 = "SELECT * FROM volvo_banner WHERE id = '2'";
	$rs_b2 = mysql_query($query_rs_b2, $cone) or die(mysql_error());
	$row_rs_b2 = mysql_fetch_assoc($rs_b2);
	$totalRows_rs_b2 = mysql_num_rows($rs_b2);	
	
	$busca = $_POST['busca'];
	mysql_select_db($database_cone, $cone);
	$query_rs_p6 = "SELECT * FROM volvo_productos WHERE nombre LIKE '%$busca%' OR descripcion LIKE '%$busca%'";
	$rs_p6 = mysql_query($query_rs_p6, $cone) or die(mysql_error());
	$row_rs_p6 = mysql_fetch_assoc($rs_p6);
	$totalRows_rs_p6 = mysql_num_rows($rs_p6);	
	
	mysql_select_db($database_cone, $cone);
	$query_rs_cate = "SELECT * FROM volvo_categorias ORDER BY categoria ASC";
	$rs_cate = mysql_query($query_rs_cate, $cone) or die(mysql_error());
	$row_rs_cate = mysql_fetch_assoc($rs_cate);
	$totalRows_rs_cate = mysql_num_rows($rs_cate);		
	
	mysql_select_db($database_cone, $cone);
	$query_rs_catem = "SELECT * FROM volvo_categorias ORDER BY categoria ASC";
	$rs_catem = mysql_query($query_rs_catem, $cone) or die(mysql_error());
	$row_rs_catem = mysql_fetch_assoc($rs_catem);
	$totalRows_rs_catem = mysql_num_rows($rs_catem);
	
	mysql_select_db($database_cone, $cone);
	$query_rs_moneda = "SELECT * FROM volvo_moneda WHERE id = 1";
	$rs_moneda = mysql_query($query_rs_moneda, $cone) or die(mysql_error());
	$row_rs_moneda = mysql_fetch_assoc($rs_moneda);
	$totalRows_rs_moneda = mysql_num_rows($rs_moneda);      									
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<title>VOLVO REPUESTOS</title>
<meta name="description" content="Para tener el mejor rendimiento de tu Volvo con la máxima eficiencia y seguridad, elegí siempre repuestos originales. Encontrá los mejores precios para mantener tu camión o bus y aprovechá las promociones que tenemos para vos." />
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" />
<link href="styles.css" rel="stylesheet" type="text/css" />
<link href="styles-media.css" rel="stylesheet" type="text/css" />

<!-- bxSlider -->
	<script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type='text/javascript' src="js/jquery.bxslider.min.js"></script>
    <link rel="stylesheet" type="text/css" href="js/jquery.bxslider.css" />
    <script type='text/javascript'>
        $(document).ready(function(){
          $('.slider1').bxSlider({
            slideWidth: 210,
            minSlides: 2,
            maxSlides: 4,
            moveSlides: 1,
            slideMargin: 7
          });
        });
    </script>

<!-- Resize -->
	<script src='js/resize.js' type="text/javascript"></script>

<!-- Smooth -->
	<script type='text/javascript'>
      $(function() {
        $('a[href*="#"]:not([href="#"])').click(function() {
          if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
              $('html, body').animate({
                scrollTop: target.offset().top
              }, 1000);
              return false;
            }
          }
        });
      });
        function cierra() {
            $(".sections_busca").hide();
        }
    </script>

<!-- Menu responsive -->
	<script src='js/menu.js' type="text/javascript"></script>
    
<!-- fancyBox -->
	<script type="text/javascript" src="js/source/jquery.fancybox.js?v=2.1.5"></script>
    <link rel="stylesheet" type="text/css" href="js/source/jquery.fancybox.css?v=2.1.5" media="screen" />
    <script type="text/javascript">
        $(document).ready(function() {
            $('.fancybox').fancybox();
            
            <?php if (isset($_GET['reclamos'])) { ?>
            $('#llo').trigger('click');
            <?php } ?>
            
        });
		 function MM_showHideLayers() { //v9.0
		  var i,p,v,obj,args=MM_showHideLayers.arguments;
		  for (i=0; i<(args.length-2); i+=3) 
		  with (document) if (getElementById && ((obj=getElementById(args[i]))!=null)) { v=args[i+2];
			if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
			obj.visibility=v; }
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

<!-- Encabezado -->
<?php include("included/header.php"); ?>
<!-- fin Encabezado -->

<!-- Menu principal -->
<?php include("included/nav.php"); ?>
<!-- fin Menu principal -->

<!-- Menu responsive -->
<?php include("included/nav-responsive.php"); ?>
<!-- Menu responsive -->

<div class="main">

<!-- BUSCADOR -->
<?php include("included/buscador.php"); ?>
<!-- fin BUSCADOR -->


<!-- CONTENIDO -->
<div class="sections_login">
  <form id="form3" name="form3" method="post" action="consulta_producto_ok.php">
  <div class="titulo_seccion">Formulario de solicitud de informaci&oacute;n de repuestos</div>
	<div class="subtitulo_seccion">
    <?php
	if (isset($_SESSION['idweb'])) { 
		$vidcli = $_SESSION['idweb'];
		mysql_select_db($database_cone, $cone);
		$query_rs_cliente = "SELECT * FROM volvo_clientes WHERE id = '$vidcli'";
		$rs_cliente = mysql_query($query_rs_cliente, $cone) or die(mysql_error());
		$row_rs_cliente = mysql_fetch_assoc($rs_cliente);
		$totalRows_rs_cliente = mysql_num_rows($rs_cliente);	
			
	}
	?>
	  <table width="100%" border="0" cellpadding="0" cellspacing="0">
	    <tr>
	      <td width="170" align="right">Nombre*&nbsp;&nbsp;</td>
	      <td align="left"><input name="nombre" type="text" class="login_campo" id="nombre" required="required" value="<?php echo $row_rs_cliente['nombre']; ?>" /></td>
	      </tr>
        <tr>
          <td align="right">Apellido*&nbsp;&nbsp;</td>
          <td align="left"><input name="apellido" type="text" class="login_campo" id="apellido" required="required" value="<?php echo $row_rs_cliente['apellido']; ?>"/></td>
        </tr>
        <tr>
          <td align="right">Email*&nbsp;&nbsp;</td>
          <td align="left"><input name="email" type="text" class="login_campo" id="email" required="required" value="<?php echo $row_rs_cliente['email']; ?>" /></td>
        </tr>
        <tr>
          <td align="right">Localidad*&nbsp;&nbsp;</td>
          <td align="left"><input name="localidad" type="text" class="login_campo" id="localidad" required="required"  value="<?php echo $row_rs_cliente['localidad']; ?>"/></td>
        </tr>
        <tr>
          <td align="right">Provincia*&nbsp;&nbsp;</td>
          <td align="left">
            <select name="provincia" class="login_campo" id="provincia">
              <option value="Buenos Aires" selected="selected" <?php if (!(strcmp("Buenos Aires", $row_rs_cliente['provincia']))) {echo "selected=\"selected\"";} ?>>Buenos Aires</option>
              <option value="Catamarca" <?php if (!(strcmp("Catamarca", $row_rs_cliente['provincia']))) {echo "selected=\"selected\"";} ?>>Catamarca</option>
              <option value="CABA" <?php if (!(strcmp("CABA", $row_rs_cliente['provincia']))) {echo "selected=\"selected\"";} ?>>Ciudad Aut&oacute;noma de Buenos Aires</option>
              <option value="Chaco" <?php if (!(strcmp("Chaco", $row_rs_cliente['provincia']))) {echo "selected=\"selected\"";} ?>>Chaco</option>
              <option value="Chubut" <?php if (!(strcmp("Chubut", $row_rs_cliente['provincia']))) {echo "selected=\"selected\"";} ?>>Chubut</option>
              <option value="Corrientes" <?php if (!(strcmp("Corrientes", $row_rs_cliente['provincia']))) {echo "selected=\"selected\"";} ?>>Corrientes</option>
              <option value="Formosa" <?php if (!(strcmp("Formosa", $row_rs_cliente['provincia']))) {echo "selected=\"selected\"";} ?>>Formosa</option>
<option value="Jujuy" <?php if (!(strcmp("Jujuy", $row_rs_cliente['provincia']))) {echo "selected=\"selected\"";} ?>>Jujuy</option>
              <option value="La Pampa" <?php if (!(strcmp("La Pampa", $row_rs_cliente['provincia']))) {echo "selected=\"selected\"";} ?>>La Pampa</option>
              <option value="La Rioja" <?php if (!(strcmp("La Rioja", $row_rs_cliente['provincia']))) {echo "selected=\"selected\"";} ?>>La Rioja</option>
              <option value="Mendoza" <?php if (!(strcmp("Mendoza", $row_rs_cliente['provincia']))) {echo "selected=\"selected\"";} ?>>Mendoza</option>
              <option value="Misiones" <?php if (!(strcmp("Misiones", $row_rs_cliente['provincia']))) {echo "selected=\"selected\"";} ?>>Misiones</option>
              <option value="Salta" <?php if (!(strcmp("Salta", $row_rs_cliente['provincia']))) {echo "selected=\"selected\"";} ?>>Salta</option>
              <option value="San Juan" <?php if (!(strcmp("San Juan", $row_rs_cliente['provincia']))) {echo "selected=\"selected\"";} ?>>San Juan</option>
              <option value="San Luis" <?php if (!(strcmp("San Luis", $row_rs_cliente['provincia']))) {echo "selected=\"selected\"";} ?>>San Luis</option>
              <option value="Santa Cruz" <?php if (!(strcmp("Santa Cruz", $row_rs_cliente['provincia']))) {echo "selected=\"selected\"";} ?>>Santa Cruz</option>
              <option value="Santa Fe" <?php if (!(strcmp("Santa Fe", $row_rs_cliente['provincia']))) {echo "selected=\"selected\"";} ?>>Santa Fe</option>
              <option value="Santiago del Estero" <?php if (!(strcmp("Santiago del Estero", $row_rs_cliente['provincia']))) {echo "selected=\"selected\"";} ?>>Santiago del Estero</option>
              <option value="Tierra del Fuego" <?php if (!(strcmp("Tierra del Fuego", $row_rs_cliente['provincia']))) {echo "selected=\"selected\"";} ?>>Tierra del Fuego</option>
</select></td>
        </tr>
        <tr>
          <td align="right">&nbsp;</td>
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td height="35" align="right">Producto de inter&eacute;s&nbsp;&nbsp;</td>
          <td align="left"><strong><?php echo $_GET['producto'];?> (C&oacute;d: <?php echo $_GET['item'];?>)
            <input name="producto" type="hidden" id="producto" value="<?php echo $_GET['producto'];?>" />
            <input name="item" type="hidden" id="item" value="<?php echo $_GET['item'];?>" />
          </strong></td>
        </tr>
        <tr>
          <td align="right">Consulta&nbsp;&nbsp;</td>
          <td align="left"><textarea name="consulta" cols="20" rows="5" class="reclamo_campos" id="consultas" ></textarea></td>
        </tr>
        <tr>
          <td align="right">&nbsp;</td>
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td align="right">&nbsp;</td>
          <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
	    <tr>
	      <td width="30" align="left"><input name="acepta" type="checkbox" id="acepta" value="<?php
			$hora= date ("h:i:s");
			$fecha= date ("j/n/Y");
			echo 'TRUE '.$fecha.'-'.$hora;
		  ?>" required="required"/></td>
	      <td align="left"><label for="acepta">Acepto que Volvo Trucks me contacte a trav&eacute;s de correo electr&oacute;nico con fines relacionados a mi consulta.</label></td>
	      </tr>
	    </table></td>
        </tr>
        <tr>
      <td align="right">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td align="right"><input name="f" type="hidden" id="f" value="<? echo $_GET['f']?>" /></td>
      <td align="left"><input name="button" type="submit" class="enviar" id="button" value="ENVIAR CONSULTA" /></td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td align="left" class="aceptacion"><strong>Volvo Trucks &amp; Buses Argentina S.A</strong>. se preocupa por sus contactos, por lo tanto, seg&uacute;n la normativa aplicable, queremos informarte de qu&eacute; manera y por cu&aacute;l motivo almacenamos tu informaci&oacute;n en nuestros sistemas, .<a href="https://www.volvorepuestos.com.ar/privacidad.html">https://www.volvorepuestos.com.ar/privacidad.html</a></td>
    </tr>
      </table>
	</div>
  </form>
</div>
<!-- fin CONTENIDO -->

<!-- BANNER DOWN -->
<?php include("included/slider_footer.php"); ?>
<!-- fin BANNER DOWN -->

<!-- FOOTER -->
<?php include("included/footer.php"); ?>
<!-- FOOTER -->

</div>

<div class="scroll-top"><a href="#arriba"><img src="img/top.png" width="30" height="30" alt="Subir" /></a></div>

</body>
</html>
