<?php if ((isset($_POST["buscar_g"])) || (isset($_POST["buscar_g_x"]))){ ?>
<?php
	$busca = $_POST['busca'];
	mysql_select_db($database_cone, $cone);
	$query_rs_p6 = "SELECT * FROM volvo_productos WHERE nombre LIKE '%$busca%' OR descripcion LIKE '%$busca%' OR item LIKE '%$busca%' AND habilitado = '1' ";
	$rs_p6 = mysql_query($query_rs_p6, $cone) or die(mysql_error());
	$row_rs_p6 = mysql_fetch_assoc($rs_p6);
	$totalRows_rs_p6 = mysql_num_rows($rs_p6);	
?>
  <div class="sections_busca">
      <div class="titulo_busca" id="uno">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left">RESULTADO DE SU B&Uacute;SQUEDA</td>
            <td width="30" align="right"><a href="javascript:cierra();"><img src="img/cerrar.png" width="30" height="30" alt="cerrar" /></a></td>
          </tr>
        </table>
      </div>
       <?php if ($totalRows_rs_p6<>0){ ?>
      <div class="slider1">
     
      <?php do { ?>
      <div class="slide">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top">
            <div class="rela">
            
            <?php if ($row_rs_moneda['moneda']==1) { ?>
				<?php if ($row_rs_p6['precio_oferta']<>0) {?>
                    <?php if ($row_rs_p6['destacado']==1) {?>
                    	<div class="oferta_banda"><img src="img/rebajado.png" alt="REBAJADO" width="70" height="70" border="0"/></div>
                    <?php } ?>
                    <?php if ($row_rs_p6['destacado']==2) {?>
                    	<div class="oferta_banda"><img src="img/oferta.png" alt="OFERTA" width="60" height="60" border="0"/></div>
                    <?php } ?>
                    <?php if ($row_rs_p6['destacado']==3) {?>
                    	<div class="oferta_banda"><img src="img/promocion.png" alt="PROMOCION" width="70" height="70" border="0"/></div>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
			<?php if ($row_rs_moneda['moneda']==2) { ?>
				<?php if ($row_rs_p6['precio_oferta_dolar']<>0) {?>
                <?php if ($row_rs_p6['destacado']==1) {?>
                    	<div class="oferta_banda"><img src="img/rebajado.png" alt="REBAJADO" width="70" height="70" border="0"/></div>
                    <?php } ?>
                    <?php if ($row_rs_p6['destacado']==2) {?>
                    	<div class="oferta_banda"><img src="img/oferta.png" alt="OFERTA" width="60" height="60" border="0"/></div>
                    <?php } ?>
                    <?php if ($row_rs_p6['destacado']==3) {?>
                    	<div class="oferta_banda"><img src="img/promocion.png" alt="PROMOCION" width="70" height="70" border="0"/></div>
                    <?php } ?>
                <?php } ?> 
			<?php } ?>  
                        
            <a href="producto.php?vid=<?php echo $row_rs_p6['id'];?>"><img src="<?php echo substr ($row_rs_p6['imagen01'], 3, 250); ?>" alt="<?php echo $row_rs_p6['nombre'];?>" title="<?php echo $row_rs_p6['nombre'];?>" width="210" height="210" /></a>
            </div>
            </td>
          
          
          </tr>
          <tr>
            <td align="left" valign="top" class="producto_titulo"><?php echo $row_rs_p6['nombre'];?></td>
          </tr>
          <tr>
            <td align="left" valign="top" class="producto_precio">
            
            <?php if ($row_rs_moneda['moneda']==1) { ?>
				<?php if ($row_rs_p6['precio_oferta']<>0) {?>
                	<p class="tachado">$ <?php echo $row_rs_p6['precio'];?> + Imp.</p>
                    <p class="notachado"><strong>Precio actual:</strong> $ <?php echo $row_rs_p6['precio_oferta'];?> + Imp.</p>
                <?php } else { ?>
                	$ <?php echo $row_rs_p6['precio'];?> + Imp.
                <?php } ?>            
            <?php } ?>
			<?php if ($row_rs_moneda['moneda']==2) { ?>
				<?php if ($row_rs_p6['precio_oferta_dolar']<>0) {?>
                	<p class="tachado">USD <?php echo $row_rs_p6['precio_dolar'];?> + Imp.</p>
                    <p class="notachado"><strong>Precio actual: </strong>USD <?php echo $row_rs_p6['precio_oferta_dolar'];?> + Imp.</p>
                <?php } else { ?>
                	USD <?php echo $row_rs_p6['precio_dolar'];?> + Imp.
                <?php } ?>             
            <?php } ?>           
            <br />

           </td>
          </tr>
          <tr>
            <td align="left" valign="top" class="producto_aplica"> <strong>Aplicaci&oacute;n: </strong><?php 
			$mas = '';
		  $myString1 = trim($row_rs_p6['modelos']);
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
      <?php } while($row_rs_p6 = mysql_fetch_assoc($rs_p6));?>
      </div>
      <?php } else { ?>
      No hay resultado para su b&uacute;squeda
      <?php } ?>
  </div>
<?php } ?>