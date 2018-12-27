<?php include ("seguridad.php"); ?>
<?php require_once('../Connections/cone.php');  

$_SESSION['pagina'] = 'pedidos.php';

function autolink($nvar='',$nval='',$page='')
{
	global $_REQUEST;

	/* Esta función supermágica devuelve hace links inteligentes en base       */
	/* a lo que recibe de $_REQUEST, y lo que recibe en los arrays $n{var|val} */

	reset($_REQUEST);
	if (count($_REQUEST))
		while (list($var,$val) = each($_REQUEST))
			$group[$var] = $val;

	if (is_array($nvar) && count($nvar))
		for ($i=0 ; $i<count($nvar) ; $i++)
			$group[$nvar[$i]] = $nval[$i];
	else
		$group[$nvar] = $nval;

	/* Urlencodeamos */

	if (count($group))
	{
		$ngroup = array();

		while (list($var,$val) = each($group))
		{
			if (is_array($val))
			{
				if (count($val))
				while (list($subvar,$subval) = each($val))
				{
					if (is_array($subval))
					{
						for ($i=0 ; $i<count($subval) ; $i++)
							$ngroup[] = $var."[".$subvar."][".$i."]=".urlencode($subval[$i]);
					}
					else
						$ngroup[] = $var."[".$subvar."]=".urlencode($subval);
				}
			}
			else if ($val != '')
				$ngroup[] = "$var=".urlencode($val);
		}

		if ($page == '')
			$page = $_SERVER[PHP_SELF];

		return "$page?".join('&',$ngroup);
	}

	return 0;
}

if ((isset($_GET["eliminalinea"])) || (isset($_GET["eliminalinea_x"]))){
  $v = $_GET['vid'];
  $deleteSQL = "DELETE FROM volvo_reclamos WHERE id='$v'";
  mysql_select_db($database_cone, $cone);
  $Result1 = mysql_query($deleteSQL, $cone) or die(mysql_error());
}	

if ($_REQUEST['a'] == 'editar_rapido')
{
	$val = $_GET["val"];
	$cond_val = $_GET["cond_val"];
	mysql_select_db($database_cone, $cone);
	$query_rs1 = "Update volvo_reclamos Set estado='$val' Where id='$cond_val'";
	$rs1 = mysql_query($query_rs1, $cone) or die(mysql_error());
}



if ((isset($_GET["buscar"])) || (isset($_GET["buscar_x"]))){	
	$textoabuscar = $_GET["texto"];
	if ($_GET['puntoderetiro']<>'0') {
		$cc = $_GET['puntoderetiro'];
		$c = " AND (id_concesionario = '$cc')";	
	}
	if ($textoabuscar<>'') {
	$bus .= " AND (id_pedido IN (SELECT id FROM volvo_pedido WHERE id LIKE '%$textoabuscar%' OR codigo LIKE '%$textoabuscar%')) OR iduser IN (SELECT id FROM volvo_clientes WHERE nombre LIKE '%$textoabuscar%' OR apellido LIKE '%$textoabuscar%') ";
	}
}

   $idp = $_SESSION['id'];
   mysql_select_db($database_cone, $cone);
   
   if ($_SESSION['bandero']==1) { 
     $query_rs1 = "SELECT * FROM volvo_reclamos WHERE (id_concesionario='15' OR id_concesionario='16' OR id_concesionario='17' OR id_concesionario='18') $bus $c ORDER BY id DESC"; 
   } else {
	  $query_rs1 = "SELECT * FROM volvo_reclamos WHERE id_concesionario='$idp' $bus $c ORDER BY id DESC";
   }
   
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
<link href="../admin/js/style_admin.css" rel="stylesheet" type="text/css" />
<link href="../admin/js/menu/menu.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script type="text/javascript" src="../admin/js/chosen.jquery.js"></script>
  <script type="text/javascript" src="../admin/js/menu/script.js"></script>

  <!-- popup -->
  <link href="../admin/js/popup/themes_default.css" rel="stylesheet" type="text/css" />
  <link href="../admin/js/popup/themes_alphacube.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="../admin/js/popup/js_popup/prototype.js"> </script> 
  <script type="text/javascript" src="../admin/js/popup/js_popup/effects.js"> </script>
  <script type="text/javascript" src="../admin/js/popup/js_popup/window.js"> </script>
  <script type="text/javascript" src="../admin/js/popup/js_popup/debug.js"> </script>
  <script type="text/javascript" src="../admin/js/popup/js_popup/application.js"> </script>
   <script>
  function changeFunc() {
	     document.getElementById("buscar").click(); // Click on the checkbox
  }
  </script> 
</head>

<body>
<div class="main">
  <div id="top">
    <div id="logo"><a href="home.php"><img src="../admin/img/volvo_logo.png" width="217" height="40" alt="VOLVO" /></a></div>
    <div id="title_page">CONCESIONARIOS - VOLVO REPUESTOS</div>
    <div id="user"><?php echo $_SESSION['nombreapellido'];?>&nbsp;&raquo;&nbsp;&nbsp;<a href="salir.php">Logout</a></div>
  </div>
</div>
<div id="menu">
<div id="cssmenu">
<ul>
  <li><a href='pedidos.php' class="nav_pedidos">Pedidos</a></li>
   <li><a href='reclamos.php' class="nav_reclamos">Reclamos</a></li>   
   <li><a href='http://www.volvorepuestos.com.ar' target="_blank" class="nav_web">Ver Sitio Web</a></li>
</ul>
</div>
</div>
<div id="rutas">
  <div class="ruta">Reclamos</div>
</div>
<div class="main">
  <div id="contenido">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left" valign="top"><form id="form1" name="form1" method="get" action="">
          <div class="listado-filtros">
            <table border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="300" align="right"><input name="texto" type="text" class="form-ok" id="texto" placeholder="Buscar por Nro Orden o Nombre" /></td>
                <td width="32" align="right"><input name="buscar" type="image" id="buscar" src="../admin/img/icon_buscar.png" alt="BUSCAR" /></td>
                <td width="80" align="center">Filtrar</td>
                <td width="280" align="left">
                <select name="puntoderetiro" class="form-desplegable" id="puntoderetiro" onchange="changeFunc();">
                      <option value="0">Seleccionar</option>
<?php 
if ($totalRows_rs2>0) {
do { ?>
    <option value="<?php echo $row_rs2['id'];?>"><?php echo $row_rs2['puntoderetiro'];?></option>
<?php } while($row_rs2 = mysql_fetch_assoc($rs2));
} ?>

                </select></td>
              </tr>
            </table>
          </div>
        </form>
          <table border="0" cellpadding="0" cellspacing="0" class="recuadro">
          <tr>
        <td class="content"><div class="listado-top">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
            <td width="65" align="left">Finalizar</td>
              <td width="120" align="left">Fecha</td>
              <td width="120" align="left"> N&deg; Orden</td>
              <td width="200" align="left">Nombre y apellido</td>
              <td width="200" align="left">Punto de Retiro</td>
              <td align="left">Estado</td>
              <td width="60" align="left">&nbsp;</td>
            </tr>
          </table>
        </div>
        <?php while($myrow = mysql_fetch_array($db->sql_result))   { ?>
        <?php
			   $id_pedido = $myrow['id_pedido'];
			   mysql_select_db($database_cone, $cone);
			   $query_rs9 = "SELECT * FROM  volvo_pedido  WHERE id = '$id_pedido'";
			   $rs9 = mysql_query($query_rs9, $cone) or die(mysql_error());
			   $row_rs9 = mysql_fetch_assoc($rs9);
			   $totalRows_rs9 = mysql_num_rows($rs9);   			  
		?>
        <?php  if  ($myrow['estado']==0) { ?>
        <div class="listado_pendiente">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
            <td width="65" align="center">
            <input name="estado" type="checkbox" id="estado" onClick="document.location = '<?=autolink(array('a','key','val','cond_key','cond_val'),array('editar_rapido','estado',($myrow['estado']==1?'0':'1'),'id',$myrow['id']),'reclamos.php')?>'" value="1" <?php if (!(strcmp($myrow['estado'],1))) {echo "checked=\"checked\"";} ?> <?=($myrow['estado']==1 ? 'checked' : '')?> /></td>
              <td width="120" align="left"><?php
$cadenars1  = $myrow['fecha'];
    list($anio,$mes,$dia)=explode("-",$cadenars1); 
    echo $dia.".".$mes.".".$anio;               
			  ?></td>
              <td width="120" align="left"><?php
			  $nroorden = str_pad($row_rs9['id'], 5, "0", STR_PAD_LEFT);
			  
			   echo $row_rs9['codigo']; ?>-<?php echo $nroorden; ?></td>
              <td width="200" align="left"><?php echo $row_rs9['nombre']; ?> <?php echo $row_rs9['apellido']; ?></td>
              <td width="200" align="left"><?php 
			   $idcon = $myrow['id_concesionario'];
			   mysql_select_db($database_cone, $cone);
			   $query_rs5 = "SELECT * FROM  volvo_puntos_ventas  WHERE id = '$idcon'";
			   $rs5 = mysql_query($query_rs5, $cone) or die(mysql_error());
			   $row_rs5 = mysql_fetch_assoc($rs5);
			   $totalRows_rs5 = mysql_num_rows($rs5);   			  
			   echo $row_rs5['puntoderetiro'];
			    ?></td>
              <td align="left"><?php if  ($myrow['estado']==0) { echo "PENDIENTE"; } else { echo "FINALIZADO"; } ?></td>                
              <td width="70" align="left"><a class="tooltips" href="reclamos_detalle.php?vid=<?php echo $myrow['id_pedido']; ?>&reclamo=<?php echo $myrow['id']; ?>"><img src="../admin/img/icono_ver.gif" alt="VER" width="60" height="30" border="0" /><span>Ver detalle</span></a></td>
              <td width="60" align="right">
                </td>
            </tr>
          </table>
        </div>
        <?php } else { ?>
        <div class="listado">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
            <td width="65" align="center">&nbsp;</td>
              <td width="120" align="left"><?php
$cadenars1  = $myrow['fecha'];
    list($anio,$mes,$dia)=explode("-",$cadenars1); 
    echo $dia.".".$mes.".".$anio;               
			  ?></td>
              <td width="120" align="left"><?php
			  $nroorden = str_pad($row_rs9['id'], 5, "0", STR_PAD_LEFT);
			  
			   echo $row_rs9['codigo']; ?>-<?php echo $nroorden; ?></td>
              <td width="200" align="left"><?php echo $row_rs9['nombre']; ?> <?php echo $row_rs9['apellido']; ?></td>
              <td width="200" align="left"><?php 
			   $idcon = $myrow['id_concesionario'];
			   mysql_select_db($database_cone, $cone);
			   $query_rs5 = "SELECT * FROM  volvo_puntos_ventas  WHERE id = '$idcon'";
			   $rs5 = mysql_query($query_rs5, $cone) or die(mysql_error());
			   $row_rs5 = mysql_fetch_assoc($rs5);
			   $totalRows_rs5 = mysql_num_rows($rs5);   			  
			   echo $row_rs5['puntoderetiro'];
			    ?></td>
              <td align="left"><?php if  ($myrow['estado']==0) { echo "PENDIENTE"; } else { echo "FINALIZADO"; } ?></td>                
              <td width="70" align="left"><a class="tooltips" href="reclamos_detalle.php?vid=<?php echo $myrow['id_pedido']; ?>&reclamo=<?php echo $myrow['id']; ?>"><img src="../admin/img/icono_ver.gif" alt="VER" width="60" height="30" border="0" /><span>Ver detalle</span></a></td>
              <td width="60" align="right">
                </td>
            </tr>
          </table>
        </div>
        <?php } ?>        
          
        <?php } ?>
        </td>
      </tr>
  </table>
            <div class="paginado">
  <?php 
   // CREATE A VAR WITH THE NAV LINKS
   $pages = $db->show_num_pages('&larr; Anterior','&larr; Anterior','Siguiente  &rarr;','Siguiente  &rarr;','','class=advertencias2',$pasa);   // show pages 
   print $pages;
?>
   </div></td>
      </tr>
    </table>
  </div>
</div>
</body>
</html>
