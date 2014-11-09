<?php

require ("Alumno.php");
$alumno = new Alumno();

$alumno->createUsuario();
$alumno->readUsuarioG();
$alumno->readUsuarioS(1);
$alumno->updateUsuario();
$alumno->deleteUsuario();
?>