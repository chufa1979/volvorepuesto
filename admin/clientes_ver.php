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

$colname_rs = $_GET['vid'];
mysql_select_db($database_cone, $cone);
$query_rs = sprintf("SELECT * FROM volvo_clientes WHERE id = %s", GetSQLValueString($colname_rs, "int"));
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
      <li class='has-sub'><a href='#' class="nav_mail">Puntos de Retiro</a>
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
  <div class="ruta">CLIENTES&nbsp;&nbsp;&nbsp;&raquo;&nbsp;&nbsp;&nbsp;DETALLE</div>
</div>
<div class="main">
  <div id="contenido">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left" valign="top"><div class="subtitulo_azul"> DATOS DEL CLIENTE<br />
</div>
          <table border="0" cellpadding="0" cellspacing="0" class="recuadro">
            <tr>
        <td class="content"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="150"><div class="listadodetalle">Fecha de registro</div></td>
            <td><div class="listado"><?php
		$cadenars1  = $row_rs['fecha'];
			list($anio,$mes,$dia)=explode("-",$cadenars1); 
			echo $dia.".".$mes.".".$anio;               
			  ?></div></td>
          </tr>
        </table>
          <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="150"><div class="listadodetalle">Nombre</div></td>
              <td><div class="listado"><?php echo $row_rs['nombre']; ?></div></td>
            </tr>
          </table>
          <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="150"><div class="listadodetalle">Apellido</div></td>
              <td><div class="listado"><?php echo $row_rs['apellido']; ?></div></td>
            </tr>
          </table>
          <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="150"><div class="listadodetalle">E-mail</div></td>
              <td><div class="listado"><a href="mailto:<?php echo $row_rs['email']; ?>"><?php echo $row_rs['email']; ?></a></div></td>
            </tr>
          </table>
          <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="150"><div class="listadodetalle">Tel&eacute;fono</div></td>
              <td><div class="listado"><?php echo $row_rs['telefono']; ?></div></td>
            </tr>
        </table>
          <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="150"><div class="listadodetalle">Calle</div></td>
              <td><div class="listado"><?php echo $row_rs['calle']; ?></div></td>
            </tr>
          </table>
          <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="150"><div class="listadodetalle">Nro</div></td>
              <td width="100"><div class="listado"><?php echo $row_rs['num']; ?></div></td>
              <td width="100"><div class="listadodetalle">Piso</div></td>
              <td width="100"><div class="listado"><?php echo $row_rs['piso']; ?></div></td>
              <td width="100"><div class="listadodetalle">Depto</div></td>
              <td><div class="listado"><?php echo $row_rs['depto']; ?></div></td>
              </tr>
          </table>
          <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="150"><div class="listadodetalle">Localidad</div></td>
              <td><div class="listado"><?php echo $row_rs['localidad']; ?></div></td>
            </tr>
          </table>
          <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="150"><div class="listadodetalle">Provincia</div></td>
              <td><div class="listado"><?php echo $row_rs['provincia']; ?></div></td>
            </tr>
          </table>
          <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="150"><div class="listadodetalle">Pa&iacute;s</div></td>
              <td><div class="listado"><?php echo $row_rs['pais']; ?></div></td>
            </tr>
          </table>
          <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="150"><div class="listadodetalle">CUIT/CUIL</div></td>
              <td><div class="listado"><?php echo $row_rs['cuitnro']; ?></div></td>
            </tr>
          </table>
          <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="150"><div class="listadodetalle">Cond. IVA</div></td>
              <td><div class="listado"><?php echo $row_rs['iva']; ?></div></td>
            </tr>
          </table>
          <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="150"><div class="listadodetalle">Veh&iacute;culo Volvo</div></td>
              <td><div class="listado"><?php
			  $mas = ''; 
			  if ($row_rs['fh']==1) { $mas .= ',FH ';}
			  if ($row_rs['fm']==1) { $mas .= ',FM ';}
			  if ($row_rs['fmx']==1) { $mas .= ',FMX ';}
			  if ($row_rs['vm']==1) { $mas .= ',VM ';}
			  if ($row_rs['b450']==1) { $mas .= ',B450 ';}
			  if ($row_rs['b380']==1) { $mas .= ',B380 ';}
			  if ($row_rs['b310']==1) { $mas .= ',B310 ';}
			  if ($row_rs['b270']==1) { $mas .= ',B270 ';}
			  if ($row_rs['otro']==1) { $mas .= ',Otros ';}
			  
			$myArray = explode(',', $mas);
			foreach($myArray as $my_Array){
				if ($my_Array<>'') {
					$mast .=  $my_Array.' - ';  
				}
				
			}
			echo substr($mast, 0, -2);				  
			  
			   ?></div></td>
            </tr>
        </table>
          <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="150"><div class="listadodetalle">Recibir informaci&oacute;n</div></td>
              <td><div class="listado"><?php if ($row_rs['acepta']==1) { echo "Si"; } else { echo "No"; } ?></div></td>
            </tr>
          </table>
          <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="150"><div class="listadodetalle">Punto de retiro<br />
                <br />
                <br />
              </div></td>
              <td><div class="listado">
              <?php
 	$vidcli = $row_rs['sucursal'];
	mysql_select_db($database_cone, $cone);
	$query_rs_cone = "SELECT * FROM volvo_puntos_ventas WHERE id = '$vidcli'";
	$rs_cone = mysql_query($query_rs_cone, $cone) or die(mysql_error());
	$row_rs_cone = mysql_fetch_assoc($rs_cone);
	$totalRows_rs_cone = mysql_num_rows($rs_cone);	
	?>
              
              <span class="listado_misdatos"><strong><?php echo $row_rs_cone['puntoderetiro']; ?></strong><br />
              <?php echo $row_rs_cone['direccion']; ?> - <?php echo $row_rs_cone['localidad']; ?><br />
Tel: <?php echo $row_rs_cone['telefono']; ?> - 
Email: <?php echo $row_rs_cone['email']; ?></span></div></td>
            </tr>
          </table></td>
      </tr>
</table>
        <br />
        <div class="subtitulo_azul"> DATOS DE ACCESO<br />
        </div>
        <table border="0" cellpadding="0" cellspacing="0" class="recuadro">
          <tr>
            <td class="content"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="150"><div class="listadodetalle">Usuario (email)</div></td>
                <td><div class="listado"><?php echo $row_rs['usuario']; ?></div></td>
                </tr>
              </table>
              <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="150"><div class="listadodetalle">Contrase&ntilde;a</div></td>
                  <td><div class="listado"><?php echo $row_rs['clave']; ?></div></td>
                  </tr>
              </table></td>
            </tr>
        </table>
        <br />
        <div class="subtitulo_azul">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="200" align="left">PEDIDOS REALIZADOS</td>
              <td align="left"><a href="pedidos.php?iduser=<?php echo $row_rs['id']; ?>"><img src="img/icono_ver.gif" width="60" height="30" alt="VER" /></a></td>
              </tr>
            </table>
        </div>
        <div class="subtitulo_azul">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="200" align="left">RECLAMOS REALIZADOS</td>
              <td align="left"><a href="reclamos.php?iduser=<?php echo $row_rs['id']; ?>"><img src="img/icono_ver.gif" width="60" height="30" alt="VER" /></a></td>
              </tr>
            </table>
        </div>
		<br />
		<table border="0" cellpadding="0" cellspacing="0" class="recuadro_guardar">
            <tr>
              <td align="right" valign="middle" class="content"><input name="button2" type="submit" class="btn_publicar" id="button" onclick="MM_goToURL('parent','clientes.php');return document.MM_returnValue" value="Volver" /></td>
            </tr>
        </table></td>
      </tr>
    </table>
  </div>
</div>
</body>
</html>
