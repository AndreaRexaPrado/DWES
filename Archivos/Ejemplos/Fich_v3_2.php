<html lang="es">
    <head>
        <meta charset="utf-8">
    </head>
    <body>

<?php
    header('Content-Type: text/html; charset=UTF-8');
    define("N","\n");

    define("RUTA","../");
    define("TITULOS",array("numexp" =>"Numero de expediente","nombre" =>"Nombre","ape1" =>"Primer Apellido","ape2" =>"Segundo Apellido","fnac"=>"Fecha nacimiento","ciclo"=>"Ciclo formativo"));
       
    function leerFich($nomf){
        $alumnos= array();
        $id=0;
        $f = fopen($nomf,"r");
        //Si el fichero par lectura no exites devuelve false
        if(!$f) {
            echo "No existe el archivo ".$nomf;
        }else{
        //leer el archivo s por s
            $lineaNum=0;
            define("lineas",4);
            while(!feof($f)){
                
                $s = mb_convert_encoding(trim(fgets($f)),'UTF-8','ISO-8859-1');
                
                switch($lineaNum%lineas){
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
                
            }
        }
        return $alumnos;
        
    }   
    $aa = leerFich(RUTA."alumnos.txt");
    function generarFichInsert($alumnos,$fichero){

        $fout=fopen($fichero,"w");  
        $values = array("numexp");    
        $primero= $alumnos[array_key_first($alumnos)];

        foreach($primero as $k => $v){
            $values[] = $k;
        }


        $cabezera="INSERT INTO ALUMNOS (";

        foreach($values as $k => $v){
            $cabezera.=$v.',';
        }

        $cabezera=substr($cabezera,0,-1);
        $cabezera.=") VALUES (";
        

        foreach($alumnos as $k => $v){

            $insert=$cabezera;
            $insert.=intval($k);
            foreach($v as $c =>$d){
                
                if($c=="numexp"){
                    $insert.= ",$d";
                }elseif($c=="fnac"){
                    $insert.= date('Y-m-d',strtotime($d));
                }else{
                    $insert.= ",\"$d\"";
                }


            }
            $insert.=");\n";
            fwrite($fout,$insert);

        }
    }
    function verTabla($alumnos){

        $t="<table border='1'>".N;
        $t.="<caption>Alumnos de dam y daw</caption>".N;       
        $t.="<thead>".N;

        $values = array("numexp");    
        $primero= $alumnos[array_key_first($alumnos)];

        foreach($primero as $k => $v){
            $values[] = $k;
        }

        foreach($values as $k => $v){
            $t.="<th>".TITULOS[$v]."</th>";
        }
        $t.="</thead>".N;
        $t.="<tbody>".N;

        foreach($alumnos as $k => $v){
            $t.="<tr>".N;
            $t.="<td>$k</td>".N;
            foreach($v as $c => $d){
                $t.="<td>$d</td>".N;
            }
   
            $t.="</tr>".N;
            
        }
        $t.="</tbody>".N;

        $t.="</table>".N;
        echo $t;
    }
   
    verTabla($aa);
    generarFichInsert($aa,RUTA."script_insert.sql");
       
?>
    </body>
</html>