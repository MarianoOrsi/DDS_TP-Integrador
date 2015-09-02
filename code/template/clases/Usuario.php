<?php 

class Usuario{

		private $idUsuario;
		private $usuario;
		private $contraseña;
		private $sexo;
		private $dieta;
		private $preferenciasAlimentarias;
		private $rutina;
		private $recetasPropias;
		private $complexion;
		private $condiciones;
		private $altura;
		private $email;
		private $edad;

		public function __construct($idUsuario_in, $usuario_in, $contraseña_in, $sexo_in, $altura_in, $dieta_in, $preferenciaAlimentarias_in, $rutina_in, $complexion_in, $condiciones_in, $email_in, $edad_in)
		{
			$this->idUsuario=$idUsuario_in;
			$this->usuario=$usuario_in;
			$this->contraseña=$contraseña_in;
			$this->sexo=$sexo_in;
			$this->altura=$altura_in;
			$this->dieta=$dieta_in;
			$this->preferenciasAlimentarias=$preferenciaAlimentarias_in;
			$this->rutina=$rutina_in;
			$this->complexion=$complexion_in;
			$this->condiciones=$condiciones_in;
			$this->recetasPropias = array();
			$this->email = $email_in;
			$this->edad = $edad_in;
		}

		public function getIdUsuario()
		{
			return $this->idUsuario;
		}
		
		public function getNombre()
		{
			return $this->nombre;
		}

		public function getUsuario()
		{
			return $this->usuario;
		}
		public function getContrasenia()
		{
			return $this->contraseña;
		}
		public function getSexo()
		{
			return $this->sexo;
		}
		public function getEdad()
		{
			return $this->edad;
		}
		public function getDieta()
		{
			return $this->dieta;
		}
		public function getPreferenciasAlimentarias()
		{
			return $this->preferenciasAlimentarias;
		}
		public function getRutina()
		{
			return $this->rutina;
		}
		public function getComplexion()
		{
			return $this->complexion;
		}
		public function getCondicionesPreexistentes()
		{
			return $this->condiciones;
		}
		public function getRecetasPropias()
		{
			return $this->recetasPropias;
		}
		public function getAltura()
		{
			return $this->altura;
		}
		public function getEmail()
		{
			return $this->email;
		}
	}
?>