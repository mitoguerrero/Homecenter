<?php

    $valor_busqueda = $_GET["term"];
    
    if (!$valor_busqueda){
        return;
    }
        
    require_once '../modelo/clsCategoria.php';
    $objCategoria = new Categoria();
    
    $resultado = $objCategoria->buscarCategoria($valor_busqueda);
    
    echo "[";
    
    for ($i=1;$i<=count($resultado);$i++){
        $codigo = $resultado[$i]["idcategoria"];
        $nombre_completo = $resultado[$i]["nombrecategoria"];
        $nombres=$resultado[$i]["nombrecategoria"];
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
