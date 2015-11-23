<?php

    include("../datos/EstadisticasDatos.php");	

if(isset($_GET["method"]))
{
	$method = $_GET["method"];
	$logicaDeNegocio = new logicaDeNegocio();

	if(strcmp($method, "SEL") == 0){

	   $dificultad = $_GET["dificultad"];
	   $piramide = $_GET["piramide"];
	   $sexo       = $_GET["sexo"];
	   $logica->selectRecetas($dificultad,$sexo);
	   $dieta= $_GET["dieta"];
	   $logica->selectRecetasDieta($dieta);
	   $logica->selectRecetaspreferencia($preferencia);
	   $logica->selectRecetaspiramide($piramide);
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

		public function getDietas(){
			
			$arrayDietas =  $this->accessData->getDietas();

			return $arrayDietas;
		}

	   public function getpiramides(){
			
			$arraypiramides =  $this->accessData->getpiramides();

			return $arraypiramides;
		}
		
	   public function selectRecetas($dificultad,$sexo){
			
			$arrayRecetas =  $this->accessData->selectRecetas($dificultad,$sexo);

			return $arrayRecetas;
		}

	  public function selectRecetasDieta($dieta){
			
			$arrayRecetas =  $this->accessData->getRecetasxDieta($dieta);

			return $arrayRecetas;
		}

	  public function selectRecetaspiramide($piramide){
			
			$arrayRecetas =  $this->accessData->getRecetasxPiramide($piramide);

			return $arrayRecetas;
		}
		
	  public function selectRecetaspreferencia($preferencia){
			
			$arrayRecetas =  $this->accessData->getRecetasxpreferencias($preferencia);

			return $arrayRecetas;
		}


	}
?>