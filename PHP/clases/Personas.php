<?php
require_once"accesoDatos.php";
class Persona
{
//--------------------------------------------------------------------------------//
//--ATRIBUTOS
	public $id;
	public $nomusuario;
 	public $clave;
  	public $dni;
  	public $correo;

//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--GETTERS Y SETTERS
  	public function GetId()
	{
		return $this->id;
	}
	public function GetNomusuario()
	{
		return $this->nomusuario;
	}
	public function GetClave()
	{
		return $this->clave;
	}
	public function GetDni()
	{
		return $this->dni;
	}
	public function GetCorreo()
	{
		return $this->correo;
	}

	public function SetId($valor)
	{
		$this->id = $valor;
	}
	public function SetNomusuario($valor)
	{
		$this->nomusuario = $valor;
	}
	public function SetClave($valor)
	{
		$this->clave = $valor;
	}
	public function SetDni($valor)
	{
		$this->dni = $valor;
	}
	public function SetCorreo($valor)
	{
		$this->correo = $valor;
	}
//--------------------------------------------------------------------------------//
//--CONSTRUCTOR
	public function __construct($dni=NULL)
	{
		if($dni != NULL){
			$obj = Persona::TraerUnaPersona($dni);
			
			$this->nomusuario = $obj->nomusuario;
			$this->clave = $obj->clave;
			$this->dni = $dni;
			$this->correo = $obj->correo;
		}
	}

//--------------------------------------------------------------------------------//
//--TOSTRING	
  	public function ToString()
	{
	  	return $this->nomusuario."-".$this->clave."-".$this->dni."-".$this->correo;
	}
//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--METODO DE CLASE
	public static function TraerUnaPersona($idParametro) 
	{	


		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select * from persona where id =:id");
		//$consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerUnaPersona(:id)");
		$consulta->bindValue(':id', $idParametro, PDO::PARAM_INT);
		$consulta->execute();
		$personaBuscada= $consulta->fetchObject('persona');
		return $personaBuscada;	
					
	}
	
	public static function TraerTodasLasPersonas()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select * from persona");
		//$consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerTodasLasPersonas() ");
		$consulta->execute();			
		$arrPersonas= $consulta->fetchAll(PDO::FETCH_CLASS, "persona");	
		return $arrPersonas;
	}
	
	public static function BorrarPersona($idParametro)
	{	
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("delete from persona	WHERE id=:id");	
		//$consulta =$objetoAccesoDato->RetornarConsulta("CALL BorrarPersona(:id)");	
		$consulta->bindValue(':id',$idParametro, PDO::PARAM_INT);		
		$consulta->execute();
		return $consulta->rowCount();
		
	}
	
	public static function ModificarPersona($persona)
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			//$consulta =$objetoAccesoDato->RetornarConsulta("
				//update persona 
				//set nomusuario=:nomusuario,
			//	clave=:clave,
				//correo=:correo,
			//	dni=:dni
			//	WHERE id=:id");
			//$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("UPDATE persona SET nomusuario='$persona->nomusuario', clave='$persona->clave',dni='$persona->dni', correo='$persona->correo' WHERE id='$persona->id'");
			//$consulta =$objetoAccesoDato->RetornarConsulta("CALL ModificarPersona(:id,:nombre,:apellido,:foto)");
			//$consulta->bindValue(':id',$persona->id, PDO::PARAM_INT);
			//$consulta->bindValue(':nombre',$persona->nombre, PDO::PARAM_STR);
			//$consulta->bindValue(':apellido', $persona->apellido, PDO::PARAM_STR);
			//$consulta->bindValue(':foto', $persona->foto, PDO::PARAM_STR);
			return $consulta->execute();
			
	}

//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//

	public static function InsertarPersona($persona)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		//$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into persona (nomusuario,clave,dni,correo)values(:nomusuario,:clave,:dni,:correo)");
		$consulta =$objetoAccesoDato->RetornarConsulta("CALL InsertarPersona (:nomusuario,:clave,:dni,:correo)");
		$consulta->bindValue(':nomusuario',$persona->nomusuario, PDO::PARAM_STR);
		$consulta->bindValue(':clave', $persona->clave, PDO::PARAM_STR);
		$consulta->bindValue(':dni', $persona->dni, PDO::PARAM_STR);
		$consulta->bindValue(':correo', $persona->correo, PDO::PARAM_STR);
		$consulta->execute();		
		return $objetoAccesoDato->RetornarUltimoIdInsertado();
	
				
	}	
//--------------------------------------------------------------------------------//



	public static function TraerPersonasTest()
	{
		$arrayDePersonas=array();

		$persona = new stdClass();
		$persona->id = "4";
		$persona->nomusuario = "rogelio";
		$persona->clave = "agua";
		$persona->dni = "333333";
		$persona->correo = "333333";

		//$objetJson = json_encode($persona);
		//echo $objetJson;
		$persona2 = new stdClass();
		$persona2->id = "5";
		$persona2->nomusuario = "Bañera";
		$persona2->clave = "giratoria";
		$persona2->dni = "222222";
		$persona2->correo = "222222.jpg";

		$persona3 = new stdClass();
		$persona3->id = "6";
		$persona3->nomusuario = "Julieta";
		$persona3->clave = "Roberto";
		$persona3->dni = "888888";
		$persona3->correo = "888888";

		$arrayDePersonas[]=$persona;
		$arrayDePersonas[]=$persona2;
		$arrayDePersonas[]=$persona3;
		 
		

		return  $arrayDePersonas;
				
	}	


}
