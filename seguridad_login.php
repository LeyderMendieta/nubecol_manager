<?php
session_start();
if(isset($_SESSION["usr_login"]))
{
	header("Location: index.php");
}

?>