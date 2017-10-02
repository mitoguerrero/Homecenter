<?php
	class Categoria{
		private $nombre;
		private $estado;

		public function setNombre($nombre){$this->nombre=$nombre;}
		public function getNombre(){return $this->nombre;}
		public function setEstado($estado){$this->estado=$estado;}
		public function getEstado(){return $this->estado;}

		public function cargarCategoria(){
			require_once 'clsConexion.php';
			$objConexion = new Conexion();
			$sql="select idcategoria,nombrecategoria from categoria_incidencia
            where estado=1";
			$resultado = $objConexion->consultar($sql);

			$retorno = null;
			$i=0;
			while ($registro= $resultado->fetch()) {
				$i++;
				$retorno[$i]["idcategoria"]=$registro["idcategoria"];
				$retorno[$i]["nombrecategoria"]=$registro["nombrecategoria"];
			}
			$array = array('state' => 1,'retorno' => $retorno );
			return $array;
		}
        public function cargarCategoriaTodos(){
            require_once 'clsConexion.php';
            $objConexion = new Conexion();
            $sql="select idcategoria,nombrecategoria from categoria_incidencia";
            $resultado = $objConexion->consultar($sql);

            $retorno = null;
            $i=0;
            while ($registro= $resultado->fetch()) {
                $i++;
                $retorno[$i]["idcategoria"]=$registro["idcategoria"];
                $retorno[$i]["nombrecategoria"]=$registro["nombrecategoria"];
            }
            $array = array('state' => 1,'retorno' => $retorno );
            return $array;
        }
		public function registrarCategoria(){
            $correcto=false;
            require_once 'clsConexion.php';
            $objConexion = new Conexion();
            $sql="insert into categoria_incidencia(nombrecategoria,estado)
            values('".$this->getNombre()."',
            1)";
            
            if($objConexion->consultar($sql)){
                $correcto=true;
            }
                return $correcto;
        }
        public function listarCategoria(){
            require_once 'clsConexion.php';
            $objConexion = new Conexion();
            $sql="select idcategoria,nombrecategoria,estado from categoria_incidencia";
            $resultado=$objConexion->consultar($sql);

            $tabla = '
                <table id="table_id" class="display table table-bordered">
                    <thead>
                        <tr>
                            <th>Categoría</th>
                            <th>Estado</th>
                        </tr>
                    </thead>      
                    <tbody>
                ';
            
            while ($registro = $resultado->fetch()){
            	if ($registro["estado"]==1) {
            		$estado='DAR DE BAJA';
                    $boton='<button class="btn btn-danger" onclick="cambiarEstado('.$registro["idcategoria"].',0);">'.$estado.'</button>';
            	}else{
            		$estado='ACTIVAR';
                    $boton='<button class="btn btn-success" onclick="cambiarEstado('.$registro["idcategoria"].',1);">'.$estado.'</button>';
            	}
                $tabla .= '
                        <tr>
                            <td>'.$registro["nombrecategoria"].'</td>
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
        public function editarCategoria($id_categoria){
            $correcto=false;
            require_once 'clsConexion.php';
            $objConexion = new Conexion();
            $sql="update categoria_incidencia
            set nombrecategoria='".$this->getNombre()."'
            where idcategoria=".$id_categoria."";

            if ($objConexion->consultar($sql)) {
                $correcto=true;
            }
            return $correcto;
        }
        public function cambiarEstado($estado,$categoria){
            $correcto=false;
            require_once 'clsConexion.php';
            $objConexion = new Conexion();
            $sql="update categoria_incidencia
            set estado=".$estado."
            where idcategoria=".$categoria."";
            if ($objConexion->consultar($sql)) {
                $correcto=true;
            }
            $array = array('state' => $correcto);
            return $array;
        }
        public function buscarCategoria($valor){
            require_once 'clsConexion.php';
            $objCon = new Conexion();
            $sql = "select idcategoria,nombrecategoria,estado from categoria_incidencia where lower(nombrecategoria) like '%".strtolower($valor)."%' order by nombrecategoria";
            $resultado = $objCon->consultar($sql);
            
            $retorno = null;
            
            $i=0;
            while($registro = $resultado->fetch()){
                $i++;
                $retorno[$i]["idcategoria"]  = $registro["idcategoria"];
                $retorno[$i]["nombrecategoria"]      = $registro["nombrecategoria"];
                $retorno[$i]["estado"]      = $registro["estado"];
            }
            
            return $retorno;
        }
	}
?>