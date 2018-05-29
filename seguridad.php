<?php
session_start();
if(!isset($_SESSION["documento"]))
{
	header("Location: login.php");
}
?>