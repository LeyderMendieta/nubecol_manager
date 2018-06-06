<?php include("seguridad_lider.php");
include("layout_up.php");?>
<h2>Clientes Pendientes</h2>
 <?php
	if(isset($_GET["update"]))
	{
		switch($_GET["update"])
		{
			case md5("error_c"):
				echo "<div class='alert alert-danger' role='alert'>Problemas en el cliente, intenta más tarde</div>";
				break;
			case md5("error_m"):
				echo "<div class='alert alert-danger' role='alert'>Problemas en la membresia, intenta más tarde</div>";
				break;
			case md5("success"):
				echo "<div class='alert alert-success' role='alert'>Se ha realiza la respectiva modificación</div>";
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
        <th>Fecha Inclusión</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
     
	<?php
		include("db.php");
		$vendedor = $_SESSION["documento"];
		$query_cliente = "SELECT * FROM cliente ORDER BY fecha_creacion DESC";
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
			$fecha = $row["fecha_creacion"];
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
        <td><?php echo $fecha;?></td>
        <td><a href="pendiente_cliente.php?client=<?php echo md5($celular);?>&user=<?php echo md5($_SESSION["documento"]);?>" >
        <button class="btn btn-success">
        	<i class='glyphicon glyphicon-eye-open'></i>
        Revisar
        </button></a></td>
      </tr>
      <?php
			}
		}
		?>
    </tbody>
  </table>
<?php include("layout_down.php");?>