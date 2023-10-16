<?php

header('Content-Type: text/html; charset=UTF-8');
define("N","\n");

define("RUTA","../");
function xml_attribute($object, $attribute)
{
    if(isset($object[$attribute]))
        return (string) $object[$attribute];
}

function leerFich($nomf){
    $productos= array();
    $id=0;
    $f = fopen($nomf,"r");
    //Si el fichero par lectura no exites devuelve false
    if(!$f) {
        echo "No existe el archivo ".$nomf;
    }else{
        $xml = simplexml_load_file($nomf);
 
   // print_r($xml);
    foreach($xml as $k => $v){
        echo "$k...". xml_attribute($xml,"cod");
        foreach($v as $c => $d){
            echo "$c.....$d<br>";  
        }
    }
    //leer el archivo s por s
        /*$lineaNum=0;
        define("lineas",4);
        while(!feof($f)){
            
            $s = mb_convert_encoding(trim(fgets($f)),'UTF-8','ISO-8859-1');
            
            echo "$s<br>";
            /*switch($lineaNum%lineas){
                case 0:
                    $id = $s; 
                    $alumnos[$id] = array();
                    break;
                case 1:
                    $alumno=explode(" | ",$s);

                    $alumnos[$id]["nombre"] = $alumno[0];
                    $alumnos[$id]["ape1"] = $alumno[1];
                    $alumnos[$id]["ape2"] = $alumno[2];                 
                    break;
                case 2:
                    $alumnos[$id]["fnac"] = date("d-m-Y",strtotime($s));
                    break;
                case 3:
                    $alumnos[$id]["ciclo"] =$s;
                    break;    
            }   
            $lineaNum++;
            
        }*/
    }
    //return $alumnos;
    
} 
$pp=leerFich(RUTA."prods.xml");
?>