<?php include("seguridad.php");?>
<?php include("layout_up.php");?>
<form action="add_anuncio.php" method="post" name="form_add_anuncio">
  <div class="form-group">
    <label for="file">Elije la imagen</label>
    <input type="file" class="form-control-file" name='ruta' id="file">
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