<?php require_once('Connections/cone.php');
	
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
	
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
	$query_rs_moneda = "SELECT * FROM volvo_moneda WHERE id = 1";
	$rs_moneda = mysql_query($query_rs_moneda, $cone) or die(mysql_error());
	$row_rs_moneda = mysql_fetch_assoc($rs_moneda);
	$totalRows_rs_moneda = mysql_num_rows($rs_moneda);     	
	
if ((isset($_POST["sendform"]))) {
	
	$fecha = date("Y-m-d");
	$cuitnro = $_POST['cuitnro'];
	$iva = $_POST['iva'];
	$vehiculo = $_POST['vehiculo'];
	$sucursal = $_POST['sucursal'];
	$user = $_POST['user'];
	$clave = $_POST['clave'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$telefono = $_POST['telefono'];
	$cuit = $_POST['cuit'];
	$calle = $_POST['calle'];
	$nro = $_POST['nro'];
	$piso = $_POST['piso'];
	$depto = $_POST['depto'];
	$localidad = $_POST['localidad'];
	$cp = $_POST['cp'];
	$provincia = $_POST['provincia'];
	$pais = $_POST['pais'];
	$id = $_POST['id'];
	$acepta = $_POST['acepta'];
	$fh = $_POST['fh'];
	$fm = $_POST['fm'];
	$fmx = $_POST['fmx'];
	$vm = $_POST['vm'];
	$b380 = $_POST['b380'];
	$b450 = $_POST['b450'];
	$b310 = $_POST['b310'];
	$b270 = $_POST['b270'];
	$otros = $_POST['otros'];	
	
    $updateSQL = "UPDATE volvo_clientes SET acepta = '$acepta', cuitnro = '$cuitnro', iva= '$iva', vehiculo = '$vehiculo'
	, sucursal = '$sucursal', usuario = '$user', clave = '$clave', nombre = '$nombre', apellido= '$apellido', email = '$user', telefono = '$telefono',
	cuit = '$cuit', calle = '$calle', num = '$nro', piso = '$piso', depto = '$depto', localidad = '$localidad', cp = '$cp', provincia = '$provincia', pais = '$pais', fh = '$fh', fm = '$fm', fmx = '$fmx', vm = '$vm', b380 = '$b380', b450 = '$b450', b310 = '$b310', b270 = '$b270', otro = '$otros'
	  WHERE id='$id'";
	  ///echo $updateSQL;
    mysql_select_db($database_cone, $cone);
	$Result1 = mysql_query($updateSQL, $cone) or die(mysql_error());	
	
	if ($_POST['f']==1) { 
		$insertGoTo = "pedido_confirmar.php";
		  if (isset($_SERVER['QUERY_STRING'])) {
			$insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
			$insertGoTo .= $_SERVER['QUERY_STRING'];
		  }
		  header(sprintf("Location: %s", $insertGoTo));
	}
  
}
	
									
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<meta name="description" content="Para tener el mejor rendimiento de tu Volvo con la m�xima eficiencia y seguridad, eleg� siempre repuestos originales. Encontr� los mejores precios para mantener tu cami�n o bus y aprovech� las promociones que tenemos para vos." />
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
<div class="titulo_confirmacion">IDENTIFICACI&Oacute;N</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="200" align="center" valign="middle">Tus datos fueron modificados.</td>
      </tr>
    </table>
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
	  function llamar (valor) {
		$("#sucursal").val(valor);
	  }
      function initMap() {
	  
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
				  '<p><b>Direcci&oacute;n: </b> <?php echo $row_rs_con['direccion'];?> </p>' +
				  '<p><b>Localidad: </b> <?php echo $row_rs_con['localidad'];?> </p>' +
				  '<p><b>Tel&eacute;fono: </b> <?php echo $row_rs_con['telefono'];?> </p>' +
				  '<p><b>C&oacute;digo: </b> <?php echo $row_rs_con['codigo'];?> </p>' +
				  '<p><b>Email: </b> <?php echo $row_rs_con['email'];?> </p>' +
				  '<p><input name="button2" type="button" class="enviar" id="button2" value="Seleccionar" onclick="llamar(<?php echo $row_rs_con['id'];?>)"></p>' +
				 
				  
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
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAr_IzjwiCfBZ6-Uvz1rxYE1KODg-6Y9yU&callback=initMap">
    </script>
    
</body>
</html>
