<?php
    include("./Datos/10MejoresRecetasDatos.php");	
if(isset($_GET["method"]))
{
	$method = $_GET["method"];
	$logicaDeNegocio = new logicaDeNegocio();

	if(strcmp($method, "ACEPTADAS") == 0){
	   $logica->selectRecetasAceptadas();
    }elseif(strcmp($method, "RECOM") == 0){
	   $logica->selectRecomendacionesXPreferencia();
	}
}

	
	class logicaDeNegocio{

		private $accessData;

		public function __construct(){

			$this->accessData = new accesoDatos();

		}
		
	   public function selectRecetasAceptadas(){

            return $this->accessData->GetRecetasXAccion($_SESSION["idUsuario"],"1");

		}
		
	   public function selectRecetasCalificadas(){

            return $this->accessData->GetRecetasXAccion($_SESSION["idUsuario"],"2");

		}
		
	    public function selectRecetasConsultadas(){

            return $this->accessData->GetRecetasXAccion($_SESSION["idUsuario"],"3");

		}

		


	}
?>