<?php
	class PreguntaEvaluacion{
		private $evaluacion;
		private $pregunta;

		public function setEvaluacion($evaluacion){$this->evaluacion=$evaluacion;}
		public function getEvaluacion(){return $this->evaluacion;}
		public function setPregunta($pregunta){$this->pregunta=$pregunta;}
		public function getPregunta(){return $this->pregunta;}

		public function vincular(){
            $correcto=false;
            require_once 'clsConexion.php';
            $objConexion = new Conexion();
            $sql="insert into pregunta_evaluacion(idevaluacion,idpregunta)
            values(".$this->getEvaluacion().",
            ".$this->getPregunta().")";
            
            if($objConexion->consultar($sql)){
                $correcto=true;
            }
                $array = array('state' =>$correcto);
                return $array;
        }
        public function desvincular($idevaluacion,$idpregunta){
            $correcto=false;
            require_once 'clsConexion.php';
            $objConexion = new Conexion();
            $sql="delete from pregunta_evaluacion
            where idevaluacion=".$idevaluacion." and idpregunta=".$idpregunta."";
            
            if($objConexion->consultar($sql)){
                $correcto=true;
            }
            	$array = array('state' =>$correcto);
                return $array;
        }
        public function listarVincular($evaluacion){
            require_once 'clsConexion.php';
            $objConexion = new Conexion();
            $sql="select pregunta_evaluacion.idpreguntaevaluacion,pregunta_evaluacion.idpregunta,pregunta_evaluacion.idevaluacion,pregunta.descripcion,pregunta.idcategoria FROM pregunta_evaluacion 
            inner join pregunta on pregunta_evaluacion.idpregunta=pregunta.idpregunta 
            where idevaluacion=".$evaluacion."";
            $resultado=$objConexion->consultar($sql);

            $retorno=null;
            $i=0;
            while ($registro=$resultado->fetch()) {
                $i++;
                $retorno[$i]["idpreguntaevaluacion"]=$registro["idpreguntaevaluacion"];
                $retorno[$i]["descripcion"]=$registro["descripcion"];
                $retorno[$i]["idcategoria"]=$registro["idcategoria"];
            }
            $array = array('state' =>1 ,'retorno'=>$retorno);
            return $array;            
        }
	}
?>