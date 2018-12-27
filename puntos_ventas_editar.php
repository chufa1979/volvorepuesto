<?php 
require_once('../Connections/cone.php'); 
include ("seguridad.php");

/********* funciones ****************/
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
/*********************/
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {

	$puntoderetiro = $_POST['puntoderetiro'];
	$localidad = $_POST['localidad'];
	$direccion = $_POST['direccion'];
	$telefono = $_POST['telefono'];
	$codigo = $_POST['codigo'];
	$email = $_POST['email'];
	$clave = $_POST['clave'];
	$id = $_POST['id'];
	$latitud = $_POST['latitud'];
	$longitud = $_POST['longitud'];
					 		
    $updateSQL = "UPDATE volvo_puntos_ventas SET longitud = '$longitud',latitud = '$latitud', puntoderetiro = '$puntoderetiro', localidad = '$localidad', direccion = '$direccion', telefono = '$telefono', codigo = '$codigo', email = '$email', clave = '$clave'  WHERE id='$id'";
    mysql_select_db($database_cone, $cone);
	$Result1 = mysql_query($updateSQL, $cone) or die(mysql_error());

	if (isset($_GET['offset'])) {
		$offset = $_GET['offset'];
		$insertGoTo = "puntos_ventas.php?offset=".$offset;
		header("Location: ".$insertGoTo);		
	} else {
		$insertGoTo = "puntos_ventas.php";
		header("Location: ".$insertGoTo);		
	}

}

$colname_rs = "-1";
if (isset($_GET['vid'])) {
  $colname_rs = $_GET['vid'];
}
mysql_select_db($database_cone, $cone);
$query_rs = sprintf("SELECT * FROM volvo_puntos_ventas
 WHERE id = %s", GetSQLValueString($colname_rs, "int"));
$rs = mysql_query($query_rs, $cone) or die(mysql_error());
$row_rs = mysql_fetch_assoc($rs);
$totalRows_rs = mysql_num_rows($rs);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>VOLVO REPUESTOS | Panel de Administraci&oacute;n Web</title>
<link href="js/style_admin.css" rel="stylesheet" type="text/css" />
<link href="js/menu/menu.css" rel="stylesheet" type="text/css" />
<link href="js/jquery-ui.css" rel="stylesheet" type="text/css" />
<link href="js/chosen.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script type="text/javascript" src="js/chosen.jquery.js"></script>
    <script type="text/javascript" src="js/menu/script.js"></script>

    <!-- editor -->  
    <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
    tinymce.init({
        selector: "textarea",
        plugins: [
            "advlist autolink lists charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "table contextmenu paste"
        ],
        toolbar: "undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent"
    });
    </script>

  <!-- popup -->
  <link href="js/popup/themes_default.css" rel="stylesheet" type="text/css" />
  <link href="js/popup/themes_alphacube.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="js/popup/js_popup/prototype.js"> </script> 
  <script type="text/javascript" src="js/popup/js_popup/effects.js"> </script>
  <script type="text/javascript" src="js/popup/js_popup/window.js"> </script>
  <script type="text/javascript" src="js/popup/js_popup/debug.js"> </script>
  <script type="text/javascript" src="js/popup/js_popup/application.js"> </script>
  
</head>

<body>
<div class="main">
  <div id="top">
    <div id="logo"><a href="home.php"><img src="img/volvo_logo.png" width="217" height="40" alt="VOLVO" /></a></div>
    <div id="title_page">ADMINISTRADOR WEB VOLVO REPUESTOS</div>
    <div id="user"><?php echo $_SESSION['nombreapellido'];?>&nbsp;&raquo;&nbsp;&nbsp;<a href="salir.php">Logout</a></div>
  </div>
</div>
<div id="menu">
<div id="cssmenu">
<ul>
   <li class='has-sub'><a href='#' class="nav_cate">Categor&iacute;as y filtros</a>
		<ul>
         <li><a href='categorias.php'>Categor&iacute;as y subcategorias</a></li>
         <li><a href='modelos.php'>Modelos</a></li>
      </ul>
	</li>
   <li class='has-sub'><a href='#' class="nav_productos">Productos</a>
      <ul>
         <li><a href='productos_alta.php'>Cargar nuevo</a></li>
         <li><a href='productos_publicados.php'>Publicados</a></li>
<!--<li><a href='slider_home.php'>Slider Home Promociones</a></li>-->
      </ul>
   </li>
   <li><a href='pedidos.php' class="nav_pedidos">Pedidos</a></li>
   <li><a href='clientes.php' class="nav_user">Clientes</a></li>
   <li><a href='consultas.php' class="nav_consultas">Consultas productos</a></li> 
   <li><a href='reclamos.php' class="nav_reclamos">Reclamos</a></li>
   <li><a href='suscriptos.php' class="nav_suscriptos">Suscriptores News</a></li>
   <li class='has-sub'><a href='#' class="nav_banner">Banners</a>
      <ul>
         <li><a href='banner_superior.php'>Slider Home</a></li>
         <li><a href='banner_inferior.php'>Banners inferior</a></li>
      </ul>
   </li>
      <li class='has-sub active'><a href='#' class="nav_mail">Puntos de Retiro</a>
        <ul>
         <li><a href='puntos_ventas_alta.php'>Cargar nuevo</a></li>
         <li><a href='puntos_ventas.php'>Publicados</a></li>
      </ul>   
   </li>
   <li><a href='monedas.php' class="nav_moneda">Monedas</a></li>
   <li class='has-sub'><a href='#' class="nav_sist">Usuarios del sistema</a>
      <ul>
         <li><a href='usuarios_alta.php'>Crear nuevo</a></li>
         <li><a href='usuarios_sistema.php'>Usuarios</a></li>
      </ul>
   </li>
   <li><a href='http://www.volvorepuestos.com.ar' target="_blank" class="nav_web">Ver Sitio Web</a>
   </li>
</ul>
</div>
</div>
<div id="rutas">
  <div class="ruta">puntoS de retiro&nbsp;&nbsp;&nbsp;&raquo;&nbsp;&nbsp;&nbsp;MODIFICAR</div>
</div>
<div class="main">
  <div id="contenido">
  <form action="" method="POST" enctype="multipart/form-data" name="form1" id="form1">
      <table border="0" cellpadding="0" cellspacing="0" class="recuadro">
        <tr>
          <td align="left" valign="top" class="content">
          <label for="puntoderetiro">Punto de Retiro (Nombre del Concesionario)</label>
          <input name="puntoderetiro" type="text" required class="form-control" id="puntoderetiro" value="<?php echo $row_rs['puntoderetiro']; ?>" />
          <label for="localidad">Localidad</label>
          <input name="localidad" type="text" required class="form-control" id="localidad" value="<?php echo $row_rs['localidad']; ?>" maxlength="255" />
          <label for="telefono">Direcci&oacute;n del Concesionario</label>
          <input name="direccion" type="text" required class="form-control" id="direccion" value="<?php echo $row_rs['direccion']; ?>" />
          <label for="telefono">Tel&eacute;fono</label>
          <input name="telefono" type="text" required class="form-control" id="telefono" value="<?php echo $row_rs['telefono']; ?>" />
          <label for="codigo">Nro de Identificaci&oacute;n</label>
          <input name="codigo" type="text" required="required" class="form-control" id="codigo" value="<?php echo $row_rs['codigo']; ?>" />
          <label for="email">E-mail</label>
          <input name="email" type="text"  required="required" class="form-control" id="email" value="<?php echo $row_rs['email']; ?>" />
          <label for="clave">Clave</label>
          <input name="clave" type="text"  required="required" class="form-control" id="clave" value="<?php echo $row_rs['clave']; ?>" />
		</td>
        </tr>
      </table><br />
		<table border="0" cellpadding="0" cellspacing="0" class="recuadro">
        <tr>
          <td align="left" valign="top" class="content"><span class="txt_azul"><strong>Indicar coordenadas para ubicaci&oacute;n en mapa</strong></span><br />
            <label for="latitud">Latitud</label>
          <input name="latitud" type="text"  required="required" class="form-control" id="latitud" value="<?php echo $row_rs['latitud']; ?>" />
          <label for="longitud">Longitud</label>
          <input name="longitud" type="text"  required="required" class="form-control" id="longitud" value="<?php echo $row_rs['longitud']; ?>" />
          </td>
        </tr>
      </table>
      <span class="content">
      <?php if (isset($_GET['offset'])) { ?>
      <input name="offset" type="hidden" id="offset" value="<?php echo $_GET['offset']; ?>" />
      <? } ?>
      <input name="id" type="hidden" id="id" value="<?php echo $row_rs['id']; ?>" />
      </span>
      <input name="MM_update" type="hidden" id="MM_update" value="form1" />
      <br />
      <table border="0" cellpadding="0" cellspacing="0" class="recuadro_guardar">
        <tr>
          <td align="center" valign="middle" class="content"><input name="button2" type="submit" class="btn_borrador" id="button" onclick="MM_goToURL('parent','puntos_ventas.php');return document.MM_returnValue" value="Volver" />&nbsp;&nbsp;&nbsp;&nbsp;<input name="buttonp" type="submit" class="btn_publicar" id="buttonp" value="Guardar cambios" /></td>
        </tr>
      </table>
    </form>
  </div>
</div>
</body>
</html>
