<?php include("seguridad.php");
include("usuario_class.php");

$usuario = new User('','','','','','','');
$usuario->logout();