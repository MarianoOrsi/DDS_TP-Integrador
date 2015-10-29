<?php
    include("../clases/Usuario.php");
 include("../clases/RecetaConsultada.php");
class accesoDatos{

		private $servidorDB;
		private $userDB;
		private $passDB;
		private $nameDB;
		private $connectionDB;

		public function __construct(){
			include("../configuracion.php");
			$this->servidorDB = $servidor;
			$this->userDB = $user;
			$this->passDB = $pass;
			$this->nameDB = $dbname;
			$this->connectionDB = mysql_connect($this->servidorDB,$this->userDB,$this->passDB);
		}

     	public function getUsuario($IdUsuario){

			mysql_select_db($this->nameDB, $this->connectionDB);

			$consulta = "SELECT IdUsuario,
								Usuario,
								Contrase,
								fechaCreacion,
								IdContextura,
								Sexo,
								Trabajo,
								IdRutina,
								Edad,
								Altura,
								IdPreexistente,
								IdDieta,
								Email,
								IdPesos-Ideales
			                FROM usuarios
			                WHERE IdUsuario = " . $IdUsuario;
			
	     	$result = mysql_query($consulta) or die (mysql_error());

			while ($row = mysql_fetch_array($result)){

				$usuario= new Usuario($row["IdUsuario"],
					                  $row["Usuario"],
					                  $row["Contrase"]
					                  $row["Sexo"],
					                  $row["Altura"],
					                  $row["IdDieta"],
					                  "",
					                  $row["IdRutina"],
					                  $row["IdContextura"],
					                  "",
					                  $row["Email"],
					                  $row["fechaCreacion"]);

				return $usuario;
			}

			
		}

		public function GetRecomendacionesXPreferencia($IdPreferencia){

			mysql_select_db($this->nameDB, $this->connectionDB);

			$consulta = "SELECT Descripcion
			                FROM recomendaciones 
			                WHERE IdPreferencia = " . $IdPreferencia;
			
	     	$result = mysql_query($consulta) or die (mysql_error());

			$arrayRecomendaciones = array();

			while ($row = mysql_fetch_array($result)){

				$recomendacion = $row["Descripcion"];

				array_push($recomendacion, $arrayRecomendaciones);
			}

			return $arrayRecomendaciones;
		}

		public function GetRecetasXPreferencia($IdPreferencia){

	        mysql_select_db($this->nameDB, $this->connectionDB);

			$consulta = "SELECT IdReceta, Receta FROM recetas WHERE IdDieta = " . $IdPreferencia;
			
			$result = mysql_query($consulta) or die (mysql_error());

			$arrayRecetas = array();

			while ($row = mysql_fetch_array($result)){

				$Receta = new Receta($row["IdReceta"],$row["Receta"]);

				array_push($arrayRecetas, $Receta);
			}

			return $arrayRecetas;
		}


	}
?>