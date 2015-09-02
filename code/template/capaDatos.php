<?php
	class accesoDatos{

		private $servidorDB;
		private $userDB;
		private $passDB;
		private $nameDB;
		private $connectionDB;

		public function __construct(){
			include("configuracion.php");
			$this->servidorDB = $servidor;
			$this->userDB = $user;
			$this->passDB = $pass;
			$this->nameDB = $dbname;
			$this->connectionDB = mysql_connect($this->servidorDB,$this->userDB,$this->passDB);
		}

		public function RegistrarUsario($usuario){

			mysql_select_db($this->nameDB, $this->connectionDB);

			$consulta = "call sp_RegistrarUsuario('".$usuario->getUsuario()."','".$usuario->getContrasenia()."','".$usuario->getSexo()."','".$usuario->getDieta()."','".$usuario->getRutina()."','".$usuario->getComplexion()."','".$usuario->getCondicionesPreexistentes()."',".$usuario->getAltura().",".$usuario->getEdad().",'".$usuario->getEmail()."')";
			
			$exec_sp = mysql_query($consulta) or die (mysql_error());
		}
	}
?>