<?php 
	class Receta{
		private $UsuarioCreador;
		private $Desc;
		private $Dificultad;
		private $Temporada;
		private $Clasificacion;
		private $Ingredientes;
		private $Condimentos;
		private $Pasos;

		public function __construct($usuarioCreador_in, $temporada_in, $clasificacion_in, $dificultad_in,$desc_in){
			$this->UsuarioCreador = $usuarioCreador_in;
			$this->Desc = $desc_in;
			$this->Dificultad = $dificultad_in;
			$this->Temporada = $temporada_in;
			$this->Clasificacion = $clasificacion_in;
			$this->Ingredientes = array();
			$this->Condimentos = array();
			$this->Pasos = array();
		}
 
        public function getReceta()
		{
			return $this->Desc;
		}
		

		}
?>