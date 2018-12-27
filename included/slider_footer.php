<link rel="stylesheet" type="text/css" href="js/header2.css" media="screen" />  
<?php
	mysql_select_db($database_cone, $cone);
	$query_rs_banner = "SELECT * FROM volvo_slider_abajo ORDER BY orden ASC";
	$rs_banner = mysql_query($query_rs_banner, $cone) or die(mysql_error());
	$row_rs_banner = mysql_fetch_assoc($rs_banner);
	$totalRows_rs_banner = mysql_num_rows($rs_banner);   	
?>
<!--HEADER BANNER-->
<section class="cd-hero2" style="
    margin-top: 20px;
">
		<ul class="cd-hero-slider2 autoplay">
        <?php $r=1;?>
        <?php do { ?>
            <li <?php if ($row_rs_banner['youtube']<>'') {?>class="slick-active"<?php } else { ?><?php if($r==1) { ?>class="selected"<?php } ?><?php } ?>>
            
            <?php if ($row_rs_banner['youtube']<>'') {?>
   
<iframe id="popup-youtube-player" class="videoyt" src="https://www.youtube.com/embed/<?php echo $row_rs_banner['youtube'];?>?enablejsapi=1&version=3&playerapiid=ytplayer&rel=0&controls=0&showinfo=0" frameborder="0" allowfullscreen="true" allowscriptaccess="always"></iframe>

<video style="display:none"></video>
			<?php } else { ?>
            <?php if ($row_rs_banner['link']<>'') {?>
            		<a href="<?php echo $row_rs_banner['link'];?>" target="_blank"><img src="<?php echo substr(($row_rs_banner['imagen']), 3, 255); ?>" alt="<?php echo $row_rs_banner['alt'];?>" <?php if($r==1) { ?>class="mmk"<?php } else { ?>class="mmk"<?php } ?> /></a>
            <?php } else { ?>
            		<img src="<?php echo substr(($row_rs_banner['imagen']), 3, 255); ?>" alt="<?php echo $row_rs_banner['alt'];?>" <?php if($r==1) { ?>class="mmk"<?php } else { ?>class="mmk"<?php } ?> />
            <?php } ?>
            
            <?php } ?>
            </li>
        <?php $r++;?>
        <?php } while($row_rs_banner = mysql_fetch_assoc($rs_banner)); ?>

		</ul>
        <!-- .cd-hero-slider -->
		<div class="cd-slider-nav2">
			<nav>
				<span class="cd-marker2 item-1"></span>
				
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
<script src="js/main2.js?v=a1233456"></script> <!-- Resource jQuery -->
