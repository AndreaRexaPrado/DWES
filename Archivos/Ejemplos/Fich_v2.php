<?php
    $ruta="../";
    $nomf=$ruta."alumnos.txt";
    $f = fopen($nomf,"r");

    $fout=fopen($ruta."salida.txt","w");
    $alumnos= array();
    $cursos= array("DAM","DAW");
    //Si el fichero par lectura no exites devuelve false
    if(!$f) echo "No existe el archivo ".$nomf;
    else{
    //leer el archivo linea por linea

        while(!feof($f)){
            $c = fgets($f);
            $partes = explode("\n", $c);
            print_r($partes);
           
            /*$id = $partes[0];
            $nombre = $partes[1];
            echo $id;           
            echo $nombre;    */       
            fwrite($fout,$c);
        }

    }

    
?>