<?php

class Grupo {

    private $Id;
    private $Nombre;
    private $Avatar;
    private $Orden;
    private $Estatus;

    public function seleccionaAlumno(){
        echo"<div class=table-responsive>";
        echo"<form action=TestGrupo.php method=Post name=alumno id=alumno target='_self'>";
        echo"<table class=\"table table-striped\">";
        $sql01 = "SELECT u.id, u.Nombre, u.ApellidoPaterno, u.ApellidoMaterno FROM usuarios AS u WHERE u.Nivel=3 AND u.Estatus=1 AND NOT EXISTS(SELECT ga.id FROM grupo_alumno AS ga WHERE ga.id=u.id)";
        $result01 = mysql_query($sql01)or die("Error $sql01");
        while($field = mysql_fetch_array($result01)){
            $id_alumno = $field['id'];
            $opcion= ($field['ApellidoPaterno']." ".$field['ApellidoMaterno']." ".$field['Nombre']);
            echo"<tr><td><input type=checkbox name=alumno[] value=$id_alumno>$opcion</td></tr>";
        }
        $sql02 = "SELECT CONCAT (u.ApellidoPaterno,' ',u.ApellidoMaterno,' ',u.Nombre) AS Alumno, u.id, g.Nombre AS Grupo, g.id_grupo
                  FROM grupo AS g, usuarios AS u, grupo_alumno AS ga
                  WHERE ga.id_grupo=g.id_grupo AND ga.id=u.id ORDER BY u.ApellidoPaterno ASC";
        $result02 = mysql_query($sql02)or die("Error $sql02");
        while($field = mysql_fetch_array($result02)){
            $idg = $field['id_grupo'];
            $ida = $field['id'];
            $Alumno = $field['Alumno'];
            $Grupo = $field['Grupo'];
            echo"<tr><td>$Alumno, ya tiene grupo asignado. ($Grupo)<a href=TestGrupo.php?accion=2&alumno=$ida&grupo=$idg>Desasignar</a> </td></tr>";
        }
        echo"<td><select name=grupo>";
        $sql03 = "SELECT * FROM grupo WHERE Estatus = 1 ORDER BY Nombre ASC";
        $result03 = mysql_query($sql03)or die("Error $sql03");
        while($field = mysql_fetch_array($result03)){
            $id_grupo = $field['id_grupo'];
            $opcion= ($field['id_grupo']." - ".$field['Nombre']);
            echo "<option value=$id_grupo>$opcion</option>";
        }
        echo "</select></td></tr>";
        echo"<input type=hidden id=accion name=accion value=1>";
        echo "<tr><td align=center><input type=submit id=submit value=Agregar></td></tr>";
        echo "</table>";
        echo "</form>";
        echo "</div>";
    }

    public function alumnosAsignados($id){
        $sql02 = "SELECT CONCAT (u.ApellidoPaterno,' ',u.ApellidoMaterno,' ',u.Nombre) AS Alumno, g.Nombre AS Grupo
                  FROM grupo AS g, usuarios AS u, grupo_alumno AS ga
                  WHERE ga.id_grupo=g.id_grupo AND ga.id=u.id ORDER BY u.ApellidoPaterno ASC";
        $result02 = mysql_query($sql02)or die("Error $sql02");
        while($field = mysql_fetch_array($result02)){
            $Alumno = $field['Alumno'];
            $Grupo = $field['Grupo'];
            echo"<tr><td>$Alumno, ya tiene grupo asignado. ($Grupo)<a href=TestGrupo.php>Desasignar</a> </td></tr>";
        }
    }
    public function createGrupoAlumno($id_grupo, $id_alumno){
        $count = count($id_alumno);
        for ($i = 0; $i < $count; $i++) {
            $id_alumno[$i];
            $insert01 = " INSERT INTO grupo_alumno (id_grupo,id) VALUES($id_grupo,$id_alumno[$i])";
            $execute01 = mysql_query($insert01) or die("Error  $insert01");
        }
    }

    public function deleteGrupoAlumno($id_grupo, $id_alumno){
        if($id_alumno > 0){
            $delete01 = "DELETE FROM grupo_alumno WHERE id=$id_alumno AND id_grupo=$id_grupo";
            $execute01 = mysql_query($delete01) or die ("Error $delete01");
        }
    }
}
?>