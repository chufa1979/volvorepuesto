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

	$vid = $_GET['idpedido'];
	mysql_select_db($database_cone, $cone);
	$query_rs1 = "SELECT * FROM volvo_pedido WHERE id = '$vid'";
	$rs1 = mysql_query($query_rs1, $cone) or die(mysql_error());
	$row_rs1 = mysql_fetch_assoc($rs1);
	$totalRows_rs1 = mysql_num_rows($rs1);

   $vid3 = $row_rs1['idcon'];
   mysql_select_db($database_cone, $cone);
   $query_rs3 = "SELECT * FROM volvo_puntos_ventas WHERE id = '$vid3'";
   $rs3 = mysql_query($query_rs3, $cone) or die(mysql_error());
   $row_rs3 = mysql_fetch_assoc($rs3);
   $totalRows_rs3 = mysql_num_rows($rs3);   
   
   $iduser = $row_rs1['iduser'];
   mysql_select_db($database_cone, $cone);
   $query_rs4 = "SELECT * FROM volvo_clientes WHERE id = '$iduser'";
   $rs4 = mysql_query($query_rs4, $cone) or die(mysql_error());
   $row_rs4 = mysql_fetch_assoc($rs4);
   $totalRows_rs4 = mysql_num_rows($rs4);   

$colname_rspro = "-1";
if (isset($_GET['idpedido'])) {
  $colname_rspro = $_GET['idpedido'];
}
mysql_select_db($database_cone, $cone);
$query_rspro = sprintf("SELECT * FROM volvo_pedidos_productos WHERE id_compra = %s", GetSQLValueString($colname_rspro, "int"));
$rspro = mysql_query($query_rspro, $cone) or die(mysql_error());
$row_rspro = mysql_fetch_assoc($rspro);
$totalRows_rspro = mysql_num_rows($rspro); 

	if ($row_rs_moneda['moneda']==1) {
		$moneda = '$';
	}
	if ($row_rs_moneda['moneda']==2) {
		$moneda = 'USD';
	}
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
	color: #000;
	margin:40px;
	background-color:#EEEEEE;
	}
a { color: #000;}
.recuadro { padding:20px; border:1px solid #E2E2E2; }
.listado { padding-top:10px; padding-bottom:10px; }
.titulo {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #16A6C9;
	font-weight:bold;
	padding:10px 0px;
	border-bottom: solid 1px #16A6C9;
	}
</style>
</head>

<body>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#FFFFFF" style="border:1px solid #E2E2E2;">
    <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="150" align="center" valign="middle"><img src="https://www.volvorepuestos.com.ar/img/volvo_repuestos.png" alt="VOLVO REPUESTOS" width="300" height="90" border="0" /></td>
  </tr>
  <tr>
    <td height="60" align="left" valign="top"><strong>Fecha:
<?php
$cadenars1  = $row_rs1['fecha'];
    list($anio,$mes,$dia)=explode("-",$cadenars1); 
    echo $dia.".".$mes.".".$anio;               
			  ?><br />
	Nro de orden: 
<?php
			  $nroorden = str_pad($row_rs1['id'], 5, "0", STR_PAD_LEFT);
			  
			   echo $row_rs1['codigo']; ?> - <?php echo $nroorden; ?></strong></td>
  </tr>
  <tr>
    <td align="left" class="recuadro"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left" class="titulo">Detalle del pedido</td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="80" align="left" class="listado"><strong>Cantidad</strong></td>
          <td width="100" align="left"><strong>Item</strong></td>
          <td align="left"><strong>Producto</strong></td>
          <td width="120" align="left"><strong>Precio unitario</strong></td>
          <td width="140" align="left"><strong>Sub total</strong></td>
          </tr>
        </table>
      <?php do { ?>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="80" align="left" valign="middle" class="listado"><?php print $row_rspro['cantidad']; ?></td>
            <td width="100" align="left" valign="middle"><?php print $row_rspro['item']; ?></td>
            <td align="left" valign="middle"><?php print $row_rspro['nombre']; ?></td>
            <td width="120" align="left" valign="middle"><?php echo $moneda;?> <?php echo $row_rspro['precio'];?></td>
            <td width="100" align="left" valign="middle"><?php echo $moneda;?> <?php echo ($row_rspro['precio']*$row_rspro['cantidad']);?></td>
            <td width="40" align="right" valign="middle">+ Imp.</td>
            </tr>
          </table>
        <?php } while ($row_rspro = mysql_fetch_assoc($rspro)); ?>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td class="content"><div class="listadototal">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" bgcolor="#F3F3F3" class="listado">&nbsp;</td>
                <td width="120" align="left" bgcolor="#F3F3F3"><strong>TOTAL</strong></td>
                <td width="100" align="left" bgcolor="#F3F3F3"><strong><?php echo $moneda;?><?php echo $row_rs1['total']; ?></strong></td>
                <td width="40" align="right" bgcolor="#F3F3F3">+ Imp.</td>
                </tr>
              </table>
            </div></td>
          </tr>
        </table>
      <br />
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" class="titulo">Nro. de chasis</td>
        </tr>
        <tr>
          <td align="left" class="listado"><?php echo $row_rs1['chasis']; ?></td>
        </tr>
      </table>
      <br />
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" class="titulo">Comentario</td>
        </tr>
        <tr>
          <td align="left" class="listado"><?php echo $row_rs1['comentarios']; ?></td>
        </tr>
      </table>
      <br />
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" class="titulo">Punto de Retiro</td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="150" align="left" class="listado">Concesionario:</td>
        <td align="left"><strong><?php echo $row_rs3['puntoderetiro']; ?></strong></td>
        </tr>
      <tr>
        <td align="left" class="listado">Direcci&oacute;n:</td>
        <td align="left"><strong><?php echo $row_rs3['direccion']; ?></strong></td>
        </tr>
      <tr>
        <td align="left" class="listado">Tel&eacute;fono:</td>
        <td align="left"><strong><?php echo $row_rs3['telefono']; ?></strong></td>
        </tr>
      <tr>
        <td align="left" class="listado">Email:</td>
        <td align="left"><strong><?php echo $row_rs3['email']; ?></strong></td>
        </tr>
    </table>
      <br />
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" class="titulo">Datos del Cliente</td>
        </tr>
    </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="150" align="left" class="listado">Nombre y apelllido:</td>
        <td width="250" align="left"><strong><?php echo $row_rs4['nombre']; ?> <?php echo $row_rs4['apellido']; ?></strong></td>
        <td width="150" align="left">Localidad:</td>
        <td align="left"><strong><?php echo $row_rs4['localidad']; ?></strong></td>
      </tr>
      <tr>
        <td align="left" class="listado">E-mail:</td>
        <td align="left"><strong><?php echo $row_rs4['email']; ?></strong></td>
        <td align="left">Provincia:</td>
        <td align="left"><strong><?php echo $row_rs4['provincia']; ?></strong></td>
      </tr>
      <tr>
        <td align="left" class="listado">Tel&eacute;fono:</td>
        <td align="left"><strong><?php echo $row_rs4['telefono']; ?></strong></td>
        <td align="left">Pais:</td>
        <td align="left"><strong><?php echo $row_rs4['pais']; ?></strong></td>
      </tr>
      <tr>
        <td align="left" class="listado">DNI:</td>
        <td align="left"><strong><?php echo $row_rs4['dni']; ?></strong></td>
        <td align="left">CUIT/CUIL:</td>
        <td align="left"><strong><?php echo $row_rs4['cuitnro']; ?></strong></td>
      </tr>
      <tr>
        <td align="left" class="listado">Direcci&oacute;n:</td>
        <td align="left"><strong><?php echo $row_rs4['calle']; ?> <?php echo $row_rs4['num']; ?> <?php echo $row_rs4['piso']; ?><?php echo $row_rs4['depto']; ?></strong></td>
        <td align="left">Cond. IVA:</td>
        <td align="left"><strong><?php echo $row_rs4['iva']; ?></strong></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="160" align="center"><strong>Para reclamo de Pedidos, haga <a href="http://www.volvorepuestos.com.ar/?reclamos">click aqu&iacute;</a></strong><br />
      <br />
      <br />
      <table border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="75" align="left"><img src="https://www.volvorepuestos.com.ar/img/volvo_logo.png" width="62" height="62" /></td>
          <td align="left">Copyright Volvo ARG 2018</td>
          </tr>
        </table>
      </td>
  </tr>
</table>
</td>
  </tr>
</table>


</body>
</html>
