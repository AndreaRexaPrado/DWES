<?php 
    /* 6. Dado el array obtenido en el ejercicio anterior, obtener una cadena con sus elementos, pero
separados por el carácter ‘-‘. Debe salir “Desarrollo-Web-en Entorno-Servidor-con-PHP”.  */

    $cadena ="Desarrollo Web en Entorno Servidor con PHP";
    $array = explode(" ",$cadena);
    print_r($array);
    echo "<br>";
    $cadenaNueva = implode("-",$array);
    printf("La nueva cadena es: %s",$cadenaNueva);
    /*Array ( [0] => Desarrollo [1] => Web [2] => en [3] => Entorno [4] => Servidor [5] => con [6] => PHP )
    La nueva cadena es: Desarrollo-Web-en-Entorno-Servidor-con-PHP
    -En conclusion implode funcina al contrario que explode, 
    une las palabras de un array con el separador introducido como primer argumento */  
?>