<?php include("seguridad_login.php");?>
<!DOCTYPE html>
 <html>
 <head>
  <title>Ingresar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>body{background-image: url("img/fondo.jpg");background-size: 100%;}</style>
</head>
<head>
<meta charset="utf-8">
<title>Login</title>
</head>
<body>
<div class="content">
	<br>
	<br>
	<div class="row">
		<div class="col-md-offset-4 col-md-4">
			<?php
				if(isset($_GET["success"]))
				{
					switch($_GET["success"])
					{
						case md5("logout"):
							echo "<div class='alert alert-success'>La sesión ha cerrado correctamente!</div>";
							break;
						default:
							break;
					}
				}
				if(isset($_GET["error"]))
				{
					switch($_GET["error"])
					{
						case md5("usuario"):
							echo "<div class='alert alert-danger'>El usuario es incorrecto</div>";
							break;
						case md5("password"):
							echo "<div class='alert alert-danger'>Contraseña Incorrecta prueba con una distina</div>";
							break;
					}
				}
				?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-offset-4 col-md-4">
			<form action="login_query.php" method="post">
				<label for="documento">Documento:</label>
				<input class='form-control' name="documento" type="text" required>
				<label for="password">Contraseña:</label>
				<input class='form-control' type="password" name="password" required><br>
				<input class='btn btn-primary' type="submit" value='Ingresar'>
				<a href="registro.php?ref=null" class="pull-right btn btn-info">Registrar</a>
			</form>
				
		</div>
	</div>	
</div>
</body>
</html>