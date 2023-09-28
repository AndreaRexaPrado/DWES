<?php 
    /* 5. Dada la cadena de caracteres “Desarrollo Web en Entorno Servidor con PHP”, construir un
array con cada palabra de la cadena anterior. */

    $cadena ="Desarrollo Web en Entorno Servidor con PHP";
    $array = explode(" ",$cadena);
    print_r($array);
    /*Array ( [0] => Desarrollo [1] => Web [2] => en [3] => Entorno [4] => Servidor [5] => con [6] => PHP )
    -En conclusion explode divide la cadena detectando el separador que se introduce como primer argumento,
     y generando un array en el que cada palabra esta en un hueco  */  
?>