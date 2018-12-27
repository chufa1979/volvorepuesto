<?php include ("seguridad.php"); ?>
<?php require_once('../Connections/cone.php');  

/********************FUNCIONES**********************************************************/
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
/******************************************************************************/

if ($_REQUEST['a'] == 'editar_rapido')
{
	$val = $_GET["val"];
	$cond_val = $_GET["cond_val"];
	mysql_select_db($database_cone, $cone);
	$sSQL="Update volvo_productos Set habilitado='$val' Where id='$cond_val'";
	mysql_db_query($database_cone,$sSQL);
}

$_SESSION['pagina'] = 'productos_publicados.php';

if ((isset($_GET["eliminalinea"])) || (isset($_GET["eliminalinea_x"]))){
  $v = $_GET['vid'];
	/***/
	mysql_select_db($database_cone, $cone);
	$query_rsc = "SELECT * FROM volvo_productos WHERE id = '$v'";
	$rsc = mysql_query($query_rsc, $cone) or die(mysql_error());
	$row_rsc = mysql_fetch_assoc($rsc);
	$ihm = $row_rsc['imagen01'];	
	if ($ihm<>'') {	
		unlink($ihm);
	}
	$ihm = $row_rsc['imagen02'];	
	if ($ihm<>'') {	
		unlink($ihm);
	}
	$ihm = $row_rsc['imagen03'];	
	if ($ihm<>'') {	
		unlink($ihm);
	}
  
  $deleteSQL = "DELETE FROM volvo_productos WHERE id='$v'";
  mysql_select_db($database_cone, $cone);
  $Result1 = mysql_query($deleteSQL, $cone) or die(mysql_error());
}	

if ((isset($_GET["buscar"])) || (isset($_GET["buscar_x"]))){	
	$textoabuscar = $_GET["texto"];
	if ($_GET['categoria']<>'0') {
		$cc = $_GET['categoria'];
		$c = " AND (categoria = '$cc') ";	
	}
	if ($textoabuscar<>'') {
		
	$buscador_hilo = explode(" ", $textoabuscar);
	foreach($buscador_hilo as $palabras) {
			$palabrasbusca = trim($palabras);
			$bus .= " AND (nombre LIKE '%$palabrasbusca%' || item LIKE '%$palabrasbusca%') ";
	}

		
		
///	$bus .= " AND (nombre LIKE '%$textoabuscar%' || descripcion LIKE '%$textoabuscar%' || item LIKE '%$textoabuscar%') ";
	}
}
	mysql_select_db($database_cone, $cone);
	$query_rs1 = "SELECT * FROM volvo_productos WHERE 1=1 $bus $c ORDER BY id DESC";
	///echo $query_rs1;
	$rs1 = mysql_query($query_rs1, $cone) or die(mysql_error());
	$row_rs1 = mysql_fetch_assoc($rs1);
	$totalRows_rs1 = mysql_num_rows($rs1);

   include 'buildNav.php';
   $conn = mysql_connect($hostname_cone,$username_cone,$password_cone);
   mysql_select_db($database_cone);
   $db = new buildNav;
   $db->offset = 'offset';
   $db->number_type = 'number';
   $db->limit = 15;
   $db->pag = $db->limit*$mostrar;
   $totalpag =ceil($totalRows_rstotalpag/$db->limit);
   $db->execute($query_rs1);
   $totalp=ceil($totalRows_rs1/$mostrar);
   
   if (isset($_GET["categoria"])) {
	   $pasa .= "categoria=".$_GET["categoria"].'&buscar.x=0&buscar.y=0';   
   }
   if ((isset($_GET["texto"])) && ($_GET["texto"]<>'')) {
	   $pasa .= '&texto='.$_GET["texto"].'&buscar.x=0&buscar.y=0';   
   }
   
   mysql_select_db($database_cone, $cone);
   $query_rs1c = "SELECT * FROM volvo_categorias ORDER BY categoria ASC";
   $rs1c = mysql_query($query_rs1c, $cone) or die(mysql_error());
   $row_rs1c = mysql_fetch_assoc($rs1c);
   $totalRows_rs1c = mysql_num_rows($rs1c);
 

	mysql_select_db($database_cone, $cone);
	$query_rs_moneda = "SELECT * FROM volvo_moneda WHERE id = 1";
	$rs_moneda = mysql_query($query_rs_moneda, $cone) or die(mysql_error());
	$row_rs_moneda = mysql_fetch_assoc($rs_moneda);
	$totalRows_rs_moneda = mysql_num_rows($rs_moneda);        
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>VOLVO REPUESTOS | Panel de Administraci&oacute;n Web</title>
<link href="js/style_admin.css" rel="stylesheet" type="text/css" />
<link href="js/menu/menu.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script type="text/javascript" src="js/chosen.jquery.js"></script>
  <script type="text/javascript" src="js/menu/script.js"></script>

  <!-- popup -->
  <link href="js/popup/themes_default.css" rel="stylesheet" type="text/css" />
  <link href="js/popup/themes_alphacube.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="js/popup/js_popup/prototype.js"> </script> 
  <script type="text/javascript" src="js/popup/js_popup/effects.js"> </script>
  <script type="text/javascript" src="js/popup/js_popup/window.js"> </script>
  <script type="text/javascript" src="js/popup/js_popup/debug.js"> </script>
  <script type="text/javascript" src="js/popup/js_popup/application.js"> </script>
  <script>
  function changeFunc() {
	     document.getElementById("buscar").click(); // Click on the checkbox
  }
  </script>
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
   <li class='has-sub active'><a href='#' class="nav_productos">Productos</a>
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
  <div class="ruta">productos&nbsp;&nbsp;&nbsp;&raquo;&nbsp;&nbsp;&nbsp;publicados</div>
</div>
<div class="main">
  <div id="contenido">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left" valign="top"><form id="form1" name="form1" method="get" action="productos_publicados.php">
          <div class="listado-filtros">
            <table border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="300" align="right"><input name="texto" type="text" class="form-ok" id="texto" placeholder="Buscar por Nombre | N&deg; de Pieza" /></td>
                <td width="32" align="right"><input name="buscar" type="image" id="buscar" src="img/icon_buscar.png" alt="BUSCAR" /></td>
                <td width="80" align="center">Filtrar</td>
                <td width="280" align="left">
                <select name="categoria" class="form-desplegable" id="categoria" onchange="changeFunc();">
                      <option value="0">Seleccionar</option>
<?php 
if ($totalRows_rs1c>0) {
do { ?>
    <option value="<?php echo $row_rs1c['id'];?>"><?php echo $row_rs1c['categoria'];?></option>
<?php } while($row_rs1c = mysql_fetch_assoc($rs1c));
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
              <td width="70" align="left">Mostrar</td>
              <td width="100" align="left">Item</td>
              <td width="250" align="left">Producto</td>
              <td width="80" align="left">L&iacute;nea</td>
              <td width="200" align="left">Categor&iacute;a</td>
              <td align="left">Precio</td>
              <td width="70" align="left">&nbsp;</td>
              <td width="60" align="left">&nbsp;</td>
            </tr>
          </table>
        </div>
        <?php while($myrow = mysql_fetch_array($db->sql_result))   { ?>
          <div class="listado">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="70" align="left"><input name="habilitado" type="checkbox" id="habilitado" onClick="document.location = '<?=autolink(array('a','key','val','cond_key','cond_val'),array('editar_rapido','habilitado',($myrow['habilitado']==1?'0':'1'),'id',$myrow['id']),'productos_publicados.php')?>'" value="1" <?php if (!(strcmp($myrow['habilitado'],1))) {echo "checked=\"checked\"";} ?> <?=($myrow['habilitado']==1 ? 'checked' : '')?> />&nbsp;</td>
              <td width="100" align="left"><?php echo $myrow['item']; ?></td>
              <td width="250" align="left"><?php echo $myrow['nombre']; ?></td>
              <td width="80" align="left"><?php 
			  $linea = $myrow['linea'];
			mysql_select_db($database_cone, $cone);
			$query_rs_cate01 = "SELECT * FROM volvo_linea WHERE id = '$linea'";
			$rs_cate01 = mysql_query($query_rs_cate01, $cone) or die(mysql_error());
			$row_rs_cate01 = mysql_fetch_assoc($rs_cate01);
			$totalRows_rs_cate01 = mysql_num_rows($rs_cate01);	
			echo $row_rs_cate01['linea'];				  
			  ?></td>
              <td width="200" align="left"><?php 
			$vidfs = $myrow['categoria'];
			mysql_select_db($database_cone, $cone);
			$query_rs_cate = "SELECT * FROM volvo_categorias WHERE id = '$vidfs'";
			$rs_cate = mysql_query($query_rs_cate, $cone) or die(mysql_error());
			$row_rs_cate = mysql_fetch_assoc($rs_cate);
			$totalRows_rs_cate = mysql_num_rows($rs_cate);	
			echo $row_rs_cate['categoria']; ?></td>
              <td align="left"><?php 
			  if ($row_rs_moneda['moneda']==1) {
				  echo "$ ".$myrow['precio'];
			  } 
			  if ($row_rs_moneda['moneda']==2) {
				  echo "USD ".$myrow['precio_dolar'];
			  }
			  ?></td>
              <td width="70" align="left"><a class="tooltips" href="productos_editar.php?vid=<?php echo $myrow['id']; ?><?php if (isset($_GET['offset'])) { echo "&offset=".$_GET['offset'];}?>"><img src="img/icono_editar.gif" alt="MODIFICAR" width="60" height="30" border="0" /><span>Modificar</span></a></td>
              <td width="60" align="right"><div class="listing" style="display:none" id="open_ajax_dialog_codediv1">
                  <div id="ajax_dialog<?php echo $myrow['id']; ?>">Dialog.alert({url: "productos_eliminar.php?vid=<?php echo $myrow['id']; ?>", options: {method: 'get'}},  
                  {className: "alphacube", width:440, height:280, zIndex:999, okLabel: "Close"});</div>
                  <script type="text/javascript"> Application.addEditButton('open_ajax_dialog')</script>
                </div>
                <a href="#" class="tooltips" onclick="Application.evalCode('ajax_dialog<?php echo $myrow['id']; ?>', true)"><img src="img/icono_eliminar.gif" alt="ELIMINAR" width="60" height="30" border="0" /><span>Eliminar</span></a></td>
            </tr>
          </table>
        </div>
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
   </div>
   
          </td>
      </tr>
    </table>
  </div>
</div>
</body>
</html>
