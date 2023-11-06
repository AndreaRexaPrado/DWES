<?php
    include("Funciones.php");//Incluye el fichero que le indiques, es como si tuvieras el codigo de este escrito 
    echo imprimir_array($array);
    echo "<br>Minimo ".calcular_min($array);
    echo "<br>Maximo ".calcular_maximo($array);
    echo "<br>Media ".calcular_media($array);

?>