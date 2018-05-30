<?php include("seguridad.php");?>
<?php include("layout_up.php");?>

<div class="row">
  	<div class="col-md-offset-2 col-md-7">
  <h2>Novedades</h2><br> 	
<?php include("db.php");
$sql_novedades = "SELECT * FROM novedades";
if($resultado = $db->query($sql_novedades))
{
	while($fila = $resultado->fetch_assoc())
	{
		//`id`, `creador`, `fecha_creacion`, `titulo`, `descripcion`
		$creador = $fila["creador"];
		$fecha_creacion = stripslashes($fila["fecha_creacion"]);
		$titulo = $fila["titulo"];
		$descripcion = $fila["descripcion"];
		echo "<hr><h4>$titulo<div class='pull-right'><small>$creador $fecha_creacion</small></div></h4>";
		echo "<p>$descripcion</p>";
	}
}?>

</div>
  </div>
  
<?php include("layout_down.php");?>


