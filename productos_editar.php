<?php 
require_once('../Connections/cone.php'); 
include ("seguridad.php");


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
	

if ((isset($_GET["eliminalinea"])) || (isset($_GET["eliminalinea_x"]))){
	$v = $_GET['vid'];
	
	mysql_select_db($database_cone, $cone);
	$query_rs = "SELECT * FROM volvo_productos WHERE id = '$v'";
	$rs = mysql_query($query_rs, $cone) or die(mysql_error());
	$row_rs = mysql_fetch_assoc($rs);
	$totalRows_rs = mysql_num_rows($rs);
	
	$m2 = $row_rs['imagen01'];
	if ($m2<>'') { unlink($m2);}
	
	$deleteSQL = "UPDATE volvo_productos SET imagen01='' WHERE id='$v'";
	mysql_select_db($database_cone, $cone);
	$Result1 = mysql_query($deleteSQL, $cone) or die(mysql_error());
	
    $insertGoTo = 'productos_editar.php?vid='.$v;
    header("Location:".$insertGoTo);	
}
if ((isset($_GET["eliminalinea02"])) || (isset($_GET["eliminalinea02_x"]))){
	$v = $_GET['vid'];
	
	mysql_select_db($database_cone, $cone);
	$query_rs = "SELECT * FROM volvo_productos WHERE id = '$v'";
	$rs = mysql_query($query_rs, $cone) or die(mysql_error());
	$row_rs = mysql_fetch_assoc($rs);
	$totalRows_rs = mysql_num_rows($rs);
	
	$m2 = $row_rs['imagen02'];
	if ($m2<>'') { unlink($m2);}
	
	$deleteSQL = "UPDATE volvo_productos SET imagen02='' WHERE id='$v'";
	mysql_select_db($database_cone, $cone);
	$Result1 = mysql_query($deleteSQL, $cone) or die(mysql_error());
	
    $insertGoTo = 'productos_editar.php?vid='.$v;
    header("Location:".$insertGoTo);	
}
if ((isset($_GET["eliminalinea03"])) || (isset($_GET["eliminalinea03_x"]))){
	$v = $_GET['vid'];
	
	mysql_select_db($database_cone, $cone);
	$query_rs = "SELECT * FROM volvo_productos WHERE id = '$v'";
	$rs = mysql_query($query_rs, $cone) or die(mysql_error());
	$row_rs = mysql_fetch_assoc($rs);
	$totalRows_rs = mysql_num_rows($rs);
	
	$m2 = $row_rs['imagen03'];
	if ($m2<>'') { unlink($m2);}
	
	$deleteSQL = "UPDATE volvo_productos SET imagen03='' WHERE id='$v'";
	mysql_select_db($database_cone, $cone);
	$Result1 = mysql_query($deleteSQL, $cone) or die(mysql_error());
	
    $insertGoTo = 'productos_editar.php?vid='.$v;
    header("Location:".$insertGoTo);	
}

/********* funciones ****************/
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
/*********************/
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
	} else {
		$imagen01 = $_POST['a1'];
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
	} else {
		$imagen02 = $_POST['a2'];
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
	} else {
		$imagen03 = $_POST['a3'];
	}
	/***/	
$id = $_POST['id'];	
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
$destacado = $_POST['destacado'];

	$cervezas = $_POST['modelostag']; 
   	for ($i=0;$i<count($cervezas);$i++) 
	{ 
		$tagef .= $cervezas[$i].', ';  
     } 
	 
	 		
  $updateSQL = "UPDATE volvo_productos SET item = '$item', nombre = '$nombre', precio='$precio', precio_dolar='$precio_dolar', precio_oferta='$precio_oferta', precio_oferta_dolar='$precio_oferta_dolar', linea='$linea',categoria='$categoria', subcategoria='$subcategoria', descripcion='$descripcion', stock = '$stock',home1='$home1',home2='$home2',oferta='$oferta',relacionado1='$relacionado1',relacionado2='$relacionado2',relacionado3='$relacionado3',imagen01='$imagen01',imagen02='$imagen02',imagen03='$imagen03',modelos='$tagef',destacado='$destacado'  WHERE id='$id'";
  //echo $updateSQL;
	  mysql_select_db($database_cone, $cone);
	  $Result1 = mysql_query($updateSQL, $cone) or die(mysql_error());

	$offset = $_GET['offset'];
	
	/** REDIRECCIONAMIENTO**/
	if ($offset<>'') {
		$insertGoTo = "productos_publicados.php?offset=".$offset;
	} else {
		$insertGoTo = "productos_publicados.php";	
	}
  	header("Location: ".$insertGoTo);
}

$colname_rs = "-1";
if (isset($_GET['vid'])) {
  $colname_rs = $_GET['vid'];
}
mysql_select_db($database_cone, $cone);
$query_rs = sprintf("SELECT * FROM volvo_productos WHERE id = %s", GetSQLValueString($colname_rs, "int"));
$rs = mysql_query($query_rs, $cone) or die(mysql_error());
$row_rs = mysql_fetch_assoc($rs);
$totalRows_rs = mysql_num_rows($rs);

if (!isset($_POST['e'])) { 
	$_POST['item'] = $row_rs['item'];
	$_POST['nombre'] = $row_rs['nombre'];
	$_POST['precio'] = $row_rs['precio'];
	$_POST['precio_dolar'] = $row_rs['precio_dolar'];
	$_POST['precio_oferta'] = $row_rs['precio_oferta'];
	$_POST['precio_oferta_dolar'] = $row_rs['precio_oferta_dolar'];
	$_POST['linea']= $row_rs['linea'];
	$_POST['categoria']= $row_rs['categoria'];
	$_POST['subcategoria']= $row_rs['subcategoria'];
	$_POST['descripcion']=$row_rs['descripcion'];
	$_POST['stock']=$row_rs['stock'];
	$_POST['home1']=$row_rs['home1'];
	$_POST['home2']=$row_rs['home2'];
	$_POST['oferta']=$row_rs['oferta'];
	$_POST['destacado']=$row_rs['destacado'];
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
    tinymce.init({
        selector: "textarea",
        plugins: [
            "advlist autolink lists charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "table contextmenu paste"
        ],
        toolbar: "undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent"
    });

	function pasa() {
	  document.form1.submitButton.click()
	}	
    </script>

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
  <div class="ruta">productos&nbsp;&nbsp;&nbsp;&raquo;&nbsp;&nbsp;&nbsp;MODIFICAR</div>
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
          <label for="precio_dolar">Precio $</label>
         
          <input name="precio" type="text"  class="form-control" id="precio" placeholder="0.00" value="<?php echo $_POST['precio']; ?>" />
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
              <td width="20"><input <?php if ($_POST['destacado']==0) {echo "checked=\"checked\"";} ?> name="destacado" type="radio" id="radio" value="0" />
            </td>
              <td width="80">No</td>
              <td width="20"><input <?php if ($_POST['destacado']==1) {echo "checked=\"checked\"";} ?> type="radio" name="destacado" id="radio2" value="1" /></td>
              <td width="100">Rebajado</td>
              <td width="20"><input <?php if ($_POST['destacado']==2) {echo "checked=\"checked\"";} ?> type="radio" name="destacado" id="radio3" value="2" /></td>
              <td width="100">Oferta</td>
              <td width="20"><input <?php if ($_POST['destacado']==3) {echo "checked=\"checked\"";} ?> type="radio" name="destacado" id="radio4" value="3" /></td>
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
<?php
mysql_select_db($database_cone, $cone);
$query_rs_tags = "SELECT * FROM volvo_modelo ORDER BY modelo ASC";
$rs_tags = mysql_query($query_rs_tags, $cone) or die(mysql_error());
$row_rs_tags = mysql_fetch_assoc($rs_tags);
$totalRows_rs_tags = mysql_num_rows($rs_tags);
?>              
           <label for="modelos">Modelos</label>
          <select name="modelostag[]" multiple class="chosen-select form-control" id="modelostag[]" tabindex="4" data-placeholder="Modelo">
                      <option value="" <?php if (!(strcmp("", $row_rs['tag']))) {echo "selected=\"selected\"";} ?>></option>
          <?php
			mysql_select_db($database_cone, $cone);
			$query_rs_cate01 = "SELECT * FROM volvo_modelo ORDER BY modelo ASC";
			//echo $query_rs_cate01;
			$rs_cate01 = mysql_query($query_rs_cate01, $cone) or die(mysql_error());
			$row_rs_cate01 = mysql_fetch_assoc($rs_cate01);
			$totalRows_rs_cate01 = mysql_num_rows($rs_cate01);			  
		  ?>              
          <?php do { ?>
          <option value="<?php echo $row_rs_cate01['modelo'];?>" <?php 
	$tagbusca = $row_rs_cate01['modelo'];				  
	mysql_select_db($database_cone, $cone);
	$query_rs_tag_control = "SELECT * FROM volvo_productos WHERE id = '$colname_rs' AND modelos LIKE '%$tagbusca%'";
	///echo $query_rs_tag_control;
	$rs_tag_control = mysql_query($query_rs_tag_control, $cone) or die(mysql_error());
	$row_rs_tag_control = mysql_fetch_assoc($rs_tag_control);
	$totalRows_rs_tag_control = mysql_num_rows($rs_tag_control);
	if ($totalRows_rs_tag_control<>0) {echo "selected=\"selected\"";} ?>>
						<?php echo $row_rs_cate01['modelo'];?></option>
          <?php } while ($row_rs_cate01 = mysql_fetch_assoc($rs_cate01))?>
          
          </select>
          <label for="descripcion">Descripci&oacute;n</label>
          <textarea name="descripcion" cols="40" rows="5" class="form-txtarea" id="descripcion"><?php echo $_POST['descripcion']; ?></textarea>
          <br />
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="200" height="30" align="left"><strong>Stock</strong></td>
              <td width="80" height="30" align="left"><input name="stock" type="text" class="form-control" id="stock" value="<?php echo $_POST['stock']; ?>" /></td>
              <td align="left">&nbsp;</td>
            </tr>
            <tr>
              <td height="30" colspan="3" align="left"><strong>Destacar en rotadores del Home</strong></td>
              </tr>
            <tr>
              <td align="left"><strong>Piezas para Camiones</strong></td>
              <td height="30" colspan="2" align="left"><input <?php if ($_POST['home1']==1) {echo "checked=\"checked\"";} ?> name="home1" type="checkbox" id="home1" value="1" /></td>
            </tr>
            <tr>
              <td width="200" align="left"><strong>Piezas para Buses</strong></td>
              <td height="30" colspan="2" align="left"><input <?php if ($_POST['home2']==1) {echo "checked=\"checked\"";} ?> name="home2" type="checkbox" id="home2" value="1" /></td>
              </tr>
            <tr>
              <td height="30" align="left"><strong>Promociones</strong></td>
              <td height="30" colspan="2" align="left"><input name="oferta" type="checkbox" id="oferta" value="1" <?php if (!(strcmp($_POST['oferta'],1))) {echo "checked=\"checked\"";} ?> /></td>
            </tr>
          </table></td>
        </tr>
      </table>
      <br />
      <table border="0" cellpadding="0" cellspacing="0" class="recuadro">
        <tr>
          <td align="left" valign="top" class="content"><strong>Im&aacute;genes</strong> <span class="txt_italic">(Medida: 1000 x 1000 px / Formato JPG)</span><br />
            <br />
            <?php if ($row_rs['imagen01']<>'') { ?>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="320" align="left" class="separador"><img src="<?php echo $row_rs['imagen01']; ?>" width="310" height="310" alt="Imagen" /></td>
                <td align="left" class="separador"><div class="listing" style="display:none" id="open_ajax_dialog_codediv1">
                <div id="ajax_dialog1">Dialog.alert({url: "productos_eliminar_img.php?vid=<?php echo $row_rs['id']; ?>", options: {method: 'get'}},  
                  {className: "alphacube", width:440, height:280, zIndex:999, okLabel: "Close"});</div>
                <script type="text/javascript"> Application.addEditButton('open_ajax_dialog')</script>
                </div>
                <a href="javascript:void();" class="tooltips" onclick="Application.evalCode('ajax_dialog1', true)"><img src="img/icono_eliminar.gif" alt="ELIMINAR" width="60" height="30" border="0" /><span>Eliminar</span></a></td>
              </tr>

          </table>
            <?php } else { ?>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="150" align="left" class="separador">Imagen 1 (Principal)</td>
                <td align="left" class="separador"><input type="file" name="fc01" id="fc01" /></td>
              </tr>

          </table>
          <?php } ?>
            
          <?php if ($row_rs['imagen02']<>'') { ?>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="320" align="left" class="separador"><img src="<?php echo $row_rs['imagen02']; ?>" width="310" height="310" alt="Imagen" /></td>
                <td align="left" class="separador"><div class="listing" style="display:none" id="open_ajax_dialog_codediv1">
                <div id="ajax_dialog2">Dialog.alert({url: "productos_eliminar_img2.php?vid=<?php echo $row_rs['id']; ?>", options: {method: 'get'}},  
                  {className: "alphacube", width:440, height:280, zIndex:999, okLabel: "Close"});</div>
                <script type="text/javascript"> Application.addEditButton('open_ajax_dialog')</script>
                </div>
                <a href="javascript:void();" class="tooltips" onclick="Application.evalCode('ajax_dialog2', true)"><img src="img/icono_eliminar.gif" alt="ELIMINAR" width="60" height="30" border="0" /><span>Eliminar</span></a></td>
              </tr>

          </table>
            <?php } else { ?>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="150" align="left" class="separador">Imagen 2</td>
                <td align="left" class="separador"><input type="file" name="fc02" id="fc02" /></td>
              </tr>

          </table>
          <?php } ?>
          
          <?php if ($row_rs['imagen03']<>'') { ?>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="320" align="left" class="separador"><img src="<?php echo $row_rs['imagen03']; ?>" width="310" height="310" alt="Imagen" /></td>
                <td align="left" class="separador"><div class="listing" style="display:none" id="open_ajax_dialog_codediv1">
                <div id="ajax_dialog3">Dialog.alert({url: "productos_eliminar_img3.php?vid=<?php echo $row_rs['id']; ?>", options: {method: 'get'}},  
                  {className: "alphacube", width:440, height:280, zIndex:999, okLabel: "Close"});</div>
                <script type="text/javascript"> Application.addEditButton('open_ajax_dialog')</script>
                </div>
                <a href="javascript:void();" class="tooltips" onclick="Application.evalCode('ajax_dialog3', true)"><img src="img/icono_eliminar.gif" alt="ELIMINAR" width="60" height="30" border="0" /><span>Eliminar</span></a></td>
              </tr>

          </table>
            <?php } else { ?>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="150" align="left" class="separador">Imagen 3</td>
                <td align="left" class="separador"><input type="file" name="fc03" id="fc03" /></td>
              </tr>

          </table>
          <?php } ?>
          <input name="id" type="hidden" id="id" value="<?php echo $row_rs['id']; ?>" />
          <input name="a1" type="hidden" id="a1" value="<?php echo $row_rs['imagen01']; ?>" />
          <input name="a2" type="hidden" id="a2" value="<?php echo $row_rs['imagen02']; ?>" />
          <input name="a3" type="hidden" id="a3" value="<?php echo $row_rs['imagen03']; ?>" />
          <input name="e" type="hidden" id="e" value="2" />
          
          <input type="hidden" name="MM_update" value="form1" />
          <input name="offset" type="hidden" id="offset" value="<?php echo $_GET['offset']; ?>" /></td>
        </tr>
      </table>
      <table border="0" cellpadding="0" cellspacing="0" class="recuadro">
        <tr>
          <td align="left" valign="top" class="content"><strong>Productos relacionados</strong><span class="txt_italic"></span><br />
            <br />
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" class="separador"><select name="relacionado1" class="form-desplegable" id="relacionado1">
                  <option value="0">Selecciona un Producto</option>
                  <?php
			mysql_select_db($database_cone, $cone);
			$query_rs_cate = "SELECT * FROM volvo_productos ORDER BY nombre ASC";
			$rs_cate = mysql_query($query_rs_cate, $cone) or die(mysql_error());
			$row_rs_cate = mysql_fetch_assoc($rs_cate);
			$totalRows_rs_cate = mysql_num_rows($rs_cate);			  
		  ?>
                  <?php do { ?>
                  <option value="<?php echo $row_rs_cate['id'];?>" <?php if ($row_rs_cate['id']==$row_rs['relacionado1']) {echo "selected=\"selected\"";} ?>><?php echo $row_rs_cate['nombre'];?></option>
                  <?php } while ($row_rs_cate = mysql_fetch_assoc($rs_cate))?>
                </select></td>
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
                  <option value="<?php echo $row_rs_cate['id'];?>" <?php if ($row_rs_cate['id']==$row_rs['relacionado2']) {echo "selected=\"selected\"";} ?>><?php echo $row_rs_cate['nombre'];?></option>
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
                  <option value="<?php echo $row_rs_cate['id'];?>" <?php if ($row_rs_cate['id']==$row_rs['relacionado3']) {echo "selected=\"selected\"";} ?>><?php echo $row_rs_cate['nombre'];?></option>
                  <?php } while ($row_rs_cate = mysql_fetch_assoc($rs_cate))?>
                </select></td>
              </tr>
            </table></td>
        </tr>
      </table>
<br />
      <table border="0" cellpadding="0" cellspacing="0" class="recuadro_guardar">
        <tr>
          <td align="center" valign="middle" class="content"><input name="button2" type="submit" class="btn_borrador" id="button" onclick="MM_goToURL('parent','productos_publicados.php');return document.MM_returnValue" value="Volver" />
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input name="buttonp" type="submit" class="btn_publicar" id="button3" value="Guardar cambios" /></td>
        </tr>
      </table><input name="submitButton" type="submit" id="submitButton" value=" " style="width:1px; height:1px"/>
    </form>
  </div>
</div>
</body>
</html>
