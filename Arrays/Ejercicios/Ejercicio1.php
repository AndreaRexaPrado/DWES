<?php 
    /* 1. Dados los dos siguientes arrays,
        $a = array("manzana", "naranja”);
        $b = array(1 => "manzana", "0" => "naranja");
        Añadir dos nuevos elementos a ambos arrays: uno con el valor uva y otro con el valor mandarina.
        Mostrar los nuevos resultados. 
    */

    $a = array("manzana", "naraja"); 
    $b = array("1"=>"manzana", "0"=>"naranja");

    echo "Antes de añadir<br>";

    var_dump($a);
    echo "<br>";
    var_dump($b);

    $a[]="uva";
    $b[]="uva";

    $a[]="mandarina";
    $b[]="mandarina";
    echo "<br>Despues de añadir<br>";
    var_dump($a);
    echo "<br>";
    var_dump($b);

    /*
    Antes de añadir
    array(2) { [0]=> string(7) "manzana" [1]=> string(6) "naraja" }
    array(2) { [1]=> string(7) "manzana" [0]=> string(7) "naranja" }
    Despues de añadir
    array(4) { [0]=> string(7) "manzana" [1]=> string(6) "naraja" [2]=> string(3) "uva" [3]=> string(9) "mandarina" }
    array(4) { [1]=> string(7) "manzana" [0]=> string(7) "naranja" [2]=> string(3) "uva" [3]=> string(9) "mandarina" }

    -En conclusion los arrays en estos casos la clave no es la siguiente a la ultima si no la cantidad de elementos + 1
    eso en el caso de que no introduzcamos una personalizada a la hora de añadir*/
?>