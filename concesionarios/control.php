<?php require_once('../Connections/cone.php'); 

$colname2_ru = "2";
if (isset($_POST['contrasena'])) {
  $colname2_ru = (get_magic_quotes_gpc()) ? $_POST['contrasena'] : addslashes(trim($_POST['contrasena']));
}
$colname_ru = "1";
if (isset($_POST['usuario'])) {
  $colname_ru = (get_magic_quotes_gpc()) ? $_POST['usuario'] : addslashes(trim($_POST['usuario']));
}
mysql_select_db($database_cone, $cone);
$query_ru = sprintf("SELECT * FROM volvo_puntos_ventas WHERE `email` = '%s' ", $colname_ru);
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
		$_SESSION['user']=$row_ru['email'];
		$_SESSION['nivel']=1;
		$_SESSION['nombreapellido']=$row_ru['puntoderetiro'];
		$_SESSION['id']=$row_ru['id'];
		/////////////////////////////////////////
		header("location:home.php?".SID);
	} else { 
		$errorpass=1; 
	}
} 

if ($erroruser==1){
header("Location: home.php?errorusuario=1"); 
}
if ($errorpass==1){
header("Location: home.php?errorusuario=2"); 
}
?>