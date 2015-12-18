<?php

	$file = substr(getcwd(), -8);
	if($file == "template")
		{
		    include("./Datos/RecomendacionesRecetasDatos.php");	
		    include("./clases/RecomendacionesRecetas.php");    
		}else{
		    include("../Datos/RecomendacionesRecetasDatos.php");	
		    include("../clases/RecomendacionesRecetas.php");                	
		}

	if(isset($_GET["method"]))
	{
		$method = $_GET["method"];
		$logicaDeNegocio = new logicaDeNegocioRecomendaciones();

		if(strcmp($method, "RECETAS") == 0){
		   $logica->selectRecetasXPreferencia();
	    }elseif(strcmp($method, "RECOM") == 0){
		   $logica->selectRecomendacionesXPreferencia();
		}
	}

	
	class logicaDeNegocioRecomendaciones{

		private $accessData;

		public function __construct(){

			$this->accessData = new accesoDatosRecomendaciones();

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