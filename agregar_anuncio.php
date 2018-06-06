<?php include("seguridad.php");?>
<?php include("layout_up.php");?>
<?php
   if(isset($_FILES['image'])){
	   include("db.php");
	   $nombre_carpeta = "./anuncio/".$_SESSION["documento"]."/";
		if(!is_dir($nombre_carpeta)){ 
			if(!mkdir($nombre_carpeta,0700,true))
			{
				die("fallo al crear carpeta");
			}
		}else;
		  $errors= array();
		  $file_name = $_FILES['image']['name'];
		  $file_size =$_FILES['image']['size'];
		  $file_tmp =$_FILES['image']['tmp_name'];
		  $file_type=$_FILES['image']['type'];
	   	  $file_ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
		  //$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

		  $expensions= array("jpeg","jpg","png");

		  if(in_array($file_ext,$expensions)=== false){
			 $errors = "Archivo invalido,  archivos validos JPEG, JPG o PNG";
		  }

		  if($file_size > 2097152){
			 $errors = 'El archivo no debe superar 2 MB';
		  }
	   		$now = date("j_m_Y_");
	   
		   if(is_dir($nombre_carpeta.$now.$file_name))
		   {
			   $errors = "este archivo ya existe, cambia el nombre";
		   }

		  if(empty($errors)==true)
		  {			 
			 move_uploaded_file($file_tmp,$nombre_carpeta.$now.$file_name);
			 $ruta = $nombre_carpeta.$now.$file_name;
			 $usuario = $_SESSION["documento"];
			 $tipo = $_POST["tipo"];
			 $sql_anuncio = "INSERT INTO anuncio(ruta,tipo,usuario,state) VALUES ('$ruta','$tipo','$usuario',1)";
			 if($db->query($sql_anuncio) == true)
			 {
				 header("Location: anuncios.php?success=insert");
			 }
			 else
			 {
				 echo "<div class='alert alert-danger' role='alert'><i class='glyphicon glyphicon-remove'></i>No se pudo agregar el anuncio!</div>";
			 }			
		  }
		  else
		  {
			 echo "<div class='alert alert-danger' role='alert'><i class='glyphicon glyphicon-remove'></i>$errors</div>";
		  }
   	}
?>
<script>function validateEmpty(id){state}</script>
<div class="row centered-form">
	<div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
		<form action="" method="post" enctype="multipart/form-data">
		  <div class="form-group">
			<label for="file">Elije la imagen</label>
			<input type="file" class="form-control-file" name='image' id='image'>
		  </div>

		<div class="form-check">
		  <input class="form-check-input" type="radio" name="tipo" id="exampleRadios1" value="netflix" checked>
		  <label class="form-check-label">Netflix</label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" type="radio" name="tipo" id="exampleRadios2" value="spotify">
		  <label class="form-check-label">Spotify</label>
			</div>
		  <input class='btn btn-primary' type="submit" onclick="validateEmpty('#image');" value='agregar'>
		  <a class='btn btn-info pull-right' href='anuncios.php'>Regresar</a>
		</form>
	</div>
</div>
			
<?php include("layout_down.php");?>