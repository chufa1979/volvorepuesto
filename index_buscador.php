<?php require_once('Connections/cone.php');


if ((isset($_POST["botonnov"])) || (isset($_POST["botonnov_x"]))){
	$nombre = $_POST['nombre'];
	$email = $_POST['email'];
	$acepta = $_POST['acepta'];
	$fecha = date("Y-m-d");

  $insertSQL = "INSERT INTO volvo_suscriptores (nombre,email,gdpr,fecha) VALUES ('$nombre','$email','$acepta','$fecha')";

 mysql_select_db($database_cone, $cone);
 $Result1 = mysql_query($insertSQL, $cone) or die(mysql_error());

  header("Location:index.php?b=1#nove");

}
	mysql_select_db($database_cone, $cone);
	$query_rs_b1 = "SELECT * FROM volvo_banner WHERE id = '1'";
	$rs_b1 = mysql_query($query_rs_b1, $cone) or die(mysql_error());
	$row_rs_b1 = mysql_fetch_assoc($rs_b1);
	$totalRows_rs_b1 = mysql_num_rows($rs_b1);
	
	mysql_select_db($database_cone, $cone);
	$query_rs_b2 = "SELECT * FROM volvo_banner WHERE id = '2'";
	$rs_b2 = mysql_query($query_rs_b2, $cone) or die(mysql_error());
	$row_rs_b2 = mysql_fetch_assoc($rs_b2);
	$totalRows_rs_b2 = mysql_num_rows($rs_b2);	
	
	mysql_select_db($database_cone, $cone);
	$query_rs_moneda = "SELECT * FROM volvo_moneda WHERE id = 1";
	$rs_moneda = mysql_query($query_rs_moneda, $cone) or die(mysql_error());
	$row_rs_moneda = mysql_fetch_assoc($rs_moneda);
	$totalRows_rs_moneda = mysql_num_rows($rs_moneda);  	

	mysql_select_db($database_cone, $cone);
	
	if ($row_rs_moneda['moneda']==1) {
		$query_rs_p_n = "SELECT * FROM volvo_productos WHERE oferta = '1' AND habilitado = '1' ";
	}
	if ($row_rs_moneda['moneda']==2) {
		$query_rs_p_n = "SELECT * FROM volvo_productos WHERE oferta = '1' AND habilitado = '1'";
	}
	$rs_p_n = mysql_query($query_rs_p_n, $cone) or die(mysql_error());
	$row_rs_p_n = mysql_fetch_assoc($rs_p_n);
	$totalRows_rs_p_n = mysql_num_rows($rs_p_n);	

	mysql_select_db($database_cone, $cone);
	$query_rs_p_n_h = "SELECT * FROM volvo_productos WHERE home1 = '1' AND habilitado = '1'";
	$rs_p_n_h = mysql_query($query_rs_p_n_h, $cone) or die(mysql_error());
	$row_rs_p_n_h = mysql_fetch_assoc($rs_p_n_h);
	$totalRows_rs_p_n_h = mysql_num_rows($rs_p_n_h);			
	
	mysql_select_db($database_cone, $cone);
	$query_rs_banner = "SELECT * FROM volvo_slider ORDER BY orden ASC";
	$rs_banner = mysql_query($query_rs_banner, $cone) or die(mysql_error());
	$row_rs_banner = mysql_fetch_assoc($rs_banner);
	$totalRows_rs_banner = mysql_num_rows($rs_banner);   	    								
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<meta name="description" content="Para tener el mejor rendimiento de tu Volvo con la máxima eficiencia y seguridad, elegí siempre repuestos originales. Encontrá los mejores precios para mantener tu camión o bus y aprovechá las promociones que tenemos para vos." />
<meta name="keywords" content="Sitio Oficial de Volvo Trucks Argentina, Volvo Trucks &amp; Buses, Argentina, Repuestos Originales Volvo, accesorios, camiones, buses" />

<title>VOLVO REPUESTOS</title><link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" />
<link href="styles.css" rel="stylesheet" type="text/css" />
<link href="styles-media.css?v12" rel="stylesheet" type="text/css" />

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
	<script src='js/resize.js?v1=1' type="text/javascript"></script>

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
  
<!-- Header banner -->
	<link rel="stylesheet" type="text/css" href="js/header.css" media="screen" />  

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
<?php include("included/header_buscador.php"); ?>
<!-- fin Encabezado -->

<!-- Menu principal -->
<?php include("included/nav.php"); ?>
<!-- fin Menu principal -->

<!-- Menu responsive -->
<?php include("included/nav-responsive.php"); ?>
<!-- fin Menu responsive -->

<div class="main">

<!--HEADER BANNER-->
<section class="cd-hero">
		<ul class="cd-hero-slider autoplay">
        <?php $r=1;?>
        <?php do { ?>
            <li <?php if ($row_rs_banner['youtube']<>'') {?>class="slick-active"<?php } else { ?><?php if($r==1) { ?>class="selected"<?php } ?><?php } ?>>
            
            <?php if ($row_rs_banner['youtube']<>'') {?>
   
<iframe id="popup-youtube-player" class="videoyt" src="https://www.youtube.com/embed/<?php echo $row_rs_banner['youtube'];?>?enablejsapi=1&version=3&playerapiid=ytplayer&rel=0&controls=0&showinfo=0" frameborder="0" allowfullscreen="true" allowscriptaccess="always"></iframe>

<video style="display:none"></video>
			<?php } else { ?>
            <?php if ($row_rs_banner['link']<>'') {?>
            		<a href="<?php echo $row_rs_banner['link'];?>" target="_blank"><img src="<?php echo substr(($row_rs_banner['imagen']), 3, 255); ?>" alt="<?php echo $row_rs_banner['alt'];?>" <?php if($r==1) { ?>class="mmk"<?php } ?> /></a>
            <?php } else { ?>
            		<img src="<?php echo substr(($row_rs_banner['imagen']), 3, 255); ?>" alt="<?php echo $row_rs_banner['alt'];?>" <?php if($r==1) { ?>class="mmk"<?php } else { ?>class="mmk"<?php } ?> />
            <?php } ?>
            
            <?php } ?>
            </li>
        <?php $r++;?>
        <?php } while($row_rs_banner = mysql_fetch_assoc($rs_banner)); ?>

		</ul>
        <!-- .cd-hero-slider -->
		<div class="cd-slider-nav">
			<nav>
				<span class="cd-marker item-1"></span>
				
				<ul class="slick-dots" style="display: block;">
                <?php for ($i=0; $i<$totalRows_rs_banner; $i++) { ?>
                <li class="">
                <button type="button" data-role="none"></button>
                </li>                
                <?php } ?>
                </ul>
			</nav> 
		</div>
        <!-- .cd-slider-nav -->
	</section>
<!--FIN HEADER BANNER-->


<!-- CAMIONES -->
  <div class="sections1">
      <div class="categorias" id="uno">PIEZAS PARA CAMIONES</div>
      <div class="slider1">
      <?php if ($totalRows_rs_p_n_h<>0){ ?>
      <?php do { ?>
      <div class="slide">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top">
            <div class="rela">
            
            <?php if ($row_rs_moneda['moneda']==1) { ?>
				<?php if ($row_rs_p_n_h['precio_oferta']<>0) {?>
                	<?php if ($row_rs_p_n_h['destacado']==1) {?>
                    	<div class="oferta_banda"><img src="img/rebajado.png" alt="REBAJADO" width="70" height="70" border="0"/></div>
                    <?php } ?>
                    <?php if ($row_rs_p_n_h['destacado']==2) {?>
                    	<div class="oferta_banda"><img src="img/oferta.png" alt="OFERTA" width="60" height="60" border="0"/></div>
                    <?php } ?>
                    <?php if ($row_rs_p_n_h['destacado']==3) {?>
                    	<div class="oferta_banda"><img src="img/promocion.png" alt="PROMOCION" width="70" height="70" border="0"/></div>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
			<?php if ($row_rs_moneda['moneda']==2) { ?>
				<?php if ($row_rs_p_n_h['precio_oferta_dolar']<>0) {?>
                	<?php if ($row_rs_p_n_h['destacado']==1) {?>
                    	<div class="oferta_banda"><img src="img/rebajado.png" alt="REBAJADO" width="70" height="70" border="0"/></div>
                    <?php } ?>
                    <?php if ($row_rs_p_n_h['destacado']==2) {?>
                    	<div class="oferta_banda"><img src="img/oferta.png" alt="OFERTA" width="60" height="60" border="0"/></div>
                    <?php } ?>
                    <?php if ($row_rs_p_n_h['destacado']==3) {?>
                    	<div class="oferta_banda"><img src="img/promocion.png" alt="PROMOCION" width="70" height="70" border="0"/></div>
                    <?php } ?>
                <?php } ?> 
			<?php } ?>  
            
            <a href="producto.php?vid=<?php echo $row_rs_p_n_h['id'];?>">
            <img src="<?php echo substr ($row_rs_p_n_h['imagen01'], 3, 250); ?>" alt="<?php echo $row_rs_p_n_h['nombre'];?>" title="<?php echo $row_rs_p_n_h['nombre'];?>" width="210" height="210" />
            </a>
            </div>
            </td>
          </tr>
          <tr>
            <td align="left" valign="top" class="producto_titulo"><?php echo $row_rs_p_n_h['nombre'];?></td>
          </tr>
          <tr>
            <td align="left" valign="top" class="producto_precio_cam">
            
            <?php if ($row_rs_moneda['moneda']==1) { ?>
				<?php if ($row_rs_p_n_h['precio_oferta']<>0) {?>
                <p class="tachado">$ <?php echo $row_rs_p_n_h['precio'];?> + Imp.</p>
                <p class="notachado">Precio actual: <br />
                  <span class="ok">$ <?php echo $row_rs_p_n_h['precio_oferta'];?></span> + Imp.</p>
                <?php } else { ?>
                	<span class="ok">$ <?php echo $row_rs_p_n_h['precio'];?></span> + Imp.
                <?php } ?>            
            <?php } ?>
			<?php if ($row_rs_moneda['moneda']==2) { ?>
				<?php if ($row_rs_p_n_h['precio_oferta_dolar']<>0) {?>
                <p class="tachado"><span class="notachado">USD</span> <?php echo $row_rs_p_n_h['precio_dolar'];?> + Imp.</p>
                <p class="notachado">Precio actual:<br />
                  <span class="ok">USD <?php echo $row_rs_p_n_h['precio_oferta_dolar'];?></span> + Imp.</p>
                <?php } else { ?>
                <span class="ok">USD <?php echo $row_rs_p_n_h['precio_dolar'];?></span> + Imp.
                <?php } ?>             
            <?php } ?>          
</td>
          </tr>
          <tr>
            <td align="left" valign="top" class="producto_aplica">Aplicaci&oacute;n:<?php 
		  $mas = '';
		  $myString1 = trim($row_rs_p_n_h['modelos']);
			$myArray = explode(',', $myString1);
			foreach($myArray as $my_Array){
				if ($my_Array<>'') {
					$mas .=  $my_Array.',';  
				}
				
			}
			echo substr($mas, 0, -1);
		  ?></td>
          </tr>
        </table>
      </div>
      <?php } while($row_rs_p_n_h = mysql_fetch_assoc($rs_p_n_h));?>
      <?php } ?>
    </div>
  </div>
<!-- fin CAMIONES -->


<!-- BUSES -->
  <div class="sections2">
      <div class="categorias" id="uno">PIEZAS PARA BUSES</div>
      <div class="slider1">
<?php
	mysql_select_db($database_cone, $cone);
	$query_rs_p_n_h = "SELECT * FROM volvo_productos WHERE home2 = '1' AND habilitado = '1'";
	$rs_p_n_h = mysql_query($query_rs_p_n_h, $cone) or die(mysql_error());
	$row_rs_p_n_h = mysql_fetch_assoc($rs_p_n_h);
	$totalRows_rs_p_n_h = mysql_num_rows($rs_p_n_h);
?>      
      <?php if ($totalRows_rs_p_n_h<>0){ ?>
      <?php do { ?>
      <div class="slide">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top">
            <div class="rela">
            
            <?php if ($row_rs_moneda['moneda']==1) { ?>
				<?php if ($row_rs_p_n_h['precio_oferta']<>0) {?>
                	<?php if ($row_rs_p_n_h['destacado']==1) {?>
                    	<div class="oferta_banda"><img src="img/rebajado.png" alt="REBAJADO" width="70" height="70" border="0"/></div>
                    <?php } ?>
                    <?php if ($row_rs_p_n_h['destacado']==2) {?>
                    	<div class="oferta_banda"><img src="img/oferta.png" alt="OFERTA" width="60" height="60" border="0"/></div>
                    <?php } ?>
                    <?php if ($row_rs_p_n_h['destacado']==3) {?>
                    	<div class="oferta_banda"><img src="img/promocion.png" alt="PROMOCION" width="70" height="70" border="0"/></div>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
			<?php if ($row_rs_moneda['moneda']==2) { ?>
				<?php if ($row_rs_p_n_h['precio_oferta_dolar']<>0) {?>
                	<?php if ($row_rs_p_n_h['destacado']==1) {?>
                    	<div class="oferta_banda"><img src="img/rebajado.png" alt="REBAJADO" width="70" height="70" border="0"/></div>
                    <?php } ?>
                    <?php if ($row_rs_p_n_h['destacado']==2) {?>
                    	<div class="oferta_banda"><img src="img/oferta.png" alt="OFERTA" width="60" height="60" border="0"/></div>
                    <?php } ?>
                    <?php if ($row_rs_p_n_h['destacado']==3) {?>
                    	<div class="oferta_banda"><img src="img/promocion.png" alt="PROMOCION" width="70" height="70" border="0"/></div>
                    <?php } ?>
                <?php } ?> 
			<?php } ?>  
            
            <a href="producto.php?vid=<?php echo $row_rs_p_n_h['id'];?>">
            <img src="<?php echo substr ($row_rs_p_n_h['imagen01'], 3, 250); ?>" alt="<?php echo $row_rs_p_n_h['nombre'];?>" title="<?php echo $row_rs_p_n_h['nombre'];?>" width="210" height="210" />
            </a>
            </div>
            </td>
          </tr>
          <tr>
            <td align="left" valign="top" class="producto_titulo"><?php echo $row_rs_p_n_h['nombre'];?></td>
          </tr>
          <tr>
            <td align="left" valign="top" class="producto_precio">
            
            <?php if ($row_rs_moneda['moneda']==1) { ?>
				<?php if ($row_rs_p_n_h['precio_oferta']<>0) {?>
                <p class="tachado" style="color:#fff;">$ <?php echo $row_rs_p_n_h['precio'];?> + Imp.</p>
                <p class="notachado">Precio actual:<br />
                  <span class="ok">$ <?php echo $row_rs_p_n_h['precio_oferta'];?></span> + Imp.</p>
                <?php } else { ?>
                  <span class="ok">$ <?php echo $row_rs_p_n_h['precio'];?></span> + Imp.
                <?php } ?>            
            <?php } ?>
			<?php if ($row_rs_moneda['moneda']==2) { ?>
				<?php if ($row_rs_p_n_h['precio_oferta_dolar']<>0) {?>
                <p class="tachado" style="color:#fff;"><span class="notachado">USD</span> <?php echo $row_rs_p_n_h['precio_dolar'];?> + Imp.</p>
                <p class="notachado">Precio actual:<br />
                  <span class="ok">USD <?php echo $row_rs_p_n_h['precio_oferta_dolar'];?></span> + Imp.</p>
                <?php } else { ?>
                  <span class="ok">USD <?php echo $row_rs_p_n_h['precio_dolar'];?></span> + Imp.
                <?php } ?>             
            <?php } ?>          
</td>
          </tr>
          <tr>
            <td align="left" valign="top" class="producto_aplica" style="color:#fff;">Aplicaci&oacute;n: <?php 
		  $mas = '';
		  $myString1 = trim($row_rs_p_n_h['modelos']);
			$myArray = explode(',', $myString1);
			foreach($myArray as $my_Array){
				if ($my_Array<>'') {
					$mas .=  $my_Array.',';  
				}
				
			}
			echo substr($mas, 0, -1);
		  ?></td>
          </tr>
        </table>
      </div>
      <?php } while($row_rs_p_n_h = mysql_fetch_assoc($rs_p_n_h));?>
      <?php } ?>
    </div>
  </div>
<!-- fin BUSES -->


<!-- OFERTAS -->
  
<!-- fin OFERTAS -->

<a name="nove" id="nove"></a>

<!-- NEWSLETTER -->
<div class="news_content">
  <div class="newsletters">
  <?php if (isset($_GET['b'])) { ?>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>
      <div class="news_titulo">Recib&iacute; novedades y promociones</div>
      Tus datos han sido enviados correctamente.<br />
      Muchas gracias por inscribirte.<br />
      <br /></td>
    </tr>
  </table>
  <?php } else {?>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>
      <div class="news_titulo">Recib&iacute; novedades y promociones</div>
      &iexcl;Registrate y recib&iacute; nuestras novedades y promociones!<br />
      <br />
      <form id="form3" name="form3" method="post" action="">
          <div class="news">
            <input name="nombre" type="text" class="news_campo" id="nombre" placeholder="Nombre" required="required" />
          </div>
          <div class="news">
            <input name="email" type="text" class="news_campo" id="email" placeholder="Email" required="required" />
          </div>
          <div class="news_enviar">
            <input name="botonnov" type="submit" class="enviar" id="botonnov" value="Enviar" />
          </div>
          <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
	    <tr>
	      <td width="30" align="left"><input name="acepta" type="checkbox" id="acepta" value="<?php
			$hora= date ("h:i:s");
			$fecha= date ("j/n/Y");
			echo 'TRUE '.$fecha.'-'.$hora;
		  ?>" <?php if ($row_rs_cliente['acepta']==1) { ?>checked="checked"<?php } ?> required="required"/></td>
	      <td colspan="5" align="left" class="aceptacion"><label for="acepta">Acepto recibir informaci&oacute;n y ofertas comerciales de parte de Volvo Trucks Argentina S.A. y de sus concesionarios o&#64257;ciales.</label></td>
	      </tr>
	    </table>
      </form>
  	</td>
    </tr>
  </table>
  <?php } ?>
</div>
  <div class="banner_concesionarios"><a href="https://www.volvotrucks.com.ar/es-ar/dealer-locator.html" target="_blank"><img src="img/banner_consecionarios.jpg" width="475" height="315" alt="Concesionarios" /></a></div>
</div>

<!-- fin NEWSLETTER -->

<!-- BANNER DOWN -->
<!-- Header banner -->
<?php include("included/slider_footer.php"); ?>
<!-- fin BANNER DOWN -->
    
<!-- FOOTER -->
<?php include("included/footer.php"); ?>
<!-- FOOTER -->
  
</div>

<div class="scroll-top"><a href="#arriba"><img src="img/top.png" width="30" height="30" alt="Subir" /></a></div>

<script src="js/main.js"></script>
</body>
</html>
