<?php include ("seguridad.php"); ?>
<?php require_once('../Connections/cone.php');  
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
<title>VOLVO REPUESTOS | Panel de Administraci&oacute;n Web</title>
<link href="js/style_admin.css" rel="stylesheet" type="text/css" />
<link href="js/menu/menu.css" rel="stylesheet" type="text/css" />
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
         <li><a href='banner_superior_habilitar.php'>Slider Home Habilitar</a></li>
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
  <div class="ruta">CONSULTAS DE PRODUCTOS&nbsp;&nbsp;&nbsp;&raquo;&nbsp;&nbsp;detalle</div>
</div>
<div class="main">
  <div id="contenido">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left" valign="top"><div class="subtitulo_azul"> DETALLE DE LA CONSULTA<br />
        </div>
          <table border="0" cellpadding="0" cellspacing="0" class="recuadro">
            <tr>
              <td class="content"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="150"><div class="listadodetalle">Fecha</div></td>
                  <td><div class="listado">
                    <?php
$cadenars1  = $row_rs1['fecha'];
    list($anio,$mes,$dia)=explode("-",$cadenars1); 
    echo $dia.".".$mes.".".$anio;               
			  ?>
                  </div></td>
                </tr>
              </table>
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="150"><div class="listadodetalle">Nombre y apellido</div></td>
                    <td><div class="listado"><?php echo $row_rs1['nombre']; ?> <?php echo $row_rs1['apellido']; ?></div></td>
                  </tr>
              </table>
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="150"><div class="listadodetalle">E-mail</div></td>
                    <td><div class="listado"><a href="mailto:<?php echo $row_rs1['email']; ?>"><?php echo $row_rs1['email']; ?></a></div></td>
                  </tr>
              </table>

                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="150"><div class="listadodetalle">Localidad</div></td>
                    <td><div class="listado"><?php echo $row_rs1['localidad']; ?></div></td>
                  </tr>
                </table>
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="150"><div class="listadodetalle">Provincia</div></td>
                    <td><div class="listado"><?php echo $row_rs1['provincia']; ?></div></td>
                  </tr>
                </table>
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="150"><div class="listadodetalle"><strong>Repuesto</strong></div></td>
                    <td><div class="listado"><strong><?php echo $row_rs1['producto']; ?> | Cod: <?php echo $row_rs1['item']; ?></strong></div></td>
                  </tr>
              </table>
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="150"><div class="listadodetalle"><strong>Consulta</strong></div></td>
                    <td><div class="listado"><?php echo $row_rs1['consulta']; ?></div></td>
                  </tr>
              </table></td>
            </tr>
          </table></td>
      </tr>
    </table>
    <br />
    <table border="0" cellpadding="0" cellspacing="0" class="recuadro_guardar">
      <tr>
        <td align="right" valign="middle" class="content"><input name="button2" type="submit" class="btn_publicar" id="button3" onclick="MM_goToURL('parent','consultas.php');return document.MM_returnValue" value="VOLVER" /></td>
      </tr>
    </table>
  </div>
</div>
</body>
</html>
