<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
session_start();

$hostname_cone = "localhost";
$database_cone = "volvorepuestos_base";
$username_cone = "volvorepuestos_volvorepuestos";
$password_cone = "XCGi8BZ!U{2u";
$cone = mysql_pconnect($hostname_cone, $username_cone, $password_cone) or trigger_error(mysql_error(),E_USER_ERROR);
?>