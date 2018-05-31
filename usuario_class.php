<?php
class User
{
	
	public $documento;
	public $password;
	public $celular;
	public $nombre;
	public $apellido;
	public $fk_referido;
	public $rol;
	
	function __construct($Documento,$Password,$Celular,$Nombre,$Apellido,$Fk_referido,$Rol)
	{
		$this->documento = $Documento;
		$this->password = $Password;
		$this->celular = $Celular;
		$this->nombre = $Nombre;
		$this->apellido = $Apellido;
		$this->fk_referido = $Fk_referido;
		$this->rol = $Rol;
		
	}
	
	function login()
	{
		session_start();
		include("db.php");
		$login_query = "SELECT * FROM usuario WHERE documento = '$this->documento'";
		
		if(!$result = $db->query($login_query))
		{
			die('error al ejecutar la sentencia '. $db->error.']');
		}
		
		if($row = $result->fetch_assoc())
		{
			$password = stripslashes($row["password"]);
			if($password == md5($this->password))
			{
				$_SESSION["documento"] = $this->documento;
				$_SESSION["password"] = $password;
				$_SESSION["celular"] = stripslashes($row["celular"]);
				$_SESSION["nombre"] = stripslashes($row["nombre"]);
				$_SESSION["apellido"] = stripslashes($row["apellido"]);
				$_SESSION["fk_referido"] = stripslashes($row["fk_referido"]);
				$_SESSION["rol"] = stripslashes($row["rol"]);
				header("Location: index.php");
			}
			else
			{
				header("Location: login.php?error=".md5("password"));				
			}
		}
		else
		{
			header("Location: login.php?error=".md5("usuario"));
		}
		
	}
	
	function logout()
	{
		unset($_SESSION["documento"]);
		unset($_SESSION["password"]);
		unset($_SESSION["celular"]);
		unset($_SESSION["nombre"]);
		unset($_SESSION["apellido"]);
		unset($_SESSION["fk_referido"]);
		unset($_SESSION["rol"]);
		header("Location: login.php?success=".md5("logout"));
	}
	
	function eliminar()
	{
		
	}
}
?>