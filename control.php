<?php require_once('Connections/cone.php'); 
$colname2_ru = "2";
if (isset($_POST['clave'])) {
  $colname2_ru = (get_magic_quotes_gpc()) ? $_POST['clave'] : addslashes($_POST['clave']);
}
$colname_ru = "1";
if (isset($_POST['usuario'])) {
  $colname_ru = (get_magic_quotes_gpc()) ? $_POST['usuario'] : addslashes($_POST['usuario']);
}
mysql_select_db($database_cone, $cone);
$query_ru = sprintf("SELECT * FROM volvo_clientes WHERE `usuario` = '%s' ", $colname_ru);
$ru = mysql_query($query_ru, $cone) or die(mysql_error());
$row_ru = mysql_fetch_assoc($ru);
$totalRows_ru = mysql_num_rows($ru);

if ($totalRows_ru == 0) {
	$erroruser=1;
}
//vemos si el usuario
if ($totalRows_ru > 0) {
	if ($row_ru['clave']==$colname2_ru) {
		session_start();
		$_SESSION['usuarioweb']=$row_ru['usuario'];
		$_SESSION['nombre']=$row_ru['apellido'].', '.$row_ru['nombre'];;
		$_SESSION['email']=$row_ru['email'];
		$_SESSION['idweb']=$row_ru['id'];
		//session_register('SESSION');
		/////////////////////////////////////////
		if ($_POST['f']==1) {
			header("location:pedido.php?".SID);
		} else {
			header("location:index.php?".SID);
		}
	} else { 
		$errorpass=1; 
	}
} 

if ($erroruser==1){
header("Location: login.php?errorusuario=1"); 
}
if ($errorpass==1){
header("Location: login.php?errorusuario=1"); 
}
?>