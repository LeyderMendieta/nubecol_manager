<?php
$db = mysqli_connect("localhost","root","","nubecol");

// Check connection
$acentos = $db->query("SET NAMES 'utf8'");
	if($db->connect_error > 0){
		die('No se pudo conectar a la Base de Datos [' . $db->connect_error . ']');
	}
?>