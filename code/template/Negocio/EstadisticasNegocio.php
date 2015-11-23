<?php

    include("../datos/EstadisticasDatos.php");	

if(isset($_GET["method"]))
{
	$method = $_GET["method"];
	$logicaDeNegocio = new logicaDeNegocio();

	if(strcmp($method, "SEL") == 0){

	   $dificultad = $_GET["dificultad"];
	   $estacion = $_GET["estacion"];
	   $condimento = $_GET["condimento"];
	   $piramide = $_GET["piramide"];
	   $sexo       = $_GET["sexo"];
	   $logica->selectRecetas($dificultad,$sexo);
	   $dieta= $_GET["dieta"];
	   $logica->selectRecetasDieta($dieta);
	   $logica->selectRecetaspreferencia($preferencia);
	   $logica->selectRecetaspiramide($piramide);
	   $logica->selectRecetascondimento($condimento);
	   $logica->selectRecetasCalificadaEstacion($califica,$estacion);
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

	   public function getestaciones(){
			
			$arrayestaciones =  $this->accessData->getestaciones();

			return $arrayestaciones;
		}

	   public function getcondimentos(){
			
			$arraycondimentos =  $this->accessData->getcondimentos();

			return $arraycondimentos;
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

	  public function selectRecetascondimento($condimento){
			
			$arrayRecetas =  $this->accessData->getRecetasxcondimento($condimento);

			return $arrayRecetas;
		}
		
	  public function selectRecetaspreferencia($preferencia){
			
			$arrayRecetas =  $this->accessData->getRecetasxpreferencias($preferencia);

			return $arrayRecetas;
		}

	  public function selectRecetasCalificadaEstacion($calificada,$estacion){
			
			$arrayRecetas =  $this->accessData->getRecetasxPuntuacionyEstacion($estacion,$calificada);

			return $arrayRecetas;
		}
	
	}
?>