<?php include("seguridad_login.php");?>
<!DOCTYPE html>
 <html>
 <head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<head>
<meta charset="utf-8">
<title>Login</title>
</head>
<body>
<div class="content">
	<div class="row center-block">
		<div class="col-md-5 offset-md-5">
		<?php if(isset($_GET["error"]) and $_GET["error"] == md5("usuario")){echo "<span class='text-danger'>El usuario no se encuentra</span>";}
			if(isset($_GET["error"]) and $_GET["error"] == md5("password")){echo "<span class='text-danger'>Contraseña incorrecta</span>";}?>
			<form action="login_query.php" method="post">
				<label for="documento">Documento:</label>
				<input class='form-control' name="documento" type="text" required>
				<label for="password">Contraseña:</label>
				<input class='form-control' type="password" name="password" required>

				<input class='btn btn-primary' type="submit" value='ingresar'>
			</form>
		</div>
	</div>	
</div>
</body>
</html>