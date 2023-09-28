<?php 
    /* 4. A partir de $b obtener otro array con los mismos valores, 
    pero con claves numéricas empezando desde 0. Nota: array_values.*/

    $b = array("1"=>"manzana", "0"=>"naranja");
    
    $arrayValoresB = array_values($b);
    asort($arrayValoresB);

    print_r($arrayValoresB);

    //Array ( [0] => manzana [1] => naranja )
    //array_values similar a array_keys pero con los valores    
?>