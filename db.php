<?php
$db = mysqli_connect("localhost","root","","nubecol");
//$db = mysqli_connect('136.179.15.239', 'mundosvi_nubecol', 'f[8o,)COT{Cl', 'mundosvi_nubecol');
// Check connection
$acentos = $db->query("SET NAMES 'utf8'");
	if($db->connect_error > 0){
		die('No se pudo conectar a la Base de Datos [' . $db->connect_error . ']');
	}
?>