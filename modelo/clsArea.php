<?php
	class Area{
		public function cargarArea(){
			require_once 'clsConexion.php';
			$objConexion = new Conexion();
			$sql="select idarea,nombrearea from area";
			$resultado = $objConexion->consultar($sql);

			$retorno = null;
			$i=0;
			while ($registro= $resultado->fetch()) {
				$i++;
				$retorno[$i]["idarea"]=$registro["idarea"];
				$retorno[$i]["nombrearea"]=$registro["nombrearea"];
			}
			$array = array('state' => 1,'retorno' => $retorno );
			return $array;
		}
	}
?>