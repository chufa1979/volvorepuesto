<? 
	mysql_select_db($database_cone, $cone);
	$query_rs_moneda = "SELECT * FROM volvo_moneda WHERE id = 1";
	$rs_moneda = mysql_query($query_rs_moneda, $cone) or die(mysql_error());
	$row_rs_moneda = mysql_fetch_assoc($rs_moneda);
	$totalRows_rs_moneda = mysql_num_rows($rs_moneda);    
	
$_SESSION['productost'] = $_SESSION['productos'];
if (is_array($_SESSION['productost']) && count($_SESSION['productost'])){
reset($_SESSION['productost']);
while (list($idsd,$infods) = each($_SESSION['productost']))
{
	while (list($titulods,$cantidadds) = each($infods))
	{

		mysql_select_db($database_cone, $cone);
		$query_rs_pro_de = "SELECT * FROM volvo_productos WHERE id = $idsd";
		$rs_pro_de = mysql_query($query_rs_pro_de, $cone) or die(mysql_error());
		$row_rs_pro_de = mysql_fetch_assoc($rs_pro_de);
		$totalRows_rs_pro_de = mysql_num_rows($rs_pro_de);	
		$sumacanr = $sumacanr + $cantidadds;

            	if ($row_rs_moneda['moneda']==1) {	
					if ($row_rs_pro_de['precio_oferta']<>0) {	
						$totalpremio4s += $row_rs_pro_de['precio_oferta'] * $cantidadds;
					} else { 
				   		$totalpremio4s += $row_rs_pro_de['precio'] * $cantidadds;
					}             
				}
				if ($row_rs_moneda['moneda']==2) {
					if ($row_rs_pro_de['precio_oferta_dolar']<>0) {
                    	$totalpremio4s += $row_rs_pro_de['precio_oferta_dolar'] * $cantidadds;
					} else { 
						$totalpremio4s += $row_rs_pro_de['precio_dolar'] * $cantidadds;
					}
				}
	}
}
}
?>
<div class="top" id="arriba">
  <div class="main">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td><div class="logo"><a href="index.php"><img src="img/volvo.png" width="315" height="62" alt="VOLVO TRUCKS &amp; BUSES Argentina" /></a></div>
          <div class="menusup" id="buscad1">
            <form id="form2" name="form1" method="post" action="">
              <div class="buscador_content">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left"><label for="busca2"></label>
                      <input name="busca" type="text" class="campo" id="busca" placeholder="Buscar" onclick="return valida(this.form)"/></td>
                    <td align="right"><input name="buscar" type="image" id="buscar" src="img/buscar.png" alt="BUSCAR" /></td>
                  </tr>
                </table>
              </div>
            </form>
            <div class="menutop">
<? if (is_array($_SESSION['productos']) && count($_SESSION['productos'])){?>
<a href="pedido.php" class="cart"><? echo $sumacanr; ?> &iacute;tem(s) / 
            <?php if ($row_rs_moneda['moneda']==1) { ?>
            $ <?php echo $nombre_format_francais = number_format($totalpremio4s, 2, ',', ''); ?> + Imp.
            <?php } ?>
			<?php if ($row_rs_moneda['moneda']==2) { ?>
            USD <?php echo $nombre_format_francais = number_format($totalpremio4s, 2, ',', ''); ?> + Imp.
            <?php } ?>   
            </a>
<? } else { ?>
<a href="pedido.php" class="cart">0 &iacute;tem(s) / <?php if ($row_rs_moneda['moneda']==1) { ?>$<?php } ?><?php if ($row_rs_moneda['moneda']==2) { ?>USD<?php } ?> 0,00</a>
<? } ?>
            
            
            <? if(!$_SESSION['usuarioweb']){ ?>
              <div class="login"><a href="login.php">Iniciar sesi&oacute;n</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="nuevo_usuario.php">Nuevo usuario</a></div>
			<? } else { ?>
            <div class="login">Bienvenido/a <span class="txt_bold"><? echo $_SESSION['nombre'];?></span>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="mis_datos.php" class="menu_usar">Mis datos</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="salir.php" class="menu_usar">Salir</a></div>
            
            
            <? } ?>              
            </div>
          </div>
          <div class="menusup2" id="buscad2">
            <form id="form1" name="form1" method="post" action="">
              <div class="buscador_content2">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left"><label for="busca"></label>
                      <input name="busca" type="text" class="campo" id="busca" placeholder="Buscar" /></td>
                    <td align="right"><input name="buscar" type="image" id="buscar" src="img/buscar.png" alt="BUSCAR" /></td>
                  </tr>
                </table>
              </div>
            </form>
            <div class="menutop2"><a href="pedido.php" class="cart2">0 &iacute;tem(s) / $ 0,00</a>
              <div class="login2"><a href="login.php"><img src="img/user.png" width="34" height="25" alt="Login" /></a></div>
            </div>
        </div></td>
      </tr>
    </table>
  </div>
</div>