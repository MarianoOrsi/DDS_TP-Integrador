
<?php 


class Visitor{
      	private $accessData;

		public function __construct(){

			$this->accessData = new accesoDatosRecomendaciones();

		}


}

class Recomendaciones extends  Visitor{

     public function __construct(){

        $this->accessData = new accesoDatosRecomendaciones();

	}

	public function buscar($Preferencia){

		return $this->accessData->getRecomendacionesXPreferencia($Preferencia);
	}

}



class Recetas extends Visitor{

     public function __construct(){

        $this->accessData = new accesoDatosRecomendaciones();

	}
	
	public function buscar($Preferencia)
	{
		return $this->accessData->getRecetasXPreferencia($Preferencia);
	}

}

?>