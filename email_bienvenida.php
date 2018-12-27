<?php  
session_start();
require_once('Connections/cone.php'); 

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

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
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
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

$colname_rsp = "-1";
if (isset($_GET['vid'])) {
  $colname_rsp = $_GET['vid'];
}
mysql_select_db($database_cone, $cone);
$query_rsp = sprintf("SELECT * FROM volvo_clientes WHERE id = %s", GetSQLValueString($colname_rsp, "int"));
$rsp = mysql_query($query_rsp, $cone) or die(mysql_error());
$row_rsp = mysql_fetch_assoc($rsp);
$totalRows_rsp = mysql_num_rows($rsp);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>VOLVO</title>
<style type="text/css">
body {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: normal;
	color: #333333;
	margin:40px;
	background-color:#EEEEEE;
	}
a { color: #000;}
.recuadro { padding:30px; border:1px solid #E2E2E2; }
.listado { padding-top:5px; padding-bottom:5px; }
.boton {
	padding:10px 40px;
	background-color:#16A6C9;
	font-weight: bold;
	color: #FFF;
	text-decoration: none;
}
</style>
</head>

<body>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#FFFFFF" style="border:1px solid #E2E2E2;">
    <table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="150" align="center" valign="middle"><img src="https://www.volvorepuestos.com.ar/img/volvo_repuestos.png" alt="VOLVO REPUESTOS" width="300" height="90" border="0" /></td>
  </tr>
  <tr>
    <td height="100" align="left" valign="middle">
    <strong>Hola <span class="texto_secundario"><?php print $row_rsp['nombre']; ?> <?php print $row_rsp['apellido']; ?></span>:</strong><br />
      <br />
      <strong>Gracias   por registrarte en el sitio Volvo Repuestos</strong>.</td>
  </tr>
  <tr>
    <td align="center" class="recuadro"><p>Record&aacute; tu usuario y clave para poder acceder al sitio y conocer las novedades, descuentos y promociones en <strong>Repuestos Originales Volvo</strong>.<br />
      <br />
      <br />Seguramente encontrar&aacute;s la pieza que est&aacute;s buscando.</p>
      <p>&nbsp;</p>
      <p> <a href="https://www.volvorepuestos.com.ar/login.php" class="boton">INGRES&Aacute;</a></p></td>
  </tr>
  <tr>
    <td height="100" align="center" valign="middle"><table border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="75" align="left"><img src="https://www.volvorepuestos.com.ar/img/volvo_logo.png" width="62" height="62" /></td>
        <td align="left">Copyright Volvo ARG 2018</td>
      </tr>
    </table></td>
  </tr>
</table>
</td>
  </tr>
</table>
</body>
</html>
