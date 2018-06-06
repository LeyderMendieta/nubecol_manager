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
		else
		{
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
		
	}
	
	function modificar($rol)
	{
		include("db.php");
		if($rol == true)
		{
			$sql_update = "UPDATE cliente SET nombre='$this->nombre',apellido='$this->apellido',fk_vendedor='$this->fk_vendedor',detalle='$this->detalle' WHERE celular='$this->celular'";
			if($db->query($sql_update) == true)
			{
				$sql_update_2 = "UPDATE membresia SET tipo='$this->m_tipo',correo='$this->m_correo',contra='$this->m_contra',
				tiempo='$this->m_tiempo',vencimiento='$this->m_vencimiento',vendedor='$this->fk_vendedor',suscripcion='$this->suscripcion'
				WHERE cliente='$this->celular'";
				if($db->query($sql_update_2) == true)
				{
					header("Location: pendiente.php?update=".md5("success"));
				}
				else
				{
					header("Location: pendiente.php?update=".md5("error_m"));
				}				
			}
			else
			{
				header("Location: pendiente.php?update=".md5("error_c"));
			}
		}
		else
		{
			$sql_update = "UPDATE cliente SET nombre='$this->nombre',apellido='$this->apellido' WHERE celular='$this->celular'";
			if($db->query($sql_update) == true)
			{
				header("Location: clientes.php?update=".md5("success"));
			}
			else
			{
				header("Location: clientes.php?update=".md5("error"));
			}
		}
	}
	
	function eliminar()
	{
		
	}
}
?>