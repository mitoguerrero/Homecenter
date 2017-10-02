<?php
    class Conexion {
        private function conectar() {
            $direccion  = "mysql:host=localhost;port=3306;dbname=homecenter";
            $usuario    = "root";
            $clave      = "";
            
            $dblink = new PDO($direccion,$usuario,$clave);
            $dblink->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $dblink;
        }
        
        public function consultar($cadenaSql){
            $resultado = 0;
            try {
                $conexion = $this->conectar();
                $resultado = $conexion->query($cadenaSql);
            } catch (Exception $exc) {
                $resultado = 0;
                echo $exc->getMessage();
                exit();
            }
            
            return $resultado;
        }
    }
    
?>