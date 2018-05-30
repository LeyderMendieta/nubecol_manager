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
			if($_GET["client"] == md5($validate["celular"]) && $_GET["user"] == md5($validate["fk_vendedor"]))
			{
				$celular = $validate["celular"];
				$nombre = $validate["nombre"];
				$apellido = $validate["apellido"];
				$detalle = $validate["detalle"];
				$fecha_creacion = $validate["fecha_creacion"];
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
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Modificar Cliente</h3>
			 			</div>
			 			<div class="panel-body">		    			
			    		<form action='mod_cliente.php' method="post" role="form">
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
			    					<div class="form-group"><strong>Celular</strong><br>
			    						<span class='text-info'><?php echo $celular;?></span>
			    					</div>
			    				</div>
			    				<div class="col-xs-12 col-sm-12 col-md-12">
			    					<div class="form-group"><strong>Detalle</strong><br>
										<span class='text-info'><?php echo $detalle;?></span>    						
			    					</div>
			    				</div>
			    			</div>
			    			<div class="row admin">
			    				<div class="col-xs-12 col-sm-12 col-md-12">
			    					<div class="form-group">Fecha de Inclusion:
										<span class='text-info'><?php echo $fecha_creacion;?></span>
			    					</div>
			    				</div>
			    			</div>
			    						    			
			    			<input type="submit" value="Actualizar" class="btn btn-success btn-block">			    			
			    		
			    		</form>
			    		<button class="btn btn-info btn-block" onClick="history.back()">Regresar</button>
			    	</div>
	    		</div>
    		</div>
    	</div>

<?php include("layout_down.php");?>