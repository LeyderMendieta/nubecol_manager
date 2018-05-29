<?php include("seguridad.php");
include("layout_up.php");?>
<div class="row">
	<div class="col-md-8"><h2>Equipo de trabajo</h2>
  <p>Nuestra comunidad busca aumentar a diario</p> </div>
	<div class="col-md-4">
		<ul class="list-group">
		  <li class="list-group-item active">Rangos</li>
		  <li class="list-group-item">Lider</li>
		  <li class="list-group-item">Socio</li>
		  <li class="list-group-item">Vendedor</li>
		  <li class="list-group-item">Aspirante</li>
		</ul>
	</div>
</div>
           
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Celular</th>
        <th>Rol</th>
        <th>N° Clientes</th>
      </tr>
    </thead>
    <tbody>
     
	<?php
		include("db.php");
		$query_usuario = "SELECT * FROM usuario";
		if(!$result = $db->query($query_usuario))
		{
			die('error al ejecutar la sentencia ['.$db->error.']');
		}
		while($row = $result->fetch_assoc())
		{  
			$n_clientes = 0;
			$celular = stripslashes($row["celular"]);
			$nombre = stripslashes($row["nombre"]);
			$apellido = stripslashes($row["apellido"]);
			$fk_referido = stripslashes($row["fk_referido"]);
			$rol = stripslashes($row["rol"]);
			$documento = stripslashes($row["documento"]);
			$sql_count = "SELECT count(nombre) FROM cliente WHERE fk_vendedor='$documento'";
			if(!$result2 = $db->query($sql_count))
			{
				die('error al ejecutar la sentencia ['.$db->error.']');
			}
			while($row = $result2->fetch_assoc())
			{
				$n_clientes++;
			}
			switch($rol)
			{
				case 1:
					$cargo = "Lider";
					break;
				case 2:
					$cargo = "Socio";
					break;
				case 3:
					$cargo = "Vendedor";
					break;
				case 4:
					$cargo = "Aspirante";
					break;
			}
		?>
      <tr>
        <td><?php echo $nombre.' '.$apellido;?></td>
        <td><?php echo $celular;?></td>
        <td><?php echo $cargo;?></td>
        <td><?php echo $n_clientes;?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
<?php include("layout_down.php");?>
