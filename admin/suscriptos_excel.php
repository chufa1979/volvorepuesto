<?php include ("seguridad.php"); ?>
<?php require_once('../Connections/cone.php');  

header('Content-type: application/vnd.ms-excel;charset=utf-8');
header("Content-Disposition: attachment; filename=Backup-Suscriptos.xls");
header("Pragma: no-cache");
header("Expires: 0");
      
	mysql_select_db($database_cone, $cone);
	$query_rs2 = "SELECT * FROM volvo_suscriptores ORDER BY id DESC";
	$rs2 = mysql_query($query_rs2, $cone) or die(mysql_error());
	$row_rs2 = mysql_fetch_assoc($rs2);
	$totalRows_rs2 = mysql_num_rows($rs2);		


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
            <td width="250" height="30" align="left" bgcolor="#D2E4EE"><strong><span class="listadodetalle">Nombre y apellido</span></strong></td>
              <td height="30" align="left" bgcolor="#D2E4EE"><strong>E-mail</strong></td>
              <td align="left" bgcolor="#D2E4EE"><strong>GDPR</strong></td>
            </tr>
			<?php do { ?>
            <tr>
              <td height="45" align="left" valign="middle"><?php
$cadenars1  = $row_rs2['fecha'];
    list($anio,$mes,$dia)=explode("-",$cadenars1); 
    echo $dia.".".$mes.".".$anio;               
			  ?></td>
              <td height="45" align="left" valign="middle"><?php echo utf8_decode($row_rs2['nombre']); ?></td>
              <td height="45" align="left" valign="middle"><?php echo $row_rs2['email']; ?></td>
              <td height="45" align="left" valign="middle"><?php echo $row_rs2['gdpr']; ?></td>
            </tr>          
<?php } while($row_rs2 = mysql_fetch_assoc($rs2)) ?>
          </table>
</body>
</html>
