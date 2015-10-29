<?php 

class preferenciaAlimentaria{

		private $IdPreferencia;

		
		public function getIdPreferencia()
		{
			return $this->IdPreferencia;
		}

	}

class Hipertencion extends preferenciaAlimentaria{

        public function __construct()
		{
			$this->IdPreferencia=1;
		}

}


class Diabetes extends preferenciaAlimentaria{

        public function __construct()
		{
			$this->IdPreferencia=2;
		}

}

class Celiasis extends preferenciaAlimentaria{

        public function __construct()
		{
			$this->IdPreferencia=3;
		}

}

?>