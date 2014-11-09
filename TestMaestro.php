<?php

require ("Maestro.php");

$maestro = new Maestro();

$maestro->createUsuario();
$maestro->readUsuarioG();
$maestro->readUsuarioS(1);
$maestro->updateUsuario();
$maestro->deleteUsuario();
?>