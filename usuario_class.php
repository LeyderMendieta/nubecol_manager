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
	
	function registro()
	{
		session_start();
		include("db.php");
		$sql_validate_documento = "SELECT * FROM usuario WHERE documento='$this->documento'";
		if($result = $db->query($sql_validate_documento))
		{
			if($row = $result->fetch_assoc)
			{
				header("location: registro.php?error=".md5("existe"));
			}
		}
		$sql_add_user = "INSERT INTO usuario(documento,password,celular,nombre,apellido,fk_referido,rol) VALUES ('$this->documento','$this->password','$this->celular','$this->nombre','$this->apellido','$this->fk_referido','$this->rol')";
		if($db->query($sql_add_user) == true)
		{
			$_SESSION["documento"] = $this->documento;
			$_SESSION["password"] = $this->password;
			$_SESSION["celular"] = $this->celular;
			$_SESSION["nombre"] = $this->nombre;
			$_SESSION["apellido"] = $this->apellido;
			$_SESSION["fk_referido"] = $this->fk_referido;
			$_SESSION["rol"] = $this->rol;
			header("Location: index.php");
		}
		else
		{
			header("Location: registro.php?error=".md5("agregar"));
		}
	}
	
	function modificar()
	{
		include("db.php");
		if($this->rol != '')
		{
			$rol = ",rol=".$this->rol;
		}
		else
		{
			$rol = '';
		}
		$sql_update = "UPDATE usuario SET celular='$this->celular',nombre='$this->nombre',apellido='$this->apellido'".$rol." WHERE documento='$this->documento'";
		if($db->query($sql_update) == true)
		{
			if($_SESSION["documento"] == $this->documento)
			{
				$_SESSION["celular"] = $this->celular;
				$_SESSION["nombre"] = $this->nombre;
				$_SESSION["apellido"] = $this->apellido;
				$_SESSION["rol"] = $this->rol;
				header("Location: modificar_usuario.php?edit=".md5($_SESSION["documento"])."&update=true&onvalidate=".md5("updated"));
			}
			else
			{
				header("Location: equipo.php?edit=".md5("success"));	
			}
		}
		else
		{
			header("Location: equipo.php?edit=".md5("error"));
		}
	}
}
?>