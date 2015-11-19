<?php 

include "../Datos/RecomendacionesRecetasDatos.php"

class Visitor{
      	private $accessData;

		public function __construct(){

			$this->accessData = new accesoDatos();

		}
}

class Recomendaciones extends Visitor{

	public function buscar($Preferencia)
	{
		return $this->accessData->getRecomendacionesXPreferencia($Preferencia->getIdPreferencia);	
	}

}


class Recetas extends Visitor{

	public function buscar($Preferencia)
	{
		return $this->accessData->getRecetasXPreferencia($Preferencia->getIdPreferencia);	
	}

}




?>