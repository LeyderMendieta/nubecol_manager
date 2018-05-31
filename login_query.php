<?php
include("usuario_class.php");
$usuario = new User($_POST["documento"],$_POST["password"],'','','','',"");
$usuario->login();

?>