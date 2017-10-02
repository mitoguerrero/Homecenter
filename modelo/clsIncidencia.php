<?php
	class Incidencia{
		private $tipo;
		private $colaborador;
		private $descripcion;
		private $idusuario;
		private $categoria;
        private $fecha;
        private $horaregistro;

		public function setTipo($tipo){$this->tipo=$tipo;}
		public function getTipo(){return $this->tipo;}
		public function setColaborador($colaborador){$this->colaborador=$colaborador;}
		public function getColaborador(){return $this->colaborador;}
		public function setDescripcion($descripcion){$this->descripcion=$descripcion;}
		public function getDescripcion(){return $this->descripcion;}
		public function setUsuario($idusuario){$this->idusuario=$idusuario;}
		public function getUsuario(){return $this->idusuario;}
		public function setCategoria($categoria){$this->categoria=$categoria;}
		public function getCategoria(){return $this->categoria;}
        public function setFecha($fecha){$this->fecha=$fecha;}
        public function getFecha(){return $this->fecha;}
        public function setHora($horaregistro){$this->horaregistro=$horaregistro;}
        public function getHora(){return $this->horaregistro;}

		public function registrarIncidencia(){
            $correcto=false;
            require_once 'clsConexion.php';
            $objConexion = new Conexion();
            $sql="insert into incidencia(idtipoincidencia,idcolaborador,descripcion,fecharegistro,idusuario,idcategoria,horaregistro)
            values(".$this->getTipo().",
            ".$this->getColaborador().",
            '".$this->getDescripcion()."',
            '".$this->getFecha()."',
            ".$this->getUsuario().",
            ".$this->getCategoria().",
            '".$this->getHora()."')";
            
            
            if($objConexion->consultar($sql)){
                $correcto=true;
            }
                return $correcto;
        }
        public function listarIncidencia(){
            require_once 'clsConexion.php';
            $objConexion = new Conexion();
            $sql="select idincidencia,tipo_incidencia.nombretipoincidencia,idcolaborador,descripcion,fecharegistro,categoria_incidencia.nombrecategoria,usuario.nombre,usuario.apellido from incidencia
            inner join usuario on incidencia.idcolaborador=usuario.idusuario
            inner join categoria_incidencia on categoria_incidencia.idcategoria=incidencia.idcategoria
            inner join tipo_incidencia on tipo_incidencia.idtipoincidencia=incidencia.idtipoincidencia";
            $resultado=$objConexion->consultar($sql);

            $tabla = '
                <table id="table_id" class="display table table-bordered">
                    <thead>
                        <tr>
                            <th>Incidencia</th>
                            <th>Colaborador</th>
                            <th>Tipo</th>
                            <th>Categoria</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>      
                    <tbody>
                ';
            
            while ($registro = $resultado->fetch()){
            	
                $tabla .= '
                        <tr>
                            <td>'.$registro["descripcion"].'</td>
                            <td>'.$registro["nombre"].' '.$registro["apellido"].'</td>
                            <td>'.$registro["nombretipoincidencia"].'</td>
                            <td>'.$registro["nombrecategoria"].'</td>
                            <td>'.$registro["fecharegistro"].'</td>
                        </tr>
                    ';
            }
            
            $tabla .= '
                    </tbody>
                </table>
                ';
            
            echo $tabla;
        }
        public function listar($colaborador){
            require_once 'clsConexion.php';
            $objConexion = new Conexion();
            $sql="select count(incidencia.idincidencia) as cantidad,incidencia.idcategoria from incidencia
            where incidencia.idcolaborador=".$colaborador." and incidencia.idtipoincidencia=2
            group by incidencia.idcategoria";
            $resultado=$objConexion->consultar($sql);

            $retorno=null;
            $i=0;
            while ($registro=$resultado->fetch()) {
                $i++;
                $retorno[$i]["cantidad"]=$registro["cantidad"];
                $retorno[$i]["idcategoria"]=$registro["idcategoria"];
            }
            $array = array('state' =>1 ,'retorno'=>$retorno);
            return $array;            
        }
        public function listarIncidenciaPorCategoria($colaborador,$categoria){
            require_once 'clsConexion.php';
            $objConexion= new Conexion();
            $sql="select incidencia.descripcion,incidencia.fecharegistro from incidencia
            inner join usuario on incidencia.idcolaborador=usuario.idusuario
            where usuario.idusuario=".$colaborador." and incidencia.idcategoria=".$categoria."";
            $resultado=$objConexion->consultar($sql);

            $retorno=null;
            $i=0;
            while ($registro=$resultado->fetch()) {
                $i++;
                $retorno[$i]["descripcion"]=$registro["descripcion"];
                $retorno[$i]["fecharegistro"]=$registro["fecharegistro"];
            }
            $array = array('state' =>1 ,'retorno'=>$retorno);
            return $array;
        }
        public function listarIncidenciaPorTipo($colaborador,$tipo){
            require_once 'clsConexion.php';
            $objConexion= new Conexion();
            $sql="select incidencia.descripcion,incidencia.fecharegistro from incidencia
            inner join usuario on incidencia.idcolaborador=usuario.idusuario
            where usuario.idusuario=".$colaborador." and incidencia.idtipoincidencia=".$tipo."";
            $resultado=$objConexion->consultar($sql);

            $retorno=null;
            $i=0;
            while ($registro=$resultado->fetch()) {
                $i++;
                $retorno[$i]["descripcion"]=$registro["descripcion"];
                $retorno[$i]["fecharegistro"]=$registro["fecharegistro"];
            }
            $array = array('state' =>1 ,'retorno'=>$retorno);
            return $array;
        }
        public function listarIncidenciaDetalle($categoria,$colaborador){
            require_once 'clsConexion.php';
            $objConexion= new Conexion();
            $sql="select incidencia.descripcion,incidencia.fecharegistro from incidencia
            where incidencia.idcategoria=".$categoria." and incidencia.idcolaborador=".$colaborador." and incidencia.idtipoincidencia=2";
            $resultado=$objConexion->consultar($sql);

            $retorno=null;
            $i=0;
            while ($registro=$resultado->fetch()) {
                $i++;
                $retorno[$i]["descripcion"]=$registro["descripcion"];
                $retorno[$i]["fecharegistro"]=$registro["fecharegistro"];
            }
            $array = array('state' =>1 ,'retorno'=>$retorno);
            return $array;
        }
	}
?>