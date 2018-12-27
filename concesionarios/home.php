<?php include ("seguridad.php"); ?>
<?php require_once('../Connections/cone.php'); ?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>VOLVO Repuestos |  Panel de Administraci&oacute;n Web</title>
<link href="../admin/js/style_admin.css" rel="stylesheet" type="text/css" />
<link href="../admin/js/menu/menu.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script type="text/javascript" src="../admin/js/chosen.jquery.js"></script>
  <script type="text/javascript" src="../admin/js/menu/script.js"></script>
</head>

<body>
<div class="main">
  <div id="top_home">
    <div id="logo"><a href="home.php"><img src="../admin/img/volvo_logo.png" width="217" height="40" alt="VOLVO" /></a></div>
    <div id="title_page">CONCESIONARIOS - VOLVO REPUESTOS</div>
    <div id="user"><?php echo $_SESSION['nombreapellido'];?> &nbsp;&raquo;&nbsp;&nbsp;<a href="salir.php">Logout</a></div>
  </div>
</div>
<div id="menu">
<div id="cssmenu">
<ul>
  <li><a href='pedidos.php' class="nav_pedidos">Pedidos</a></li>
   <li><a href='reclamos.php' class="nav_reclamos">Reclamos</a></li>   
   <li><a href='http://www.volvorepuestos.com.ar' target="_blank" class="nav_web">Ver Sitio Web</a></li>
</ul>
</div>
</div>
<div id="contenido-home">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="500" align="center" valign="middle">Bienvenido al Administrador de Pedidos y Reclamos<br />
      de VOLVO REPUESTOS<br />
      <br />
      <strong>www.volvorepuestos.com.ar</strong></td>
  </tr>
</table>
</div>
</body>
</html>
