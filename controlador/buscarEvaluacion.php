<?php

    $valor_busqueda = $_GET["term"];
    
    if (!$valor_busqueda){
        return;
    }
        
    require_once '../modelo/clsEvaluacion.php';
    $objEvaluacion = new Evaluacion();
    
    $resultado = $objEvaluacion->buscarEvaluacion($valor_busqueda);
    
    echo "[";
    
    for ($i=1;$i<=count($resultado);$i++){
        $codigo = $resultado[$i]["idevaluacion"];
        $nombre_completo = $resultado[$i]["descripcion"];
        $periodo =$resultado[$i]["idperiodo"];
        
        echo '
                {
                    "label" : "'.$nombre_completo.'",
                    "value" : 
                        {
                            "codigo" : "'.$codigo.'",
                            "nombre" : "'.$nombre_completo.'",
                            "periodo" : "'.$periodo.'"
                        }
                }
            ';
        
        if ($i < count($resultado)){
            echo ',';
        }
        
    }
    echo "]";

?>
