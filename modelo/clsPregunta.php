<?php
	class Pregunta{
		private $usuario;
		private $descripcion;
		private $categoria;

		public function setUsuario($usuario){$this->usuario=$usuario;}
		public function getUsuario(){return $this->usuario;}
		public function setDescripcion($descripcion){$this->descripcion=$descripcion;}
		public function getDescripcion(){return $this->descripcion;}
		public function setCategoria($categoria){$this->categoria=$categoria;}
		public function getCategoria(){return $this->categoria;}

		public function registrarPregunta(){
            $correcto=false;
            require_once 'clsConexion.php';
            $objConexion = new Conexion();
            $sql="insert into pregunta(idusuario,descripcion,idcategoria)
            values(".$this->getUsuario().",
            '".$this->getDescripcion()."',
            ".$this->getCategoria().")";
            
            if($objConexion->consultar($sql)){
                $correcto=true;
            }
                return $correcto;
        }
        public function editarPregunta($id){
            $correcto=false;
            require_once 'clsConexion.php';
            $objConexion = new Conexion();
            $sql="update pregunta
            set descripcion='".$this->getDescripcion()."',
            idcategoria=".$this->getCategoria()."
            where idpregunta=".$id."";

            if ($objConexion->consultar($sql)) {
                $correcto=true;
            }
            return $correcto;
        }
        public function listarPregunta(){
            require_once 'clsConexion.php';
            $objConexion = new Conexion();
            $sql="select idpregunta,descripcion,nombrecategoria from pregunta
            inner join categoria_incidencia on pregunta.idcategoria=categoria_incidencia.idcategoria";
            $resultado=$objConexion->consultar($sql);

            $tabla = '
                <table id="table_id" class="display table table-bordered">
                    <thead>
                        <tr>
                            <th>Pregunta</th>
                            <th>Categoria</th>
                            <th>Opción</th>
                        </tr>
                    </thead>      
                    <tbody>
                ';
            
            while ($registro = $resultado->fetch()){
            	
                $tabla .= '
                        <tr>
                            <td>¿'.$registro["descripcion"].'?</td>
                            <td>'.$registro["nombrecategoria"].'</td>
                            <td><button class="btn btn-info" onclick="leer('.$registro["idpregunta"].')">Modificar</button></td>
                        </tr>
                    ';
            }
            
            $tabla .= '
                    </tbody>
                </table>
                ';
            
            echo $tabla;
        }
        public function listarPreguntaPorEvaluacion($evaluacion,$categoria){
            require_once 'clsConexion.php';
            $objConexion = new Conexion();
            $sql="select pregunta.idpregunta,pregunta.descripcion,
            case
            when not exists
            (select pregunta_evaluacion.idpregunta from pregunta_evaluacion
            inner join evaluacion on pregunta_evaluacion.idevaluacion=evaluacion.idevaluacion
            where pregunta.idpregunta=pregunta_evaluacion.idpregunta and evaluacion.idevaluacion=".$evaluacion.")then 'VINCULAR'
            when exists
            (select pregunta_evaluacion.idpregunta from pregunta_evaluacion
            inner join evaluacion on pregunta_evaluacion.idevaluacion=evaluacion.idevaluacion
            where pregunta.idpregunta=pregunta_evaluacion.idpregunta and evaluacion.idevaluacion=".$evaluacion.")then 'NO VINCULAR'
            end as caso from pregunta
            inner join categoria_incidencia on pregunta.idcategoria=categoria_incidencia.idcategoria
            where categoria_incidencia.idcategoria=".$categoria."";
            $resultado=$objConexion->consultar($sql);

            $retorno=null;
            $i=0;
            while ($registro=$resultado->fetch()) {
                $i++;
                $retorno[$i]["idpregunta"]=$registro["idpregunta"];
                $retorno[$i]["descripcion"]=$registro["descripcion"];
                $retorno[$i]["caso"]=$registro["caso"];
            }
            $array = array('state' =>1 ,'retorno'=>$retorno);
            return $array;            
        }
        public function cargarPregunta($id){
            require_once 'clsConexion.php';
            $objConexion = new Conexion();
            $sql="select idpregunta,descripcion,idcategoria from pregunta
            where idpregunta=".$id."";
            $resultado=$objConexion->consultar($sql)->fetch();
            $array = array('state' =>1 ,'retorno'=>$resultado);
            return $array;
        }
        
	}
?>