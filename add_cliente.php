<?php
session_start();
include("cliente_class.php");
include("db.php");
$tipo = $_POST["tipo"];
$sql_tipo = "SELECT * FROM tipo_cuenta WHERE id=$tipo";
if($result = $db->query($sql_tipo))
{
	if($row = $result->fetch_assoc())
	{
		$suscripcion = $row["categoria"];
		$tiempo = $row["tiempo"];
		$temp_value = stripslashes($row["vencimiento"]);
		$vencimiento = date('d/m/Y', strtotime("+$temp_value days"));
	}
}
$cliente = new Cliente($_POST["nombre"],$_POST["apellido"],$_POST["celular"],$_SESSION["documento"],'1024592834',$_POST["detalle"],$_POST["tipo"],$_POST["correo"],$_POST["contra"],$tiempo,$vencimiento,$suscripcion);
$cliente->agregar();
?>