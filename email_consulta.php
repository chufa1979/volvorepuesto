<?php  
session_start();
require_once('Connections/cone.php'); 

	mysql_select_db($database_cone, $cone);
	$query_rs_moneda = "SELECT * FROM volvo_moneda WHERE id = 1";
	$rs_moneda = mysql_query($query_rs_moneda, $cone) or die(mysql_error());
	$row_rs_moneda = mysql_fetch_assoc($rs_moneda);
	$totalRows_rs_moneda = mysql_num_rows($rs_moneda);    
	
	
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

	$vid = $_GET['vid'];
	mysql_select_db($database_cone, $cone);
	$query_rs1 = "SELECT * FROM volvo_consulta WHERE id = '$vid'";
	$rs1 = mysql_query($query_rs1, $cone) or die(mysql_error());
	$row_rs1 = mysql_fetch_assoc($rs1);
	$totalRows_rs1 = mysql_num_rows($rs1);

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
.recuadro { padding:20px; border:1px solid #E2E2E2; }
.listado { padding-top:10px; padding-bottom:10px; }
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
    <td height="70" align="left" valign="top"><strong>Consulta #:
    <?php
			  $nroorden = str_pad($row_rs1['id'], 5, "0", STR_PAD_LEFT);
			   echo $nroorden; ?>
    </strong><br />
    <br />
    <strong>    DATOS DEL CLIENTE</strong></td>
  </tr>
  <tr>
    <td align="left" class="recuadro"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="150" align="left" class="listado">Nombre y apelllido:</td>
        <td width="250" align="left"><strong><?php echo $row_rs1['nombre']; ?> <?php echo $row_rs1['apellido']; ?></strong></td>
        <td width="80" align="left">Localidad:</td>
        <td align="left"><strong><?php echo $row_rs1['localidad']; ?></strong></td>
        </tr>
      <tr>
        <td align="left" class="listado">E-mail:</td>
        <td align="left"><strong><?php echo $row_rs1['email']; ?></strong></td>
        <td align="left">Provincia:</td>
        <td align="left"><strong><?php echo $row_rs1['provincia']; ?></strong></td>
        </tr>
      <tr>
        <td align="left" class="listado">Producto:</td>
        <td align="left"><strong><?php echo $row_rs1['producto']; ?></strong></td>
        <td align="left">Item:</td>
        <td align="left"><strong><?php echo $row_rs1['item']; ?></strong></td>
        </tr>
      <tr>
        <td align="left" class="listado">Consulta:</td>
        <td colspan="3" align="left"><strong><?php echo $row_rs1['consulta']; ?></strong></td>
      </tr>
      </table></td>
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
