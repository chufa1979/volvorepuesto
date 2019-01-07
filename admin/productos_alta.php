<?php include ("seguridad.php"); 
require_once('../Connections/cone.php'); 

function redimensionar($img, $img_nueva,$max_width=1000,$max_height=1000,$calidad=100,$clase) {
		// Resize de la imagen
		// Calcula el resize
		$sz = getimagesize($img);
		$x = $sz[0];
		$y = $sz[1];
		
		if ($x > $y){
		$dx = 0;
		$w = $max_width;
		$h = ceil(($y / $x) * $max_width);
		$dy = ceil(($max_width - $h) / 2);
		}
		else
		{
		$dy = 0;
		$h = $max_height;
		$w = ceil(($x / $y) * $max_height);
		$dx = ceil(($max_height - $w) / 2);
		}
		
		//Crear una imagen nueva desde el archivo original
		if ($clase==1){
			$bigimage = imagecreatefromgif($img);
		}	
		if ($clase==2){
			$bigimage = imagecreatefromjpeg($img);
		}
		if ($clase==3){
			$bigimage = imagecreatefrompng($img);
		}			
		//Crea una nueva imagen en blanco
		$thumb = imagecreate(1000, 1000);
		// Reserva un color para una imagen | Blanco
		$white = imagecolorallocate($thumb, 255,255,255);
		// Crea una imagen nueva en color real
		$thumb = imagecreatetruecolor($w, $h);
		//Copia y redimensiona imagen
		@imagecopyresized($thumb, $bigimage, 0, 0, 0, 0, $w, $h,$x, $y);
		
		///Generamos la imagen de abajo
			$im_base=imagecreatetruecolor(1000,1000);
			$fondo=imagecolorAllocate($im_base,255,255,255);
			imagefill($im_base,0,0,$fondo);
		$x = intval(imagesx($im_base)-imagesx($thumb))/2;
		$y = intval(imagesy($im_base)-imagesy($thumb))/2;
		imagecopy($im_base,$thumb,$x,$y,0,0, $w, $h);
		//Salida de imagen nueva a archivo
		imagejpeg($im_base,$img_nueva,$calidad);
		// Limpia las vairables de imagenes
		imagedestroy($thumb);
		imagedestroy($bigimage);
		imagedestroy($im_base);
		return $img_nueva;
	} 	
	
	
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

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
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["buttonp"])) || (isset($_POST["buttonp_x"]))){

	/***/
	if ($_FILES['fc01']['name']<>"") {
 	/** CREACION DE CARPETAS **/
		$path = "../upload/productos/";
		$szd = getimagesize($_FILES['fc01']['tmp_name']);
		$tipo = $szd[2];
		if ($tipo==3) { 
			$imh = rand().'.png';
			$imagen01 = $path.$imh;				
			$banderook = 1 ;
			$foto0 = redimensionar($_FILES['fc01']['tmp_name'], $imagen01,$max_width=1000,$max_height=1000,$calidad=100,$clase=3);
		} 	
		if ($tipo==2) { 
			$imh = rand().'.jpg';
			$imagen01 = $path.$imh;				
			$banderook = 1 ;
			$foto0 = redimensionar($_FILES['fc01']['tmp_name'], $imagen01,$max_width=1000,$max_height=1000,$calidad=100,$clase=2);
		} 	
		if ($tipo==1) { 	
			$imh = rand().'.gif';
			$imagen01 = $path.$imh;				
			$banderook = 1 ;	
			$foto0 = redimensionar($_FILES['fc01']['tmp_name'], $imagen01,$max_width=1000,$max_height=1000,$calidad=100,$clase=1);
		} 
	}
	/***/
	if ($_FILES['fc02']['name']<>"") {
 	/** CREACION DE CARPETAS **/
		$path = "../upload/productos/";
		$szd = getimagesize($_FILES['fc02']['tmp_name']);
		$tipo = $szd[2];
		if ($tipo==3) { 
			$imh = rand().'.png';
			$imagen02 = $path.$imh;				
			$banderook = 1 ;
			$foto0 = redimensionar($_FILES['fc02']['tmp_name'], $imagen02,$max_width=1000,$max_height=1000,$calidad=100,$clase=3);
		} 	
		if ($tipo==2) { 
			$imh = rand().'.jpg';
			$imagen02 = $path.$imh;				
			$banderook = 1 ;
			$foto0 = redimensionar($_FILES['fc02']['tmp_name'], $imagen02,$max_width=1000,$max_height=1000,$calidad=100,$clase=2);
		} 	
		if ($tipo==1) { 	
			$imh = rand().'.gif';
			$imagen02 = $path.$imh;				
			$banderook = 1 ;	
			$foto0 = redimensionar($_FILES['fc02']['tmp_name'], $imagen02,$max_width=1000,$max_height=1000,$calidad=100,$clase=1);
		} 
	}
	/***/
	if ($_FILES['fc03']['name']<>"") {
 	/** CREACION DE CARPETAS **/
		$path = "../upload/productos/";
		$szd = getimagesize($_FILES['fc03']['tmp_name']);
		$tipo = $szd[2];
		if ($tipo==3) { 
			$imh = rand().'.png';
			$imagen03 = $path.$imh;				
			$banderook = 1 ;
			$foto0 = redimensionar($_FILES['fc03']['tmp_name'], $imagen03,$max_width=1000,$max_height=1000,$calidad=100,$clase=3);
		} 	
		if ($tipo==2) { 
			$imh = rand().'.jpg';
			$imagen03 = $path.$imh;				
			$banderook = 1 ;
			$foto0 = redimensionar($_FILES['fc03']['tmp_name'], $imagen03,$max_width=1000,$max_height=1000,$calidad=100,$clase=2);
		} 	
		if ($tipo==1) { 	
			$imh = rand().'.gif';
			$imagen03 = $path.$imh;				
			$banderook = 1 ;	
			$foto0 = redimensionar($_FILES['fc03']['tmp_name'], $imagen03,$max_width=1000,$max_height=1000,$calidad=100,$clase=1);
		} 
	}
	/***/	
	
$item = $_POST['item'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$precio_dolar = $_POST['precio_dolar'];
$precio_oferta = $_POST['precio_oferta'];
$precio_oferta_dolar = $_POST['precio_oferta_dolar'];
$linea = $_POST['linea'];
$categoria = $_POST['categoria'];
$subcategoria = $_POST['subcategoria'];
$descripcion = $_POST['descripcion'];
$stock = $_POST['stock'];
$home1 = $_POST['home1'];
$home2 = $_POST['home2'];
$oferta = $_POST['oferta'];
$relacionado1 = $_POST['relacionado1'];
$relacionado2 = $_POST['relacionado2'];
$relacionado3 = $_POST['relacionado3'];

	$cervezas = $_POST['modelostag']; 
   	for ($i=0;$i<count($cervezas);$i++) 
	{ 
		$tagef .= $cervezas[$i].', ';  
     } 

  $insertSQL = "INSERT INTO volvo_productos (item,nombre,precio,precio_dolar,precio_oferta,precio_oferta_dolar,descripcion,stock,imagen01,imagen02,imagen03,home1,home2,oferta,relacionado1,relacionado2,relacionado3,linea,categoria,subcategoria,modelos) VALUES ('$item','$nombre','$precio','$precio_dolar','$precio_oferta','$precio_oferta_dolar','$descripcion','$stock','$imagen01','$imagen02','$imagen03','$home1','$home2','$oferta','$relacionado1','$relacionado2','$relacionado3','$linea','$categoria','$subcategoria','$tagef')";

 mysql_select_db($database_cone, $cone);
 $Result1 = mysql_query($insertSQL, $cone) or die(mysql_error());

  header("Location:productos_publicados.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>VOLVO REPUESTOS | Panel de Administraci&oacute;n Web</title>
<link href="js/style_admin.css" rel="stylesheet" type="text/css" />
<link href="js/menu/menu.css" rel="stylesheet" type="text/css" />
<link href="js/jquery-ui.css" rel="stylesheet" type="text/css" />
<link href="js/chosen.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script type="text/javascript" src="js/chosen.jquery.js"></script>
    <script type="text/javascript" src="js/menu/script.js"></script>

    <!-- editor -->  
    <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
	function pasa() {
	  document.form1.submitButton.click()
	}
	
    tinymce.init({
        selector: "textarea",
        plugins: [
            "advlist autolink lists charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "table contextmenu paste"
        ],
        toolbar: "undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent"
    });
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
  <div class="ruta">productos&nbsp;&nbsp;&nbsp;&raquo;&nbsp;&nbsp;&nbsp;Crear nuevo</div>
</div>
<div class="main">
  <div id="contenido">
    <form action="" method="POST" enctype="multipart/form-data" name="form1" id="form1">
      <table border="0" cellpadding="0" cellspacing="0" class="recuadro">
        <tr>
          <td align="left" valign="top" class="content">
          <label for="item">&Iacute;tem n&uacute;mero</label>
          <input name="item" type="text" class="form-control" id="item" value="<?php echo $_POST['item']; ?>" maxlength="255" />
          <label for="nombre">Nombre</label>
          <input name="nombre" type="text" required class="form-control" id="nombre" value="<?php echo $_POST['nombre']; ?>" />
          <label for="precio11">Precio</label>
          $
          <input name="precio" type="text" class="form-control" id="precio11" placeholder="0.00" value="<?php echo $_POST['precio']; ?>" />
          <label for="precio_dolar">Precio USD</label>
          <input name="precio_dolar" type="text"  class="form-control" id="precio_dolar" placeholder="0.00" value="<?php echo $_POST['precio_dolar']; ?>" />
          <label for="precio_dolar">Precio Actual $</label>
          <input name="precio_oferta" type="text"  class="form-control" id="precio_oferta" placeholder="0.00" value="<?php echo $_POST['precio_oferta']; ?>" />
          <label for="precio_dolar">Precio Actual USD</label>
          <input name="precio_oferta_dolar" type="text"  class="form-control" id="precio_oferta_dolar" placeholder="0.00" value="<?php echo $_POST['precio_oferta_dolar']; ?>" />
          <label for="linea">Destacar</label>
(Tri&aacute;ngulo)          
<table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="20"><input name="destacado" type="radio" id="radio" value="0" checked="checked" />
            </td>
              <td width="80">No</td>
              <td width="20"><input type="radio" name="destacado" id="radio2" value="1" /></td>
              <td width="100">Rebajado</td>
              <td width="20"><input type="radio" name="destacado" id="radio3" value="2" /></td>
              <td width="100">Oferta</td>
              <td width="20"><input type="radio" name="destacado" id="radio4" value="3" /></td>
              <td>Promoci&oacute;n</td>
            </tr>
          </table>
          <label for="linea">L&iacute;nea</label>
          <select name="linea" class="form-desplegable" id="linea">
          <?php
			mysql_select_db($database_cone, $cone);
			$query_rs_cate01 = "SELECT * FROM volvo_linea ORDER BY id ASC";
			$rs_cate01 = mysql_query($query_rs_cate01, $cone) or die(mysql_error());
			$row_rs_cate01 = mysql_fetch_assoc($rs_cate01);
			$totalRows_rs_cate01 = mysql_num_rows($rs_cate01);			  
		  ?>         
          <option>Seleccionar</option> 
          <?php do { ?>
          <option value="<?php echo $row_rs_cate01['id'];?>" <?php 
		  if ($row_rs_cate01['id']==$_POST['linea']) {
			  echo 'selected="selected"';
		  }
		  ?>><?php echo $row_rs_cate01['linea'];?></option>
          <?php } while ($row_rs_cate01 = mysql_fetch_assoc($rs_cate01))?>
          
          </select>
          <label for="categoria">Categor&iacute;a</label>
          <select name="categoria" class="form-desplegable" id="categoria" onChange="pasa();">
          <option>Seleccionar</option>
          <?php
			mysql_select_db($database_cone, $cone);
			$query_rs_cate = "SELECT * FROM volvo_categorias ORDER BY categoria ASC";
			$rs_cate = mysql_query($query_rs_cate, $cone) or die(mysql_error());
			$row_rs_cate = mysql_fetch_assoc($rs_cate);
			$totalRows_rs_cate = mysql_num_rows($rs_cate);			  
		  ?>
          <?php do { ?>
          <option value="<?php echo $row_rs_cate['id'];?>"  <?php 
		  if ($row_rs_cate['id']==$_POST['categoria']) {
			  echo 'selected="selected"';
		  }
		  ?>
          ><?php echo $row_rs_cate['categoria'];?></option>
          <?php } while ($row_rs_cate = mysql_fetch_assoc($rs_cate))?>
          </select>
          <label for="subcategoria">Subcategor&iacute;a</label>
          <select name="subcategoria" class="form-desplegable" id="subcategoria">
          <option>Seleccionar</option>
          <?php
		  $cate = $_POST['categoria'];
			mysql_select_db($database_cone, $cone);
			$query_rs_cate = "SELECT * FROM volvo_subcategoria WHERE categoria= '$cate' ORDER BY subcategoria ASC";
			$rs_cate = mysql_query($query_rs_cate, $cone) or die(mysql_error());
			$row_rs_cate = mysql_fetch_assoc($rs_cate);
			$totalRows_rs_cate = mysql_num_rows($rs_cate);			  
		  ?>
          <?php do { ?>
          <option value="<?php echo $row_rs_cate['id'];?>" <?php 
		  if ($row_rs_cate['id']==$_POST['subcategoria']) {
			  echo 'selected="selected"';
		  }
		  ?>><?php echo $row_rs_cate['subcategoria'];?></option>
          <?php } while ($row_rs_cate = mysql_fetch_assoc($rs_cate))?>
          
			</select>
           <label for="modelos">Modelos</label>
          <select name="modelostag[]" multiple class="chosen-select form-control" id="modelostag[]" tabindex="4" data-placeholder="Modelo">
            <option value=""></option>
          <?php
			mysql_select_db($database_cone, $cone);
			$query_rs_cate01 = "SELECT * FROM volvo_modelo ORDER BY modelo ASC";
			$rs_cate01 = mysql_query($query_rs_cate01, $cone) or die(mysql_error());
			$row_rs_cate01 = mysql_fetch_assoc($rs_cate01);
			$totalRows_rs_cate01 = mysql_num_rows($rs_cate01);			  
		  ?>              
          <?php do { ?>
          <option value="<?php echo $row_rs_cate01['modelo'];?>"><?php echo $row_rs_cate01['modelo'];?></option>
          <?php } while ($row_rs_cate01 = mysql_fetch_assoc($rs_cate01))?>
          </select>
          <label for="descripcion">Descripci&oacute;n</label>
          <textarea name="descripcion" cols="40" rows="5" class="form-txtarea" id="descripcion"><?php echo $_POST['descripcion']; ?></textarea>
          <br />
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="30" align="left"><strong>Stock</strong></td>
              <td width="80" height="30" align="left"><input name="stock" type="text" class="form-control" id="stock" value="<?php echo $_POST['stock']; ?>" /></td>
              <td align="left">&nbsp;</td>
            </tr>
            <tr>
              <td height="30" colspan="3" align="left"><strong>Destacar en rotadores del Home</strong></td>
              </tr>
            <tr>
              <td height="30" align="left"><strong>Piezas para Camiones</strong></td>
              <td height="30" colspan="2" align="left"><input <?php if (!(strcmp($_POST['home'],1))) {echo "checked=\"checked\"";} ?> name="home1" type="checkbox" id="home1" value="1" /></td>
            </tr>
            <tr>
              <td width="200" height="30" align="left"><strong>Piezas para Buses</strong></td>
              <td height="30" colspan="2" align="left"><input <?php if (!(strcmp($_POST['home'],1))) {echo "checked=\"checked\"";} ?> name="home2" type="checkbox" id="home2" value="1" /></td>
              </tr>
            <tr>
              <td height="30" align="left"><strong>Promociones</strong></td>
              <td height="30" colspan="2" align="left"><input <?php if (!(strcmp($_POST['oferta'],1))) {echo "checked=\"checked\"";} ?> name="oferta" type="checkbox" id="oferta" value="1" />
                <input type="hidden" name="MM_insert" value="form1" /></td>
            </tr>
          </table></td>
        </tr>
      </table>
      <br />
      <table border="0" cellpadding="0" cellspacing="0" class="recuadro">
        <tr>
          <td align="left" valign="top" class="content"><strong>Im&aacute;genes</strong> <span class="txt_italic">(Medida: 1000 x 1000 px / Formato JPG)</span><br />
            <br />
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="150" align="left" class="separador">Imagen 1 (Principal)</td>
                <td align="left" class="separador"><input type="file" name="fc01" id="fc01" /></td>
              </tr>
              <tr>
                <td align="left" class="separador">Imagen 2</td>
                <td align="left" class="separador"><input type="file" name="fc02" id="fc02" /></td>
              </tr>
              <tr>
                <td align="left" class="separador">Imagen 3</td>
                <td align="left" class="separador"><input type="file" name="fc03" id="fc03" /></td>
              </tr>
          </table></td>
        </tr>
      </table>
      <table border="0" cellpadding="0" cellspacing="0" class="recuadro">
        <tr>
          <td align="left" valign="top" class="content"><strong>Productos relacionados</strong><span class="txt_italic"></span><br />
            <br />
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" class="separador">
                <select name="relacionado1" class="form-desplegable" id="relacionado1">
                <option value="0">Selecciona un Producto</option>
          <?php
			mysql_select_db($database_cone, $cone);
			$query_rs_cate = "SELECT * FROM volvo_productos ORDER BY nombre ASC";
			$rs_cate = mysql_query($query_rs_cate, $cone) or die(mysql_error());
			$row_rs_cate = mysql_fetch_assoc($rs_cate);
			$totalRows_rs_cate = mysql_num_rows($rs_cate);			  
		  ?>
          <?php do { ?>
          <option value="<?php echo $row_rs_cate['id'];?>" ><?php echo $row_rs_cate['nombre'];?></option>
          <?php } while ($row_rs_cate = mysql_fetch_assoc($rs_cate))?>
          </select>
          </td>
              </tr>
              <tr>
                <td align="left" class="separador"><select name="relacionado2" class="form-desplegable" id="relacionado2">
                <option value="0">Selecciona un Producto</option>
                  <?php
			mysql_select_db($database_cone, $cone);
			$query_rs_cate = "SELECT * FROM volvo_productos ORDER BY nombre ASC";
			$rs_cate = mysql_query($query_rs_cate, $cone) or die(mysql_error());
			$row_rs_cate = mysql_fetch_assoc($rs_cate);
			$totalRows_rs_cate = mysql_num_rows($rs_cate);			  
		  ?>
                  <?php do { ?>
                  <option value="<?php echo $row_rs_cate['id'];?>" ><?php echo $row_rs_cate['nombre'];?></option>
                  <?php } while ($row_rs_cate = mysql_fetch_assoc($rs_cate))?>
                </select></td>
              </tr>
              <tr>
                <td align="left" class="separador"><select name="relacionado3" class="form-desplegable" id="relacionado3">
                <option value="0">Selecciona un Producto</option>
                  <?php
			mysql_select_db($database_cone, $cone);
			$query_rs_cate = "SELECT * FROM volvo_productos ORDER BY nombre ASC";
			$rs_cate = mysql_query($query_rs_cate, $cone) or die(mysql_error());
			$row_rs_cate = mysql_fetch_assoc($rs_cate);
			$totalRows_rs_cate = mysql_num_rows($rs_cate);			  
		  ?>
                  <?php do { ?>
                  <option value="<?php echo $row_rs_cate['id'];?>" ><?php echo $row_rs_cate['nombre'];?></option>
                  <?php } while ($row_rs_cate = mysql_fetch_assoc($rs_cate))?>
                </select></td>
              </tr>
            </table></td>
        </tr>
      </table>
      <br />
      <table border="0" cellpadding="0" cellspacing="0" class="recuadro_guardar">
        <tr>
          <td align="center" valign="middle" class="content">
          <input name="buttonp" type="submit" class="btn_publicar" id="buttonp" value="Publicar" />
          <input name="submitButton" type="submit" id="submitButton" value=" " style="width:1px; height:1px"/>
          </td>
        </tr>
      </table>
    </form>
  </div>
</div>
</body>
</html>
