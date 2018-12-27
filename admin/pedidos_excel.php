<?php include ("seguridad.php"); ?>
<?php require_once('../Connections/cone.php');  


header('Content-type: application/vnd.ms-excel;charset=utf-8');
header("Content-Disposition: attachment; filename=Backup-Pedidos.xls");
header("Pragma: no-cache");
header("Expires: 0");

   mysql_select_db($database_cone, $cone);
   $query_rs1 = "SELECT * FROM volvo_pedidos_productos ORDER BY id_compra DESC ";
   $rs1 = mysql_query($query_rs1, $cone) or die(mysql_error());
   $row_rs1 = mysql_fetch_assoc($rs1);
   $totalRows_rs1 = mysql_num_rows($rs1);
      
	mysql_select_db($database_cone, $cone);
	$query_rs2 = "SELECT * FROM volvo_puntos_ventas ORDER BY puntoderetiro ASC";
	$rs2 = mysql_query($query_rs2, $cone) or die(mysql_error());
	$row_rs2 = mysql_fetch_assoc($rs2);
	$totalRows_rs2 = mysql_num_rows($rs2);		

   include 'buildNav.php';
   $conn = mysql_connect($hostname_cone,$username_cone,$password_cone);
   mysql_select_db($database_cone);
   $db = new buildNav;
   $db->offset = 'offset';
   $db->number_type = 'number';
   $db->limit = 1500;
   $db->pag = $db->limit*$mostrar;
   $totalpag =ceil($totalRows_rstotalpag/$db->limit);
   $db->execute($query_rs1);
   $totalp=ceil($totalRows_rs1/$mostrar);
   
   if (isset($_GET["buscartexto"])) {
	   $pasa .= "buscartexto=".$_GET["buscartexto"];   
   }
   if (isset($_GET["mostrar"])) {
	   $pasa .= '&mostrar='.$_GET["mostrar"];   
   }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>VOLVO REPUESTOS | Panel de Administraci&oacute;n Web</title>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
            <td width="120" height="30" align="left" bgcolor="#D2E4EE"><strong>Fecha</strong></td>
            <td width="120" height="30" align="left" bgcolor="#D2E4EE"><strong> N&deg; Orden</strong></td>
              <td width="120" align="left" bgcolor="#D2E4EE"><strong>Cantidad</strong></td>
              <td width="120" align="left" bgcolor="#D2E4EE"><strong>Item</strong></td>
              <td width="120" align="left" bgcolor="#D2E4EE"><strong>Producto</strong></td>
              <td width="60" align="left" bgcolor="#D2E4EE"><strong>Precio </strong></td>
              <td width="120" align="left" bgcolor="#D2E4EE"><strong>Precio Total</strong></td>
              <td width="200" align="left" bgcolor="#D2E4EE"><strong>TOTAL</strong></td>
              <td width="200" height="30" align="left" bgcolor="#D2E4EE"><strong><span class="listadodetalle">Punto de Retiro</span></strong></td>
              <td width="200" height="30" align="left" bgcolor="#D2E4EE">Direcci&oacute;n</td>
              <td width="60" height="30" align="left" bgcolor="#D2E4EE">Tel&eacute;fono</td>
              <td width="60" height="30" align="left" bgcolor="#D2E4EE">Email</td>
              <td width="60" height="30" align="left" bgcolor="#D2E4EE"><strong><span class="listadodetalle">Datos del Cliente</span></strong></td>
              <td width="60" height="30" align="left" bgcolor="#D2E4EE">E-mail</td>
              <td width="60" height="30" align="left" bgcolor="#D2E4EE">Tel&eacute;fono</td>
              <td width="60" align="left" bgcolor="#D2E4EE">DNI</td>
              <td width="60" align="left" bgcolor="#D2E4EE">Calle</td>
              <td width="60" align="left" bgcolor="#D2E4EE">Nro</td>
              <td width="60" align="left" bgcolor="#D2E4EE">Piso</td>
              <td width="60" align="left" bgcolor="#D2E4EE">Depto</td>
              <td width="60" align="left" bgcolor="#D2E4EE">Localidad</td>
              <td width="60" align="left" bgcolor="#D2E4EE">Provincia</td>
              <td width="60" align="left" bgcolor="#D2E4EE">Pa&iacute;s</td>
              <td width="60" align="left" bgcolor="#D2E4EE">CUIT/CUIL</td>
              <td width="60" align="left" bgcolor="#D2E4EE">Cond. IVA</td>
              <td width="60" height="30" align="left" bgcolor="#D2E4EE"><strong>Estado</strong></td>
            </tr>
			<?php while($myrow = mysql_fetch_array($db->sql_result))   { ?>
            <?php
			   $is_compra = $myrow['id_compra'];
			   mysql_select_db($database_cone, $cone);
			   $query_rs11 = "SELECT * FROM volvo_pedido WHERE id = '$is_compra'";
			   $rs11 = mysql_query($query_rs11, $cone) or die(mysql_error());
			   $row_rs11 = mysql_fetch_assoc($rs11);
			   $totalRows_rs11 = mysql_num_rows($rs11);
   
   			
			   $vid2 = $myrow['id_producto'];
			   mysql_select_db($database_cone, $cone);
			   $query_rs2 = "SELECT * FROM volvo_productos WHERE id = '$vid2'";
			   $rs2 = mysql_query($query_rs2, $cone) or die(mysql_error());
			   $row_rs2 = mysql_fetch_assoc($rs2);
			   $totalRows_rs2 = mysql_num_rows($rs2);   
			   
			   $vid3 = $row_rs11['idcon'];
			   mysql_select_db($database_cone, $cone);
			   $query_rs3 = "SELECT * FROM volvo_puntos_ventas WHERE id = '$vid3'";
			   $rs3 = mysql_query($query_rs3, $cone) or die(mysql_error());
			   $row_rs3 = mysql_fetch_assoc($rs3);
			   $totalRows_rs3 = mysql_num_rows($rs3);      	
			   
			   $iduser = $row_rs11['iduser'];
			   mysql_select_db($database_cone, $cone);
			   $query_rs4 = "SELECT * FROM volvo_clientes WHERE id = '$iduser'";
			   $rs4 = mysql_query($query_rs4, $cone) or die(mysql_error());
			   $row_rs4 = mysql_fetch_assoc($rs4);
			   $totalRows_rs4 = mysql_num_rows($rs4);			   		
			?>
            
            <tr>
              <td height="45" align="left" valign="middle"><?php
$cadenars1  = $row_rs11['fecha'];
    list($anio,$mes,$dia)=explode("-",$cadenars1); 
    echo $dia.".".$mes.".".$anio;               
			  ?></td>
              <td height="45" align="left" valign="middle"><?php
			  $nroorden = str_pad($row_rs11['id'], 5, "0", STR_PAD_LEFT);
			  echo $row_rs11['codigo']; ?>
              - <?php echo $nroorden; ?></td>
              <td align="left" valign="middle"><?php print $myrow['cantidad']; ?></td>
              <td align="left" valign="middle"><?php print $myrow['item']; ?></td>
              <td align="left" valign="middle"><?php print utf8_decode($myrow['nombre']); ?></td>
              <td align="left" valign="middle"><?php if ($myrow['moneda']=='') { echo '$'; } else { echo $myrow['moneda'];} ?> <?php print $myrow['precio']; ?></td>
              <td align="left" valign="middle"><div class="listado"><?php if ($myrow['moneda']=='') { echo '$'; } else { echo $myrow['moneda'];} ?> <?php echo ($myrow['cantidad']*$myrow['precio']); ?></div></td>
              <td align="left" valign="middle"><strong><?php if ($myrow['moneda']=='') { echo '$'; } else { echo $myrow['moneda'];} ?> <?php echo $myrow['total']; ?></strong></td>
              <td height="45" align="left" valign="middle"><?php echo $row_rs3['puntoderetiro']; ?></td>
              <td height="45" align="left" valign="middle"><?php echo utf8_decode($row_rs3['direccion']); ?></td>
              <td height="45" align="left" valign="middle"><?php echo $row_rs3['telefono']; ?></td>
              <td height="45" align="left" valign="middle"><?php echo $row_rs3['email']; ?></td>
              <td height="45" align="left" valign="middle"><?php echo utf8_decode($row_rs4['nombre']); ?> <?php echo utf8_decode($row_rs1['apellido']); ?></td>
              <td height="45" align="left" valign="middle"><?php echo $row_rs4['email']; ?></td>
              <td height="45" align="left" valign="middle"><?php echo $row_rs4['telefono']; ?></td>
              <td align="left" valign="middle"><?php echo $row_rs4['dni']; ?></td>
              <td align="left" valign="middle"><?php echo utf8_decode($row_rs4['calle']); ?></td>
              <td align="left" valign="middle"><?php echo $row_rs4['num']; ?></td>
              <td align="left" valign="middle"><?php echo $row_rs4['piso']; ?></td>
              <td align="left" valign="middle"><?php echo $row_rs4['depto']; ?></td>
              <td align="left" valign="middle"><?php echo utf8_decode($row_rs4['localidad']); ?></td>
              <td align="left" valign="middle"><?php echo utf8_decode($row_rs4['provincia']); ?></td>
              <td align="left" valign="middle"><?php echo $row_rs4['pais']; ?></td>
              <td align="left" valign="middle"><?php echo $row_rs4['cuitnro']; ?></td>
              <td align="left" valign="middle"><?php echo $row_rs4['iva']; ?></td>
              <td height="45" align="left" valign="middle"><?php if  ($row_rs11['estado']==0) { echo "PENDIENTE"; } else { echo "FINALIZADO"; } ?></td>
            </tr>          
<?php } ?>
          </table>
</body>
</html>
