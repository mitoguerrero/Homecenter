<?php
	class EjecutarEvaluacion{
		private $colaborador;
		private $usuario;
		private $puntajetotal;
		private $resultado;
		private $id_ejecutar;
		private $id_preguntaevaluacion;
		private $puntaje;
		private $evaluacion;

		public function setColaborador($colaborador){$this->colaborador=$colaborador;}
		public function getColaborador(){return $this->colaborador;}
		public function setUsuario($usuario){$this->usuario=$usuario;}
		public function getUsuario(){return $this->usuario;}
		public function setPuntajeTotal($puntajetotal){$this->puntajetotal=$puntajetotal;}
		public function getPuntajeTotal(){return $this->puntajetotal;}
		public function setResultado($resultado){$this->resultado=$resultado;}
		public function getResultado(){return $this->resultado;}
		public function setEjecutar($id_ejecutar){$this->id_ejecutar=$id_ejecutar;}
		public function getEjecutar(){return $this->id_ejecutar;}
		public function setPreguntaEvaluacion($id_preguntaevaluacion){$this->id_preguntaevaluacion=$id_preguntaevaluacion;}
		public function getPreguntaEvaluacion(){return $this->id_preguntaevaluacion;}
		public function setPuntaje($puntaje){$this->puntaje=$puntaje;}
		public function getPuntaje(){return $this->puntaje;}
		public function setEvaluacion($evaluacion){$this->evaluacion=$evaluacion;}
		public function getEvaluacion(){return $this->evaluacion;}

		public function registrarEjecutarEvaluacion(){
			require_once 'clsConexion.php';
			$objConexion = new Conexion();
			$sql="insert into ejecutar_evaluacion(idcolaborador,idusuario,puntajetotal,resultado,idevaluacion)
			values(".$this->getColaborador().",
			".$this->getUsuario().",
			".$this->getPuntajeTotal().",
			'".$this->getResultado()."',
			".$this->getEvaluacion().")";
			
			$objConexion->consultar($sql);
		}
		public function obtenerUltimoId(){
        	require_once 'clsConexion.php';
            $objConexion = new Conexion();
           	$sql="select MAX(idejecutarevaluacion) as id from ejecutar_evaluacion";
           	$resultado=$objConexion->consultar($sql)->fetch();
           	return $resultado;
        }
        public function registrarDetalleEjecutar(){
        	$correcto=false;
            require_once 'clsConexion.php';
            $objConexion = new Conexion();
           	$sql="insert into detalle_ejecutar_evaluacion(idejecutarevaluacion,idpreguntaevaluacion,puntaje)
           	values(".$this->getEjecutar().",
           	".$this->getPreguntaEvaluacion().",
           	".$this->getPuntaje().");";
			
			$sql1="update evaluacion set estado=1 where idevaluacion=".$this->getEvaluacion()."";
			$objConexion->consultar($sql1);

            if($objConexion->consultar($sql)){
                $correcto=true;
            }
            return $correcto;	
        }
        public function contarPreguntas($evaluacion){
        	require_once 'clsConexion.php';
        	$objConexion = new Conexion();
        	$sql="select count(pregunta_evaluacion.idpreguntaevaluacion) as cantidad from pregunta_evaluacion
			where pregunta_evaluacion.idevaluacion=".$evaluacion."";
			$resultado=$objConexion->consultar($sql);
			$registro=$resultado->fetch();

			$array = array('state' =>1 ,'retorno'=>$registro);
			return $array; 
        }
        public function listarEvaluados($evaluacion){
        	require_once 'clsConexion.php';
            $objConexion= new Conexion();
            $sql="select usuario.idusuario,usuario.nombre,usuario.apellido from usuario
			where usuario.idusuario in(select ejecutar_evaluacion.idcolaborador from ejecutar_evaluacion where ejecutar_evaluacion.idevaluacion=".$evaluacion.") and usuario.idtipousuario=4;";
            $resultado=$objConexion->consultar($sql);

            $retorno=null;
            $i=0;
            while ($registro=$resultado->fetch()) {
                $i++;
                $retorno[$i]["idusuario"]=$registro["idusuario"];
                $retorno[$i]["nombre"]=$registro["nombre"];
                $retorno[$i]["apellido"]=$registro["apellido"];
            }
            $array = array('state' =>1 ,'retorno'=>$retorno);
            return $array;
        }
        public function listarNoEvaluados($evaluacion){
        	require_once 'clsConexion.php';
            $objConexion= new Conexion();
            $sql="select usuario.idusuario,usuario.nombre,usuario.apellido from usuario
			where usuario.idusuario not in(select ejecutar_evaluacion.idcolaborador from ejecutar_evaluacion where ejecutar_evaluacion.idevaluacion=".$evaluacion.")and usuario.idtipousuario=4;";
            $resultado=$objConexion->consultar($sql);

            $retorno=null;
            $i=0;
            while ($registro=$resultado->fetch()) {
                $i++;
                $retorno[$i]["idusuario"]=$registro["idusuario"];
                $retorno[$i]["nombre"]=$registro["nombre"];
                $retorno[$i]["apellido"]=$registro["apellido"];
            }
            $array = array('state' =>1 ,'retorno'=>$retorno);
            return $array;
        }
        public function listarReporteEvaluacion($evaluacion){
            require_once 'clsConexion.php';
            $objConexion= new Conexion();
            $sql="select ejecutar_evaluacion.puntajetotal,ejecutar_evaluacion.resultado,usuario.apellido,usuario.nombre,usuario.idusuario from usuario
            inner join ejecutar_evaluacion on usuario.idusuario=ejecutar_evaluacion.idcolaborador
            where ejecutar_evaluacion.idevaluacion=".$evaluacion."";
            $resultado=$objConexion->consultar($sql);

            $retorno=null;
            $i=0;
            while ($registro=$resultado->fetch()) {
                $i++;
                $retorno[$i]["idusuario"]=$registro["idusuario"];
                $retorno[$i]["nombre"]=$registro["nombre"];
                $retorno[$i]["apellido"]=$registro["apellido"];
                $retorno[$i]["puntajetotal"]=$registro["puntajetotal"];
                $retorno[$i]["resultado"]=$registro["resultado"];
            }
            $array = array('state' =>1 ,'retorno'=>$retorno);
            return $array;
        }
        public function listarReporteUsuario($usuario){
            require_once 'clsConexion.php';
            $objConexion= new Conexion();
            $sql="select ejecutar_evaluacion.puntajetotal,ejecutar_evaluacion.resultado,usuario.apellido,usuario.nombre,usuario.idusuario,evaluacion.descripcion,periodo.nombreperiodo from usuario
            inner join ejecutar_evaluacion on usuario.idusuario=ejecutar_evaluacion.idcolaborador
            inner join evaluacion on evaluacion.idevaluacion=ejecutar_evaluacion.idevaluacion
            inner join periodo on periodo.idperiodo=evaluacion.idperiodo
            where usuario.idusuario=".$usuario."";
            $resultado=$objConexion->consultar($sql);

            $retorno=null;
            $i=0;
            while ($registro=$resultado->fetch()) {
                $i++;
                $retorno[$i]["idusuario"]=$registro["idusuario"];
                $retorno[$i]["nombre"]=$registro["nombre"];
                $retorno[$i]["apellido"]=$registro["apellido"];
                $retorno[$i]["puntajetotal"]=$registro["puntajetotal"];
                $retorno[$i]["resultado"]=$registro["resultado"];
                $retorno[$i]["descripcion"]=$registro["descripcion"];
                $retorno[$i]["nombreperiodo"]=$registro["nombreperiodo"];
            }
            $array = array('state' =>1 ,'retorno'=>$retorno);
            return $array;
        }
        public function listarReporteResultado($resultado,$evaluacion){
            require_once 'clsConexion.php';
            $objConexion= new Conexion();
            $sql="select usuario.apellido,usuario.nombre,ejecutar_evaluacion.puntajetotal,ejecutar_evaluacion.resultado from usuario
            inner join ejecutar_evaluacion on usuario.idusuario=ejecutar_evaluacion.idcolaborador
            where ejecutar_evaluacion.resultado like '".$resultado."'  and ejecutar_evaluacion.idevaluacion=".$evaluacion."";
            $resultado=$objConexion->consultar($sql);

            $retorno=null;
            $i=0;
            while ($registro=$resultado->fetch()) {
                $i++;
                $retorno[$i]["nombre"]=$registro["nombre"];
                $retorno[$i]["apellido"]=$registro["apellido"];
                $retorno[$i]["puntajetotal"]=$registro["puntajetotal"];
                $retorno[$i]["resultado"]=$registro["resultado"];
            }
            $array = array('state' =>1 ,'retorno'=>$retorno);
            return $array;
        }
        public function listarGrafico($colaborador,$periodo){
            require_once 'clsConexion.php';
            $objConexion= new Conexion();
            $sql="select ejecutar_evaluacion.puntajetotal,evaluacion.descripcion from ejecutar_evaluacion
            inner join evaluacion on ejecutar_evaluacion.idevaluacion=evaluacion.idevaluacion
            inner join periodo on periodo.idperiodo=evaluacion.idperiodo
            where ejecutar_evaluacion.idcolaborador=".$colaborador." and periodo.idperiodo=".$periodo."";
            $resultado=$objConexion->consultar($sql);

            $retorno=null;
            $i=0;
            while ($registro=$resultado->fetch()) {
                $i++;
                $retorno[$i]["puntajetotal"]=$registro["puntajetotal"];
                $retorno[$i]["descripcion"]=$registro["descripcion"];
            }
            $array = array('state' =>1 ,'retorno'=>$retorno);
            return $array;
        }
	}
?>