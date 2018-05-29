<?php
session_start();
include("cliente_class.php");
switch($_POST["tipo"])
{
	case 1:
		$suscripcion = 'Netflix';
		$tiempo = "1 Mes";
		$vencimiento = date('d/m/Y', strtotime("+30 days"));
		break;
	case 2:
		$suscripcion = 'Netflix';
		$tiempo = "3 Mes";
		$vencimiento = date('d/m/Y', strtotime("+90 days"));
		break;
	case 3:
		$suscripcion = 'Netflix';
		$tiempo = "6 Mes";
		$vencimiento = date('d/m/Y', strtotime("+180 days"));
		break;
	case 4:
		$suscripcion = 'Netflix';
		$tiempo = "12 Mes";
		$vencimiento = date('d/m/Y', strtotime("+360 days"));
		break;
	case 5:
		$suscripcion = 'Spotify';
		$tiempo = "3 Mes";
		$vencimiento = date('d/m/Y', strtotime("+90 days"));
		break;
	case 6:
		$suscripcion = 'Spotify';
		$tiempo = "6 Mes";
		$vencimiento = date('d/m/Y', strtotime("+180 days"));
		break;
	default:
		$tiempo = "Null";
		$vencimiento = date('d/m/Y');
		break;
}

$cliente = new Cliente($_POST["nombre"],$_POST["apellido"],$_POST["celular"],$_SESSION["documento"],'1024592834',$_POST["detalle"],$_POST["tipo"],$_POST["correo"],$_POST["contra"],$tiempo,$vencimiento,$suscripcion);
$cliente->agregar();
?>