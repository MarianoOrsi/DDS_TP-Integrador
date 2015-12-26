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

		public function RegistrarUsuario($usuario){

		$mysqli = new mysqli("localhost", "root", "", "diseniosistemas");
		if ($mysqli->connect_errno) {
			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
		
		if (!$mysqli->query("CALL sp_RegistrarUsuariog('".$usuario->getUsuario()."','".$usuario->getContrasenia()."','".$usuario->getSexo()."','".$usuario->getDieta()."','".$usuario->getRutina()."','".$usuario->getComplexion()."','".$usuario->getCondicionesPreexistentes()."',".$usuario->getAltura().",".$usuario->getEdad().",'".$usuario->getEmail()."');")) {
				echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
			
			
			
		}
		
		
		public function dameUltimoId()
		{
		
		 mysql_select_db($this->nameDB, $this->connectionDB);
            $consulta= "SELECT IdUsuario FROM usuarios ORDER BY idUsuario DESC LIMIT 1";

           $pepe=mysql_query($consulta) or die (mysql_error());
				
			$p=mysql_fetch_row($pepe);
			
			
               return $p['0'];
		
		
		}

        public function GuardarReceta($receta){

            mysql_select_db($this->nameDB, $this->connectionDB);
            $consulta= "INSERT INTO `diseniosistemas`.`recetas` (`IdReceta`, `Receta`, `IdDificultad`, `IdUsuario`, `IdPiramide`, `IdDieta`, `Calorias`) VALUES (NULL, '".$receta->getDesc()."', '".$receta->getDificultad()."', '".$receta->getUsuarioCreador()."', '".$receta->getPiramide()."', '".$receta->getDieta()."','".$receta->getCalorias()."')";


            mysql_query($consulta) or die (mysql_error());
		

        }

        public function GuardarEstacion($estacion){


            mysql_select_db($this->nameDB, $this->connectionDB);
            function idRecetaRecien(){
                $QultimaReceta="SELECT  IdReceta FROM recetas ORDER BY IdReceta DESC LIMIT 1";
                $pepe=mysql_query($QultimaReceta) or die (mysql_error());
                $p=mysql_fetch_row($pepe);
                return $p['0'];
            }
            $consulta="INSERT INTO `diseniosistemas`.`receta-estaciones` (`IdRecetaEstacion`, `IdReceta`, `IdEstacion`) VALUES (NULL, '".idRecetaRecien()."', '".$estacion."');";
            mysql_query($consulta) or die (mysql_error());


        }

        public function UpdateEstacion($estacion,$idReceta){


            mysql_select_db($this->nameDB, $this->connectionDB);
            $consulta="UPDATE `diseniosistemas`.`receta-estaciones` SET `IdEstacion` = '".$estacion."' WHERE `receta-estaciones`.`IdReceta` =".$idReceta.";";
            mysql_query($consulta) or die (mysql_error());


        }

        public function BorrarReceta($idReceta){
            mysql_select_db($this->nameDB, $this->connectionDB);
            $borroIngredientes="DELETE FROM `diseniosistemas`.`receta-ingredientes` WHERE `receta-ingredientes`.`IdReceta` =".$idReceta.";";

            mysql_query($borroIngredientes) or die (mysql_error());
            $borroCondimentos="DELETE FROM `diseniosistemas`.`receta-condimentos` WHERE `receta-condimentos`.`IdReceta` =".$idReceta.";";
           mysql_query($borroCondimentos) or die (mysql_error());
            $borroEstacion="DELETE FROM `diseniosistemas`.`receta-estaciones` WHERE `receta-estaciones`.`IdReceta` = ".$idReceta.";";
             mysql_query($borroEstacion) or die (mysql_error());
            $borroPasos="DELETE FROM `diseniosistemas`.`pasos` WHERE `pasos`.`IdReceta` =".$idReceta.";";
              mysql_query($borroPasos) or die (mysql_error());
            $borroReceta="DELETE FROM `diseniosistemas`.`recetas` WHERE `recetas`.`IdReceta` =".$idReceta.";";
             mysql_query($borroReceta) or die (mysql_error());


        }


        public function UpdateIngredientes($ingredientes,$idReceta){
            mysql_select_db($this->nameDB, $this->connectionDB);
            $consulta="DELETE FROM `diseniosistemas`.`receta-ingredientes` WHERE `receta-ingredientes`.`IdReceta` =".$idReceta.";";
            mysql_query($consulta) or die (mysql_error());


            for($i=0;$i<count($ingredientes);$i++){
                $consulta= "INSERT INTO `diseniosistemas`.`receta-ingredientes` (`IdRecetaIngrediente`, `IdReceta`, `IdIngrediente`) VALUES (NULL, '" .$idReceta. "', '".$ingredientes[$i]."');";
                mysql_query($consulta) or die (mysql_error());
            }


        }

        public function UpdateCondimentos($condimentos,$idReceta){

            mysql_select_db($this->nameDB, $this->connectionDB);
            $consulta="DELETE FROM `diseniosistemas`.`receta-condimentos` WHERE `receta-condimentos`.`IdReceta` =".$idReceta.";";
            mysql_query($consulta) or die (mysql_error());
            for($i=0;$i<count($condimentos);$i++){
                $consulta="INSERT INTO `diseniosistemas`.`receta-condimentos` (`IdRecetaCondimento`, `IdReceta`, `IdCondimento`) VALUES (NULL, '" .$idReceta. "', '".$condimentos[$i]."')";
                mysql_query($consulta) or die (mysql_error());
            }


        }


        public function UpdateReceta($receta,$id){

            mysql_select_db($this->nameDB, $this->connectionDB);

            $consulta=" UPDATE `diseniosistemas`.`recetas` SET `Receta` = '".$receta->getDesc()."', `IdDificultad` = '".$receta->getDificultad()."', `IdUsuario` = '".$receta->getUsuarioCreador()."', `IdPiramide` = '".$receta->getPiramide()."', `IdDieta` = '".$receta->getDieta()."', `Calorias` = '".$receta->getCalorias()."' WHERE `recetas`.`IdReceta` = ".$id.";";


            mysql_query($consulta) or die (mysql_error());

        }



        public function GuardarPasos($pasos){

            mysql_select_db($this->nameDB, $this->connectionDB);
            function idRecetasRecien(){
                $QultimaReceta="SELECT  IdReceta FROM recetas ORDER BY IdReceta DESC LIMIT 1";
                $pepe=mysql_query($QultimaReceta) or die (mysql_error());
                $p=mysql_fetch_row($pepe);
                return $p['0'];
            }

            for($i=0;$i<5;$i++)
            {
                $consulta = "INSERT INTO `diseniosistemas`.`pasos` (`IdPasos`, `IdReceta`, `Paso`, `Descripcion`, `Foto`) VALUES (NULL, '" . idRecetasRecien() . "','".($i+1). "', '" . $pasos[$i] . "', 'imagen.jpg');";
                mysql_query($consulta) or die (mysql_error());
            }

       }

        public function UpdatePasos($pasos,$idReceta){


            for($i=0;$i<5;$i++)
            {
                $consulta="UPDATE `diseniosistemas`.`pasos` SET `Descripcion` = '" . $pasos[$i] . "' WHERE `pasos`.`IdReceta`=".$idReceta." AND `pasos`.`Paso`=".($i +1).";";
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


       function GuardarIngredientes($ingredientes){
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

	    public function getUsuarios(){

			mysql_select_db($this->nameDB, $this->connectionDB);

			$consulta = "SELECT usuarios.Usuario FROM usuarios ORDER BY usuario";
			
			$result = mysql_query($consulta) or die (mysql_error());
			$arrayUsuarios = array();

			while ($row = mysql_fetch_array($result)){

	           
			     $usuario = new Usuario("",$row['Usuario'],"","","","","","","","","","","");
		         array_push($arrayUsuarios, $usuario);
				}
				
			return $arrayUsuarios;
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