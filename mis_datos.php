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
	$query_rs_catem = "SELECT * FROM volvo_categorias ORDER BY categoria ASC";
	$rs_catem = mysql_query($query_rs_catem, $cone) or die(mysql_error());
	$row_rs_catem = mysql_fetch_assoc($rs_catem);
	$totalRows_rs_catem = mysql_num_rows($rs_catem);

	$vidcli = $_SESSION['idweb'];
	mysql_select_db($database_cone, $cone);
	$query_rs_cliente = "SELECT * FROM volvo_clientes WHERE id = '$vidcli'";
	$rs_cliente = mysql_query($query_rs_cliente, $cone) or die(mysql_error());
	$row_rs_cliente = mysql_fetch_assoc($rs_cliente);
	$totalRows_rs_cliente = mysql_num_rows($rs_cliente);	
	
	$vidcli = $row_rs_cliente['sucursal'];
	mysql_select_db($database_cone, $cone);
	$query_rs_cone = "SELECT * FROM volvo_puntos_ventas WHERE id = '$vidcli'";
	$rs_cone = mysql_query($query_rs_cone, $cone) or die(mysql_error());
	$row_rs_cone = mysql_fetch_assoc($rs_cone);
	$totalRows_rs_cone = mysql_num_rows($rs_cone);	
	
	mysql_select_db($database_cone, $cone);
	$query_rs_con = "SELECT * FROM volvo_puntos_ventas ORDER BY puntoderetiro ASC";
	$rs_con = mysql_query($query_rs_con, $cone) or die(mysql_error());
	$row_rs_con = mysql_fetch_assoc($rs_con);
	$totalRows_rs_con = mysql_num_rows($rs_con);		
	
	mysql_select_db($database_cone, $cone);
	$query_rs_con2 = "SELECT * FROM volvo_puntos_ventas ORDER BY puntoderetiro ASC";
	$rs_con2 = mysql_query($query_rs_con2, $cone) or die(mysql_error());
	$row_rs_con2 = mysql_fetch_assoc($rs_con2);
	$totalRows_rs_con2 = mysql_num_rows($rs_con2);	
	
	mysql_select_db($database_cone, $cone);
	$query_rs_con3 = "SELECT * FROM volvo_puntos_ventas ORDER BY puntoderetiro ASC";
	$rs_con3 = mysql_query($query_rs_con3, $cone) or die(mysql_error());
	$row_rs_con3 = mysql_fetch_assoc($rs_con3);
	$totalRows_rs_con3 = mysql_num_rows($rs_con3);		
			
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
<meta name="description" content="Para tener el mejor rendimiento de tu Volvo con la máxima eficiencia y seguridad, elegí siempre repuestos originales. Encontrá los mejores precios para mantener tu camión o bus y aprovechá las promociones que tenemos para vos." />
<title>VOLVO REPUESTOS</title>
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

<!-- Menu responsive -->
	<script src='js/menu.js' type="text/javascript"></script>
    
<!-- Smooth -->
	<script type='text/javascript'>
    function valida(){ 
        //valido el nombre 
        if (document.form3.sucursal.value =="") { 
           //alert("Debe ingresar el Punto de retiro") ;
           //document.form3.sucursal.focus() ;
           //return false;
           return true; 
        } else {	
            return true; 
        }
    }
    
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
	function MM_showHideLayers() { //v9.0
      var i,p,v,obj,args=MM_showHideLayers.arguments;
      for (i=0; i<(args.length-2); i+=3) 
      with (document) if (getElementById && ((obj=getElementById(args[i]))!=null)) { v=args[i+2];
        if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
        obj.visibility=v; }
    }
    </script>

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
  <form id="form3" name="form3" method="post" action="mis_datos_ok.php">
  <div class="titulo_seccion">IDENTIFICACI&Oacute;N</div>
	<div class="login_columnas">
  <h3>DATOS USUARIO</h3>
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="120" align="right">Usuario (e-mail)*&nbsp;&nbsp;</td>
      <td align="left"><label for="user"></label>
        <input name="user" type="text" required="required" class="login_campo" id="user" value="<?php echo $row_rs_cliente['usuario']; ?>" /></td>
    </tr>
    <tr>
      <td align="right">Contrase&ntilde;a*&nbsp;&nbsp;</td>
      <td align="left"><input name="clave" type="text" required="required" class="login_campo" id="clave" value="<?php echo $row_rs_cliente['clave']; ?>" /></td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
  </table>
  <h3>DATOS PERSONALES</h3>
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="120" align="right">Nombre*&nbsp;&nbsp;</td>
      <td align="left"><input name="nombre" type="text" required="required" class="login_campo" id="nombre" value="<?php echo $row_rs_cliente['nombre']; ?>" /></td>
    </tr>
    <tr>
      <td align="right">Apellido*&nbsp;&nbsp;</td>
      <td align="left"><input name="apellido" type="text" required="required" class="login_campo" id="apellido" value="<?php echo $row_rs_cliente['apellido']; ?>" /></td>
    </tr>
    <tr>
      <td align="right">Tel&eacute;fono*&nbsp;&nbsp;</td>
      <td align="left"><input name="telefono" type="text" required="required" class="login_campo" id="telefono" value="<?php echo $row_rs_cliente['telefono']; ?>" /></td>
    </tr>
    <tr>
      <td height="30" align="left" valign="bottom" class="aceptacion">* Datos obligatorios</td>
      <td align="left"><input name="sucursal" type="hidden" id="sucursal" value="<?php echo $row_rs_cliente['sucursal']; ?>" />
        <input name="id" type="hidden" id="id" value="<?php echo $row_rs_cliente['id']; ?>" />
        <input name="f" type="hidden" id="f" value="<? echo $_GET['f']?>" /></td>
    </tr>
  </table>
	</div>
	<div class="login_columnas">
  <h3>DATOS EMPRESA</h3>
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="100" align="right">Calle&nbsp;&nbsp;</td>
      <td colspan="5" align="left"><input name="calle" type="text" required="required" class="login_campo" id="calle" value="<?php echo $row_rs_cliente['calle']; ?>" /></td>
    </tr>
    <tr>
      <td align="right">Nro&nbsp;&nbsp;</td>
      <td align="left"><input name="nro" type="text" required="required" class="login_campo" id="nro" value="<?php echo $row_rs_cliente['num']; ?>" /></td>
      <td align="left">&nbsp;Piso&nbsp;</td>
      <td align="left"><input name="piso" type="text" class="login_campo" id="piso" value="<?php echo $row_rs_cliente['piso']; ?>" /></td>
      <td align="left">&nbsp;Depto&nbsp;</td>
      <td align="left"><input name="depto" type="text" class="login_campo" id="depto" value="<?php echo $row_rs_cliente['depto']; ?>" /></td>
    </tr>
    <tr>
      <td align="right">Localidad*&nbsp;&nbsp;</td>
      <td colspan="5" align="left"><input name="localidad" type="text" required="required" class="login_campo" id="localidad" value="<?php echo $row_rs_cliente['localidad']; ?>" /></td>
    </tr>
    <tr>
      <td align="right">Provincia*&nbsp;&nbsp;</td>
      <td colspan="5" align="left"><select name="provincia" class="login_campo" id="provincia">
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
      <td align="right">Pa&iacute;s&nbsp;&nbsp;</td>
      <td colspan="5" align="left"><input name="pais" type="text" class="login_campo" id="pais" value="<?php echo $row_rs_cliente['pais']; ?>" required="required" /></td>
    </tr>
    <tr>
      <td align="right">CUIT/CUIL*&nbsp;&nbsp;</td>
      <td colspan="5" align="left"><input name="cuitnro" type="text" required="required" class="login_campo" id="cuitnro" value="<?php echo $row_rs_cliente['cuitnro']; ?>" /></td>
    </tr>
    <tr>
      <td align="right">Cond. IVA&nbsp;&nbsp;</td>
      <td colspan="5" align="left"><select name="iva" class="login_campo" id="iva">
        <option value="Consumidor Final" selected="selected" <?php if (!(strcmp("Consumidor Final", $row_rs_cliente['iva']))) {echo "selected=\"selected\"";} ?>>Consumidor Final</option>
        <option value="Responsable Inscripto" <?php if (!(strcmp("Responsable Inscripto", $row_rs_cliente['iva']))) {echo "selected=\"selected\"";} ?>>Responsable Inscripto</option>
        <option value="Responsable no Inscripto" <?php if (!(strcmp("Responsable no Inscripto", $row_rs_cliente['iva']))) {echo "selected=\"selected\"";} ?>>Responsable no Inscripto</option>
        <option value="Responsable Monotributo" <?php if (!(strcmp("Responsable Monotributo", $row_rs_cliente['iva']))) {echo "selected=\"selected\"";} ?>>Responsable Monotributo</option>
<option value="Exento" <?php if (!(strcmp("Exento", $row_rs_cliente['iva']))) {echo "selected=\"selected\"";} ?>>Exento</option>
      </select></td>
    </tr>
  </table>
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="100" align="right">&nbsp;</td>
      <td height="30" align="left">&iquest;Qu&eacute; veh&iacute;culo Volvo posee?</td>
    </tr>
  </table>
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="100" align="right">&nbsp;</td>
      <td align="left"><table width="90%" border="0" align="left" cellpadding="0" cellspacing="0">
        <tr>
          <td width="15" height="40" align="left"><input name="fh" type="checkbox" id="fh" value="1" class="vehiculo" <?php if ($row_rs_cliente['fh']==1) { ?>checked="checked"<?php } ?>/></td>
          <td width="30" height="40" align="left">FH</td>
          <td width="15" height="40" align="left"><input name="fm" type="checkbox" id="fm" value="1" class="vehiculo" <?php if ($row_rs_cliente['fm']==1) { ?>checked="checked"<?php } ?>/></td>
          <td width="30" height="40" align="left">FM</td>
          <td width="15" height="40" align="left"><input name="fmx" type="checkbox" id="fmx" value="1" class="vehiculo" <?php if ($row_rs_cliente['fmx']==1) { ?>checked="checked"<?php } ?>/></td>
          <td width="30" height="40" align="left">FMX</td>
        </tr>
        <tr>
          <td height="40" align="left"><input name="vm" type="checkbox" id="vm" value="1" class="vehiculo" <?php if ($row_rs_cliente['vm']==1) { ?>checked="checked"<?php } ?>/></td>
          <td height="40" align="left">VM</td>
          <td height="40" align="left"><input name="b450" type="checkbox" id="b450" value="1" class="vehiculo" <?php if ($row_rs_cliente['b450']==1) { ?>checked="checked"<?php } ?>/></td>
          <td height="40" align="left">B450</td>
          <td height="40" align="left"><input name="b380" type="checkbox" id="b380" value="1" class="vehiculo" <?php if ($row_rs_cliente['b380']==1) { ?>checked="checked"<?php } ?>/></td>
          <td height="40" align="left">B380</td>
        </tr>
        <tr>
          <td height="40" align="left"><input name="b310" type="checkbox" id="b310" value="1" class="vehiculo" <?php if ($row_rs_cliente['b310']==1) { ?>checked="checked"<?php } ?>/></td>
          <td height="40" align="left">B310</td>
          <td height="40" align="left"><input name="b270" type="checkbox" id="b270" value="1" class="vehiculo" <?php if ($row_rs_cliente['b270']==1) { ?>checked="checked"<?php } ?>/></td>
          <td height="40" align="left">B270</td>
          <td height="40" align="left"><input name="otros" type="checkbox" id="otros" value="1" class="vehiculo" <?php if ($row_rs_cliente['otro']==1) { ?>checked="checked"<?php } ?>/></td>
          <td height="40" align="left">Otros</td>
        </tr>
      </table></td>
    </tr>
  </table>
    </div>
	<div class="subtitulo_seccion" id="llm">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
	    <tr>
	      <td align="left" valign="top"><strong>Punto de retiro</strong>  seleccionado para la entrega de tus pedidos.</td>
	      </tr>
	    </table>
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
	    <tr>
	      <td align="left"><div class="listado_misdatos" id="content_id_s"><strong><?php echo $row_rs_cone['puntoderetiro']; ?></strong><br />
              <?php echo $row_rs_cone['direccion']; ?> - <?php echo $row_rs_cone['localidad']; ?><br />
Tel: <?php echo $row_rs_cone['telefono']; ?><br />
Email: <?php echo $row_rs_cone['email']; ?></div></td>
	      </tr>
	    </table>
    </div>      
	<div class="subtitulo_seccion">
	  <div id="map"></div>
	</div>
	<div class="subtitulo_seccion">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
	    <tr>
	      <td colspan="2">O ingres&aacute; tu direcci&oacute;n aqu&iacute; para encontrar el concesionario oficial m&aacute;s cercano.</td>
	      </tr>
	    <tr>
	      <td colspan="2"><input name="address" type="text" class="login_campo" id="address" placeholder="Ingresa tu direcci&oacute;n.."/></td>
	      </tr>
	    <tr>
	      <td></a>
	        <input name="search" type="button" class="enviar" id="search" value="Buscar Direcci&oacute;n" style="width:150px" /></td>
	      <td>&nbsp;</td>
	      </tr>
	    </table>
	</div>
	<div class="subtitulo_seccion">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
	    <tr>
	      <td width="30" align="left"><input name="acepta" type="checkbox" id="acepta" value="1" <?php if ($row_rs_cliente['acepta']==1) { ?>checked="checked"<?php } ?>/></td>
	      <td colspan="5" align="left" class="aceptacion"><label for="acepta">Acepto recibir informaci&oacute;n y ofertas comerciales de parte de Volvo Trucks Argentina S.A. y de sus concesionarios o&#64257;ciales.</label></td>
	      </tr>
	    </table>
	</div>
	<div class="subtitulo_seccion">
	  <div class="pedido_botones1"><a href="javascript:window.history.back()" class="bot_seguir">VOLVER</a></div>
	  <div class="pedido_botones2">
	    <input name="sendform" type="submit" class="enviar" id="sendform" value="ACTUALIZAR DATOS" onclick="return valida(this.form)"/>
	    </div>
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

<script>

$('#search').live('click', function() {
    // Obtenemos la dirección y la asignamos a una variable
    var address = $('#address').val();
    // Creamos el Objeto Geocoder
    var geocoder = new google.maps.Geocoder();
    // Hacemos la petición indicando la dirección e invocamos la función
    // geocodeResult enviando todo el resultado obtenido
    geocoder.geocode({ 'address': address}, geocodeResult);
});

function geocodeResult(results, status) {
    // Verificamos el estatus
    if (status == 'OK') {
        // Si hay resultados encontrados, centramos y repintamos el mapa
        // esto para eliminar cualquier pin antes puesto
		
        var mapOptions = {
            center: results[0].geometry.location,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
			zoom: 6
        };
        map = new google.maps.Map($("#map").get(0), mapOptions);
        // fitBounds acercará el mapa con el zoom adecuado de acuerdo a lo buscado
        map.fitBounds(results[0].geometry.viewport);
        // Dibujamos un marcador con la ubicación del primer resultado obtenido
        var markerOptions = { position: results[0].geometry.location }
        var marker = new google.maps.Marker(markerOptions);
        marker.setMap(map);
		
		/***/
		      var iconBase = 'https://www.volvorepuestos.com.ar/img/map_volvo.png';
			  
			  var marker, i;
			  <?php $i = 0;?>
			  <?php do { ?>
			  
					marker = new google.maps.Marker({
					position: new google.maps.LatLng(<?php echo $row_rs_con2['latitud'];?>, <?php echo $row_rs_con2['longitud'];?>),
					animation:  google.maps.Animation.DROP,
					icon: iconBase,
					map: map
					});
				/**/
					var contentString1<?php echo $i;?> = '<div id="content">'+
						  '<div id="siteNotice">'+
						  '</div>'+
						  '<h1 id="firstHeading" class="firstHeading"><?php echo $row_rs_con2['puntoderetiro'];?></h1>'+
						  '<div id="bodyContent">'+
						  '<p><b>Direcci&oacute;n: </b> <?php echo $row_rs_con2['direccion'];?> </p>' +
						  '<p><b>Localidad: </b> <?php echo $row_rs_con2['localidad'];?> </p>' +
						  '<p><b>Tel&eacute;fono: </b> <?php echo $row_rs_con2['telefono'];?> </p>' +
						  '<p><b>C&oacute;digo: </b> <?php echo $row_rs_con2['codigo'];?> </p>' +
						  '<p><b>Email: </b> <?php echo $row_rs_con2['email'];?> </p>' +
						  '<p><input name="button2" type="button" class="enviar" id="button2" value="Seleccionar" onclick="llamar(<?php echo $row_rs_con2['id'];?>);"></p>' +
						 
						  
						  '</div>'+
						  '</div>';
					
					  var infowindow1<?php echo $i;?> = new google.maps.InfoWindow({
						content: contentString1<?php echo $i;?>
					  });			
					/**/
				google.maps.event.addListener(marker, 'click', (function(marker, i) {
				  return function() {
					infowindow1<?php echo $i;?>.open(map, marker);
				  }
				})(marker, <?php echo $i;?>));
			  <?php $i++;?>	
			  <?php } while($row_rs_con2 = mysql_fetch_assoc($rs_con2)) ?>
		/***/	
		
    } else {
        // En caso de no haber resultados o que haya ocurrido un error
        // lanzamos un mensaje con el error
        alert("Geocoding no tuvo éxito debido a: " + status);
    }
}

	  function llamar (valor) {
		  $("#muestra").css("display", "block");
		  $("#sucursal").val(valor);
		  $('#content_id_s').html('');
		  
		<?php $i = 0;?>
		<?php do { ?>
		if (valor==<?php echo $row_rs_con3['id'];?>) {
			var contenido = '<div class="mensaje" id="muestra" style="display:block; margin-bottom: 10px;"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td align="left" valign="top">Punto de retiro fue seleccionado:</td></tr></table></div><strong><?php echo $row_rs_con3['puntoderetiro'];?></strong><br /><?php echo $row_rs_con3['direccion'];?> - <?php echo $row_rs_con3['localidad'];?><br />Tel: <?php echo $row_rs_con3['telefono'];?><br />Email:<?php echo $row_rs_con3['email'];?>';
		}
		$('#content_id_s').html(contenido);
		<?php $i++;?>	
		<?php } while($row_rs_con3 = mysql_fetch_assoc($rs_con3)) ?>	
		
		$('body,html').stop(true,true).animate({				
				scrollTop: $('#llm').offset().top -20
				},500);	
		
		setInterval(function(){ $("#muestra").css("display", "none"); }, 5000);	  
	  }
      function initMap() {
		  
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('address')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);		  
		    
	  
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -38.9062503, lng: -61.1019669},
          zoom: 6
        });
        var infoWindow = new google.maps.InfoWindow({map: map});
		
		var iconBase = 'https://www.volvorepuestos.com.ar/img/map_volvo.png';
/***/
      var marker, i;
	  <?php $i = 0;?>
      <?php do { ?>
	  
        	marker = new google.maps.Marker({
          	position: new google.maps.LatLng(<?php echo $row_rs_con['latitud'];?>, <?php echo $row_rs_con['longitud'];?>),
			animation:  google.maps.Animation.DROP,
			icon: iconBase,
          	map: map
        	});
		/**/
			var contentString<?php echo $i;?> = '<div id="content">'+
				  '<div id="siteNotice">'+
				  '</div>'+
				  '<h1 id="firstHeading" class="firstHeading"><?php echo $row_rs_con['puntoderetiro'];?></h1>'+
				  '<div id="bodyContent">'+
				  '<b>Direcci&oacute;n: </b> <?php echo $row_rs_con['direccion'];?></br>' +
				  '<b>Localidad: </b> <?php echo $row_rs_con['localidad'];?></br>' +
				  '<b>Tel&eacute;fono: </b> <?php echo $row_rs_con['telefono'];?></br>' +
				  '<b>Email: </b> <?php echo $row_rs_con['email'];?></br></br>' +
				  '<input name="button2" type="button" class="enviar" id="button2" value="Seleccionar" onclick="llamar(<?php echo $row_rs_con['id'];?>); "></p>' +
				 
				  
				  '</div>'+
				  '</div>';
			
			  var infowindow<?php echo $i;?> = new google.maps.InfoWindow({
				content: contentString<?php echo $i;?>
			  });			
			/**/
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
          return function() {
            infowindow<?php echo $i;?>.open(map, marker);
          }
        })(marker, <?php echo $i;?>));
		
					
	  <?php $i++;?>	
      <?php } while($row_rs_con = mysql_fetch_assoc($rs_con)) ?>
/***/	  
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Tu ubicaci&oacute;n.');
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: El servidor de Geolocalizaci&oacute;n ha fallado.' :
                              'Error: Tu navegador no soporta geolocalizaci&oacute;n.');
      }
	  
/////////////////////////

      var placeSearch, autocomplete;

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }	  
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAr_IzjwiCfBZ6-Uvz1rxYE1KODg-6Y9yU&callback=initMap&libraries=places">
    </script>
    
</body>
</html>
