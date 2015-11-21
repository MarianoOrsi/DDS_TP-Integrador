
<?php 


class Visitor{
      	private $accessData;

		public function __construct(){

			$this->accessData = new accesoDatos();

		}


}

class Recomendaciones extends  Visitor{

     public function __construct(){

        $this->accessData = new accesoDatos();

	}

	public function buscar($Preferencia){

		return $this->accessData->getRecomendacionesXPreferencia($Preferencia);
	}

}



class Recetas extends Visitor{

     public function __construct(){

        $this->accessData = new accesoDatos();

	}
	
	public function buscar($Preferencia)
	{
		return $this->accessData->getRecetasXPreferencia($Preferencia);
	}

}

?>