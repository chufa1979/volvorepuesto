<?php require_once('Connections/cone.php');
	
	mysql_select_db($database_cone, $cone);
	$query_rs_b2 = "SELECT * FROM volvo_banner WHERE id = '2'";
	$rs_b2 = mysql_query($query_rs_b2, $cone) or die(mysql_error());
	$row_rs_b2 = mysql_fetch_assoc($rs_b2);
	$totalRows_rs_b2 = mysql_num_rows($rs_b2);	
	
	$busca = $_POST['busca'];
	mysql_select_db($database_cone, $cone);
	$query_rs_p6 = "SELECT * FROM volvo_productos WHERE nombre LIKE '%$busca%' OR descripcion LIKE '%$busca%' AND habilitado = '1'";
	$rs_p6 = mysql_query($query_rs_p6, $cone) or die(mysql_error());
	$row_rs_p6 = mysql_fetch_assoc($rs_p6);
	$totalRows_rs_p6 = mysql_num_rows($rs_p6);	
	
	mysql_select_db($database_cone, $cone);
	$query_rs_catem = "SELECT * FROM volvo_categorias ORDER BY categoria ASC";
	$rs_catem = mysql_query($query_rs_catem, $cone) or die(mysql_error());
	$row_rs_catem = mysql_fetch_assoc($rs_catem);
	$totalRows_rs_catem = mysql_num_rows($rs_catem);
	
	$vid = $_GET['vid'];
	mysql_select_db($database_cone, $cone);
	$query_rs = "SELECT * FROM volvo_productos WHERE id = '$vid' AND habilitado = '1'";
	$rs = mysql_query($query_rs, $cone) or die(mysql_error());
	$row_rs = mysql_fetch_assoc($rs);
	$totalRows_rs = mysql_num_rows($rs);
	if ($totalRows_rs==0) {
		header("Location:index.php");	
	}
	
	$totalstock = $row_rs['stock'];

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
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<meta name="description" content="Para tener el mejor rendimiento de tu Volvo con la máxima eficiencia y seguridad, elegí siempre repuestos originales. Encontrá los mejores precios para mantener tu camión o bus y aprovechá las promociones que tenemos para vos." />
<title>VOLVO REPUESTOS</title>
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" />
<link href="styles.css" rel="stylesheet" type="text/css" />
<link href="styles-media.css" rel="stylesheet" type="text/css" />

<!-- META de Facebook -->
<meta property="og:title" content="<?php echo $row_rs['nombre'];?>" />
<meta property="og:image" content="<?php echo substr ($row_rs['imagen01'], 3, 250); ?>" />
<meta property="og:image" content="<?php echo substr ($row_rs['imagen02'], 3, 250); ?>" />
<meta property="og:image" content="<?php echo substr ($row_rs['imagen03'], 3, 250); ?>" />
<meta property="og:description" content="<?php echo $row_rs['descripcion'];?>" />

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
    </script>

<!-- Resize -->
	<script src='js/resize.js' type="text/javascript"></script>

<!-- Smooth -->
	<script type='text/javascript'>
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
    
<!-- OTROSSSSSS?????? -->
	<script type="text/javascript">
		function MM_preloadImages() { //v3.0
		  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
			var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
			if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
		}
		
		function MM_findObj(n, d) { //v4.01
		  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
			d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
		  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
		  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
		  if(!x && d.getElementById) x=d.getElementById(n); return x;
		}
		
		function MM_swapImage() { //v3.0
		  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
		   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
		}
		
		function enviar_formu(){ 
		   document.formulario1.submit();
		}
						
</script>

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

<!-- Zoom -->
	<script type="text/javascript" src='js/zoom/jquery.zoom.js'></script>
    <script type="text/javascript">
    $(document).ready(function(){
                $('.producto_zoom').zoom();
            });
			
	function cambiai(imageso){
		///alert(imageso);
		$("#img_gde").attr("src",imageso);
		$(".zoomImg").attr("src",imageso);
		$(".zoomImg").css({'min-width':'1000px','min-height':'1000px'});
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

<!-- PRODUCTO -->
<div class="ruta">INICIO &gt; <?php 
if ($row_rs['linea']==1) { echo "camiones l&Iacute;nea F";}
if ($row_rs['linea']==2) { echo "camiones l&Iacute;nea VM";}
if ($row_rs['linea']==3) { echo "Buses";}
?> &gt; <?php
if (isset($row_rs['categoria'])) {
	$vid = $row_rs['categoria'];
	mysql_select_db($database_cone, $cone);
	$query_rs_catem = "SELECT * FROM volvo_categorias WHERE id = '$vid'";
	$rs_catem = mysql_query($query_rs_catem, $cone) or die(mysql_error());
	$row_rs_catem = mysql_fetch_assoc($rs_catem);
	$totalRows_rs_catem = mysql_num_rows($rs_catem);	
	echo $row_rs_catem['categoria'];
} else {
	$subcategoria = $row_rs['subcategoria'];
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
if (isset($row_rs['subcategoria'])) {
	$subcategoria = $row_rs['subcategoria'];
	mysql_select_db($database_cone, $cone);
	$query_rs_catem = "SELECT * FROM volvo_subcategoria WHERE id = '$subcategoria'";
	$rs_catem = mysql_query($query_rs_catem, $cone) or die(mysql_error());
	$row_rs_catem = mysql_fetch_assoc($rs_catem);
	$totalRows_rs_catem = mysql_num_rows($rs_catem);	
	echo '&gt; '.$row_rs_catem['subcategoria'];	
}
?></div>
<div class="popup">
<form id="formulario1" name="formulario1" method="get" action="pedir.php">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="left" valign="top"><div class="fotos">
        <div class="producto_fotogde zoom">
        		<div style="position:relative; z-index:99;">
                <?php if ($totalstock==0) { ?>
                  <div class="sinstock_banda"><img src="img/sin_stock.png" alt="SIN STOCK" width="100" height="100" border="0"/></div>
                <?php } ?>
                
            <?php if ($row_rs_moneda['moneda']==1) { ?>
				<?php if ($row_rs['precio_oferta']<>0) {?>
                    <?php if ($row_rs['destacado']==1) {?>
                    	<div class="oferta_banda"><img src="img/rebajado.png" alt="REBAJADO" width="70" height="70" border="0"/></div>
                    <?php } ?>
                    <?php if ($row_rs['destacado']==2) {?>
                    	<div class="oferta_banda"><img src="img/oferta.png" alt="OFERTA" width="60" height="60" border="0"/></div>
                    <?php } ?>
                    <?php if ($row_rs['destacado']==3) {?>
                    	<div class="oferta_banda"><img src="img/promocion.png" alt="PROMOCION" width="70" height="70" border="0"/></div>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
			<?php if ($row_rs_moneda['moneda']==2) { ?>
				<?php if ($row_rs['precio_oferta_dolar']<>0) {?>
                    <?php if ($row_rs['destacado']==1) {?>
                    	<div class="oferta_banda"><img src="img/rebajado.png" alt="REBAJADO" width="70" height="70" border="0"/></div>
                    <?php } ?>
                    <?php if ($row_rs['destacado']==2) {?>
                    	<div class="oferta_banda"><img src="img/oferta.png" alt="OFERTA" width="60" height="60" border="0"/></div>
                    <?php } ?>
                    <?php if ($row_rs['destacado']==3) {?>
                    	<div class="oferta_banda"><img src="img/promocion.png" alt="PROMOCION" width="70" height="70" border="0"/></div>
                    <?php } ?>
                <?php } ?> 
			<?php } ?>  
            
                </div>
                <div class="producto_zoom"><img src="<?php echo substr ($row_rs['imagen01'], 3, 250); ?>" alt="<?php echo $row_rs['nombre'];?>" title="<?php echo $row_rs['nombre'];?>" name="img_gde" id="img_gde" /></div>
       		  </div>
        
        <div class="producto_fotoch">
        <a href="javascript:void(0)"><img src="<?php echo substr ($row_rs['imagen01'], 3, 250); ?>" alt="Imagen" name="img_ch1" width="310" height="310" id="img_ch1" onclick="cambiai('<?php echo substr ($row_rs['imagen01'], 3, 250); ?>')"  /></a></div>
        
        <div class="producto_fotoch">
        <?php if ($row_rs['imagen02']<>''){ ?>
        <a href="javascript:void(0)"><img src="<?php echo substr ($row_rs['imagen02'], 3, 250); ?>" alt="Imagen" name="img_ch2" width="310" height="310" id="img_ch2" onclick="cambiai('<?php echo substr ($row_rs['imagen02'], 3, 250); ?>')"  /></a><?php } ?></div>
        
        <div class="producto_fotoch">
		<?php if ($row_rs['imagen03']<>''){ ?>
        <a href="javascript:void(0)"><img src="<?php echo substr ($row_rs['imagen03'], 3, 250); ?>" alt="Imagen" name="img_ch3" width="310" height="310" id="img_ch3" onclick="cambiai('<?php echo substr ($row_rs['imagen03'], 3, 250); ?>')"  /></a><?php } ?></div>
      </div>
        <div class="txt">C&oacute;digo: <?php echo $row_rs['item'];?><br />
          <br />
          <span class="titulo_producto"><?php echo $row_rs['nombre'];?></span><br />
          <br />
          
          <div class="producto_precios">
          <?php if ($row_rs_moneda['moneda']==1) { ?>
				<?php if ($row_rs['precio_oferta']<>0) {?>
           	    <p class="tachado">$ <?php echo $row_rs['precio'];?> + Imp.</p>
                <p class="notachado">Precio actual: <span>$ <?php echo $row_rs['precio_oferta'];?></span> + Imp.</p>                
                <?php } else { ?>
               	<span>$ <?php echo $row_rs['precio'];?></span> + Imp.
                <?php } ?>            
            <?php } ?>
			<?php if ($row_rs_moneda['moneda']==2) { ?>
				<?php if ($row_rs['precio_oferta_dolar']<>0) {?>
               	<p class="tachado">$ <?php echo $row_rs['precio_dolar'];?> + Imp.</p>
                <p class="notachado">Precio actual: <span>USD <?php echo $row_rs['precio_oferta_dolar'];?></span> + Imp.</p>
                <?php } else { ?>
               	<span>USD <?php echo $row_rs['precio_dolar'];?></span> + Imp.
                <?php } ?>             
            <?php } ?> 
            </div>
			   
        <br />
        <br />
        <?php if ($row_rs['descripcion']<>'') {?>
        <strong>Descripci&oacute;n</strong><br />
        <?php echo $row_rs['descripcion'];?>
        <?php } ?>
            <strong>Aplicaci&oacute;n:</strong> <?php 
		  $mas = '';
		  $myString1 = trim($row_rs['modelos']);
			$myArray = explode(',', $myString1);
			foreach($myArray as $my_Array){
				if ($my_Array<>'') {
					$mas .=  $my_Array.',';  
				}
				
			}
			echo substr($mas, 0, -1);		  
		  ?>
			<br />
            <br />
            <?php if ($totalstock<>0) { ?>
            <strong>Cantidad</strong>
          <select name="cantidad" class="producto_cant" id="cantidad">
            <?php for($i=1; $i<=$row_rs['stock'];$i++) { ?>
            <option value="<?php echo $i;?>" ><?php echo $i;?></option>
            <?php } ?>
          </select>  
          <input name="id" type="hidden" id="id" value="<?php echo $_GET['vid']; ?>" />
          <input name="items" type="hidden" id="items" />
          <input name="titulo" type="hidden" id="titulo" value="<?php echo $row_rs['nombre'];?>" />
          <input name="a" type="hidden" id="a" value="agregar" />
          <?php } ?>
          <br />
        <br />

		<?php if ($totalstock<>0) { ?>
        <a href="javascript:void();" class="pedir" onclick="enviar_formu();">AGREGAR A MI PEDIDO</a>
        <?php } else { ?>
        <span class="sinstock">SIN STOCK</span>
        
        <?php } ?>
<a href="consulta_producto.php?producto=<?php echo $row_rs['nombre'];?>&item=<?php echo $row_rs['item'];?>" class="consultarprod">CONSULTAR POR ESTE PRODUCTO</a>
<div class="advertencia">El c&oacute;digo de repuesto puede variar seg&uacute;n el n&uacute;mero de chasis de la unidad. Esto puede modificar el precio del repuesto seleccionado. Se deber&aacute; confirmar con el concesionario que el repuesto aplique para el chasis de su unidad previo la compra.<br />
  <br />
  Fotos no contractuales. Precio en d&oacute;lares estadounidenses. Volvo Trucks &amp; Buses Argentina S.A. determinar&aacute; las listas de precios y los plazos en que las mismas estar&aacute;n vigentes, pudiendo en cualquier caso modificarlas sin previo aviso.</div>
<div class="advertencia">
  <table border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="80">COMPARTIR</td>
      <td width="35">
      <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A//volvorepuestos.com.ar/producto.php?vid=<?php echo $_GET['vid'];?>" target="_blank"><img src="img/shared_fb.png" width="30" height="30" alt="Compartir en facebook" longdesc="Compartir en facebook" /></a></td>
      <td width="35"><a href="https://wa.me/?text=https%3A//volvorepuestos.com.ar/producto.php?vid=<?php echo $_GET['vid'];?>" target="_blank"><img src="img/shared_whatsapp.png" width="30" height="30" alt="Compartir en facebook" longdesc="Compartir en facebook" /></a></td>
      <td width="35"><a href="compartir.php?vid=<?php echo $_GET['vid'];?>" class="fancybox fancybox.iframe" id="llo"><img src="img/shared_mail.png" width="30" height="30" alt="Compartir en facebook" longdesc="Compartir en facebook" /></a></td>
    </tr>
  </table>

</div>
        </div>
                </td>
    </tr>
  </table>
  </form>
</div>
<?php 
if (($row_rs['relacionado1']<>0) || ($row_rs['relacionado2']<>0) || ($row_rs['relacionado3']<>0)) { 
?>
<div class="sections_relac">
  <div class="prod_relacionados">Productos relacionados</div>
  <?php
  if ($row_rs['relacionado1']<>0) { 
  $idr = $row_rs['relacionado1'];
	mysql_select_db($database_cone, $cone);
	$query_rs_p_n = "SELECT * FROM volvo_productos WHERE id = '$idr'";
	$rs_p_n = mysql_query($query_rs_p_n, $cone) or die(mysql_error());
	$row_rs_p_n = mysql_fetch_assoc($rs_p_n);
	$totalRows_rs_p_n = mysql_num_rows($rs_p_n);	  
  ?>
  <div class="prod_relacionados_thumb"> 
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top">
            <a href="producto.php?vid=<?php echo $row_rs_p_n['id'];?>">
            <img src="<?php echo substr ($row_rs_p_n['imagen01'], 3, 250); ?>" alt="<?php echo $row_rs_p_n['nombre'];?>" title="<?php echo $row_rs_p_n['nombre'];?>" width="250" height="250" />
            </a>
            </td>
          </tr>
          <tr>
            <td align="left" valign="top" class="producto_titulo"><?php echo $row_rs_p_n['nombre'];?></td>
          </tr>
          <tr>
            <td align="left" valign="top" class="producto_precio">
            <?php if ($row_rs_moneda['moneda']==1) { ?>
				<?php if ($row_rs_p_n['precio_oferta']<>0) {?>
                <p class="tachado">$ <?php echo $row_rs_p_n['precio'];?> + Imp.</p>
                <p class="notachado"><strong>Precio oferta:</strong> $ <?php echo $row_rs_p_n['precio_oferta'];?> + Imp.</p>
                <?php } else { ?>
                	$ <?php echo $row_rs_p_n['precio'];?> + Imp.
                <?php } ?>            
            <?php } ?>
			<?php if ($row_rs_moneda['moneda']==2) { ?>
				<?php if ($row_rs_p_n['precio_oferta_dolar']<>0) {?>
                <p class="tachado">$ <?php echo $row_rs_p_n['precio_dolar'];?> + Imp.</p>
                <p class="notachado"><strong>Precio oferta:</strong> USD <?php echo $row_rs_p_n['precio_oferta_dolar'];?> + Imp.</p>
                <?php } else { ?>
                	USD <?php echo $row_rs_p_n['precio_dolar'];?> + Imp.
                <?php } ?>             
            <?php } ?> 

</td>
          </tr>
        </table>
      </div>
  <?php } ?>
  <?php
  if ($row_rs['relacionado2']<>0) { 
  $idr = $row_rs['relacionado2'];
	mysql_select_db($database_cone, $cone);
	$query_rs_p_n = "SELECT * FROM volvo_productos WHERE id = '$idr'";
	$rs_p_n = mysql_query($query_rs_p_n, $cone) or die(mysql_error());
	$row_rs_p_n = mysql_fetch_assoc($rs_p_n);
	$totalRows_rs_p_n = mysql_num_rows($rs_p_n);	  
  ?>
  <div class="prod_relacionados_thumb">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top">
            <a href="producto.php?vid=<?php echo $row_rs_p_n['id'];?>"><img src="<?php echo substr ($row_rs_p_n['imagen01'], 3, 250); ?>" alt="<?php echo $row_rs_p_n['nombre'];?>" title="<?php echo $row_rs_p_n['nombre'];?>" width="250" height="250" /></a>
            
            </td>
          </tr>
          <tr>
            <td align="left" valign="top" class="producto_titulo"><?php echo $row_rs_p_n['nombre'];?></td>
          </tr>
          <tr>
            <td align="left" valign="top" class="producto_precio">
            <?php if ($row_rs_moneda['moneda']==1) { ?>
				<?php if ($row_rs_p_n['precio_oferta']<>0) {?>
                <p class="tachado">$ <?php echo $row_rs_p_n['precio'];?> + Imp.</p>
                <p class="notachado"><strong>Precio oferta:</strong> $ <?php echo $row_rs_p_n['precio_oferta'];?> + Imp.</p>
                <?php } else { ?>
                	$ <?php echo $row_rs_p_n['precio'];?> + Imp.
                <?php } ?>            
            <?php } ?>
			<?php if ($row_rs_moneda['moneda']==2) { ?>
				<?php if ($row_rs_p_n['precio_oferta_dolar']<>0) {?>
                <p class="tachado">$ <?php echo $row_rs_p_n['precio_dolar'];?> + Imp.</p>
                <p class="notachado"><strong>Precio oferta:</strong> USD <?php echo $row_rs_p_n['precio_oferta_dolar'];?> + Imp.</p>
                <?php } else { ?>
                	USD <?php echo $row_rs_p_n['precio_dolar'];?> + Imp.
                <?php } ?>             
            <?php } ?> 
            </td>
          </tr>
        </table>
      </div>
  <?php } ?>  
  <?php
  if ($row_rs['relacionado3']<>0) { 
  $idr = $row_rs['relacionado3'];
	mysql_select_db($database_cone, $cone);
	$query_rs_p_n = "SELECT * FROM volvo_productos WHERE id = '$idr'";
	$rs_p_n = mysql_query($query_rs_p_n, $cone) or die(mysql_error());
	$row_rs_p_n = mysql_fetch_assoc($rs_p_n);
	$totalRows_rs_p_n = mysql_num_rows($rs_p_n);	  
  ?>
  <div class="prod_relacionados_thumb">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top">
            
                        
            <a href="producto.php?vid=<?php echo $row_rs_p_n['id'];?>"><img src="<?php echo substr ($row_rs_p_n['imagen01'], 3, 250); ?>" alt="<?php echo $row_rs_p_n['nombre'];?>" title="<?php echo $row_rs_p_n['nombre'];?>" width="250" height="250" /></a>
            
            
            </td>
          </tr>
          <tr>
            <td align="left" valign="top" class="producto_titulo"><?php echo $row_rs_p_n['nombre'];?></td>
          </tr>
          <tr>
            <td align="left" valign="top" class="producto_precio">
            <?php if ($row_rs_moneda['moneda']==1) { ?>
				<?php if ($row_rs_p_n['precio_oferta']<>0) {?>
                <p class="tachado">$ <?php echo $row_rs_p_n['precio'];?> + Imp.</p>
                <p class="notachado"><strong>Precio oferta:</strong> $ <?php echo $row_rs_p_n['precio_oferta'];?> + Imp.</p>
                <?php } else { ?>
                	$ <?php echo $row_rs_p_n['precio'];?> + Imp.
                <?php } ?>            
            <?php } ?>
			<?php if ($row_rs_moneda['moneda']==2) { ?>
				<?php if ($row_rs_p_n['precio_oferta_dolar']<>0) {?>
                <p class="tachado">$ <?php echo $row_rs_p_n['precio_dolar'];?> + Imp.</p>
                <p class="notachado"><strong>Precio oferta:</strong> USD <?php echo $row_rs_p_n['precio_oferta_dolar'];?> + Imp.</p>
                <?php } else { ?>
                	USD <?php echo $row_rs_p_n['precio_dolar'];?> + Imp.
                <?php } ?>             
            <?php } ?> 
            </td>
          </tr>
        </table>
      </div>
  <?php } ?>  
</div>
<!-- fin PRODUCTO -->
<?php } ?>

<!-- BANNER DOWN -->
<?php include("included/slider_footer.php"); ?>
<!-- fin BANNER DOWN -->

<!-- FOOTER -->
<?php include("included/footer.php"); ?>
<!-- FOOTER -->

</div>

<div class="scroll-top"><a href="#arriba"><img src="img/top.png" width="30" height="30" alt="Subir" /></a></div>
<script>
	<?php if ( ($row_rs['stock1']<>0) && ($row_rs['stock1']<>0) ) { ?>
		muestra1(1);
	<?php } ?>	
</script>
</body>
</html>
