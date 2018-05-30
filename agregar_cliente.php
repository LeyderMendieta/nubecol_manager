<?php include("seguridad.php");?>
<?php include("layout_up.php");?>
<div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Nuevo Cliente</h3>
			 			</div>
			 			<div class="panel-body">		    			
			    		<form action='add_cliente.php' method="post" role="form">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Nombre" required>
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="apellido" id="apellido" class="form-control input-sm" placeholder="apellido" required>
			    					</div>
			    				</div>
			    			</div>
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="text" name="celular" id="celular" class="form-control input-sm" placeholder="N° celular" required>
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<select class="form-control" name="tipo" id="tipo" required>
			    						<?php
											include("db.php");
											$sql_tipo = "SELECT * FROM tipo_cuenta";
											if($result = $db->query($sql_tipo))
											{
												while($row = $result->fetch_assoc())
												{
													$id = $row["id"];
													$suscripcion = $row["categoria"];
													$tiempo = $row["tiempo"];
													$vencimiento = $row["vencimiento"];
													echo "<option value='$id'>$suscripcion $tiempo</option>";
												}
											}
										?>			    							
			    						</select>
			    					</div>
			    				</div>
			    			</div>
			    			<div class="row admin">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="email" name="correo" id="correo" class="form-control input-sm" placeholder="Correo" required>
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="contra" id="contra" class="form-control input-sm" placeholder="Contraseña" required>
			    					</div>
			    				</div>
			    			</div>
			    			<div class="row">
			    				<div class="col-xs-12 col-sm-12 col-md-12">
			    					<div class="form-group">
			    					<textarea name="detalle" id="detalle" cols="44" rows="5"></textarea>
			    					</div>
			    				</div>
			    			</div>
			    			
			    			<input type="submit" value="Agregar Cliente" class="btn btn-info btn-block">
			    		
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
<?php include("layout_down.php");?>