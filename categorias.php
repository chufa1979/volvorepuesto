<?php 
error_reporting(-1);
require_once('Connections/cone.php');
	
	mysql_select_db($database_cone, $cone);
	$query_rs_b2 = "SELECT * FROM volvo_banner WHERE id = '2'";
	$rs_b2 = mysql_query($query_rs_b2, $cone) or die(mysql_error());
	$row_rs_b2 = mysql_fetch_assoc($rs_b2);
	$totalRows_rs_b2 = mysql_num_rows($rs_b2);	
	
	
	mysql_select_db($database_cone, $cone);
	$query_rs_cate = "SELECT * FROM volvo_categorias ORDER BY categoria ASC";
	$rs_cate = mysql_query($query_rs_cate, $cone) or die(mysql_error());
	$row_rs_cate = mysql_fetch_assoc($rs_cate);
	$totalRows_rs_cate = mysql_num_rows($rs_cate);		
	

	
	mysql_select_db($database_cone, $cone);
	$query_rs_moneda = "SELECT * FROM volvo_moneda WHERE id = 1";
	$rs_moneda = mysql_query($query_rs_moneda, $cone) or die(mysql_error());
	$row_rs_moneda = mysql_fetch_assoc($rs_moneda);
	$totalRows_rs_moneda = mysql_num_rows($rs_moneda);  
	
	/********************/
	if (isset($_GET['familia'])) {
		$familia = $_GET['familia'];
		$busca .= " AND linea = ".$familia; 
	}

	if (isset($_GET['categoria'])) {
		$categoria = $_GET['categoria'];
		$busca .= " AND categoria = ".$categoria; 
	}		
		
	if (isset($_GET['subcategoria'])) {
		$subcategoria = $_GET['subcategoria'];
		$busca .= " AND subcategoria = ".$subcategoria; 
		
	}
	if (isset($_GET['modelo'])) {
		$modelo = $_GET['modelo'];
		$busca .= " AND modelos LIKE '%$modelo%'"; 
		
	}
		
	if (isset($_GET['orden'])) {
		if ($_GET['orden']==1) {
			if ($row_rs_moneda['moneda']==1) {
				$orden = ' ORDER BY precio ASC';
			}
			if ($row_rs_moneda['moneda']==2) {
				$orden = ' ORDER BY precio_dolar ASC';
			}			
		}
		if ($_GET['orden']==2) {
			if ($row_rs_moneda['moneda']==1) {
				$orden = ' ORDER BY precio DESC';
			}
			if ($row_rs_moneda['moneda']==2) {
				$orden = ' ORDER BY precio_dolar DESC';
			}			
		}
		if ($_GET['orden']==3) {
			$orden = ' ORDER BY nombre ASC';
		}	
		if ($_GET['orden']==4) {
			$orden = ' ORDER BY nombre DESC';
		}						
	}
	mysql_select_db($database_cone, $cone);
	$query_rs_pro = "SELECT * FROM volvo_productos WHERE habilitado = '1' $busca $orden";
	//echo $query_rs_pro;
	$rs_pro = mysql_query($query_rs_pro, $cone) or die(mysql_error());
	$row_rs_pro = mysql_fetch_assoc($rs_pro);
	$totalRows_rs_pro = mysql_num_rows($rs_pro);		


   include 'buildNav.php';
   $conn = mysql_connect($hostname_cone,$username_cone,$password_cone);
   mysql_select_db($database_cone);
   $db = new buildNav;
   $db->offset = 'offset';
   $db->number_type = 'number';
   $db->limit = 15;
   $db->pag = $db->limit*$mostrar;
   $totalpag =ceil($totalRows_rs_pro/$db->limit);
   $db->execute($query_rs_pro);
   $totalp=ceil($totalRows_rs_pro/$mostrar);
   
   if (isset($_GET["familia"])) {
	   $pasa .= "familia=".$_GET["familia"];   
   }
   if (isset($_GET["categoria"])) {
	   $pasa .= '&categoria='.$_GET["categoria"];   
   }
   if (isset($_GET["subcategoria"])) {
	   $pasa .= '&subcategoria='.$_GET["subcategoria"];   
   }  
      
   	
	/********************/    									
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<title>VOLVO REPUESTOS</title>
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" />
<meta name="description" content="Para tener el mejor rendimiento de tu Volvo con la máxima eficiencia y seguridad, elegí siempre repuestos originales. Encontrá los mejores precios para mantener tu camión o bus y aprovechá las promociones que tenemos para vos." />
<link href="styles.css" rel="stylesheet" type="text/css" />
<link href="styles-media.css" rel="stylesheet" type="text/css" />

<!-- bxSlider -->
	<script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type='text/javascript' src="js/jquery.bxslider.min.js"></script>
    <link rel="stylesheet" type="text/css" href="js/jquery.bxslider.css" />
    <script type='text/javascript'>
        $(document).ready(function(){
          $('.slider1').bxSlider({
            slideWidth: 210,
            minSlides: 2,
            maxSlides: 4,
            moveSlides: 1,
            slideMargin: 7
          });
        });
	function pasa() {
	  document.formorden.submitButton.click()
	}		
    </script>

<!-- Resize -->
	<script src='js/resize_2.js?v1' type="text/javascript"></script>

<!-- Smooth -->
	<script type='text/javascript'>
	
	function muestra() {
		$("#filtros_list").toggle();
	}


	
      $(function() {
        $('a[href*="#"]:not([href="#"])').click(function() {
          if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
              $('html, body').animate({
                scrollTop: target.offset().top
              }, 1000);
              return false;
            }
          }
        });
      });
        function cierra() {
            $(".sections_busca").hide();
        }
    </script>

<!-- Menu responsive -->
	<script src='js/menu.js' type="text/javascript"></script>
    
<!-- fancyBox -->
	<script type="text/javascript" src="js/source/jquery.fancybox.js?v=2.1.5"></script>
    <link rel="stylesheet" type="text/css" href="js/source/jquery.fancybox.css?v=2.1.5" media="screen" />
    <script type="text/javascript">
$(document).ready(function() {
            $('.fancybox').fancybox();
            
            <?php if (isset($_GET['reclamos'])) { ?>
            $('#llo').trigger('click');
            <?php } ?>
            
        });
	 function MM_showHideLayers() { //v9.0
      var i,p,v,obj,args=MM_showHideLayers.arguments;
      for (i=0; i<(args.length-2); i+=3) 
      with (document) if (getElementById && ((obj=getElementById(args[i]))!=null)) { v=args[i+2];
        if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
        obj.visibility=v; }
    }
    </script>
    
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WGH59LV');</script>
<!-- End Google Tag Manager -->

</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WGH59LV"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<!-- Encabezado -->
<?php include("included/header.php"); ?>
<!-- fin Encabezado -->

<!-- Menu principal -->
<?php include("included/nav.php"); ?>
<!-- fin Menu principal -->

<!-- Menu responsive -->
<?php include("included/nav-responsive.php"); ?>
<!-- Menu responsive -->

<div class="main">

<!-- BUSCADOR -->
<?php include("included/buscador.php"); ?>
<!-- fin BUSCADOR -->

<!-- CONTENIDO -->

<div class="ruta">INICIO &gt; <?php 
if ($_GET['familia']==1) { echo "camiones l&Iacute;nea F";}
if ($_GET['familia']==2) { echo "camiones l&Iacute;nea VM";}
if ($_GET['familia']==3) { echo "Buses";}
?> &gt; <?php
if (isset($_GET['categoria'])) {
	$vid = $_GET['categoria'];
	mysql_select_db($database_cone, $cone);
	$query_rs_catem = "SELECT * FROM volvo_categorias WHERE id = '$vid'";
	$rs_catem = mysql_query($query_rs_catem, $cone) or die(mysql_error());
	$row_rs_catem = mysql_fetch_assoc($rs_catem);
	$totalRows_rs_catem = mysql_num_rows($rs_catem);	
	echo $row_rs_catem['categoria'];
} else {
	$subcategoria = $_GET['subcategoria'];
	mysql_select_db($database_cone, $cone);
	$query_rs_catem = "SELECT * FROM volvo_subcategoria WHERE id = '$subcategoria'";
	$rs_catem = mysql_query($query_rs_catem, $cone) or die(mysql_error());
	$row_rs_catem = mysql_fetch_assoc($rs_catem);
	$totalRows_rs_catem = mysql_num_rows($rs_catem);	
	$vid =  $row_rs_catem['categoria'];	
	
	mysql_select_db($database_cone, $cone);
	$query_rs_catem = "SELECT * FROM volvo_categorias WHERE id = '$vid'";
	$rs_catem = mysql_query($query_rs_catem, $cone) or die(mysql_error());
	$row_rs_catem = mysql_fetch_assoc($rs_catem);
	$totalRows_rs_catem = mysql_num_rows($rs_catem);	
	echo $row_rs_catem['categoria'];	
}
?> <?php
if (isset($_GET['subcategoria'])) {
	$subcategoria = $_GET['subcategoria'];
	mysql_select_db($database_cone, $cone);
	$query_rs_catem = "SELECT * FROM volvo_subcategoria WHERE id = '$subcategoria'";
	$rs_catem = mysql_query($query_rs_catem, $cone) or die(mysql_error());
	$row_rs_catem = mysql_fetch_assoc($rs_catem);
	$totalRows_rs_catem = mysql_num_rows($rs_catem);	
	echo '&gt; '.$row_rs_catem['subcategoria'];	
}
?></div>
<?php if($totalRows_rs_pro<>0) { ?>
<div class="popup">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>
      <div class="filtros_resp" id="filtrar"><a href="#" onclick="muestra()">Filtrar</a></div>
      <div class="filtros" id="filtros_list">
      <span class="categoria"><?php
if (isset($_GET['categoria'])) {
	$vid = $_GET['categoria'];
	mysql_select_db($database_cone, $cone);
	$query_rs_catem = "SELECT * FROM volvo_categorias WHERE id = '$vid'";
	$rs_catem = mysql_query($query_rs_catem, $cone) or die(mysql_error());
	$row_rs_catem = mysql_fetch_assoc($rs_catem);
	$totalRows_rs_catem = mysql_num_rows($rs_catem);	
	echo $row_rs_catem['categoria'];
} else {
	$subcategoria = $_GET['subcategoria'];
	mysql_select_db($database_cone, $cone);
	$query_rs_catem = "SELECT * FROM volvo_subcategoria WHERE id = '$subcategoria'";
	$rs_catem = mysql_query($query_rs_catem, $cone) or die(mysql_error());
	$row_rs_catem = mysql_fetch_assoc($rs_catem);
	$totalRows_rs_catem = mysql_num_rows($rs_catem);	
	$vid =  $row_rs_catem['categoria'];	
	
	mysql_select_db($database_cone, $cone);
	$query_rs_catem = "SELECT * FROM volvo_categorias WHERE id = '$vid'";
	$rs_catem = mysql_query($query_rs_catem, $cone) or die(mysql_error());
	$row_rs_catem = mysql_fetch_assoc($rs_catem);
	$totalRows_rs_catem = mysql_num_rows($rs_catem);	
	echo $row_rs_catem['categoria'];	
}
///echo $query_rs_catem;
?></span>
		<ul>
		<?php
            $idcate = $row_rs_catem['id'];
            mysql_select_db($database_cone, $cone);
            $query_rs_b2 = "SELECT * FROM volvo_subcategoria WHERE categoria = '$idcate' ORDER BY subcategoria ASC";
            $rs_b2 = mysql_query($query_rs_b2, $cone) or die(mysql_error());
            $row_rs_b2 = mysql_fetch_assoc($rs_b2);
            $totalRows_rs_b2 = mysql_num_rows($rs_b2);
			if ($totalRows_rs_b2==0){
				$row_rs_b2['id'] = 0;
			}
			
			///echo $query_rs_b2;
            do {
        ?> 
        <?php 
	$familia = $_GET['familia'];
	$subcategoria = $row_rs_b2['id'];
	mysql_select_db($database_cone, $cone);
	if ($subcategoria=='') {
		$subcategoria=0;
	}
	$query_rs_cuenta = "SELECT * FROM volvo_productos WHERE categoria = '$idcate' AND habilitado = '1' AND linea = '$familia' AND subcategoria = '$subcategoria'";
	//echo $query_rs_cuenta;
	$rs_cuenta = mysql_query($query_rs_cuenta, $cone) or die(mysql_error());
	$row_rs_cuenta = mysql_fetch_assoc($rs_cuenta);
	$totalRows_rs_cuenta = mysql_num_rows($rs_cuenta);	
	if ($totalRows_rs_cuenta<>0) {			
		?>
        
			  <li><a href='categorias.php?subcategoria=<?php echo $subcategoria; ?>&familia=<?php echo $familia;?>'><?php echo ucfirst(strtolower($row_rs_b2['subcategoria']));?> (<?php 	  
			  	echo $totalRows_rs_cuenta;
			  ?>) </a>
              <?php 
		  if ($row_rs_b2['id']==$_GET['subcategoria']) {
			  ?>
	          <ul>
              <?php 
	mysql_select_db($database_cone, $cone);
	$query_rs_cuenta_modelo = "SELECT modelo FROM volvo_modelo ORDER BY modelo ASC";
	$rs_cuenta_modelo = mysql_query($query_rs_cuenta_modelo, $cone) or die(mysql_error());
	$row_rs_cuenta_modelo = mysql_fetch_assoc($rs_cuenta_modelo);
	$totalRows_rs_cuenta_modelo = mysql_num_rows($rs_cuenta_modelo);	
	
	do { 
	$mmodelo = $row_rs_cuenta_modelo['modelo'];		  
///echo $mmodelo;
	mysql_select_db($database_cone, $cone);
	$query_rs_cuenta_modelo_2 = "SELECT * FROM volvo_productos WHERE categoria = '$idcate' AND habilitado = '1' AND modelos LIKE '%$mmodelo%' AND subcategoria = '$subcategoria' AND linea = '$familia'";
	$rs_cuenta_modelo_2 = mysql_query($query_rs_cuenta_modelo_2, $cone) or die(mysql_error());
	$row_rs_cuenta_modelo_2 = mysql_fetch_assoc($rs_cuenta_modelo_2);
	$totalRows_rs_cuenta_modelo_2 = mysql_num_rows($rs_cuenta_modelo_2);	
	//echo $query_rs_cuenta_modelo_2;
	///echo $totalRows_rs_cuenta_modelo_2;
	if ($totalRows_rs_cuenta_modelo_2<>0) {	
			  ?>
                <li><a href='categorias.php?categoria=<?php echo $idcate; ?>&subcategoria=<?php echo $subcategoria; ?>&familia=<?php echo $familia;?>&modelo=<?php echo $mmodelo;?>'><?php echo $mmodelo;?> (<?php echo $totalRows_rs_cuenta_modelo_2;?>)</a></li>
    <?php 
	}
	} while($row_rs_cuenta_modelo = mysql_fetch_assoc($rs_cuenta_modelo));?>
	</ul>
				<?php } ?>
              </li>
     <?php 
	}
		} while($row_rs_b2 = mysql_fetch_assoc($rs_b2));
		?> 
		</ul>
      </div>
      <div class="productos_listado">
<div class="ordenar"><form id="formorden" name="formorden" method="get" action="categorias.php">Ordenar por 
	  
  <select name="orden" class="filtro" id="orden" onChange="pasa();">
    <option value="defecto" selected="selected" <?php if (!(strcmp("defecto", $_GET['orden']))) {echo "selected=\"selected\"";} ?>>Por defecto</option>
    <option value="1" <?php if (!(strcmp(1, $_GET['orden']))) {echo "selected=\"selected\"";} ?>>Menor Precio</option>
    <option value="2" <?php if (!(strcmp(2, $_GET['orden']))) {echo "selected=\"selected\"";} ?>>Mayor Precio</option>
    <option value="3" <?php if (!(strcmp(3, $_GET['orden']))) {echo "selected=\"selected\"";} ?>>A-Z</option>
    <option value="4" <?php if (!(strcmp(4, $_GET['orden']))) {echo "selected=\"selected\"";} ?>>Z-A</option>
    </select>
    <?php if (isset($_GET['familia'])) {	?>
    <input name="familia" type="hidden" id="familia" value="<?php echo $_GET['familia']; ?>" />
    <?php } ?>
    <?php if (isset($_GET['categoria'])) {	?>
    <input name="categoria" type="hidden" id="categoria" value="<?php echo $_GET['categoria']; ?>" />
    <?php } ?>
    <?php if (isset($_GET['subcategoria'])) {	?>
    <input name="subcategoria" type="hidden" id="subcategoria" value="<?php echo $_GET['subcategoria']; ?>" />
    <?php } ?>  
    <input name="submitButton" type="submit" id="submitButton" value=" " style="width:1px; height:1px; visibility:hidden"/>      
</form>
</div>
        
        <?php while($myrow = mysql_fetch_array($db->sql_result))   { ?>
        <div class="productos_grilla">
          <div class="rela">
            <?php if ($row_rs_moneda['moneda']==1) { ?>
            <?php if ($myrow['precio_oferta']<>0) {?>
            		<?php if ($myrow['destacado']==1) {?>
                    	<div class="oferta_banda"><img src="img/rebajado.png" alt="REBAJADO" width="70" height="70" border="0"/></div>
                    <?php } ?>
                    <?php if ($myrow['destacado']==2) {?>
                    	<div class="oferta_banda"><img src="img/oferta.png" alt="OFERTA" width="60" height="60" border="0"/></div>
                    <?php } ?>
                    <?php if ($myrow['destacado']==3) {?>
                    	<div class="oferta_banda"><img src="img/promocion.png" alt="PROMOCION" width="70" height="70" border="0"/></div>
                    <?php } ?>
            <?php } ?>
            <?php } ?>
            <?php if ($row_rs_moneda['moneda']==2) { ?>
            <?php if ($myrow['precio_oferta_dolar']<>0) {?>
           			 <?php if ($myrow['destacado']==1) {?>
                    	<div class="oferta_banda"><img src="img/rebajado.png" alt="REBAJADO" width="70" height="70" border="0"/></div>
                    <?php } ?>
                    <?php if ($myrow['destacado']==2) {?>
                    	<div class="oferta_banda"><img src="img/oferta.png" alt="OFERTA" width="60" height="60" border="0"/></div>
                    <?php } ?>
                    <?php if ($myrow['destacado']==3) {?>
                    	<div class="oferta_banda"><img src="img/promocion.png" alt="PROMOCION" width="70" height="70" border="0"/></div>
                    <?php } ?>
            <?php } ?> 
            <?php } ?>  
            </div>
          <div class="foto">
            <a href="producto.php?vid=<?php echo $myrow['id']; ?>"><img src="<?php echo substr ($myrow['imagen01'], 3, 250); ?>" width="1000" height="1000" alt="<?php echo $myrow['nombre']; ?>" /></a></div>
          <div class="titulo"><?php echo $myrow['nombre']; ?></div>
          <div class="aplicacion"><strong>Aplicaci&oacute;n: </strong><?php 
		  $mas = '';
		  $myString1 = trim($myrow['modelos']);
			$myArray = explode(',', $myString1);
			foreach($myArray as $my_Array){
				if ($my_Array<>'') {
					$mas .=  $my_Array.',';  
				}
				
			}
			echo substr($mas, 0, -1);
		  ?></div>
          
          <div class="precios">
            <?php if ($row_rs_moneda['moneda']==1) { ?>
            <?php if ($myrow['precio_oferta']<>0) {?>
            <span class="tachado">$ <?php echo $myrow['precio'];?> + Imp.</span><br />
Precio actual: <span>$ <?php echo $myrow['precio_oferta'];?></span> + Imp.
            <?php } else { ?>
            <span>$ <?php echo $myrow['precio'];?></span> + Imp.
            <?php } ?>            
            <?php } ?>
            <?php if ($row_rs_moneda['moneda']==2) { ?>
            <?php if ($myrow['precio_oferta_dolar']<>0) {?>
            <span class="tachado">USD <?php echo $myrow['precio_dolar'];?> + Imp.</span><br />
Precio actual: <span>USD <?php echo $myrow['precio_oferta_dolar'];?></span> + Imp.
            <?php } else { ?>
            <span>USD <?php echo $myrow['precio_dolar'];?></span> + Imp.
            <?php } ?>             
            <?php } ?>   
            </div>
          <?php if ($myrow['stock']>0) { ?>  
          <form id="formcompra" name="formcompra" method="get" action="pedir.php">
          <input name="cantidad" type="hidden" id="cantidad" value="1" />
          <input name="id" type="hidden" id="id" value="<?php echo $myrow['id'];?>" />
          <input name="items" type="hidden" id="items" />
          <input name="titulo" type="hidden" id="titulo" value="<?php echo $myrow['nombre'];?>" />
          <input name="a" type="hidden" id="a" value="agregar" />          
          <input name="button" type="submit" class="pedir" id="button" value="Agregar a mi pedido" />
          </form>
          <?php } else { ?>
          
          <?php } ?>
          <a href="consulta_producto.php?producto=<?php echo $myrow['nombre'];?>&item=<?php echo $myrow['item'];?>" class="consultarprod_2">Consultar por este producto</a>
          
          </div>
        <?php } ?>      
      </div>

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
<?php } else { ?>
<div class="popup">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="250" align="center"><strong>No hay productos en esta Categor&iacute;a</strong></td>
    </tr>
  </table>
</div>
<?php } ?>
<!-- fin CONTENIDO -->

<!-- BANNER DOWN -->
<?php include("included/slider_footer.php"); ?>
<!-- fin BANNER DOWN -->

<!-- FOOTER -->
<?php include("included/footer.php"); ?>
<!-- FOOTER -->

</div>

<div class="scroll-top"><a href="#arriba"><img src="img/top.png" width="30" height="30" alt="Subir" /></a></div>

</body>
</html>
