<div id="menu_responsive">
<div id='cssmenu'>
  <ul>
    <li class='has-sub'><a href='#' class="nav_inicio">MENU</a>
      <ul>
        <li class='has-sub'><a href='#'>Camiones L&iacute;nea F</a>
          <ul>
<?php
	mysql_select_db($database_cone, $cone);
	$query_rs_b1 = "SELECT * FROM volvo_categorias ORDER BY categoria ASC";
	$rs_b1 = mysql_query($query_rs_b1, $cone) or die(mysql_error());
	$row_rs_b1 = mysql_fetch_assoc($rs_b1);
	$totalRows_rs_b1 = mysql_num_rows($rs_b1);
?>  
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
            <li class='has-sub'><a href='categorias.php?categoria=<?php echo $row_rs_b1['id'];?>&familia=1'><?php echo $row_rs_b1['categoria'];?></a>
	<?php
		$idcate = $row_rs_b1['id'];
        mysql_select_db($database_cone, $cone);
        $query_rs_b2 = "SELECT * FROM volvo_subcategoria WHERE categoria = '$idcate' ORDER BY subcategoria ASC";
        $rs_b2 = mysql_query($query_rs_b2, $cone) or die(mysql_error());
        $row_rs_b2 = mysql_fetch_assoc($rs_b2);
        $totalRows_rs_b2 = mysql_num_rows($rs_b2);
		if ($totalRows_rs_b2<>0) {
    ?>              
		<ul>
        <?php do { ?>
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
              
                <li><a href='categorias.php?subcategoria=<?php echo $row_rs_b2['id'];?>&familia=1'><?php echo ucfirst(strtolower($row_rs_b2['subcategoria']));?></a></li>
		<?php } ?>
		<?php } while($row_rs_b2 = mysql_fetch_assoc($rs_b2)); ?> 
		</ul>
        <?php } ?>
              </li>
    <?php } ?>
<?php } while($row_rs_b1 = mysql_fetch_assoc($rs_b1));?>      
            </ul>
          </li>
          <!---->
<li class='has-sub'><a href='#'>Camiones L&iacute;nea VM</a>
          <ul>
<?php
	mysql_select_db($database_cone, $cone);
	$query_rs_b1 = "SELECT * FROM volvo_categorias ORDER BY categoria ASC";
	$rs_b1 = mysql_query($query_rs_b1, $cone) or die(mysql_error());
	$row_rs_b1 = mysql_fetch_assoc($rs_b1);
	$totalRows_rs_b1 = mysql_num_rows($rs_b1);
?>  
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
            <li class='has-sub'><a href='categorias.php?categoria=<?php echo $row_rs_b1['id'];?>&familia=2'><?php echo $row_rs_b1['categoria'];?></a>
	<?php
		$idcate = $row_rs_b1['id'];
        mysql_select_db($database_cone, $cone);
        $query_rs_b2 = "SELECT * FROM volvo_subcategoria WHERE categoria = '$idcate' ORDER BY subcategoria ASC";
        $rs_b2 = mysql_query($query_rs_b2, $cone) or die(mysql_error());
        $row_rs_b2 = mysql_fetch_assoc($rs_b2);
        $totalRows_rs_b2 = mysql_num_rows($rs_b2);
		if ($totalRows_rs_b2<>0) {
    ?>              
		<ul>
        <?php do { ?>
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
                <li><a href='categorias.php?subcategoria=<?php echo $row_rs_b2['id'];?>&familia=2'><?php echo ucfirst(strtolower($row_rs_b2['subcategoria']));?></a></li>
     <?php } ?>
		<?php } while($row_rs_b2 = mysql_fetch_assoc($rs_b2)); ?> 
		</ul>
        <?php } ?>
              </li>
    <?php } ?>
<?php } while($row_rs_b1 = mysql_fetch_assoc($rs_b1));?>      
            </ul>
          </li>          
          <!---->
<li class='has-sub'><a href='#'>Buses</a>
          <ul>
<?php
	mysql_select_db($database_cone, $cone);
	$query_rs_b1 = "SELECT * FROM volvo_categorias ORDER BY categoria ASC";
	$rs_b1 = mysql_query($query_rs_b1, $cone) or die(mysql_error());
	$row_rs_b1 = mysql_fetch_assoc($rs_b1);
	$totalRows_rs_b1 = mysql_num_rows($rs_b1);
?>  
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
            <li class='has-sub'><a href='categorias.php?categoria=<?php echo $row_rs_b1['id'];?>&familia=3'><?php echo $row_rs_b1['categoria'];?></a>
	<?php
		$idcate = $row_rs_b1['id'];
        mysql_select_db($database_cone, $cone);
        $query_rs_b2 = "SELECT * FROM volvo_subcategoria WHERE categoria = '$idcate' ORDER BY subcategoria ASC";
        $rs_b2 = mysql_query($query_rs_b2, $cone) or die(mysql_error());
        $row_rs_b2 = mysql_fetch_assoc($rs_b2);
        $totalRows_rs_b2 = mysql_num_rows($rs_b2);
		if ($totalRows_rs_b2<>0) {
    ?>              
		<ul>
        <?php do { ?>
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
                <li><a href='categorias.php?subcategoria=<?php echo $row_rs_b2['id'];?>&familia=3'><?php echo ucfirst(strtolower($row_rs_b2['subcategoria']));?></a></li>
    <?php } ?>
		<?php } while($row_rs_b2 = mysql_fetch_assoc($rs_b2)); ?> 
		</ul>
        <?php } ?>
              </li>
	<?php } ?>
<?php } while($row_rs_b1 = mysql_fetch_assoc($rs_b1));?>      
            </ul>
          </li>          
          <!---->
        <li><a href='ofertas.php'>Promociones</a></li>
        </ul>
      </li>
  </ul>
</div> 
</div>