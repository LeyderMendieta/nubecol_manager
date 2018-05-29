<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/site.css">
  <?php
	switch($_SESSION["rol"])
	{
		case 1:
			echo "<style>.lider{display:block}</style>";
			break;
		default:
			echo "<stle>.lider{display:none}</style>";
	}
	?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/site.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">NubeMail</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Inicio</a></li>
      <li><a href="clientes.php">Clientes</a></li>
      <li><a href="anuncios.php">Anuncios</a></li>
      <li><a href="equipo.php">Equipo</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION["nombre"]." ".$_SESSION["apellido"];?>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="mi_perfil.php">Mi Perfil</a></li>
          <li><a href="logout.php">Cerrar Sesion</a></li>
        </ul>
      </li>
    </ul>
  </div>  
</nav>
<div class="container">
	

