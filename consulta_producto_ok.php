<?php require_once('Connections/cone.php');
	
	mysql_select_db($database_cone, $cone);
	$query_rs_b2 = "SELECT * FROM volvo_banner WHERE id = '2'";
	$rs_b2 = mysql_query($query_rs_b2, $cone) or die(mysql_error());
	$row_rs_b2 = mysql_fetch_assoc($rs_b2);
	$totalRows_rs_b2 = mysql_num_rows($rs_b2);	
	
	$busca = $_POST['busca'];
	mysql_select_db($database_cone, $cone);
	$query_rs_p6 = "SELECT * FROM volvo_productos WHERE nombre LIKE '%$busca%' OR descripcion LIKE '%$busca%'";
	$rs_p6 = mysql_query($query_rs_p6, $cone) or die(mysql_error());
	$row_rs_p6 = mysql_fetch_assoc($rs_p6);
	$totalRows_rs_p6 = mysql_num_rows($rs_p6);	
	
	mysql_select_db($database_cone, $cone);
	$query_rs_cate = "SELECT * FROM volvo_categorias ORDER BY categoria ASC";
	$rs_cate = mysql_query($query_rs_cate, $cone) or die(mysql_error());
	$row_rs_cate = mysql_fetch_assoc($rs_cate);
	$totalRows_rs_cate = mysql_num_rows($rs_cate);		
	
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

/**********************Recibe la Info***********/
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$email = $_POST['email'];
	$localidad = $_POST['localidad'];
	$provincia = $_POST['provincia'];
	$producto = $_POST['producto'];
	
	$item = $_POST['item'];
	$consulta = $_POST['consulta'];
	$acepta = $_POST['acepta'];	
	$fecha = date("Y-m-d");
	///$chasis = $_POST['chasis'];
	
	
	$insertSQL = "INSERT INTO volvo_consulta (nombre,apellido,email,localidad,provincia,producto,item,consulta,acepta, fecha)
	VALUES ('$nombre','$apellido','$email','$localidad','$provincia','$producto','$item','$consulta','$acepta', '$fecha')";
	mysql_select_db($database_cone, $cone);
	$Result1 = mysql_query($insertSQL, $cone) or die(mysql_error());
    $ultimo = mysql_insert_id();
		
/**********************EMAIL********************/
	// Mandamos el mail

	$headers = array
	(
		'From: no-reply@volvorepuestos.com.ar <no-reply@volvorepuestos.com.ar>',
		'Reply-to: no-reply@volvorepuestos.com.ar <no-reply@volvorepuestos.com.ar>',
		'Content-type: text/html',
	);

	$headers = join("\n",$headers)."\n\n";
	
	$baseurl ="https://www.volvorepuestos.com.ar/email_consulta.php?vid=".$ultimo;
	$body = stripslashes(file_get_contents($baseurl));	
	
	$para  = 'acvolvo@volvocac.com.ar';

	
	@mail($para,'Consulta en www.volvorepuestos.com.ar',$body,$headers);	 									
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<title>VOLVO REPUESTOS</title>
<meta name="description" content="Para tener el mejor rendimiento de tu Volvo con la máxima eficiencia y seguridad, elegí siempre repuestos originales. Encontrá los mejores precios para mantener tu camión o bus y aprovechá las promociones que tenemos para vos." />
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
<div class="sections_login">
<div class="titulo_confirmacion">solicitud de informaci&oacute;n de repuestos</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="200" align="center">Recibimos tu consulta.<br />
          <br />
          <br />
Te responderemos a la brevedad.</td>
      </tr>
    </table>
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
