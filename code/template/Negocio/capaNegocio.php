<?php

	/*include("clases/Grupo.php");*/
    include("../datos/capaDatos.php");	
	
	class logicaDeNegocio{

		private $accessData;

		public function __construct(){

			$this->accessData = new accesoDatos();

		}

		public function getUsuarios(){
			
			$arrayDeUsuarios =  $this->accessData->getUsuarios();

			return $arrayDeUsuarios;
		}
		public function getGruposDeUsuario($idUsuario){
			
			$arrayDeGrupos =  $this->accessData->getGruposDeUsuario($idUsuario);

			return $arrayDeGrupos;
		}

		public function getUsuariosDeGrupo($idGrupo){
			
			$arrayDeUsuarios =  $this->accessData->getUsuariosDeGrupo($idGrupo);

			return $arrayDeUsuarios;
		}

		public function getUsuariosPorNombre($usuario){
			
			$arrayDeUsuarios =  $this->accessData->getUsuariosPorNombre($usuario);

			return $arrayDeUsuarios;
		}

		public function esCreadorDeGrupo($IdGrupo,$IdUsuario){
		
			$esCreador = $this->accessData->EsCreadorDeGrupo($IdGrupo,$IdUsuario);

			return $esCreador;
		}
	}
?>