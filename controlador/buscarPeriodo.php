<?php

    $valor_busqueda = $_GET["term"];
    
    if (!$valor_busqueda){
        return;
    }
        
    require_once '../modelo/clsPeriodo.php';
    $objPeriodo = new Periodo();
    
    $resultado = $objPeriodo->buscarPeriodo($valor_busqueda);
    
    echo "[";
    
    for ($i=1;$i<=count($resultado);$i++){
        $codigo = $resultado[$i]["idperiodo"];
        $nombre_completo = $resultado[$i]["nombreperiodo"];
        $nombres=$resultado[$i]["nombreperiodo"];
        $estado =$resultado[$i]["estado"];
        
        echo '
                {
                    "label" : "'.$nombre_completo.'",
                    "value" : 
                        {
                            "codigo" : "'.$codigo.'",
                            "nombre" : "'.$nombre_completo.'",
                            "nombres" : "'.$nombres.'",
                            "estado" : "'.$estado.'"
                        }
                }
            ';
        
        if ($i < count($resultado)){
            echo ',';
        }
        
    }
    echo "]";

?>
