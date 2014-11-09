<?php
$user=$_GET['user'];
setcookie('usuariologin',$user);
setcookie('tipouser','Maestro');
setcookie('acceso','2');
include ('bd.php');
header ("Location:indexMaestro.php");
exit;
?>