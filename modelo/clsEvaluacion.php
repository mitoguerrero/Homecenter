<?php
	class Evaluacion{
		private $periodo;
		private $descripcion;
		private $idusuario;
		private $estado;

		public function setPeriodo($periodo){$this->periodo=$periodo;}
		public function getPeriodo(){return $this->periodo;}
		public function setDescripcion($descripcion){$this->descripcion=$descripcion;}
		public function getDescripcion(){return $this->descripcion;}
		public function setUsuario($idusuario){$this->idusuario=$idusuario;}
		public function getUsuario(){return $this->idusuario;}
		public function setEstado($estado){$this->estado=$estado;}
		public function getEstado(){return $this->estado;}

		public function registrarEvaluacion(){
            $correcto=false;
            require_once 'clsConexion.php';
            $objConexion = new Conexion();
            $sql="insert into evaluacion(idperiodo,descripcion,idusuario,estado)
            values(".$this->getPeriodo().",
            '".$this->getDescripcion()."',
            ".$this->getUsuario().",
            0)";
            
            if($objConexion->consultar($sql)){
                $correcto=true;
            }
                return $correcto;
        }
        public function listarEvaluacion(){
            require_once 'clsConexion.php';
            $objConexion = new Conexion();
            $sql="select idevaluacion,idperiodo,descripcion,estado from evaluacion";
            $resultado=$objConexion->consultar($sql);

            $tabla = '
                <table id="table_id" class="display table table-bordered">
                    <thead>
                        <tr>
                            <th>Evaluacion</th>
                            <th>Estado</th>
                        </tr>
                    </thead>      
                    <tbody>
                ';
            
            while ($registro = $resultado->fetch()){
            	if ($registro["estado"]==1) {
            		$estado='DAR DE BAJA';
                    $boton='<button class="btn btn-danger" onclick="cambiarEstado('.$registro["idevaluacion"].',0)">'.$estado.'</button>';
            	}else if ($registro["estado"]==0){
            		$estado='ACTIVAR';
                    $boton='<button class="btn btn-success" onclick="cambiarEstado('.$registro["idevaluacion"].',1)">'.$estado.'</button>';
            	}else if ($registro["estado"]==3) {
                    $estado='EVALUADA';
                    $boton='<button class="btn btn-default" disabled>'.$estado.'</button>';
                }
                $tabla .= '
                        <tr>
                            <td>'.$registro["descripcion"].'</td>
                            <td>'.$boton.'</td>
                        </tr>
                    ';
            }
            
            $tabla .= '
                    </tbody>
                </table>
                ';
            
            echo $tabla;
        }
        public function editarEvaluacion($idevaluacion){
            $correcto=false;
            require_once 'clsConexion.php';
            $objConexion = new Conexion();
            $sql="update evaluacion
            set descripcion='".$this->getDescripcion()."',
            idperiodo=".$this->getPeriodo()."
            where idevaluacion=".$idevaluacion."";

            if ($objConexion->consultar($sql)) {
                $correcto=true;
            }
            return $correcto;
        }
        public function cambiarEstado($estado,$evaluacion){
            $correcto=false;
            require_once 'clsConexion.php';
            $objConexion = new Conexion();
            $sql="update evaluacion
            set estado=".$estado."
            where idevaluacion=".$evaluacion."";
            if ($objConexion->consultar($sql)) {
                $correcto=true;
            }
            $array = array('state' => $correcto);
            return $array;
        }
        public function buscarEvaluacion($valor){
            require_once 'clsConexion.php';
            $objCon = new Conexion();
            $sql = "select idevaluacion,idperiodo,descripcion from evaluacion where lower(descripcion) like '%".strtolower($valor)."%' order by descripcion";
            $resultado = $objCon->consultar($sql);
            
            $retorno = null;
            
            $i=0;
            while($registro = $resultado->fetch()){
                $i++;
                $retorno[$i]["idevaluacion"]  = $registro["idevaluacion"];
                $retorno[$i]["idperiodo"]      = $registro["idperiodo"];
                $retorno[$i]["descripcion"]      = $registro["descripcion"];
            }
            
            return $retorno;
        }
        public function cargarEvaluacion(){
            require_once 'clsConexion.php';
            $objConexion= new Conexion();
            $sql="select idevaluacion,descripcion from evaluacion
            inner join  periodo on evaluacion.idperiodo=periodo.idperiodo
            where periodo.estado=1 and evaluacion.estado=1";
            $resultado=$objConexion->consultar($sql);

            $retorno=null;
            $i=0;
            while ($registro=$resultado->fetch()) {
                $i++;
                $retorno[$i]["idevaluacion"]=$registro["idevaluacion"];
                $retorno[$i]["descripcion"]=$registro["descripcion"];
            }
            $array = array('state' =>1 ,'retorno'=>$retorno);
            return $array;
        }
        public function cargarEvaluacionPeriodo($periodo){
            require_once 'clsConexion.php';
            $objConexion= new Conexion();
            $sql="select idevaluacion,descripcion from evaluacion
            inner join  periodo on evaluacion.idperiodo=periodo.idperiodo
            where periodo.idperiodo=".$periodo."";
            $resultado=$objConexion->consultar($sql);

            $retorno=null;
            $i=0;
            while ($registro=$resultado->fetch()) {
                $i++;
                $retorno[$i]["idevaluacion"]=$registro["idevaluacion"];
                $retorno[$i]["descripcion"]=$registro["descripcion"];
            }
            $array = array('state' =>1 ,'retorno'=>$retorno);
            return $array;
        }
	}
?>