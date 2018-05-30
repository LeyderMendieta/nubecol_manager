<?php include("seguridad.php");
include("layout_up.php");?>
<div class="row">
<?php
$info_rango = "<button type='button' class='pull-right btn btn-default btn-sm' data-toggle='modal' data-target='#myModal' onclick=''>Requisitos</button>

<!-- Modal -->
<div id='myModal' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
        <h4 class='modal-title'>Modal Header</h4>
      </div>
      <div class='modal-body'>
        <p>Some text in the modal.</p>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-default' data-dismiss='modal'>Cerrar</button>
      </div>
    </div>
  </div>
</div>";
	?>
	<div class="col-md-8"><h2>Equipo de trabajo</h2>
  <p>Nuestra comunidad busca aumentar a diario</p> </div>
	<div class="col-md-4">
		<ul class="list-group">
		  <li class="list-group-item active">Rangos</li>
		  <li class="list-group-item" id='li_lider'>Lider <?php echo $info_rango;?></li>
		  <li class="list-group-item" id='li_socio'>Socio</li>
		  <li class="list-group-item" id='li_vendedor'>Vendedor</li>
		  <li class="list-group-item" id='li_aspirante'>Aspirante</li>
		</ul>
	</div>
</div>
           
  <table class="table table-responsive">
    <thead>
      <tr class='active'>
        <th>Nombre</th>
        <th class='lider'>Documento</th>
        <th>Celular</th>
        <th>Rol</th>
        <th>N° Clientes</th>
        <th>.</th>
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
			$celular = stripslashes($row["celular"]);
			$nombre = stripslashes($row["nombre"]);
			$apellido = stripslashes($row["apellido"]);
			$fk_referido = stripslashes($row["fk_referido"]);
			$rol = stripslashes($row["rol"]);
			$documento = stripslashes($row["documento"]);
						
			$n_clientes = 0;
			$sql_count = "SELECT * FROM cliente WHERE fk_vendedor='$documento'";
			if($result2 = $db->query($sql_count))
			{
				while($row2 = $result2->fetch_assoc())
				{
					$n_clientes++;
				}
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
      <tr class='w-70 p-3'>
        <td><?php echo $nombre.' '.$apellido;?></td>
        <td class="lider"><?php echo $documento;?></td>
        <td><?php echo $celular;?></td>	
        <td><?php echo $cargo;?></td>
        <td class='lider'><?php echo $n_clientes;?></td>
        <td class="lider"><a href="modificar_usuario.php?edit=<?php echo md5($documento);?>">Editar</a></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
<?php include("layout_down.php");?>
