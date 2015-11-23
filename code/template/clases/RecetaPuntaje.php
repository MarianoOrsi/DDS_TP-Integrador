<?php 

class RecetaPuntaje{

		private $Receta;
		private $idReceta;
		private $Puntaje;
		private $Estacion;

		/*public function __construct($idUsuarioCreador_in, $nombreGrupo_in)
		{
			$this->idUsuarioCreador=$idUsuarioCreador_in;
			$this->nombreGrupo=$nombreGrupo_in;
		}*/

		public function __construct($idReceta, $Receta, $Puntaje, $Estacion)
		{
			$this->Receta=$Receta;
			$this->idReceta=$idReceta;
			$this->Puntaje=$Puntaje;
			$this->Estacion=$Estacion;
		}

		public function getReceta()
		{
			return $this->Receta;
		}

		public function getIdReceta()
		{
			return $this->idReceta;
		}

		public function getPuntaje()
		{
			return $this->Puntaje;
		}

		public function getestacion()
		{
			return $this-Eestacion;
		}

	}
?>