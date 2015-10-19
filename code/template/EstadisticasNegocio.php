<?php

    include("EstadisticasDatos.php");	

if(isset($_GET["method"]))
{
	$method = $_GET["method"];
	$logicaDeNegocio = new logicaDeNegocio();

	if(strcmp($method, "SEL") == 0){

	   $dificultad = $_GET["dificultad"];
	   $sexo       = $_GET["sexo"];
	   $logica->selectRecetas($dificultad,$sexo);
    }
}

	
	class logicaDeNegocio{

		private $accessData;

		public function __construct(){

			$this->accessData = new accesoDatos();

		}

		public function getDificultades(){
			
			$arrayDificultades =  $this->accessData->getDificultades();

			return $arrayDificultades;
		}
		
	   public function selectRecetas($dificultad,$sexo){
			
			$arrayRecetas =  $this->accessData->selectRecetas($dificultad,$sexo);

			return $arrayRecetas;
		}
		


	}
?>