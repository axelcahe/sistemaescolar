<?php

require('bd.php');
require('Materia2.php');
require('headerMaestro.php');

$materia = new Materia();
$id_maestro = $_POST['idmae'];
$materia->datosMaestro($id_maestro);
$materia->materiasAsignadas($id_maestro);



require('footer.php');

?>