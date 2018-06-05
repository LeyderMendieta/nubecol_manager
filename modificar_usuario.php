<?php
include("seguridad_lider.php");
include("layout_up.php");
include("db.php");
if(isset($_GET["edit"]))
{
	$query_fetch = "SELECT documento FROM usuario";
	if($fetch = $db->query($query_fetch))
	{
		while($validate = $fetch->fetch_assoc())
		{
			if($_GET["edit"] = md5($validate["documento"]))
			{
				$documento = $validate["documento"];
			}
		}
	}
	if($documento == $_SESSION["documento"])
	{
		$back = "location.href='index.php'";
	}
	else{
		$back = "equipo.php";
	}
	if(isset($_GET["update"]))
	{
		switch($_GET["onvalidate"])
		{
			case md5("updated"):
				echo "<div class='alert alert-success'>Se ha actualizado tu información</div>";
				break;
			default:
				break;
		}
	}
}
$query_usuario = "SELECT * FROM usuario WHERE documento='$documento'";
if($resultado = $db->query($query_usuario))
{
	while($row = $resultado->fetch_assoc())
	{
		$nombre = stripslashes($row["nombre"]);
		$apellido = stripslashes($row["apellido"]);
		$documento = stripslashes($row["documento"]);
		$celular = stripslashes($row["celular"]);
		$rol = stripslashes($row["rol"]);
		switch($rol)
		{
			case 1:
				$select = "<option value='1' selected='selected'>Lider</option>
						<option value='2'>Socio</option>
						<option value='3'>Vendedor</option>
						<option value='4'>Aspirante</option>";
				break;
			case 2:
				$select = "<option value='1'>Lider</option>
						<option value='2' selected='selected'>Socio</option>
						<option value='3'>Vendedor</option>
						<option value='4'>Aspirante</option>";
				break;
			case 3:
				$select = "<option value='1'>Lider</option>
						<option value='2'>Socio</option>
						<option value='3' selected='selected'>Vendedor</option>
						<option value='4'>Aspirante</option>";
				break;
			case 4:
				$select = "<option value='1'>Lider</option>
						<option value='2'>Socio</option>
						<option value='3'>Vendedor</option>
						<option value='4' selected='selected'>Aspirante</option>";
				break;
		}
	}
}

?>
<div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Modificar Usuario</h3>
			 			</div>
			 			<div class="panel-body">		    			
			    		<form action='mod_usuario.php' method="post" role="form">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">Nombre
			                <input type="text" name="nombre" onkeypress="mayus(this);" onchange="mayus(this);" id="nombre" class="form-control input-sm" 
			                value="<?php echo $nombre;?>" required>
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">Apellido
			    						<input type="text" onkeypress="mayus(this);" onchange="mayus(this);" name="apellido" id="apellido" class="form-control input-sm" 
			    						value="<?php echo $apellido;?>" required>
			    					</div>
			    				</div>
			    			</div>
			    			<div class="row admin">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">Documento
			    						<input type="text" name="documento" id="documento" class="form-control input-sm"
			    						value="<?php echo $documento;?>" pattern="[0-9]+" title="Solo Numeros" readonly required>
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">Celular
			    						<input type="text" name="celular" id="celular" class="form-control input-sm" 
			    						value="<?php echo $celular;?>" pattern="[0-9]+" required>
			    					</div>
			    				</div>
			    			</div>
			    			<div class="row admin">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">Rol
			    						<select name="rol" id="rol" class="form-control">
			    							<?php echo $select;?>
			    						</select>
			    					</div>
			    				</div>
			    			</div>
			    						    			
			    			<input type="submit" value="Actualizar" class="btn btn-success btn-block">			    			
			    		
			    		</form>
			    		<button class="btn btn-info btn-block" onClick="<?php echo $back;?>">Regresar</button>
			    	</div>
	    		</div>
    		</div>
    	</div>

<?php include("layout_down.php");?>