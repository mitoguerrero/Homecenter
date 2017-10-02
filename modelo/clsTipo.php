<?php
	class Tipo{
		public function cargarTipo(){
			require_once 'clsConexion.php';
			$objConexion = new Conexion();
			$sql="select idtipoincidencia,nombretipoincidencia from tipo_incidencia";
			$resultado = $objConexion->consultar($sql);

			$retorno = null;
			$i=0;
			while ($registro= $resultado->fetch()) {
				$i++;
				$retorno[$i]["idtipoincidencia"]=$registro["idtipoincidencia"];
				$retorno[$i]["nombretipoincidencia"]=$registro["nombretipoincidencia"];
			}
			$array = array('state' => 1,'retorno' => $retorno );
			return $array;
		}
	}
?>