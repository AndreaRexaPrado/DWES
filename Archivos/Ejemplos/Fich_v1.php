<?php
    $ruta="../";
    $nomf=$ruta."alumnos.txt";
    $f = fopen($nomf,"r");

    $fout=fopen($ruta."salida.txt","w");
    $alumnos= array();
    //Si el fichero para lectura no exites devuelve false
    if(!$f) echo "No existe el archivo ".$nomf;
    else{
    //leer el archivo linea por linea
        while(!feof($f)){
            $c = fgetc($f);
            echo ($c=='\n'||$c == '\r') ?"<br>":$c;
            
            fwrite($fout,$c);
        }

    }

    
?>