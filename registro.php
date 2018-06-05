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
		<h2>REGISTRO</h2>
			<?php
				include("db.php");
				if(isset($_GET["ref"]))
				{					
					$sql_ref = "SELECT * FROM usuario";
					if($result = $db->query($sql_ref))
					{
						$ok = 'null';
						$documento = 'null';
						while($row = $result->fetch_assoc())
						{
							if($_GET["ref"] == md5($row["documento"]))
							{
								$ok = $row["documento"];
								$sql_name_ref = "SELECT nombre,apellido,documento FROM usuario WHERE documento='$ok'";
								if($result1 = $db->query($sql_name_ref))
								{
									if($row1 = $result1->fetch_assoc())
									{
										$documento = $row["documento"];
										$ok = $row1["nombre"].' '.$row1["apellido"];
									}
									else
									{
										$ok = "Sin Nombre";
										$documento = 'null';
									}
								}
								
							}
						}
						$ref = $ok;
					}
					else
					{
						echo "Error en la busqueda de usuario";						
					}
				}
				else
				{
					$ref = 'null';
					$documento = 'null';
				}
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
						case md5("agregar"):
							echo "<div class='alert alert-danger'>No es posible registrarse, prueba más tarde</div>";
							break;
						case md5("existe"):
							echo "<div class='alert alert-danger'>El usuario ya existe</div>";
							break;
					}
				}
				?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-offset-4 col-md-4">
			<form action="add_user.php" method="post">
				<label for="documento">Documento:</label>
				<input class='form-control' name="documento" type="text" required>
				<label for="password">Contraseña:</label>
				<input class='form-control' type="password" name="password" required>
				<label for="nombre">Nombre:</label>
				<input class='form-control' name="nombre" type="text" required>
				<label for="apellido">Apellido:</label>
				<input class='form-control' name="apellido" type="text" required>
				<label for="celular">Celular:</label>
				<input class='form-control' name="celular" type="text" required>
				<label for="ref">Referido: <?php echo $ref;?></label>
				<input class='form-control' name="ref" type="text" value='<?php echo $documento;?>' readonly required><br>
				<input class='btn btn-primary' type="submit" value='Registrarme'>
				<a href='login.php' class="pull-right btn btn-info">Regresar</a>
			</form>
		</div>
	</div>	
</div>
</body>
</html>