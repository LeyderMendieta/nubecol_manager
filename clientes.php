<?php
include("seguridad.php");
include("layout_up.php");
?>
<a class='btn btn-info' href="agregar_cliente.php">Agregar Cliente</a>
<h2>Mis Clientes</h2>
 <?php
	if(isset($_GET["insert"]))
	{
		switch($_GET["insert"])
		{
			case md5("error"):
				echo "<div class='alert alert-danger' role='alert'>El cliente ya existe</div>";
				break;
			case md5("success"):
				echo "<div class='alert alert-success' role='alert'>Se ha registrado con existe el nuevo cliente</div>";
				break;
			case md5("error_membresia"):
				echo "<div class='alert alert-danger' role='alert'>Error al agregar la membresia para el cliente</div>";
				break;
			case md5("error_cliente"):
				echo "<div class='alert alert-danger' role='alert'>Error al registrar el cliente</div>";
				break;
			default:
				break;
		}
	}
	if(isset($_GET["update"]))
	{
		switch($_GET["insert"])
		{
			case md5("error"):
				echo "<div class='alert alert-danger' role='alert'>Se ha presentado un problema en el sistema, intenta de nuevo</div>";
				break;
			case md5("success"):
				echo "<div class='alert alert-success' role='alert'>Se ha actualizado la información del cliente</div>";
				break;
			default:
				break;
		}
	}

	?>
  <p>Gestiona tus clientes en periodos mes a mes</p>            
  <table class="table table-condensed">
    <thead>
      <tr class='active'>
        <th>Nombre</th>
        <th>Celular</th>
        <th>Correo</th>
        <th>Contraseña</th>
        <th>Membresia</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
     
	<?php
		include("db.php");
		$vendedor = $_SESSION["documento"];
		$query_cliente = "SELECT * FROM cliente WHERE fk_vendedor='$vendedor'";
		if(!$result = $db->query($query_cliente))
		{
			die('error al ejecutar la sentencia ['.$db->error.']');
		}
		while($row = $result->fetch_assoc())
		{
			$nombre = stripslashes($row["nombre"]);
			$apellido = stripslashes($row["apellido"]);
			$celular = stripslashes($row["celular"]);
			$fk_vendedor = stripslashes($row["fk_vendedor"]);
			$fk_encargado = stripslashes($row["fk_encargado"]);
			$detalle = stripslashes($row["detalle"]);
			$query_membresia = "SELECT * FROM membresia WHERE cliente='$celular'";
			if(!$result2 = $db->query($query_membresia))
			{
				die('error al ejecutar la sentencia '. $db->error.']');
			}
			
			while($row2 = $result2->fetch_assoc())
			{
				$id_membresia = stripslashes($row2["id"]);
				$tipo = stripslashes($row2["tipo"]);
				$correo = stripslashes($row2["correo"]);
				$contra = stripslashes($row2["contra"]);
				$tiempo = stripslashes($row2["tiempo"]);
				$vencimiento = stripslashes($row2["vencimiento"]);
				$suscripcion = stripslashes($row2["suscripcion"]);
				$membresia = '<strong>'.$suscripcion.'</strong> Vence: '.$vencimiento;
			
		?>
      <tr>
        <td><?php echo $nombre.' '.$apellido;?></td>
        <td><?php echo $celular;?></td>
        <td><?php echo $correo;?></td>
        <td><?php echo $contra;?></td>
        <td><?php echo $membresia;?></td>
        <td><a href="modificar_cliente.php?client=<?php echo md5($celular);?>&user=<?php echo md5($_SESSION["documento"]);?>" >
        <button class="btn btn-info">
        	<i class='glyphicon glyphicon-eye-open'></i>
        Ver
        </button></a></td>
      </tr>
      <?php
			}
		}
		?>
    </tbody>
  </table>

<?php include("layout_down.php");?>