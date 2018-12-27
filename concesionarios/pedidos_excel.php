<?php include ("seguridad.php"); ?>
<?php require_once('../Connections/cone.php');  


header('Content-type: application/vnd.ms-excel;charset=utf-8');
header("Content-Disposition: attachment; filename=Backup-Pedidos.xls");
header("Pragma: no-cache");
header("Expires: 0");

	$idp = $_SESSION['id'];

   mysql_select_db($database_cone, $cone);
   $query_rs1 = "SELECT * FROM volvo_pedido WHERE idcon='$idp' $bus $c ORDER BY id DESC"; 
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
<title>VOLVO Repuestos |  Panel de Administraci&oacute;n Web</title>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
            <td width="120" height="30" align="left" bgcolor="#D2E4EE"><strong>Fecha</strong></td>
            <td width="120" height="30" align="left" bgcolor="#D2E4EE"><strong> N&deg; Orden</strong></td>
              <td width="750" align="left" bgcolor="#D2E4EE"><strong><span class="listadodetalle">Pedido</span></strong></td>
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
			   $vid2 = $myrow['producto'];
			   mysql_select_db($database_cone, $cone);
			   $query_rs2 = "SELECT * FROM volvo_productos WHERE id = '$vid2'";
			   $rs2 = mysql_query($query_rs2, $cone) or die(mysql_error());
			   $row_rs2 = mysql_fetch_assoc($rs2);
			   $totalRows_rs2 = mysql_num_rows($rs2);   
			   
			   $vid3 = $myrow['idcon'];
			   mysql_select_db($database_cone, $cone);
			   $query_rs3 = "SELECT * FROM volvo_puntos_ventas WHERE id = '$vid3'";
			   $rs3 = mysql_query($query_rs3, $cone) or die(mysql_error());
			   $row_rs3 = mysql_fetch_assoc($rs3);
			   $totalRows_rs3 = mysql_num_rows($rs3);      	
			   
			   $iduser = $myrow['iduser'];
			   mysql_select_db($database_cone, $cone);
			   $query_rs4 = "SELECT * FROM volvo_clientes WHERE id = '$iduser'";
			   $rs4 = mysql_query($query_rs4, $cone) or die(mysql_error());
			   $row_rs4 = mysql_fetch_assoc($rs4);
			   $totalRows_rs4 = mysql_num_rows($rs4);			   		
			?>
            
            <tr>
              <td height="45" align="left" valign="middle"><?php
$cadenars1  = $myrow['fecha'];
    list($anio,$mes,$dia)=explode("-",$cadenars1); 
    echo $dia.".".$mes.".".$anio;               
			  ?></td>
              <td height="45" align="left" valign="middle"><?php
			  $nroorden = str_pad($myrow['id'], 5, "0", STR_PAD_LEFT);
			  
			   echo $myrow['codigo']; ?>
              - <?php echo $nroorden; ?></td>
              <td align="left" valign="middle">
              <?
				$colname_rspro = $myrow['id'];
				mysql_select_db($database_cone, $cone);
				$query_rspro = "SELECT * FROM volvo_pedidos_productos WHERE id_compra = '$colname_rspro'";
				$rspro = mysql_query($query_rspro, $cone) or die(mysql_error());
				$row_rspro = mysql_fetch_assoc($rspro);
				$totalRows_rspro = mysql_num_rows($rspro);  	
				if ($totalRows_rspro<>0) {		  
			   ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="150" align="left"><strong>Cantidad</strong></td>
              <td width="130" align="left"><strong>Item</strong></td>
              <td width="180" align="left"><strong>Producto</strong></td>
              <td width="150" align="center"><strong>Precio Unitario</strong></td>
              <td width="150" align="center"><strong>Precio Total</strong></td>
        </tr>
              <?php do { ?>
            <tr>
              <td align="left">&nbsp;&nbsp;<?php print $row_rspro['cantidad']; ?></td>
              <td align="left"><?php print $row_rspro['item']; ?></td>
              <td align="left"><?php print $row_rspro['nombre']; ?></td>
              <td width="120" align="center">$ <?php print $row_rspro['precio']; ?></td>
              <td width="120" align="center"><div class="listado">$ <?php echo ($row_rspro['cantidad']*$row_rspro['precio']); ?></div></td>
            </tr>
            <?php } while ($row_rspro = mysql_fetch_assoc($rspro)); ?>
          </table>  
          <?php } ?>            
              </td>
              <td align="left" valign="middle"><strong>$ <?php echo $myrow['total']; ?></strong></td>
              <td height="45" align="left" valign="middle"><?php echo $row_rs3['puntoderetiro']; ?></td>
              <td height="45" align="left" valign="middle"><?php echo $row_rs3['direccion']; ?></td>
              <td height="45" align="left" valign="middle"><?php echo $row_rs3['telefono']; ?></td>
              <td height="45" align="left" valign="middle"><?php echo $row_rs3['email']; ?></td>
              <td height="45" align="left" valign="middle"><?php echo $row_rs4['nombre']; ?> <?php echo $row_rs1['apellido']; ?></td>
              <td height="45" align="left" valign="middle"><?php echo $row_rs4['email']; ?></td>
              <td height="45" align="left" valign="middle"><?php echo $row_rs4['telefono']; ?></td>
              <td align="left" valign="middle"><?php echo $row_rs4['dni']; ?></td>
              <td align="left" valign="middle"><?php echo $row_rs4['calle']; ?></td>
              <td align="left" valign="middle"><?php echo $row_rs4['num']; ?></td>
              <td align="left" valign="middle"><?php echo $row_rs4['piso']; ?></td>
              <td align="left" valign="middle"><?php echo $row_rs4['depto']; ?></td>
              <td align="left" valign="middle"><?php echo $row_rs4['localidad']; ?></td>
              <td align="left" valign="middle"><?php echo $row_rs4['provincia']; ?></td>
              <td align="left" valign="middle"><?php echo $row_rs4['pais']; ?></td>
              <td align="left" valign="middle"><?php echo $row_rs4['cuitnro']; ?></td>
              <td align="left" valign="middle"><?php echo $row_rs4['iva']; ?></td>
              <td height="45" align="left" valign="middle"><?php if  ($myrow['estado']==0) { echo "PENDIENTE"; } else { echo "FINALIZADO"; } ?></td>
            </tr>          
<?php } ?>
          </table>
</body>
</html>
