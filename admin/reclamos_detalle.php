<?php include ("seguridad.php"); ?>
<?php require_once('../Connections/cone.php');  
	$vid = $_GET['vid'];
   mysql_select_db($database_cone, $cone);
   $query_rs1 = "SELECT * FROM volvo_pedido WHERE id = '$vid'";
   $rs1 = mysql_query($query_rs1, $cone) or die(mysql_error());
   $row_rs1 = mysql_fetch_assoc($rs1);
   $totalRows_rs1 = mysql_num_rows($rs1);
   
   $vid2 = $row_rs1['producto'];
   mysql_select_db($database_cone, $cone);
   $query_rs2 = "SELECT * FROM volvo_productos WHERE id = '$vid2'";
   $rs2 = mysql_query($query_rs2, $cone) or die(mysql_error());
   $row_rs2 = mysql_fetch_assoc($rs2);
   $totalRows_rs2 = mysql_num_rows($rs2);   
   
   $vid3 = $row_rs1['idcon'];
   mysql_select_db($database_cone, $cone);
   $query_rs3 = "SELECT * FROM volvo_puntos_ventas WHERE id = '$vid3'";
   $rs3 = mysql_query($query_rs3, $cone) or die(mysql_error());
   $row_rs3 = mysql_fetch_assoc($rs3);
   $totalRows_rs3 = mysql_num_rows($rs3);      
   
   $vid4 = $_GET['reclamo'];
   mysql_select_db($database_cone, $cone);
   $query_rs4 = "SELECT * FROM volvo_reclamos WHERE id = '$vid4'";
   $rs4 = mysql_query($query_rs4, $cone) or die(mysql_error());
   $row_rs4 = mysql_fetch_assoc($rs4);
   $totalRows_rs4 = mysql_num_rows($rs4);    
   

 	$id_pedido = $myrow['id_pedido'];
	mysql_select_db($database_cone, $cone);
	$query_rspro = "SELECT * FROM volvo_pedidos_productos WHERE id_compra = '$vid'";
	$rspro = mysql_query($query_rspro, $cone) or die(mysql_error());
	$row_rspro = mysql_fetch_assoc($rspro);
	$totalRows_rspro = mysql_num_rows($rspro);    
	
   $iduser = $row_rs4['iduser'];
   mysql_select_db($database_cone, $cone);
   $query_rs5 = "SELECT * FROM volvo_clientes WHERE id = '$iduser'";
   $rs5 = mysql_query($query_rs5, $cone) or die(mysql_error());
   $row_rs5 = mysql_fetch_assoc($rs5);
   $totalRows_rs5 = mysql_num_rows($rs5);	    

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
  <div class="ruta">reclamos&nbsp;&nbsp;&nbsp;&raquo;&nbsp;&nbsp;detalle</div>
</div>
<div class="main">
  <div id="contenido">
    <div class="subtitulo_azul">RECLAMO: <span class="listadodetalle"> N&deg; Orden</span> <span class="listado">
      <?php
			  $nroorden = str_pad($row_rs1['id'], 5, "0", STR_PAD_LEFT);
			  
			   echo $row_rs1['codigo']; ?>
-<?php echo $nroorden; ?></span></div>
    <table border="0" cellpadding="0" cellspacing="0" class="recuadro">
      <tr>
        <td class="content"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="150"><?php echo $row_rs4['reclamo']; ?></td>
            </tr>
        </table></td>
      </tr>
    </table>
    <br />
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left" valign="top"><div class="subtitulo_azul"> DETALLE DEL PEDIDO<br />
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
                    <td>&nbsp;</td>
                  </tr>
                </table>
                <?php if ($totalRows_rspro<>0) { ?>
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="100" align="left" bgcolor="#EFEFEF"><div class="listadodetalle">&nbsp;&nbsp;Cantidad</div></td>
                    <td width="130" align="left" bgcolor="#EFEFEF"><div class="listadodetalle">Item</div></td>
                    <td align="left" bgcolor="#EFEFEF"><div class="listadodetalle">Producto</div></td>
                    <td width="120" align="left" bgcolor="#EFEFEF"><div class="listadodetalle">Precio Unitario</div></td>
                    <td width="120" align="left" bgcolor="#EFEFEF"><div class="listadodetalle">Precio Total</div></td>
                  </tr>
                  <?php do { ?>
                  <tr>
                    <td align="left"><div class="listado">&nbsp;&nbsp;<?php print $row_rspro['cantidad']; ?></div></td>
                    <td align="left"><div class="listado"><?php print $row_rspro['item']; ?></div></td>
                    <td align="left"><div class="listado"><?php print $row_rspro['nombre']; ?></div></td>
                    <td width="120" align="left"><div class="listado">$ <?php print $row_rspro['precio']; ?></div></td>
                    <td width="120" align="left"><div class="listado">$ <?php echo ($row_rspro['cantidad']*$row_rspro['precio']); ?></div></td>
                  </tr>
                  <?php } while ($row_rspro = mysql_fetch_assoc($rspro)); ?>
                  <tr bgcolor="#D2E4EE">
                    <td height="30" align="left">&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td height="30" align="left">&nbsp;</td>
                    <td height="30" align="left" class="txt_azul"><strong>TOTAL</strong></td>
                    <td width="120" height="30" align="left" class="txt_azul"><strong>$ <?php echo $row_rs1['total']; ?></strong></td>
                  </tr>
                </table>
                <?php } ?></td>
            </tr>
          </table>
          <br />
          <div class="subtitulo_azul">Nro. de chasis</div>
          <table border="0" cellpadding="0" cellspacing="0" class="recuadro">
            <tr>
            <td class="content"><?php echo $row_rs1['chasis']; ?></td>
          </tr>
      </table>          
          <br />
          <div class="subtitulo_azul">PUNTO DE RETIRO</div>
          <table border="0" cellpadding="0" cellspacing="0" class="recuadro">
            <tr>
              <td class="content"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="150"><div class="listadodetalle">Concesionario</div></td>
                  <td><div class="listado"><?php echo $row_rs3['puntoderetiro']; ?></div></td>
                </tr>
              </table>
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="150"><div class="listadodetalle">Direcci&oacute;n</div></td>
                    <td><div class="listado"><?php echo $row_rs3['direccion']; ?></div></td>
                  </tr>
                </table>
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="150"><div class="listadodetalle">Tel&eacute;fono</div></td>
                    <td><div class="listado"><?php echo $row_rs3['telefono']; ?></div></td>
                  </tr>
                </table>
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="150"><div class="listadodetalle">Email</div></td>
                    <td><div class="listado"><?php echo $row_rs3['email']; ?></div></td>
                  </tr>
                </table></td>
            </tr>
          </table>
          <br />
          <div class="subtitulo_azul">DATOS DEL CLIENTE</div>
          <table border="0" cellpadding="0" cellspacing="0" class="recuadro">
            <tr>
              <td class="content"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="150"><div class="listadodetalle">Nombre y apellido</div></td>
                  <td width="250"><div class="listado"><?php echo $row_rs5['nombre']; ?> <?php echo $row_rs5['apellido']; ?></div></td>
                  <td width="100"><div class="listadodetalle">E-mail</div></td>
                  <td><div class="listado"><a href="mailto:<?php echo $row_rs5['email']; ?>"><?php echo $row_rs5['email']; ?></a></div></td>
                </tr>
              </table>
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="150"><div class="listadodetalle">Tel&eacute;fono</div></td>
                    <td width="250"><div class="listado"><?php echo $row_rs5['telefono']; ?></div></td>
                    <td width="100"><div class="listadodetalle">DNI</div></td>
                    <td><div class="listado"><?php echo $row_rs5['dni']; ?></div></td>
                  </tr>
                </table>
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="150"><div class="listadodetalle">Calle</div></td>
                    <td width="250"><div class="listado"><?php echo $row_rs5['calle']; ?></div></td>
                    <td width="100"><div class="listadodetalle">Nro</div></td>
                    <td><div class="listado"><?php echo $row_rs5['num']; ?></div></td>
                  </tr>
                </table>
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="150"><div class="listadodetalle">Localidad</div></td>
                    <td width="250"><div class="listado"><?php echo $row_rs5['localidad']; ?></div></td>
                    <td width="100"><div class="listadodetalle">Piso</div></td>
                    <td width="100"><div class="listado"><?php echo $row_rs5['piso']; ?></div></td>
                    <td width="100"><div class="listadodetalle">Depto</div></td>
                    <td><div class="listado"><?php echo $row_rs5['depto']; ?></div></td>
                  </tr>
                </table>
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="150"><div class="listadodetalle">Pa&iacute;s</div></td>
                    <td width="250"><div class="listado"><?php echo $row_rs5['pais']; ?></div></td>
                    <td width="100"><div class="listadodetalle">Provincia</div></td>
                    <td><div class="listado"><?php echo $row_rs5['provincia']; ?></div></td>
                  </tr>
                </table>
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="150"><div class="listadodetalle">CUIT/CUIL</div></td>
                    <td width="250"><div class="listado"><?php echo $row_rs5['cuitnro']; ?></div></td>
                    <td width="100"><div class="listadodetalle">Cond. IVA</div></td>
                    <td><div class="listado"><?php echo $row_rs5['iva']; ?></div></td>
                  </tr>
                </table></td>
            </tr>
          </table></td>
      </tr>
    </table>
    <br />
    <table border="0" cellpadding="0" cellspacing="0" class="recuadro_guardar">
      <tr>
        <td align="right" valign="middle" class="content"><input name="button2" type="submit" class="btn_publicar" id="button3" onclick="MM_goToURL('parent','pedidos.php');return document.MM_returnValue" value="VOLVER" /></td>
      </tr>
    </table>
  </div>
</div>
</body>
</html>
