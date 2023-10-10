<html lang="es">
    <head>
        <meta charset="utf-8">
    </head>
    <body>

<?php
    header('Content-Type: text/html; charset=UTF-8');
    define("N","\n");

    $ruta="../";
    $nomf=$ruta."alumnos.txt";
    $f = fopen($nomf,"r");

    $fout=fopen($ruta."script_insert.txt","w");
    $alumnos= array();

    //Si el fichero par lectura no exites devuelve false
    if(!$f) echo "No existe el archivo ".$nomf;
    else{
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
                    $alumnos[$id]["apellido1"] = $alumno[1];
                    $alumnos[$id]["apellido2"] = $alumno[2];                 
                    break;
                case 2:
                    $alumnos[$id]["fechaNacimiento"] = date("d-m-Y",strtotime($s));
                    break;
                case 3:
                    $alumnos[$id]["curso"] =$s;
                    break;    
            }   
            $lineaNum++;
            
        }

        function conectBBDD(){
            $servername = "localhost";
            $username = "root";
            $password = "1234";
            $dbname = "ies";
            
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
              echo "a";
            }else{
                echo "EXITO";
            }
        }
        function generarFichInsert($alumnos,$fout){

            
            foreach($alumnos as $k => $v){
                $insert="INSERT INTO ALUMNOS (numexp,nombre,ape1,ape2,fnac,ciclo) VALUES (".intval($k).",'$v[apellido1]','$v[apellido2]','$v[nombre]','".date('Y-m-d',strtotime($v['fechaNacimiento']))."','$v[curso]');\n";
                fwrite($fout,$insert);
            }

        }
        //print_r($alumnos);
        //tabla($alumnos);
        //generarFichInsert($alumnos,$fout);
        conectBBDD();
    }

    
?>
    </body>
</html>