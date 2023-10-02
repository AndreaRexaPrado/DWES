<?php 
    /* 3. Ordenar:
        a. descendentemente por clave el array $b anterior
        b. ascendentemente por valor el array $b anterior. 

    */

    $b = array(1=>"manzana", "0"=>"naranja");
    echo "Antes de ordernar descendentemente por clave <br>";
    var_dump($b);
    echo "<br>";
    arsort($b);

    echo "Despues de ordernar descendentemente por clave <br>";
    var_dump($b);
    echo "<br>";

    echo "Antes de ordernar ascendentemente por valor <br>";
    var_dump($b);
    echo "<br>";
    arsort($b);

    echo "Despues de ordernar ascendentemente por valor <br>";
    var_dump($b);
    echo "<br>";
    /*
    Antes de ordernar descendentemente por clave
    array(2) { ["b"]=> string(7) "manzana" ["a"]=> string(7) "naranja" }
    Despues de ordernar descendentemente por clave
    array(2) { ["a"]=> string(7) "naranja" ["b"]=> string(7) "manzana" }
    Antes de ordernar ascendentemente por valor
    array(2) { ["a"]=> string(7) "naranja" ["b"]=> string(7) "manzana" }
    Despues de ordernar ascendentemente por valor
    array(2) { ["a"]=> string(7) "naranja" ["b"]=> string(7) "manzana" }

    -En conclusion la ordenacion indendientemente se ordena alfabeticamente desc o asc
    */
?>