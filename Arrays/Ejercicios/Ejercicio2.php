<?php 
    /* 2. Guardar las claves del array $b en otro array. Nota: array_keys.
    */
    $a = array("manzana", "naraja"); 
    $b = array(1=>"manzana", "0"=>"naranja");

    $arrayClavesB = array_keys($b);
    $arrayClavesA = array_keys($a);
    echo "Antes de añadir<br>";
    var_dump($b);
    echo "<br>";
    var_dump($arrayClavesB);

    var_dump($a);
    echo "<br>";
    var_dump($arrayClavesA);

    $a[]="uva";
    $b[]="uva";

    $a[]="mandarina";
    $b[]="mandarina";

    $arrayClavesB = array_keys($b);
    echo "<br>Despues de añadir<br>";
    var_dump($b);
    echo "<br>";
    var_dump($arrayClavesB);
    var_dump($a);
    echo "<br>";
    var_dump($arrayClavesA);

    /*
    Antes de añadir
    array(2) { [1]=> string(7) "manzana" [0]=> string(7) "naranja" }
    array(2) { [0]=> int(1) [1]=> int(0) }
    Despues de añadir
    array(4) { [1]=> string(7) "manzana" [0]=> string(7) "naranja" [2]=> string(3) "uva" [3]=> string(9) "mandarina" }
    array(4) { [0]=> int(1) [1]=> int(0) [2]=> int(2) [3]=> int(3) }

    -En conclusion array_keys crea otro array con los valores puede ser util ya que como las claves son personalizas 
    para conocerlas, no se actualiza solo cada vez de se añade un nuevo elemento al array $b hay que ejecutar el metodo
    */
?>