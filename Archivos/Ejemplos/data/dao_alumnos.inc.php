<?php
/**
 * Metodos del patron DAO
 */
define("lineas",4);


function getAll(){
    $modelo= "data/alumnos.txt"; //Archivo con los datos
    $f = fopen($modelo,"r");
    $id="";
    $nombre="";
    $ape1="";
    $ape2="";
    $fnac="";
    $ciclo="";
    $alumnos= array();
    //devuelve un listado(ARRAY)
    //con todos los elementos(clientes, alumnos...)
    if(!$f) echo "No existe el archivo ".$modelo;
    else{
    //leer el archivo s por s
        $lineaNum=0;
        
        while(!feof($f)){
            
            $s = mb_convert_encoding(trim(fgets($f)),'ISO-8859-1','UTF-8');
      
                switch($lineaNum%lineas){
                    case 0:
                        $id = $s; 
                        break;
                    case 1:
                        $alumno=explode(" | ",$s);
                        $nombre = $alumno[0];
                        $ape1 = $alumno[1];
                        $ape2 = $alumno[2];  
                                    
                        break;
                    case 2:
                        $fnac = date("d-m-Y",strtotime($s));
                        
                        break;
                    case 3:
                        $ciclo =$s;
                        break;    
                }

            if($id !== "0000"&&!empty($s)){
                $alumnos[$id] = array("nombre"=>$nombre,"ape1"=>$ape1,"ape2"=>$ape2,"fnac"=>$fnac,"ciclo"=>$ciclo);  
            }
            $lineaNum++;
            
        }
    }
    return $alumnos;
}

function get($key){
    $alumnos= getAll();
    return $alumnos[$key];
}

function save($item_id,$item){
    //guarda el elemento que se recibe como parametro
    //relacionado con ESTRATEGIAS de INSERCION
    //(Decisiones que se toman a la hora de insertar ej: si el alumno esta repetido no dejar insertalo)

    //Algunas veces, save sustituye a update

    $alumnos=getAll();
    $alumnos[$item_id]=$item;

    $fout=fopen("data/alumnos.txt","w");
    foreach($alumnos as $k => $v){
        fwrite($fout,$k."\n");
        $al= $v["nombre"]." | ".$v["ape1"]." | ".$v["ape2"];
        fwrite($fout,$al."\n");
        fwrite($fout,$v["fnac"]."\n");
        fwrite($fout,$v["ciclo"]."\n");
        
    }

}

function update($item){
    //actualiza el elemento que se recibe como parametro
    //relacionado con ESTRATEGIAS de ACTUALIZCION
    //(Decisiones que se toman a la hora de actualizar ej: si el alumno esta repetido actualizarlo)

    //Algunas veces, se incluye en el save
}
function delete($item){
    //borra el elemento que se recibe como parametro
    //relacionado con ESTRATEGIAS de BORRADO
    
}
function getCiclos(){
    $ciclos = array();

    $alumnos= getAll();

    foreach($alumnos as $k => $v){
        foreach($v as $kv =>$vv){
            if($kv == "ciclo"){
                //echo $kv."....".$vv;
                if(!in_array($vv,$ciclos)){
                    $ciclos[]=$vv;
                }
                
            }
        }

    }

    return $ciclos;
}
?>