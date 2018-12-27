<?php 
session_start();
require_once('Connections/cone.php');

	
	mysql_select_db($database_cone, $cone);
	$query_rs_b2 = "SELECT * FROM volvo_banner WHERE id = '2'";
	$rs_b2 = mysql_query($query_rs_b2, $cone) or die(mysql_error());
	$row_rs_b2 = mysql_fetch_assoc($rs_b2);
	$totalRows_rs_b2 = mysql_num_rows($rs_b2);	
	
	$vid = $_GET['vid'];
	mysql_select_db($database_cone, $cone);
	$query_rs = "SELECT * FROM volvo_productos WHERE id = '$vid'";
	$rs = mysql_query($query_rs, $cone) or die(mysql_error());
	$row_rs = mysql_fetch_assoc($rs);
	$totalRows_rs = mysql_num_rows($rs);
	
	$busca = $_POST['busca'];
	mysql_select_db($database_cone, $cone);
	$query_rs_p6 = "SELECT * FROM volvo_productos WHERE nombre LIKE '%$busca%' OR descripcion LIKE '%$busca%'";
	$rs_p6 = mysql_query($query_rs_p6, $cone) or die(mysql_error());
	$row_rs_p6 = mysql_fetch_assoc($rs_p6);
	$totalRows_rs_p6 = mysql_num_rows($rs_p6);
	
	mysql_select_db($database_cone, $cone);
	$query_rs_catem = "SELECT * FROM volvo_categorias ORDER BY categoria ASC";
	$rs_catem = mysql_query($query_rs_catem, $cone) or die(mysql_error());
	$row_rs_catem = mysql_fetch_assoc($rs_catem);
	$totalRows_rs_catem = mysql_num_rows($rs_catem);
	
	mysql_select_db($database_cone, $cone);
	$query_rs_moneda = "SELECT * FROM volvo_moneda WHERE id = 1";
	$rs_moneda = mysql_query($query_rs_moneda, $cone) or die(mysql_error());
	$row_rs_moneda = mysql_fetch_assoc($rs_moneda);
	$totalRows_rs_moneda = mysql_num_rows($rs_moneda);    	

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

<!-- Menu responsive -->
	<script src='js/menu.js' type="text/javascript"></script>
    
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
		function MM_goToURL() { //v3.0
		  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
		  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
		}
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
<div class="sections_login">
  <form id="form3" name="form3" method="post" action="">
  <div class="titulo_seccion">MI PEDIDO</div>
  <div class="pedido_content">
    <div class="listado_top">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="50%" align="left">PRODUCTO</td>
          <td width="20%" align="left">CANTIDAD</td>
          <td width="15%" align="right">PRECIO UNITARIO</td>
          <td width="15%" align="right">PRECIO TOTAL</td>
        </tr>
      </table>
    </div>
    <? if (is_array($_SESSION['productos']) && count($_SESSION['productos'])){?>
  <?
$vig = 100;
		while (list($id,$info) = each($_SESSION['productos']))
		{
			while (list($titulo,$cantidad) = each($info))
			{

				mysql_select_db($database_cone, $cone);
				$query_rs_pro_de = "SELECT * FROM volvo_productos WHERE id = $id";
				$rs_pro_de = mysql_query($query_rs_pro_de, $cone) or die(mysql_error());
				$row_rs_pro_de = mysql_fetch_assoc($rs_pro_de);
				$totalRows_rs_pro_de = mysql_num_rows($rs_pro_de);	

            	if ($row_rs_moneda['moneda']==1) {	
					if ($row_rs_pro_de['precio_oferta']<>0) {	
						$total += $row_rs_pro_de['precio_oferta'] * $cantidad;
					} else { 
				   		$total += $row_rs_pro_de['precio'] * $cantidad;
					}             
				}
				if ($row_rs_moneda['moneda']==2) {
					if ($row_rs_pro_de['precio_oferta_dolar']<>0) {
                    	$total += $row_rs_pro_de['precio_oferta_dolar'] * $cantidad;
					} else { 
						$total += $row_rs_pro_de['precio_dolar'] * $cantidad;
					}
				}

				$maxcantidad = $maxcantidad + $cantidad;
				
				$tama = $_SESSION['tamano'][$id][$titulo];
				
				$stock = $row_rs_pro_de['stock'];										

				?>	    
    <div class="listado_productos">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="10%" align="left"><img src="<?php echo substr ($row_rs_pro_de['imagen01'], 3, 250); ?>" width="310" height="310" alt="Imagen" /></td>
          <td align="left">Item: <?php echo $row_rs_pro_de['item']; ?><br />
            <strong><?php echo $row_rs_pro_de['nombre']; ?></strong><br />
            <?php if ($talle<>'') { ?>Talle/Tama&ntilde;o: <?php echo $talle; ?><?php } ?></td>
          <td width="20%" align="left"><div class="pedido_div_cant1">
            <input name="cantidad" type="text" class="pedido_cant" id="cantidad" value="<?=$cantidad?>" readonly />
          </div>
            <div class="pedido_div_cant2"><a href="<?php if ($cantidad<$stock) {?>pedir.php?cantidad=<?=$cantidad+1?>&a=agregar&titulo=<?php echo $row_rs_pro_de['nombre']; ?>&id=<?php echo $row_rs_pro_de['id']; ?><?php } else { ?>javascript:alert('No hay stock para sumar productos')<?php } ?>"><img src="img/icon_mas.png" width="25" height="25" alt="Mas" /></a></div>
            <div class="pedido_div_cant2"><a href="pedir.php?cantidad=<?=$cantidad-1?>&amp;a=agregar&amp;titulo=<?php echo $row_rs_pro_de['nombre']; ?>&amp;id=<?php echo $row_rs_pro_de['id']; ?>"><img src="img/icon_menos.png" width="25" height="25" alt="Menos" /></a></div>
            <div class="pedido_div_cant2"><a href="pedir.php?a=eliminar&titulo=<?php echo $row_rs_pro_de['nombre']; ?>&id=<?php echo $row_rs_pro_de['id']; ?>"><img src="img/icon_trash.png" width="25" height="25" alt="Eliminar" /></a></div></td>
          <td width="15%" align="right">

            <?php if ($row_rs_moneda['moneda']==1) { ?>
				<?php if ($row_rs_pro_de['precio_oferta']<>0) {?>
                    $ <?php echo $nombre_format_francais = number_format($row_rs_pro_de["precio_oferta"], 2, ',', '');?> 
                <?php } else { ?>
                	$ <?php echo $nombre_format_francais = number_format($row_rs_pro_de["precio"], 2, ',', '');?>
                <?php } ?>            
            <?php } ?>
			<?php if ($row_rs_moneda['moneda']==2) { ?>
				<?php if ($row_rs_pro_de['precio_oferta_dolar']<>0) {?>
                    USD <?php echo $nombre_format_francais = number_format($row_rs_pro_de["precio_oferta_dolar"], 2, ',', '');?>
                <?php } else { ?>
                	USD <?php echo $nombre_format_francais = number_format($row_rs_pro_de["precio_dolar"], 2, ',', '');?>
                <?php } ?>             
            <?php } ?> 
            

</td>
          <td width="15%" align="right">
            <?php if ($row_rs_moneda['moneda']==1) { ?>
				<?php if ($row_rs_pro_de['precio_oferta']<>0) {?>
                    $ <?php echo $nombre_format_francais = number_format(($row_rs_pro_de["precio_oferta"]*$cantidad), 2, ',', '');?>
                <?php } else { ?>
                	$ <?php echo $nombre_format_francais = number_format(($row_rs_pro_de["precio"]*$cantidad), 2, ',', '');?>
                <?php } ?>            
            <?php } ?>
			<?php if ($row_rs_moneda['moneda']==2) { ?>
				<?php if ($row_rs_pro_de['precio_oferta_dolar']<>0) {?>
                    USD <?php echo $nombre_format_francais = number_format(($row_rs_pro_de["precio_oferta_dolar"]*$cantidad), 2, ',', '');?>
                <?php } else { ?>
                	USD <?php echo $nombre_format_francais = number_format(($row_rs_pro_de["precio_dolar"]*$cantidad), 2, ',', '');?>
                <?php } ?>             
            <?php } ?> 
</td>
          <td width="40" align="right">+ Imp.</td>
        </tr>
      </table>
    </div>
<?php  $vig++;?>
<? }} ?>    
    <div class="listado_subtotal">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left">&nbsp;</td>
          <td width="150" align="left">&nbsp;</td>
          <td width="120" align="right">Sub-total</td>
          <td width="120" align="right">
            <?php if ($row_rs_moneda['moneda']==1) { ?>
            $ <?php echo $nombre_format_francais = number_format($total, 2, ',', ''); ?>
            <?php } ?>
			<?php if ($row_rs_moneda['moneda']==2) { ?>
            USD <?php echo $nombre_format_francais = number_format($total, 2, ',', ''); ?>
            <?php } ?>   
 </td>
          <td width="40" align="right">+ Imp.</td>
        </tr>
      </table>
    </div>
    <div class="listado_total">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left"><a href="pedir.php?a=eliminatodo"><img src="img/cart_vaciar.png" width="165" height="34" alt="Vaciar Carrito" /></a></td>
          <td width="120" align="right">TOTAL</td>
          <td width="120" align="right">
            <?php if ($row_rs_moneda['moneda']==1) { ?>
            $ <?php echo $nombre_format_francais = number_format($total, 2, ',', ''); ?>
            <?php } ?>
			<?php if ($row_rs_moneda['moneda']==2) { ?>
            USD <?php echo $nombre_format_francais = number_format($total, 2, ',', ''); ?>
            <?php } ?>   
 </td>
          <td width="45" align="right">+ Imp.</td>
        </tr>
      </table>
    </div>
    <div class="listado_total">
      <div class="pedido_botones1">
        <input name="button2" type="button" class="bot_seguir" id="button2" onclick="MM_goToURL('parent','index.php');return document.MM_returnValue" value="SEGUIR ELIGIENDO" />
      </div>
      <div class="pedido_botones2">
      <? if($_SESSION['usuarioweb']){ ?>
      <input name="button" type="button" class="enviar" id="button" value="HACER EL PEDIDO" onclick="MM_goToURL('parent','pedido_confirmar.php');return document.MM_returnValue" />
      <? } else { ?>
      <input name="button" type="button" class="enviar" id="button" value="HACER EL PEDIDO" onclick="MM_goToURL('parent','login.php?f=1');return document.MM_returnValue"/>
      <?php } ?>
        
    </div>
    </div>
    <?php } else { ?><br />

    <strong>Su carrito est&aacute; vac&iacute;o</strong><br />

<?php } ?>
  </div>
  </form>
</div>
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
