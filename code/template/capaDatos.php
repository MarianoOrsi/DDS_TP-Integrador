<?php

	include("clases/Grupo.php");
	include("clases/Usuario.php");
	
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

		public function getGruposDeUsuario($idUsuario){

			mysql_select_db($this->nameDB, $this->connectionDB);

			$consulta = "call sp_BuscarGruposDeUsuario(".$idUsuario.")";
			
			$result = mysql_query($consulta) or die (mysql_error());

			$arrayGrupos = array();

			while ($row = mysql_fetch_array($result)){

				$grupo = new Grupo($row["IdGrupo"],$row["IdUsuarioCreador"],$row["Nombre"],$row["Fecha"]);

				array_push($arrayGrupos, $grupo);
			}

			return $arrayGrupos;
		}

		public function getUsuariosDeGrupo($idGrupo){

			mysql_select_db($this->nameDB, $this->connectionDB);

			$consulta = "call UsuariosDeGrupo(".$idGrupo.")";
			
			$arrayUsuarios = array();
			
			$result = mysql_query($consulta) or die (mysql_error());

			while ($row = mysql_fetch_array($result)){

				$usuario = new Usuario($row["IdUsuario"],$row["Usuario"],$row["Contrase"],$row["Sexo"],$row["Altura"],$row["IdDieta"],1,$row["IdRutina"],$row["IdContextura"],$row["IdPreexistente"],$row["Email"],$row["Edad"]);

				array_push($arrayUsuarios, $usuario);
			}
			return $arrayUsuarios;
		}

		public function getUsuariosPorNombre($usuario){

			$usuario_param = "%".$usuario."%";

			mysql_select_db($this->nameDB, $this->connectionDB);

			$consulta = "call sp_BuscarUsuario_PorNombre(".$usuario_param.")";
			
			$arrayUsuarios = array();
			
			$result = mysql_query($consulta) or die (mysql_error());

			while ($row = mysql_fetch_array($result)){

				$usuario = $row["Usuario"];

				array_push($arrayUsuarios, $usuario);
			}

			return $arrayUsuarios;
		}
	}
?>