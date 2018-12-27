<?php include ("seguridad.php"); ?>
<?php require_once('../Connections/cone.php');  

$_SESSION['pagina'] = 'productos_publicados.php';

if ((isset($_GET["eliminalinea"])) || (isset($_GET["eliminalinea_x"]))){
  $v = $_GET['vid'];
  $deleteSQL = "DELETE FROM volvo_categorias WHERE id='$v'";
  mysql_select_db($database_cone, $cone);
  $Result1 = mysql_query($deleteSQL, $cone) or die(mysql_error());
}	
if ((isset($_GET["eliminalinea2"])) || (isset($_GET["eliminalinea2_x"]))){
  $v = $_GET['vid'];
  $deleteSQL = "DELETE FROM volvo_subcategoria WHERE id='$v'";
  mysql_select_db($database_cone, $cone);
  $Result1 = mysql_query($deleteSQL, $cone) or die(mysql_error());
}

if ((isset($_POST["buttonedit"])) || (isset($_POST["buttonedit_x"]))){
  $v = $_POST['vid2'];
  $categoria = $_POST['categorias2'];
  
  $updateSQL = "UPDATE volvo_categorias SET categoria='$categoria'  WHERE id='$v'";
  mysql_select_db($database_cone, $cone);
  $Result1 = mysql_query($updateSQL, $cone) or die(mysql_error());
  header("Location: categorias.php");
}
if ((isset($_POST["buttonedit2"])) || (isset($_POST["buttonedit2_x"]))){
  $categoria_sub_edit = $_POST['categoria_sub_edit'];
  $subcategorias2 = $_POST['subcategorias2'];
  $vid3 = $_POST['vid3'];
  
  $updateSQL = "UPDATE volvo_subcategoria SET categoria='$categoria_sub_edit', subcategoria='$subcategorias2'  WHERE id='$vid3'";
  mysql_select_db($database_cone, $cone);
  $Result1 = mysql_query($updateSQL, $cone) or die(mysql_error());
  header("Location: categorias.php");
}



if ((isset($_POST["button_subcategoria"])) || (isset($_POST["button_subcategoria_x"]))){
	
  $categoria_sub = $_POST['categoria_sub'];
  $subcategorias = $_POST['subcategorias'];
	
  $insertSQL = "INSERT INTO volvo_subcategoria (categoria,subcategoria) VALUES ('$categoria_sub','$subcategorias')";
  mysql_select_db($database_cone, $cone);
  $Result1 = mysql_query($insertSQL, $cone) or die(mysql_error());

  header("Location: categorias.php#subca");

}


if ((isset($_POST["button_categoria"])) || (isset($_POST["button_categoria_x"]))){
	
  $categoria = $_POST['categoria'];
	
  $insertSQL = "INSERT INTO volvo_categorias (categoria) VALUES ('$categoria')";
  mysql_select_db($database_cone, $cone);
  $Result1 = mysql_query($insertSQL, $cone) or die(mysql_error());

  $insertGoTo = "categorias.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

   mysql_select_db($database_cone, $cone);
   $query_rs1 = "SELECT * FROM volvo_categorias ORDER BY categoria ASC";
   $rs1 = mysql_query($query_rs1, $cone) or die(mysql_error());
   $row_rs1 = mysql_fetch_assoc($rs1);
   $totalRows_rs1 = mysql_num_rows($rs1);
   
   mysql_select_db($database_cone, $cone);
   $query_rs11 = "SELECT * FROM volvo_subcategoria ORDER BY categoria ASC";
   $rs11 = mysql_query($query_rs11, $cone) or die(mysql_error());
   $row_rs11 = mysql_fetch_assoc($rs11);
   $totalRows_rs11 = mysql_num_rows($rs11);   
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
   <li class='has-sub active'><a href='#' class="nav_cate">Categor&iacute;as y filtros</a>
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
  <div class="ruta">Categor&iacute;aS Y SUBCATEGOR&Iacute;AS</div>
</div>
<div class="main">
  <div id="contenido">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left" valign="top">
        <span class="subtitulo_azul"><strong>CATEGOR&Iacute;AS</strong></span><br />
        <br />
        <form id="form1" name="form1" method="post" action="">
          <table border="0" cellpadding="0" cellspacing="0" class="recuadro">
            <tr>
              <td class="content"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td align="left" class="txt_bold">Categor&iacute;a</td>
                  <td width="110" align="right">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left"><input name="categoria" type="text" class="form-control" id="categoria" placeholder="Cabina"/></td>
                  <td width="110" align="right"><input name="button_categoria" type="submit" class="btn_si" id="button_categoria" value="Crear" /></td>
                  </tr>
              </table><br />
                <hr width="100%" size="1" noshade="noshade" class="txt_azul" />
                <?php if ($totalRows_rs1<>0) { ?>
                <?php do { ?>
                <div class="listado">
				<?php if ($_GET['edit']==$row_rs1['id']) { ?>
                  <?php
				  $viddd = $row_rs1['id'];
				   mysql_select_db($database_cone, $cone);
				   $query_rs2 = "SELECT * FROM volvo_categorias WHERE id = '$viddd'";
				   $rs2 = mysql_query($query_rs2, $cone) or die(mysql_error());
				   $row_rs2 = mysql_fetch_assoc($rs2);
				   $totalRows_rs2 = mysql_num_rows($rs2);
				  ?>      
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td align="left"><input name="categorias2" type="text" class="form-control" id="categorias2" placeholder="Categorias" value="<?php echo $row_rs2['categoria'];?>"/>
                        <input name="vid2" type="hidden" id="vid2" value="<?php echo $row_rs2['id'];?>" /></td>
                      <td width="110" align="right"><input name="buttonedit" type="submit" class="btn_si" id="buttonedit" value="Modificar" /></td>
                    </tr>
                  </table>
                  <?php } else { ?>                             
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td align="left"><?php echo $row_rs1['categoria']; ?></td>
                      <td width="70" align="left"><a class="tooltips" href="categorias.php?edit=<?php echo $row_rs1['id']; ?>"><img src="img/icono_editar.gif" alt="MODIFICAR" width="60" height="30" border="0" /><span>Modificar</span></a></td>
                      <td width="60" align="right"><div class="listing" style="display:none" id="open_ajax_dialog_codediv1">
                          <div id="ajax_dialog<?php echo $row_rs1['id']; ?>">Dialog.alert({url: "categorias_eliminar.php?vid=<?php echo $row_rs1['id']; ?>", options: {method: 'get'}},  
                          {className: "alphacube", width:440, height:280, zIndex:999, okLabel: "Close"});</div>
                        <script type="text/javascript"> Application.addEditButton('open_ajax_dialog')</script>
                        </div>
                          <a href="javascript:void();" class="tooltips" onclick="Application.evalCode('ajax_dialog<?php echo $row_rs1['id']; ?>', true)"><img src="img/icono_eliminar.gif" alt="ELIMINAR" width="60" height="30" border="0" /><span>Eliminar</span></a></td>
                    </tr>
                </table>
                  <?php } ?> 
                </div>
                <?php } while($row_rs1 = mysql_fetch_assoc($rs1));?>
                <?php } ?>
                
                </td>
            </tr>
          </table>
      </form>
        <a name="subca" id="subca"></a><br />
        <br />
        <strong><span class="subtitulo_azul">SUBCATEGOR&Iacute;AS</span></strong><br />
        <br />
        <form id="form3" name="form3" method="post" action="">
          <table border="0" cellpadding="0" cellspacing="0" class="recuadro">
            <tr>
              <td class="content"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td align="left" class="txt_bold">Categor&iacute;a</td>
                  <td align="left" class="txt_bold">Subcategor&iacute;a</td>
                  <td width="110" align="right">&nbsp;</td>
                </tr>
                <tr>
                  <td width="250" align="left"><select name="categoria_sub" class="form-desplegable2" id="categoria_sub">
                    <option>Seleccionar</option>
          <?php
			mysql_select_db($database_cone, $cone);
			$query_rs_cate = "SELECT * FROM volvo_categorias ORDER BY categoria ASC";
			$rs_cate = mysql_query($query_rs_cate, $cone) or die(mysql_error());
			$row_rs_cate = mysql_fetch_assoc($rs_cate);
			$totalRows_rs_cate = mysql_num_rows($rs_cate);			  
		  ?>
          <?php do { ?>
          <option value="<?php echo $row_rs_cate['id'];?>" ><?php echo $row_rs_cate['categoria'];?></option>
          <?php } while ($row_rs_cate = mysql_fetch_assoc($rs_cate))?>
                              
                  </select></td>
                  <td align="left"><input name="subcategorias" type="text" class="form-control" id="subcategorias" placeholder="Suspension de Cabina"/></td>
                  <td width="110" align="right"><input name="button_subcategoria" type="submit" class="btn_si" id="button_subcategoria" value="Crear" /></td>
                </tr>
              </table>
                <br />
                <hr width="100%" size="1" noshade="noshade" class="txt_azul" />
                <?php if ($totalRows_rs11<>0) { ?>
                <?php do { ?>       
                  <?php if ($_GET['subedit']==$row_rs11['id']) { ?>
                  <?php
				  $viddd = $row_rs11['id'];
				   mysql_select_db($database_cone, $cone);
				   $query_rs2 = "SELECT * FROM volvo_subcategoria WHERE id = '$viddd'";
				   $rs2 = mysql_query($query_rs2, $cone) or die(mysql_error());
				   $row_rs2 = mysql_fetch_assoc($rs2);
				   $totalRows_rs2 = mysql_num_rows($rs2);
				  ?>                        
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="250" align="left"><select name="categoria_sub_edit" class="form-desplegable2" id="categoria_sub_edit">
                    <option>Seleccionar</option>
          <?php
			mysql_select_db($database_cone, $cone);
			$query_rs_cate = "SELECT * FROM volvo_categorias ORDER BY categoria ASC";
			$rs_cate = mysql_query($query_rs_cate, $cone) or die(mysql_error());
			$row_rs_cate = mysql_fetch_assoc($rs_cate);
			$totalRows_rs_cate = mysql_num_rows($rs_cate);			  
		  ?>
          <?php do { ?>
          <option value="<?php echo $row_rs_cate['id'];?>" <?php 
		  if ($row_rs11['categoria']==$row_rs_cate['id']) {
			  echo 'selected="selected"';
		  }
		  ?>><?php echo $row_rs_cate['categoria'];?></option>
          <?php } while ($row_rs_cate = mysql_fetch_assoc($rs_cate))?>
                              
                  </select>
                      <input name="vid3" type="hidden" id="vid3" value="<?php echo $row_rs2['id'];?>" /></td>
                      <td align="left"><input name="subcategorias2" type="text" class="form-control" id="subcategorias2" value="<?php echo $row_rs11['subcategoria']; ?>"/></td>
                      <td width="110" align="right"><input name="buttonedit2" type="submit" class="btn_si" id="buttonedit2" value="Modificar" /></td>
                    </tr>
                  </table>
                  <?php } else { ?>
                  <div class="listado">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="250" align="left"><?php 
					   $idca = $row_rs11['categoria'];
					   mysql_select_db($database_cone, $cone);
					   $query_rs3 = "SELECT * FROM volvo_categorias WHERE id = '$idca'";
					   $rs3 = mysql_query($query_rs3, $cone) or die(mysql_error());
					   $row_rs3 = mysql_fetch_assoc($rs3);
					   echo $row_rs3['categoria'];
					   ?></td>
                      <td align="left"><p><?php echo $row_rs11['subcategoria']; ?></p></td>
                      <td width="70" align="left"><a class="tooltips" href="categorias.php?subedit=<?php echo $row_rs11['id']; ?>#subca"><img src="img/icono_editar.gif" alt="MODIFICAR" width="60" height="30" border="0" /><span>Modificar</span></a></td>
                      <td width="60" align="right"><div class="listing" style="display:none" id="open_ajax_dialog_codediv1">
                          <div id="ajax_dialog_sub_<?php echo $row_rs11['id']; ?>">Dialog.alert({url: "categorias-sub_eliminar.php?vid=<?php echo $row_rs11['id']; ?>", options: {method: 'get'}},  
                          {className: "alphacube", width:440, height:280, zIndex:999, okLabel: "Close"});</div>
                        <script type="text/javascript"> Application.addEditButton('open_ajax_dialog')</script>
                        </div>
                          <a href="javascript:void();" class="tooltips" onclick="Application.evalCode('ajax_dialog_sub_<?php echo $row_rs11['id']; ?>', true)"><img src="img/icono_eliminar.gif" alt="ELIMINAR" width="60" height="30" border="0" /><span>Eliminar</span></a></td>
                    </tr>
                  </table>
                  </div>
                  <?php } ?>
                <?php } while($row_rs11 = mysql_fetch_assoc($rs11))?>
                <?php }?>
                <br /></td>
            </tr>
          </table>
        </form>
        <br />
        <br /></td>
      </tr>
    </table>
  </div>
</div>
</body>
</html>
