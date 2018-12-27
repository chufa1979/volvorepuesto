<?php include ("seguridad.php"); ?>
<?php require_once('../Connections/cone.php');  

$_SESSION['pagina'] = 'productos_publicados.php';

if ((isset($_GET["eliminalinea"])) || (isset($_GET["eliminalinea_x"]))){
  $v = $_GET['vid'];
	/***/
  $deleteSQL = "DELETE FROM volvo_puntos_ventas WHERE id='$v'";
  mysql_select_db($database_cone, $cone);
  $Result1 = mysql_query($deleteSQL, $cone) or die(mysql_error());
}	



if ((isset($_GET["buscar"])) || (isset($_GET["buscar_x"]))){	
	$textoabuscar = $_GET["texto"];
	if ($textoabuscar<>'') {
	$bus .= " AND (puntoderetiro LIKE '%$textoabuscar%' || localidad LIKE '%$textoabuscar%' || email LIKE '%$textoabuscar%') ";
	}
}
	mysql_select_db($database_cone, $cone);
	$query_rs1 = "SELECT * FROM volvo_puntos_ventas
 WHERE 1=1 $bus $c ORDER BY puntoderetiro ASC";
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
  <div class="ruta">PuntoS de retiro&nbsp;&nbsp;&nbsp;&raquo;&nbsp;&nbsp;&nbsp;PUBLICADOS</div>
</div>
<div class="main">
  <div id="contenido">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left" valign="top">
          <table border="0" cellpadding="0" cellspacing="0" class="recuadro">
          <tr>
        <td class="content"><div class="listado-top">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="250" align="left">Nombre</td>
              <td width="200" align="left">Localidad</td>
              <td align="left">E-mail</td>
              <td width="70" align="left">&nbsp;</td>
              <td width="60" align="left">&nbsp;</td>
            </tr>
          </table>
        </div>
        <?php while($myrow = mysql_fetch_array($db->sql_result))   { ?>
          <div class="listado">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="250" align="left"><?php echo $myrow['puntoderetiro']; ?></td>
              <td width="200" align="left"><?php 
			echo $myrow['localidad'];
			 ?></td>
              <td align="left"><?php echo $myrow['email']; ?></td>
              <td width="70" align="left"><a class="tooltips" href="puntos_ventas_editar.php?vid=<?php echo $myrow['id']; ?><?php if (isset($_GET['offset'])) { echo "&offset=".$_GET['offset'];}?>"><img src="img/icono_editar.gif" alt="MODIFICAR" width="60" height="30" border="0" /><span>Modificar</span></a></td>
              <td width="60" align="right"><div class="listing" style="display:none" id="open_ajax_dialog_codediv1">
                  <div id="ajax_dialog<?php echo $myrow['id']; ?>">Dialog.alert({url: "puntos_ventas_eliminar.php?vid=<?php echo $myrow['id']; ?>", options: {method: 'get'}},  
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
