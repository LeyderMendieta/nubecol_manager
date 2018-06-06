<?php
include("seguridad_lider.php");
include("cliente_class.php");
include("db.php");

$sql_user = "SELECT * FROM usuario WHERE rol=1";
if($result_1 = $db->query($sql_user))
{
	$lider = 'off';
	while($row_1 = $result_1->fetch_assoc())
	{
		if(md5(row["documento"]) == $_POST["target"])
		{
			$lider = 'on';
			$correo = $_POST["correo"];
			$contra = $_POST["contra"];
		}
	}
	if($lider == 'off')
	{
		$correo = 'NO ASIGNADO';
		$contra = 'NO ASIGNADO';
	}
}

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
	else
	{
		header("Location: agregar_cliente.php?error=".md5("tipo"));
	}
}
$cliente = new Cliente($_POST["nombre"],$_POST["apellido"],$_POST["celular"],$_SESSION["documento"],'1024592834',$_POST["detalle"],
					   $_POST["tipo"],$correo,$contra,$tiempo,$vencimiento,$suscripcion);
$cliente->agregar();
?>