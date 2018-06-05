<!DOCTYPE html>
<html lang="en">
<head>
  <title>Nuestro Negocio</title>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
  <link rel="icon" type="image/png" href="images/icon.png" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/site.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
	  function copiarAlPortapapeles(id_elemento) {
		  var aux = document.createElement("input");
		  aux.setAttribute("value", document.getElementById(id_elemento).innerHTML);
		  document.body.appendChild(aux);
		  aux.select();
		  document.execCommand("copy");
		  document.body.removeChild(aux);
		}
	  function mayus(e) {var tecla=e.value;e.value =tecla.toUpperCase();}
	</script>
<?php
	switch($_SESSION["rol"])
	{
		// Lider
		case 1:
			break;
		// Socio
		case 2:
			echo "<style>.lider{display:none;}</style>";
			break;
		// Vendedor
		case 3:
			echo "<style>.socios{display:none;}</style>";
			echo "<style>.lider{display:none;}</style>";
			break;
		//	Aspirante
		case 4:
			echo "<style>.socios{display:none;}#socios{display:none;}</style>";
			echo "<style>.equipo{display:none;}#equipo{display:none;}</style>";
			echo "<style>.clientes{display:none;}</style>";
			echo "<style>.lider{display:none;}</style>";
			break;
		default:
			break;
	}
	?>
</head>
<body>
<div id='ref' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

	<!-- Modal content-->
	<div class='modal-content'>
	  <div class='modal-header'>
		<button type='button' class='close' data-dismiss='modal'>&times;</button>
		<h3 class='modal-title'><?php echo $_SESSION["nombre"].' '.$_SESSION["apellido"];?></h3>
	  </div>
	  <div class='modal-body'>
		<h4>Copia el link</h4>
		<button type="button" class="btn btn-default pull-right btn-lg" onclick="copiarAlPortapapeles('linkC')">
		  <span class="glyphicon glyphicon-copy" aria-hidden="true"></span> Copiar
		</button>
		<p id='linkC'>https://www.mundos-virtual.com/nubecol/registro.php?ref=<?php echo md5($_SESSION["documento"]);?></p>
	  </div>
	  <div class='modal-footer'>
		<button type='button' class='btn btn-default' data-dismiss='modal'>Cerrar</button>
	  </div>
	</div>
  </div>		  
</div>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">NubeMail</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Inicio</a></li>
      <li id='socios'><a href="clientes.php">Clientes</a></li>
      <li><a href="anuncios.php">Anuncios</a></li>
	  <li id='equipo'><a href="equipo.php">Equipo</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION["nombre"]." ".$_SESSION["apellido"];?>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="modificar_usuario.php?edit=<?php echo md5($_SESSION["documento"]);?>">Mi Perfil</a></li>
          <li id='referir'><a href='' data-toggle='modal' data-target='#ref'>Referir</a></li>
          <li><a href="logout.php">Cerrar Sesion</a></li>
        </ul>
      </li>
    </ul>
  </div>  
</nav>
<div class="container">
	

