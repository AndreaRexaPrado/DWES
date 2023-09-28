<?php 
    /* 7. Reemplazar el valor PHP de la cadena anterior por el valor JSP.   */

    $cadena ="Desarrollo Web en Entorno Servidor con PHP";
    $array = explode(" ",$cadena);
    print_r($array);
    echo "<br>";
    $cadenaNueva = implode("-",$array);
    printf("La nueva cadena es: %s",$cadenaNueva);
    echo "<br>";
    $cadenaJSP= str_replace("PHP","JSP",$cadenaNueva);

    printf("La nueva cadena con JSP es: %s",$cadenaJSP);
    /*Array ( [0] => Desarrollo [1] => Web [2] => en [3] => Entorno [4] => Servidor [5] => con [6] => PHP )
    La nueva cadena es: Desarrollo-Web-en-Entorno-Servidor-con-PHP
    La nueva cadena con JSP es: Desarrollo-Web-en-Entorno-Servidor-con-JSP
    -En conclusion str_replace busca el fragmento a cambiar y la remplaza por el nuevo*/  
?>