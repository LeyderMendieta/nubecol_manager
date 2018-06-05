<?php
include("usuario_class.php");
if($_POST["ref"] != 'null')
{
	$rol = 3;
}
else
{
	$rol = 4;
}
$usuario = new User($_POST["documento"],md5($_POST["password"]),$_POST["celular"],$_POST["nombre"],$_POST["apellido"],$_POST["ref"],$rol);
$usuario->registro();
?>