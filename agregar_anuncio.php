<?php include("seguridad.php");?>
<?php include("layout_up.php");?>
<?php
   if(isset($_FILES['image'])){
		  $errors= array();
		  $file_name = $_FILES['image']['name'];
		  $file_size =$_FILES['image']['size'];
		  $file_tmp =$_FILES['image']['tmp_name'];
		  $file_type=$_FILES['image']['type'];
		  $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

		  $expensions= array("jpeg","jpg","png");

		  if(in_array($file_ext,$expensions)=== false){
			 $errors = "extension not allowed, please choose a JPEG or PNG file.";
		  }

		  if($file_size > 2097152){
			 $errors = 'File size must be excately 2 MB';
		  }

		  if(empty($errors)==true)
		  {
			 move_uploaded_file($file_tmp,"img/files/".$file_name);
			 echo "Success";
		  }
		  else
		  {
			 print_r($errors);
		  }
   	}
	else{
		echo "unset";
	}
?>
<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="file">Elije la imagen</label>
    <input type="file" class="form-control-file" name='image'>
  </div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="tipo" id="exampleRadios1" value="netflix" checked>
  <label class="form-check-label">Netflix</label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="tipo" id="exampleRadios2" value="spotify">
  <label class="form-check-label">Spotify</label>
	</div>
  <input class='btn btn-success' type="submit" value='agregar'>
</form>  
			
<?php include("layout_down.php");?>