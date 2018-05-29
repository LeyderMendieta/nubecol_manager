<?php
class Cliente{
	
	public $nombre;
	public $apellido;
	public $celular;
	public $fk_vendedor;
	public $fk_encargado;
	public $detalle;
	
	public $m_tipo;
	public $m_correo;
	public $m_contra;
	public $m_tiempo;
	public $m_vencimiento;
	public $suscripcion;
	
	function __construct($Nombre,$Apellido,$Celular,$Fk_vendedor,$Fk_encargado,$Detalle,$M_tipo,$M_correo,$M_contra,$M_tiempo,$M_vencimiento,$Suscripcion)
	{
		$this->nombre = $Nombre;
		$this->apellido = $Apellido;
		$this->celular = $Celular;
		$this->fk_vendedor = $Fk_vendedor;
		$this->fk_encargado = $Fk_encargado;
		$this->detalle = $Detalle;
		
		$this->m_tipo = $M_tipo;
		$this->m_correo = $M_correo;
		$this->m_contra = $M_contra;
		$this->m_tiempo = $M_tiempo;
		$this->m_vencimiento = $M_vencimiento;
		$this->suscripcion = $Suscripcion;
	}
	
	function agregar()
	{
		include("db.php");
		$sql_validate = "SELECT * FROM cliente WHERE celular='$this->celular'";
		
		$sql_insert = "INSERT INTO cliente(nombre,apellido,celular,fk_vendedor,fk_encargado,detalle) 
		VALUES ('$this->nombre','$this->apellido','$this->celular','$this->fk_vendedor','$this->fk_encargado','$this->detalle')";
		
		$sql_membresia = "INSERT INTO membresia(tipo,correo,contra,tiempo,vencimiento,cliente,vendedor,suscripcion) 
		VALUES ('$this->m_tipo','$this->m_correo','$this->m_contra','$this->m_tiempo','$this->m_vencimiento','$this->celular','$this->fk_vendedor','$this->suscripcion')";
				
		if(!$resultado = $db->query($sql_validate))
		{
			echo 'ERROR DATABASE modulo, cliente';
		}
		if($resultado->fetch_assoc())
		{
			header("Location: clientes.php?insert=".md5("error"));
		}
		if($db->query($sql_insert) == true)
		{
			if($db->query($sql_membresia) == true)
			{
				header("Location: clientes.php?insert=".md5("success"));
			}
			else
			{
				header("Location: clientes.php?insert=".md5("error_membresia"));
			}			
		}
		else
		{
			header("Location: clientes.php?insert=".md5("error_cliente"));
		}
	}
	
	function eliminar()
	{
		
	}
}
?>