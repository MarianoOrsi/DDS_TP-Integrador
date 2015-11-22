<?php

	include("../clases/Grupo.php");
	include("../clases/Usuario.php");
    include("../clases/Receta.php");
	
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

		public function RegistrarUsario($usuario){

			mysql_select_db($this->nameDB, $this->connectionDB);

			$consulta = "call sp_RegistrarUsuario('".$usuario->getUsuario()."','".$usuario->getContrasenia()."','".$usuario->getSexo()."','".$usuario->getDieta()."','".$usuario->getRutina()."','".$usuario->getComplexion()."','".$usuario->getCondicionesPreexistentes()."',".$usuario->getAltura().",".$usuario->getEdad().",'".$usuario->getEmail()."')";
			
			$exec_sp = mysql_query($consulta) or die (mysql_error());
		}

        public function GuardarReceta($receta){

            mysql_select_db($this->nameDB, $this->connectionDB);

         $consulta= "INSERT INTO `diseniosistemas`.`recetas` (`IdReceta`, `Receta`, `IdDificultad`, `IdUsuario`, `IdPiramide`, `IdDieta`, `Calorias`) VALUES (NULL, '".$receta->getDesc()."', '".$receta->getDificultad()."', '".$receta->getUsuarioCreador()."', '".$receta->getPiramide()."', '".$receta->getDieta()."','".$receta->getCalorias()."')";

          mysql_query($consulta) or die (mysql_error());

        }


        public function GuardarPasos($pasos){

            mysql_select_db($this->nameDB, $this->connectionDB);
            function idRecetaRecien(){
                $QultimaReceta="SELECT  IdReceta FROM recetas ORDER BY IdReceta DESC LIMIT 1";
                $pepe=mysql_query($QultimaReceta) or die (mysql_error());
                $p=mysql_fetch_row($pepe);
                return $p['0'];
            }

            for($i=0;$i<5;$i++)
            {
                $consulta = "INSERT INTO `diseniosistemas`.`pasos` (`IdPasos`, `IdReceta`, `Paso`, `Descripcion`, `Foto`) VALUES (NULL, '" . idRecetaRecien() . "','".($i+1). "', '" . $pasos[$i] . "', 'imagen.jpg');";
                mysql_query($consulta) or die (mysql_error());
            }

       }


        public function GuardarCondimentos($condimentos){
            mysql_select_db($this->nameDB, $this->connectionDB);
             for($i=0;$i<count($condimentos);$i++){
                $consulta="INSERT INTO `diseniosistemas`.`receta-condimentos` (`IdRecetaCondimento`, `IdReceta`, `IdCondimento`) VALUES (NULL, '" . idRecetaRecien() . "', '".$condimentos[$i]."')";


                mysql_query($consulta) or die (mysql_error());
            }

        }


        public function GuardarIngredientes($ingredientes){
            mysql_select_db($this->nameDB, $this->connectionDB);

            for($i=0;$i<count($ingredientes);$i++){
                $consulta= "INSERT INTO `diseniosistemas`.`receta-ingredientes` (`IdRecetaIngrediente`, `IdReceta`, `IdIngrediente`) VALUES (NULL, '" . idRecetaRecien() . "', '".$ingredientes[$i]."');";
                mysql_query($consulta) or die (mysql_error());
            }

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

			$db = new mysqli('localhost','root','','diseniosistemas');

			// Check for errors
			if(mysqli_connect_errno()){
			 echo mysqli_connect_error();
			}

			$Usuarios = array();

			// 1st Query
			$result = $db->query("call UsuariosDeGrupo(".$idGrupo.")");
			if($result){
				 // Cycle through results
				while ($row = $result->fetch_object()){
					//$user_arr[] = $row;
					$usuario = new Usuario($row->IdUsuario,$row->Usuario,$row->Contrase,$row->Sexo,$row->Altura,$row->IdDieta,1,$row->IdRutina,$row->IdContextura,$row->IdPreexistente,$row->Email,$row->Edad);
					//$usuario = new Usuario($row["IdUsuario"],$row["Usuario"],$row["Contrase"],$row["Sexo"],$row["Altura"],$row["IdDieta"],1,$row["IdRutina"],$row["IdContextura"],$row["IdPreexistente"],$row["Email"],$row["Edad"]);
					array_push($Usuarios, $usuario);
				}
				// Free result set
				$result->close();
				$db->next_result();
			}

			//mysql_select_db($this->nameDB, $this->connectionDB);

			//$consulta = "call UsuariosDeGrupo(".$idGrupo.")";
			
			//$arrayUsuarios = array();
			
			//$result = mysql_query($consulta) or die (mysql_error());

			//while ($row = mysql_fetch_array($result)){

			//	$usuario = new Usuario($row["IdUsuario"],$row["Usuario"],$row["Contrase"],$row["Sexo"],$row["Altura"],$row["IdDieta"],1,$row["IdRutina"],$row["IdContextura"],$row["IdPreexistente"],$row["Email"],$row["Edad"]);

			//	array_push($arrayUsuarios, $usuario);
			//}
			//return $arrayUsuarios;

			return $Usuarios;
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

		public function EsCreadorDeGrupo($IdGrupo,$IdUsuario){

			$db = new mysqli('localhost','root','','diseniosistemas');

			
			if(mysqli_connect_errno()){
			 echo mysqli_connect_error();
			}
			
			$result = $db->query("call sp_EsCreadorDeGrupo(".$IdGrupo.",".$IdUsuario.")");
			
			$esCreador = null;

			if($result){
				while ($row = $result->fetch_row()){
					
					$esCreador = $row[0];
					
				}
				$result->close();
				$db->next_result();
			}
			return $esCreador;
		}
	}
?>