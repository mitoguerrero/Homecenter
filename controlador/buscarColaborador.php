<?php

    $valor_busqueda = $_GET["term"];
    
    if (!$valor_busqueda){
        return;
    }
        
    require_once '../modelo/clsColaborador.php';
    $objColaborador = new Colaborador();
    
    $resultado = $objColaborador->buscarColaborador($valor_busqueda);
    
    echo "[";
    
    for ($i=1;$i<=count($resultado);$i++){
        $codigo = $resultado[$i]["idcolaborador"];
        $nombre_completo = $resultado[$i]["apellido"].' '.$resultado[$i]["nombre"];
        $nombres=$resultado[$i]["nombre"];
        $apellidos=$resultado[$i]["apellido"];
        $dni = $resultado[$i]["dni"];
        $email = $resultado[$i]["correo"];
        $area = $resultado[$i]["idarea"];
        $fechana = $resultado[$i]["fechanacimiento"];
        $fechain = $resultado[$i]["fechaingreso"];
        $direccion = $resultado[$i]["direccion"];
        $telefono = $resultado[$i]["telefono"];
        
        echo '
                {
                    "label" : "'.$nombre_completo.'",
                    "value" : 
                        {
                            "codigo" : "'.$codigo.'",
                            "nombre" : "'.$nombre_completo.'",
                            "nombres" : "'.$nombres.'",
                            "apellidos" : "'.$apellidos.'",
                            "dni" : "'.$dni.'",
                            "email"  : "'.$email.'",
                            "area" : "'.$area.'",
                            "fechana" : "'.$fechana.'",
                            "fechain" : "'.$fechain.'",
                            "direccion" : "'.$direccion.'",
                            "telefono" : "'.$telefono.'"
                        }
                }
            ';
        
        if ($i < count($resultado)){
            echo ',';
        }
        
    }
    echo "]";

?>
