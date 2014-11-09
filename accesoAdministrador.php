<?php
$user=$_GET['user'];
setcookie('usuariologin',$user);
setcookie('tipouser','Administrador');
setcookie('acceso','1');
include ('bd.php');
header ("Location:indexAdministrador.php");
exit;
?>