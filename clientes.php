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
				$text = "El cliente ya existe";
				$type = "text-danger";
				break;
			case md5("success"):
				$text = "Se ha registrado con existe el nuevo cliente";
				$type = "text-success";
				break;
			case md5("error_membresia"):
				$text = "Error al agregar la membresia para el cliente";
				$type = "text-danger";
				break;
			case md5("error_cliente"):
				$text = "Error al registrar el cliente";
				$type = "text-danger";
				break;
			default:
				break;
		}
		echo "<span class='$type'>$text</span>";
	}

	?>
  <p>Gestiona tus clientes en periodos mes a mes</p>            
  <table class="table table-condensed">
    <thead>
      <tr class='active'>
        <th>Nombre</th>
        <th>Celular</th>
        <th>Correo</th>
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