<?php
	class Periodo{
		private $nombre;
		private $estado;

		public function setNombre($nombre){$this->nombre=$nombre;}
		public function getNombre(){return $this->nombre;}
		public function setEstado($estado){$this->estado=$estado;}
		public function getEstado(){return $this->estado;}

		public function registrarPeriodo(){
            $correcto=false;
            require_once 'clsConexion.php';
            $objConexion = new Conexion();
            $sql="insert into periodo(nombreperiodo,estado)
            values('".$this->getNombre()."',
            2)";
            
            if($objConexion->consultar($sql)){
                $correcto=true;
            }
                return $correcto;
        }
        public function listarPeriodo(){
            require_once 'clsConexion.php';
            $objConexion = new Conexion();
            $sql="select idperiodo,nombreperiodo,estado from periodo";
            $resultado=$objConexion->consultar($sql);

            $tabla = '
                <table id="table_id" class="display table table-bordered">
                    <thead>
                        <tr>
                            <th>Periodo</th>
                            <th>Estado</th>
                        </tr>
                    </thead>      
                    <tbody>
                ';
            
            while ($registro = $resultado->fetch()){
            	if ($registro["estado"]==1) {
            		$estado='DAR DE BAJA';
                    $boton='<button class="btn btn-danger" onclick="cambiarEstado('.$registro["idperiodo"].',0)">'.$estado.'</button>';
            	}else{
            		$estado='ACTIVAR';
                    $boton='<button class="btn btn-success" onclick="cambiarEstado('.$registro["idperiodo"].',1)">'.$estado.'</button>';
            	}
                $tabla .= '
                        <tr>
                            <td>'.$registro["nombreperiodo"].'</td>
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
        public function editarPeriodo($id_periodo){
            $correcto=false;
            require_once 'clsConexion.php';
            $objConexion = new Conexion();
            $sql="update periodo
            set nombreperiodo='".$this->getNombre()."'
            where idperiodo=".$id_periodo."";

            if ($objConexion->consultar($sql)) {
                $correcto=true;
            }
            return $correcto;
        }
        public function cambiarEstado($estado,$periodo){
            $correcto=false;
            require_once 'clsConexion.php';
            $objConexion = new Conexion();
            $sql="update periodo
            set estado=".$estado."
            where idperiodo=".$periodo."";
            if ($objConexion->consultar($sql)) {
                $correcto=true;
            }
            $array = array('state' => $correcto);
            return $array;
        }
        public function buscarPeriodo($valor){
            require_once 'clsConexion.php';
            $objCon = new Conexion();
            $sql = "select idperiodo,nombreperiodo,estado from periodo where lower(nombreperiodo) like '%".strtolower($valor)."%' order by nombreperiodo";
            $resultado = $objCon->consultar($sql);
            
            $retorno = null;
            
            $i=0;
            while($registro = $resultado->fetch()){
                $i++;
                $retorno[$i]["idperiodo"]  = $registro["idperiodo"];
                $retorno[$i]["nombreperiodo"]      = $registro["nombreperiodo"];
                $retorno[$i]["estado"]      = $registro["estado"];
            }
            
            return $retorno;
        }
        public function cargarPeriodo(){
            require_once 'clsConexion.php';
            $objConexion= new Conexion();
            $sql="select idperiodo,nombreperiodo from periodo
            where estado=1
            order by nombreperiodo";
            $resultado=$objConexion->consultar($sql);

            $retorno=null;
            $i=0;
            while ($registro=$resultado->fetch()) {
                $i++;
                $retorno[$i]["idperiodo"]=$registro["idperiodo"];
                $retorno[$i]["nombreperiodo"]=$registro["nombreperiodo"];
            }
            $array = array('state' =>1 ,'retorno'=>$retorno);
            return $array;
        }
        public function cargarPeriodoTodos(){
            require_once 'clsConexion.php';
            $objConexion= new Conexion();
            $sql="select idperiodo,nombreperiodo from periodo
            order by nombreperiodo";
            $resultado=$objConexion->consultar($sql);

            $retorno=null;
            $i=0;
            while ($registro=$resultado->fetch()) {
                $i++;
                $retorno[$i]["idperiodo"]=$registro["idperiodo"];
                $retorno[$i]["nombreperiodo"]=$registro["nombreperiodo"];
            }
            $array = array('state' =>1 ,'retorno'=>$retorno);
            return $array;
        }
	}
?>