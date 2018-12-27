<div id="menu_back">
  <div class="main">
    <table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td class="menu_linea"><span class="menu_titulos">CAMIONES:</span><a href="#" class="menu" onmouseover="MM_showHideLayers('submenu1','','show')" onmouseout="MM_showHideLayers('submenu1','','hide')">L&Iacute;NEA F</a><a href="#" class="menu" onmouseover="MM_showHideLayers('submenu2','','show')" onmouseout="MM_showHideLayers('submenu2','','hide')">L&Iacute;NEA VM</a></td>
        <td class="menu_linea"><a href="#" class="menu2" onmouseover="MM_showHideLayers('submenu3','','show')" onmouseout="MM_showHideLayers('submenu3','','hide')">BUSES</a></td>
        <td><a href="ofertas.php" class="menu2">PROMOCIONES</a></td>
      </tr>
    </table>
  </div>
</div>
	<div class="main">
    <div id="vacia">
    <!---->  
<?php
	mysql_select_db($database_cone, $cone);
	$query_rs_b1 = "SELECT * FROM volvo_categorias ORDER BY categoria ASC";
	$rs_b1 = mysql_query($query_rs_b1, $cone) or die(mysql_error());
	$row_rs_b1 = mysql_fetch_assoc($rs_b1);
	$totalRows_rs_b1 = mysql_num_rows($rs_b1);
?>  
    
      <div class="submenu" id="submenu1" onmouseover="MM_showHideLayers('submenu1','','show')" onmouseout="MM_showHideLayers('submenu1','','hide')">
      <?php do { ?>
      <?php 
	  /********CONTROL***********/
	$familia = 1;
	$categoria = $row_rs_b1['id'];
	mysql_select_db($database_cone, $cone);
	$query_rs_control = "SELECT * FROM volvo_productos WHERE linea = '$familia' AND categoria = '$categoria'";
	$rs_control = mysql_query($query_rs_control, $cone) or die(mysql_error());
	$row_rs_control = mysql_fetch_assoc($rs_control);
	$totalRows_rs_control = mysql_num_rows($rs_control);	
	if ($totalRows_rs_control<>0) {
	 /********CONTROL***********/	  
	  ?>
      
      <div class="columna"><a href="categorias.php?categoria=<?php echo $row_rs_b1['id'];?>&familia=1" class="categoria"><?php echo $row_rs_b1['categoria'];?></a>
	<?php

		$idcate = $row_rs_b1['id'];
        mysql_select_db($database_cone, $cone);
        $query_rs_b2 = "SELECT * FROM volvo_subcategoria WHERE categoria = '$idcate' ORDER BY subcategoria ASC";
        $rs_b2 = mysql_query($query_rs_b2, $cone) or die(mysql_error());
        $row_rs_b2 = mysql_fetch_assoc($rs_b2);
        $totalRows_rs_b2 = mysql_num_rows($rs_b2);
		do {
		?>   
      <?php 
	  /********CONTROL***********/
	$familia = 1;
	$subcategoria = $row_rs_b2['id'];
	mysql_select_db($database_cone, $cone);
	$query_rs_control = "SELECT * FROM volvo_productos WHERE linea = '$familia' AND subcategoria = '$subcategoria'";
	$rs_control = mysql_query($query_rs_control, $cone) or die(mysql_error());
	$row_rs_control = mysql_fetch_assoc($rs_control);
	$totalRows_rs_control = mysql_num_rows($rs_control);	
	if ($totalRows_rs_control<>0) {
	 /********CONTROL***********/	  
	  ?>           
    	<a href="categorias.php?subcategoria=<?php echo $row_rs_b2['id'];?>&familia=1"><?php echo ucfirst(strtolower($row_rs_b2['subcategoria']));?></a>
        <?php } ?>
    	<?php 
		} while($row_rs_b2 = mysql_fetch_assoc($rs_b2));
		?> 
        </div>
        <?php } ?>
      <?php } while($row_rs_b1 = mysql_fetch_assoc($rs_b1));?>
      </div>    
    <!---->
    <!---->  
<?php
	mysql_select_db($database_cone, $cone);
	$query_rs_b1 = "SELECT * FROM volvo_categorias ORDER BY categoria ASC";
	$rs_b1 = mysql_query($query_rs_b1, $cone) or die(mysql_error());
	$row_rs_b1 = mysql_fetch_assoc($rs_b1);
	$totalRows_rs_b1 = mysql_num_rows($rs_b1);
?>  
    
      <div class="submenu" id="submenu2" onmouseover="MM_showHideLayers('submenu2','','show')" onmouseout="MM_showHideLayers('submenu2','','hide')">
      <?php do { ?>
      <?php 
	  /********CONTROL***********/
	$familia = 2;
	$categoria = $row_rs_b1['id'];
	mysql_select_db($database_cone, $cone);
	$query_rs_control = "SELECT * FROM volvo_productos WHERE linea = '$familia' AND categoria = '$categoria'";
	$rs_control = mysql_query($query_rs_control, $cone) or die(mysql_error());
	$row_rs_control = mysql_fetch_assoc($rs_control);
	$totalRows_rs_control = mysql_num_rows($rs_control);	
	if ($totalRows_rs_control<>0) {
	 /********CONTROL***********/	  
	  ?>      
      <div class="columna"><a href="categorias.php?categoria=<?php echo $row_rs_b1['id'];?>&familia=2" class="categoria"><?php echo $row_rs_b1['categoria'];?></a>
	<?php
		$idcate = $row_rs_b1['id'];
        mysql_select_db($database_cone, $cone);
        $query_rs_b2 = "SELECT * FROM volvo_subcategoria WHERE categoria = '$idcate' ORDER BY subcategoria ASC";
        $rs_b2 = mysql_query($query_rs_b2, $cone) or die(mysql_error());
        $row_rs_b2 = mysql_fetch_assoc($rs_b2);
        $totalRows_rs_b2 = mysql_num_rows($rs_b2);
		do {
    ?>  
      <?php 
	  /********CONTROL***********/
	$familia = 2;
	$subcategoria = $row_rs_b2['id'];
	mysql_select_db($database_cone, $cone);
	$query_rs_control = "SELECT * FROM volvo_productos WHERE linea = '$familia' AND subcategoria = '$subcategoria'";
	$rs_control = mysql_query($query_rs_control, $cone) or die(mysql_error());
	$row_rs_control = mysql_fetch_assoc($rs_control);
	$totalRows_rs_control = mysql_num_rows($rs_control);	
	if ($totalRows_rs_control<>0) {
	 /********CONTROL***********/	  
	  ?>         
    	<a href="categorias.php?subcategoria=<?php echo $row_rs_b2['id'];?>&familia=2"><?php echo ucfirst(strtolower($row_rs_b2['subcategoria']));?></a>
        <?php } ?>
    	<?php 
		} while($row_rs_b2 = mysql_fetch_assoc($rs_b2));
		?> 
        </div>
        <?php } ?>
      <?php } while($row_rs_b1 = mysql_fetch_assoc($rs_b1));?>
      </div>    
    <!---->
    <!---->  
<?php
	mysql_select_db($database_cone, $cone);
	$query_rs_b1 = "SELECT * FROM volvo_categorias ORDER BY categoria ASC";
	$rs_b1 = mysql_query($query_rs_b1, $cone) or die(mysql_error());
	$row_rs_b1 = mysql_fetch_assoc($rs_b1);
	$totalRows_rs_b1 = mysql_num_rows($rs_b1);
?>  
    
      <div class="submenu" id="submenu3" onmouseover="MM_showHideLayers('submenu3','','show')" onmouseout="MM_showHideLayers('submenu3','','hide')">
      <?php do { ?>
      <?php 
	  /********CONTROL***********/
	$familia = 3;
	$categoria = $row_rs_b1['id'];
	mysql_select_db($database_cone, $cone);
	$query_rs_control = "SELECT * FROM volvo_productos WHERE linea = '$familia' AND categoria = '$categoria'";
	$rs_control = mysql_query($query_rs_control, $cone) or die(mysql_error());
	$row_rs_control = mysql_fetch_assoc($rs_control);
	$totalRows_rs_control = mysql_num_rows($rs_control);	
	if ($totalRows_rs_control<>0) {
	 /********CONTROL***********/	  
	  ?>      
      <div class="columna"><a href="categorias.php?categoria=<?php echo $row_rs_b1['id'];?>&familia=3" class="categoria"><?php echo $row_rs_b1['categoria'];?></a>
	<?php
		$idcate = $row_rs_b1['id'];
        mysql_select_db($database_cone, $cone);
        $query_rs_b2 = "SELECT * FROM volvo_subcategoria WHERE categoria = '$idcate' ORDER BY subcategoria ASC";
        $rs_b2 = mysql_query($query_rs_b2, $cone) or die(mysql_error());
        $row_rs_b2 = mysql_fetch_assoc($rs_b2);
        $totalRows_rs_b2 = mysql_num_rows($rs_b2);
		do {
    ?>  
      <?php 
	  /********CONTROL***********/
	$familia = 3;
	$subcategoria = $row_rs_b2['id'];
	mysql_select_db($database_cone, $cone);
	$query_rs_control = "SELECT * FROM volvo_productos WHERE linea = '$familia' AND subcategoria = '$subcategoria'";
	$rs_control = mysql_query($query_rs_control, $cone) or die(mysql_error());
	$row_rs_control = mysql_fetch_assoc($rs_control);
	$totalRows_rs_control = mysql_num_rows($rs_control);	
	if ($totalRows_rs_control<>0) {
	 /********CONTROL***********/	  
	  ?>           
    	<a href="categorias.php?subcategoria=<?php echo $row_rs_b2['id'];?>&familia=3"><?php echo ucfirst(strtolower($row_rs_b2['subcategoria']));?></a>
        <?php } ?>
    	<?php 
		} while($row_rs_b2 = mysql_fetch_assoc($rs_b2));
		?> 
        </div>
	  <?php } ?>        
      <?php } while($row_rs_b1 = mysql_fetch_assoc($rs_b1));?>
      </div>    
    <!---->    
    </div>
  </div>