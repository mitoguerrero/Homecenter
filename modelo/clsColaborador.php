<?php
	class Colaborador{
		private $idusuario;
		private $idarea;
		private $nombre;
		private $apellido;
		private $direccion;
		private $telefono;
		private $fechaNacimiento;
		private $fechaIngreso;
		private $dni;
		private $correo;
		private $estado;

		public function setUsuario($idusuario){$this->idusuario=$idusuario;}
		public function getUsuario(){return $this->idusuario;}
		public function setArea($idarea){$this->idarea=$idarea;}
		public function getArea(){return $this->idarea;}
		public function setNombre($nombre){$this->nombre=$nombre;}
		public function getNombre(){return $this->nombre;}
		public function setApellido($apellido){$this->apellido=$apellido;}
		public function getApellido(){return $this->apellido;}
		public function setDireccion($direccion){$this->direccion=$direccion;}
		public function getDireccion(){return $this->direccion;}
		public function setTelefono($telefono){$this->telefono=$telefono;}
		public function getTelefono(){return $this->telefono;}
		public function setFechaNacimiento($fechaNacimiento){$this->fechaNacimiento=$fechaNacimiento;}
		public function getFechaNacimiento(){return $this->fechaNacimiento;}
		public function setfechaIngreso($fechaIngreso){$this->fechaIngreso=$fechaIngreso;}
		public function getfechaIngreso(){return $this->fechaIngreso;}
		public function setDni($dni){$this->dni=$dni;}
		public function getDni(){return $this->dni;}
		public function setCorreo($correo){$this->correo=$correo;}
		public function getCorreo(){return $this->correo;}
		public function setEstado($estado){$this->estado=$estado;}
		public function getEstado(){return $this->estado;}

		public function registrarColaborador(){
            $correcto=false;
            require_once 'clsConexion.php';
            $objConexion = new Conexion();
            $sql="insert into usuario(idregistra,idarea,nombre,apellido,direccion,telefono,fechanacimiento,fechaingreso,dni,correo,estado,idtipousuario)
            values(".$this->getUsuario().",
            ".$this->getArea().",
            '".$this->getNombre()."',
            '".$this->getApellido()."',
            '".$this->getDireccion()."',
            '".$this->getTelefono()."',
            '".$this->getFechaNacimiento()."',
            '".$this->getfechaIngreso()."',
            '".$this->getDni()."',
            '".$this->getCorreo()."',
            1,
            4)";
            
            if($objConexion->consultar($sql)){
                $correcto=true;
            }
                return $correcto;
        }
        public function listarColaborador(){
            require_once 'clsConexion.php';
            $objConexion = new Conexion();
            $sql="select idusuario,nombrearea,nombre,apellido,direccion,telefono,fechanacimiento,fechaingreso,dni,correo,estado from usuario
            inner join area on usuario.idarea=area.idarea";
            $resultado=$objConexion->consultar($sql);

            $tabla = '
                <table id="table_id" class="display table table-bordered">
                    <thead>
                        <tr>
                            <th>Colaborador</th>
                            <th>Dni</th>
                            <th>Área</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Fecha Ingreso</th>
                            <th>Correo</th>
                            <th>Estado</th>
                        </tr>
                    </thead>      
                    <tbody>
                ';
            
            while ($registro = $resultado->fetch()){
            	if ($registro["estado"]==1) {
            		$estado='DAR DE BAJA';
                    $boton='<button class="btn btn-danger" onclick="cambiarEstado('.$registro["idusuario"].',0);">'.$estado.'</button>';
            	}else{
                    $estado='ACTIVAR';
            		$boton='<button class="btn btn-success" onclick="cambiarEstado('.$registro["idusuario"].',1);">'.$estado.'</button>';
            	}
                $tabla .= '
                        <tr>
                            <td>'.stripslashes($registro["apellido"]).' '.stripslashes($registro["nombre"]).'</td>
                            <td>'.$registro["dni"].'</td>
                            <td>'.$registro["nombrearea"].'</td>
                            <td>'.$registro["direccion"].'</td>
                            <td>'.$registro["telefono"].'</td>
                            <td>'.$registro["fechaingreso"].'</td>
                            <td>'.$registro["correo"].'</td>
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
        public function editarColaborador($id_colaborador){
            $correcto=false;
            require_once 'clsConexion.php';
            $objConexion = new Conexion();
            $sql="update usuario
            set idarea=".$this->getArea().",
            nombre='".$this->getNombre()."',
            apellido='".$this->getApellido()."',
            dni='".$this->getDni()."',
            correo='".$this->getCorreo()."',
            direccion='".$this->getDireccion()."',
            telefono='".$this->getTelefono()."',
            fechanacimiento='".$this->getFechaNacimiento()."',
            fechaingreso='".$this->getfechaIngreso()."'
            where idusuario=".$id_colaborador."";

            if ($objConexion->consultar($sql)) {
                $correcto=true;
            }
            return $correcto;
        }
        public function cambiarEstado($estado,$usuario){
            $correcto=false;
            require_once 'clsConexion.php';
            $objConexion = new Conexion();
            $sql="update usuario
            set estado=".$estado."
            where idusuario=".$usuario."";
            if ($objConexion->consultar($sql)) {
                $correcto=true;
            }
            $array = array('state' => $correcto);
            return $array;
        }
        public function buscarColaborador($valor){
            require_once 'clsConexion.php';
            $objCon = new Conexion();
            $sql = "select idusuario,idarea,nombre,apellido,dni,direccion,telefono,correo,fechanacimiento,fechaingreso from usuario where lower(apellido)  like '%".strtolower($valor)."%'  ||  lower(nombre) like '%".strtolower($valor)."%' and idtipousuario=4 order by apellido";
            $resultado = $objCon->consultar($sql);
            
            $retorno = null;
            
            $i=0;
            while($registro = $resultado->fetch()){
                $i++;
                $retorno[$i]["idcolaborador"]  = $registro["idusuario"];
                $retorno[$i]["idarea"]      = $registro["idarea"];
                $retorno[$i]["nombre"]      = $registro["nombre"];
                $retorno[$i]["apellido"]      = $registro["apellido"];
                $retorno[$i]["dni"]      = $registro["dni"];
                $retorno[$i]["direccion"]      = $registro["direccion"];
                $retorno[$i]["telefono"]      = $registro["telefono"];
                $retorno[$i]["correo"]      = $registro["correo"];
                $retorno[$i]["fechanacimiento"]      = $registro["fechanacimiento"];
                $retorno[$i]["fechaingreso"]      = $registro["fechaingreso"];
            }
            
            return $retorno;
        }
        public function buscarColaboradorNoEvaluado($valor){
            require_once 'clsConexion.php';
            $objCon = new Conexion();
            $sql = "select idusuario,idarea,nombre,apellido,dni,direccion,telefono,correo,fechanacimiento,fechaingreso from usuario where lower(apellido)  like '%".strtolower($valor)."%'  ||  lower(nombre) like '%".strtolower($valor)."%' and idtipousuario=4 and usuario.idusuario not in(select ejecutar_evaluacion.idcolaborador from ejecutar_evaluacion inner join evaluacion on ejecutar_evaluacion.idevaluacion=evaluacion.idevaluacion where evaluacion.estado=1) order by apellido";
            $resultado = $objCon->consultar($sql);
            
            $retorno = null;
            
            $i=0;
            while($registro = $resultado->fetch()){
                $i++;
                $retorno[$i]["idcolaborador"]  = $registro["idusuario"];
                $retorno[$i]["idarea"]      = $registro["idarea"];
                $retorno[$i]["nombre"]      = $registro["nombre"];
                $retorno[$i]["apellido"]      = $registro["apellido"];
                $retorno[$i]["dni"]      = $registro["dni"];
                $retorno[$i]["direccion"]      = $registro["direccion"];
                $retorno[$i]["telefono"]      = $registro["telefono"];
                $retorno[$i]["correo"]      = $registro["correo"];
                $retorno[$i]["fechanacimiento"]      = $registro["fechanacimiento"];
                $retorno[$i]["fechaingreso"]      = $registro["fechaingreso"];
            }
            
            return $retorno;
        }
	}
?>