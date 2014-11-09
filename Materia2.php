<?php
class Materia{

    private $Id;
    private $Nombre;
    private $Avatar;
    private $Orden;
    private $Estatus;

    public function createMateria(){
        echo"<br>Create Materia";
    }

    public function readMateriaG(){
        echo"<br>Create Materia";
    }

    public function SeleccionaMaestro(){
        echo"<div class=table-responsive>";
        echo"<form action=ajax2.php method=Post name=maestro id=maestro target='_self'>";
        echo"<table class=\"table table-striped\">";
        echo"<tr><td>Maestro: </td><td><select name=idmae>";
        $sql02 = "SELECT * FROM usuarios WHERE Estatus = 1 AND Nivel = 2 ORDER BY ApellidoPaterno";
        $result02 = mysql_query($sql02)or die("Error $sql02");
        while($field = mysql_fetch_array($result02)){
            $id_maestro = $field['id'];
            $opcion= ($field['id'].") ".$field['ApellidoPaterno']." ".$field['ApellidoMaterno']." ".$field['Nombre']);
            echo "<option value=$id_maestro>$opcion</option>";
        }
        echo "</select></td></tr>";
        echo "<tr><td colspan=2 align=center><input type=submit id=submit value=Seleccionar></td></tr>";
        echo "</table>";
        echo "</form>";
        echo "</div>";
    }
    public function datosMaestro($id_maestro){
        $sql04 = "SELECT * FROM usuarios WHERE id = $id_maestro";
        $result04 = mysql_query($sql04)or die("No se ejecuta consulta $sql04");
        $existe = mysql_num_rows($result04);
        if ($existe > 0) {
            $nombre = $id_maestro . " ) ";
            $nombre .= mysql_result($result04, 0, 'ApellidoPaterno');
            $nombre .= " " . mysql_result($result04, 0, 'ApellidoMaterno');
            $nombre .= " " . mysql_result($result04, 0, 'Nombre');
            $nombre = $nombre;
            echo "<br>Maestro Seleccionado: <strong>".$nombre."</strong>";
        }
    }

    public function materiasAsignadas($id_maestro){
        echo"<div class=table-responsive>";
        echo"<table class=\"table table-striped\">";
        echo "<tr><td colspan=2 align=center><strong>Materias Asignadas</strong></td></tr>";
        $sql01 = "SELECT m.Nombre, mm.id_materia  FROM materia AS m, maestro_materia AS mm WHERE mm.id_materia=m.id_materia AND mm.id = $id_maestro GROUP BY m.Nombre";
        $result01 = mysql_query($sql01)or die("Error $sql01");
        while($field = mysql_fetch_array($result01)){
            $id_materia = $field['id_materia'];
            $Nombre = $field['Nombre'];
            echo "<tr><td>$Nombre</td></tr>";
        }
        echo"</table>";
        echo"</div>";
    }


}
?>