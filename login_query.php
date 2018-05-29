<?php

include("usuario_class.php");
echo $_POST["documento"].$_POST["password"];

$usuario = new User($_POST["documento"],$_POST["password"],'','','','','');
$usuario->login();

?>