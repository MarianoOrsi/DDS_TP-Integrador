<?php
    include("../clases/Usuario.php");
    include("../clases/RecomendacionesRecetas.php");
    include("../Datos/RecomendacionesRecetasDatos.php");	

if(isset($_GET["method"]))
{
	$method = $_GET["method"];
	$logicaDeNegocio = new logicaDeNegocio();

	if(strcmp($method, "RECETAS") == 0){
	   $logica->selectRecetasXPreferencia();
    }elseif(strcmp($method, "RECOM") == 0){
	   $logica->selectRecomendacionesXPreferencia();
	}
}

	
	class logicaDeNegocio{

		private $accessData;

		public function __construct(){

			$this->accessData = new accesoDatos();

		}
		
	   public function selectRecetasXPreferencia(){

            
	       	$usuario = $this->accessData->getUsuario($_SESSION["idUsuario"]);
			
            $visitor = new Recetas();  

            return $usuario->buscar($visitor);

		}
		
      public function selectRecomendacionesXPreferencia(){

            $visitor;

	       	$usuario = $this->accessData->getUsuario($_SESSION["idUsuario"]);
			
			$visitor = new Recomendaciones();  

            return $usuario->buscar($visitor);

		}
		


	}
?>