<?php
include ('bd.php');
$user=$_REQUEST['usuario'];
$psw=$_REQUEST['psw'];
$band= 0;
if ($band==0)
{
    $sql="SELECT * FROM usuarios WHERE Nombre='$user'";
    $valor = mysql_query($sql) or die ("Error de consulta usuario");
    $filas = mysql_num_rows($valor);
    if ($filas==0)
    {
        echo "El usuario no existe <br><br>";
        $band=1;
    }
}
if ($band==0)
{
    $sql="SELECT * FROM usuarios WHERE Nombre='$user'";
    $valor = mysql_query($sql) or die ("Error de consulta usuario");
    $Contrasena= mysql_result($valor,0,'Contrasena');
    if ($Contrasena!=$psw)
    {
        echo "El password no es correcto<br><br>";
        $band=1;
    }
}
if ($band==0)
{
    $sql="SELECT * FROM usuarios WHERE Nombre='$user'";
    $valor = mysql_query($sql) or die ("Error de consulta usuario");
    $activo= mysql_result($valor,0,'Estatus');
    if ($activo!='1')
    {
        echo "El usuario no está activo<br><br>";
        $band=1;
    }
}
if ($band==0)
{
    $sql="SELECT * FROM usuarios WHERE Nombre='$user'";
    $valor = mysql_query($sql) or die ("Error de consulta usuario");
    $tipo= mysql_result($valor,0,'Nivel');
    if ($tipo=='1')
    {
        $url="accesoAdministrador.php?user=$user";
        echo "<script>window.location='$url';</script>";
    }
    else
    {
        if ($tipo=='2')
        {
            $url="accesoMaestro.php?user=$user";
            echo "<script>window.location='$url';</script>";
        }
    }
}
?>