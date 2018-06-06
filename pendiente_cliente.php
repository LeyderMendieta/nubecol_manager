<?php
include("seguridad_lider.php");
include("layout_up.php");
include("db.php");
if(isset($_GET["client"]) && isset($_GET["user"]))
{
	$query_fetch = "SELECT * FROM cliente";
	if($fetch = $db->query($query_fetch))
	{
		while($validate = $fetch->fetch_assoc())
		{
			if($_GET["client"] == md5($validate["celular"]) && $_GET["user"] == md5($_SESSION["documento"]))
			{
				$celular = $validate["celular"];
				$nombre = $validate["nombre"];
				$apellido = $validate["apellido"];
				$detalle = $validate["detalle"];
				$fecha_creacion = $validate["fecha_creacion"];
				$query_membresia = "SELECT * FROM membresia WHERE cliente='$celular'";
				if(!$result2 = $db->query($query_membresia))
				{
					die('error al ejecutar la sentencia ['.$db->error.']');
				}

				while($row2 = $result2->fetch_assoc())
				{
					//`id`, `tipo`, `correo`, `contra`, `tiempo`, `vencimiento`, `cliente`, `vendedor`, `suscripcion`, `fecha_creacion
					$id = stripslashes($row2["id"]);
					$tipo = stripslashes($row2["tipo"]);
					$correo = stripslashes($row2["correo"]);
					$contra = stripslashes($row2["contra"]);
					$tiempo = stripslashes($row2["tiempo"]);
					$vencimiento = stripslashes($row2["vencimiento"]);
					$cliente = $row2["cliente"];
					$vendedor = $row2["vendedor"];
					$suscripcion = stripslashes($row2["suscripcion"]);
				}
			}
		}
		if(!isset($nombre))
		{
			header("Location: clientes.php");
		}
	}
}
else
{
	header("Location: clientes.php");
}
?>
<script>
	function mayus(e) {var tecla=e.value;e.value =tecla.toUpperCase();}
</script>
<div class="row centered-form">
        <div class="col-md-offset-3 col-md-6">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Modificar Cliente</h3>
			 			</div>
			 			<div class="panel-body">		    			
			    		<form action="mod_cliente.php?target=<?php echo md5($_SESSION["documento"]);?>" method="post" role="form">
			    			<div class="row">
			    				<div class="col-xs-4 col-sm-4 col-md-4">
			    					<div class="form-group"><strong>Nombre</strong>
			               			 <input type="text" name="nombre" onkeypress="mayus(this);" onchange="mayus(this);" id="nombre" class="form-control input-sm" value="<?php echo $nombre;?>" required>
			    					</div>
			    				</div>
			    				<div class="col-xs-4 col-sm-4 col-md-4">
			    					<div class="form-group"><strong>Apellido</strong>
			    						<input type="text" onkeypress="mayus(this);" onchange="mayus(this);" name="apellido" id="apellido" class="form-control input-sm" value="<?php echo $apellido;?>" required>
			    					</div>
			    				</div>
			    				<div class="col-xs-4 col-sm-4 col-md-4">
			    					<div class="form-group"><strong>Celular</strong><br>
			    						<input type="number" name="celular" id="celular" class="form-control input-sm" 
			    						value="<?php echo $celular;?>" readonly>
			    					</div>
			    				</div>
			    			</div>
			    			<div class="row">			    				
			    				<div class="col-xs-4 col-sm-4 col-md-4">
			    					<div class="form-group"><strong>Tipo</strong><br>
			    						<input type="number" name="tipo" id="tipo" class="form-control input-sm" 
			    						value="<?php echo $tipo;?>" required>
			    					</div>
			    				</div>
			    				<div class="col-xs-4 col-sm-4 col-md-4">
			    					<div class="form-group"><strong>Correo</strong><br>
			    						<input type="email" name="correo" id="correo" class="form-control input-sm" 
			    						value="<?php echo $correo;?>" required>
			    					</div>
			    				</div>
			    				<div class="col-xs-4 col-sm-4 col-md-4">
			    					<div class="form-group"><strong>Contraseña</strong><br>
			    						<input type="text" name="contra" id="contra" class="form-control input-sm" 
			    						value="<?php echo $contra;?>" required>
			    					</div>
			    				</div>			    				
			    			</div>
			    			<div class="row">
			    				<div class="col-xs-4 col-sm-4 col-md-4">
			    					<div class="form-group"><strong>Tiempo</strong><br>
										<input type="text" name="tiempo" id="tiempo" class="form-control input-sm" 
			    						value="<?php echo $tiempo;?>" required>    						
			    					</div>
			    				</div>
			    				<div class="col-xs-4 col-sm-4 col-md-4">
			    					<div class="form-group"><strong>Vencimiento</strong><br>
										<input type="text" name="vencimiento" id="vencimiento" class="form-control input-sm" 
			    						value="<?php echo $vencimiento;?>" required>    						
			    					</div>
			    				</div>
			    				<div class="col-xs-4 col-sm-4 col-md-4">
			    					<div class="form-group"><strong>Suscripción</strong><br>
			    					<input type="text" class="form-control" name='suscripcion' value="<?php echo $suscripcion;?>">
			    					</div>
			    				</div>
			    			</div>
			    			<div class="row">
			    				<div class="col-xs-4 col-sm-4 col-md-4">
			    					<div class="form-group"><strong>Vendedor</strong><br>
			    					<input type="text" class="form-control" name='vendedor' value="<?php echo $vendedor;?>">
			    					</div>
			    				</div>
			    				<div class="col-xs-8 col-sm-8 col-md-8">
			    					<div class="form-group"><strong>Detalle</strong><br>
										<input type="text" name="detalle" id="detalle" class="form-control input-sm" 
			    						value="<?php echo $detalle;?>" required>    						
			    					</div>
			    				</div>			    				
			    			</div>
			    			<div class="row">			    				
			    				<div class="col-xs-12 col-sm-12 col-md-12">
			    					<div class="form-group">Fecha de Inclusion:
										<span class='text-info'><?php echo $fecha_creacion;?></span>
			    					</div>
			    				</div>
			    			</div>
			    			<div class="row">
			    				<div class="col-md-3 ">
			    					<input type="submit" value="Actualizar" class="btn btn-success btn-block">	
			    				</div>
			    				<div class="col-md-offset-6 col-md-3">			    					
			    					<a class="btn btn-info btn-block" href='pendiente.php'>Regresar</a>
			    				</div>
			    			</div>
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>

<?php include("layout_down.php");?>