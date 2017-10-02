<?php
	class Sesion{
		public function iniciarSesion($correo,$clave){
			$sesion=false;
			require_once 'clsConexion.php';
			$objConexion = new Conexion();
			$sql="select idusuario,idtipousuario,nombre,apellido,correo,clave,clave_plana from usuario
			where correo='".$correo."'";
			$resultado=$objConexion->consultar($sql)->fetch();

			if($resultado['clave']==md5($clave)){
				session_name("usuario");
				session_start();
				$_SESSION['idusuario']=$resultado['idusuario'];
				$_SESSION['nombre']=$resultado['nombre'];
				$_SESSION['nombreCompleto']=$resultado['apellido']." ".$resultado['nombre'];
				$_SESSION['clave']=$resultado['clave'];
				$_SESSION['correo']=$resultado['correo'];
				$_SESSION['idtipousuario']=$resultado['idtipousuario'];
				$sesion=true;
			}else{
				session_name("usuario");
				session_start();
				$_SESSION["idtipousuario"]=0;
			}
			$resultado = array('state' => $sesion, 'tipo'=>$_SESSION['idtipousuario']);
			return $resultado;

		}
	}
?>