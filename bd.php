<?php

$db_name = "dbproyecto";
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_connection = mysql_connect($db_server,$db_user,$db_pass) or die ("Error al conectar la base de datos");
mysql_select_db($db_name, $db_connection) or die ("La base de datos no existe");
mysql_query("SET NAMES utf8");

?>