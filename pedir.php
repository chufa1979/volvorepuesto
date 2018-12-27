<?php 
session_start();
/******************************************************************************/
$cant = $_GET['cantidad'] != '' ? $_GET['cantidad'] : 1;

if ($_GET['a'] == 'agregar' && $_GET['id'] != '' && $_GET['titulo'] != '')
{
		$_SESSION['productos'][$_GET['id']][$_GET['titulo']] = $cant;
		if (isset($_GET['items'])){
		$_SESSION['tamano'][$_GET['id']][$_GET['titulo']] = $_GET['items'];
		}
		if ($cant==0){ unset($_SESSION['productos'][$_GET['id']][$_GET['titulo']]); }
		if ($cant<0){ unset($_SESSION['productos'][$_GET['id']][$_GET['titulo']]); }
}

if ($_GET['a'] == 'eliminar' && $_GET['id'] != '' && $_GET['titulo'] != '')
{
	unset($_SESSION['productos'][$_GET['id']][$_GET['titulo']]);
}

if ($_GET['a'] == 'eliminatodo')
{
	$_SESSION['productos'] = array();	
}

/******************************************************************************/
	header("Location: pedido.php"); 	

?>
