<?php include("seguridad.php");?>
<?php include("layout_up.php");?>
 <div class="row">
        <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="gallery-title">Anuncios</h1>
        </div>
        <div align="center">
            <button class="btn btn-default filter-button" data-filter="all">Todo</button>
            <button class="btn btn-default filter-button" data-filter="spotify">Spotify</button>
            <button class="btn btn-default filter-button" data-filter="netflix">Netflix</button>
            <button class='btn btn-info link-add' onclick='goto_add()'>Agregar</button>
        </div>
	 	<?php if(isset($_GET["success"])){
			$success = "El anuncio ha sido importado";
			echo "<div class='alert alert-success' role='alert'><i class='glyphicon glyphicon-ok'></i>$success</div>";
		}?>
        <br/>
        	<?php include("db.php");
			 $usuario = $_SESSION["documento"];
			 $sql_image = "SELECT * FROM anuncio WHERE usuario = '$usuario'";
			 if(!$result = $db->query($sql_image))
			 {
				 echo "Error, Sin servicio en nuestro SERVER";
			 }
			 while($row = $result->fetch_assoc())
			 {
				 $image = stripslashes($row["ruta"]);
				 $tipo = stripslashes($row["tipo"]);
				 echo "<div class='gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter $tipo'>
						<img src='$image' class='img-responsive'>
					</div>";
			 }
			 ?>
        </div>
    </div>
<?php include("layout_down.php");?>