<?php
session_start();
include("cliente_class.php");
include("db.php");
if(isset($_GET["target"]))
{
	$ok = '';
	$user = $_GET["target"];
	$sql_validate = "SELECT documento,nombre,apellido,rol FROM usuario";
	if($result = $db->query($sql_validate))
	{
		while($row = $result->fetch_assoc())
		{
			if(md5($row["documento"]) == $user)
			{
				$ok = $row["documento"];
				$rol_validate = $row["rol"];
			}
		}
	}else;
	
	if($rol_validate == 1)
	{
		$rol = true;
	}
	else{
		$rol = false;
	}
}
else
{
	$rol = false;
}
$cliente = new Cliente($_POST["nombre"],$_POST["apellido"],$_POST["celular"],$_POST["vendedor"],'',$_POST["detalle"],$_POST["tipo"],$_POST["correo"],$_POST["contra"],$_POST["tiempo"],$_POST["vencimiento"],$_POST["suscripcion"]);
$cliente->modificar($rol);

?>