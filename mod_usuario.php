<?php
session_start();
include("usuario_class.php");
//$Documento,$Password,$Celular,$Nombre,$Apellido,$Fk_referido,$Rol
if($_SESSION["rol"] == 1)
{
	$rol = $_POST["rol"];
}
else
{
	$rol = '';
}
$usuario = new User($_POST["documento"],'',$_POST["celular"],$_POST["nombre"],$_POST["apellido"],'',$rol);
$usuario->modificar();
?>