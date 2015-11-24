<?php 
	class Receta{

        private $IdReceta;
		private $UsuarioCreador;
		private $Desc;
		private $Dificultad;
		private $Temporada;
		private $Calorias;
		private $Ingredientes;
		private $Condimentos;
		private $Pasos;
        private $Piramide;
        private $Dieta;


		public function __construct($idReceta_in,$desc_in, $dificultad_in, $usuarioCreador_in, $temporada_in,$ingredientes_in,$condimentos_in,$pasos_in,$calorias_in,$piramide_in,$dieta_in){

            $this->IdReceta = $idReceta_in;
            $this->Desc = $desc_in;
            $this->Dificultad = $dificultad_in;
			$this->UsuarioCreador = $usuarioCreador_in;
			$this->Temporada = $temporada_in;
			$this->Ingredientes = $ingredientes_in;
			$this->Condimentos = $condimentos_in;
			$this->Pasos = $pasos_in;
            $this->Calorias=$calorias_in;
            $this->Piramide=$piramide_in;
            $this->Dieta=$dieta_in;

		}
        
        public function getId(){
            return $this->IdReceta;
        }

        public function getDesc()
		{
			return $this->Desc;
		}
        public function getDificultad()
        {
            return $this->Dificultad;
        }
        public function getUsuarioCreador()
        {
            return $this->UsuarioCreador;
        }
        public function getTemporada()
        {
            return $this->Temporada;
        }
        public function getIngredientes()
        {
            return $this->Ingredientes;
        }
        public function getCondimentos()
        {
            return $this->Condimentos;
        }
        public function getPasos()
        {
            return $this->Pasos;
        }
        public function getCalorias()
        {
            return $this->Calorias;
        }
        public function getPiramide()
        {
            return $this->Piramide;
        }
        public function getDieta()
        {
            return $this->Dieta;
        }

		}
?>