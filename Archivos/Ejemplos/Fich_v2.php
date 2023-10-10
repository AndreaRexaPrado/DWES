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

    $fout=fopen($ruta."salida.txt","w");
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
                    /*$nombre = $alumno[0];
                    $apellido1 = $alumno[1];
                    $apellido2 = $alumno[2];*/
                    
                    break;
                case 2:

                    $alumnos[$id]["fechaNacimiento"] = date("d-m-Y",strtotime($s));
                    
                    //$fechaNacimiento = $s;
                    break;
                case 3:
                    $alumnos[$id]["curso"] =$s;
                    //$curso = $s;
                    /*
                    // Crear un array asociativo para cada alumno
                    $alumno = [
                        "nombre" => $nombre,
                        "apellido1" => $apellido1,
                        "apellido2" => $apellido2,
                        "fechaNacimiento" => $fechaNacimiento,
                        "curso" => $curso
                    ];
        
                    // Agregar el alumno al array principal usando el ID como índice
                    $alumnos[$id] = $alumno;*/
                    break;    
            }   
            $lineaNum++;
            
        }


        function tabla($alumnos){
            $t="<table border='1'>".N;
            $t.="<caption>Alumnos de dam y daw</caption>".N;
            $t.="<thead>".N;
            $t.="<th>id</th>".N;
            $t.="<th>Apellidos</th>".N;
            $t.="<th>Nombre</th>".N;
            $t.="<th>Fecha Nacimiento</th>".N;
            $t.="<th>Curso</th>".N;
            $t.="</thead>".N;
            $t.="<tbody>".N;

            foreach($alumnos as $k => $v){
                $t.="<tr>".N;
                $t.="<td>$k</td>".N;
                $t.="<td>$v[apellido1] $v[apellido2]</td>".N;
                $t.="<td>$v[nombre]</td>".N;
                $v['fechaNacimiento']=date('Y/m/d',strtotime($v['fechaNacimiento']));
                $t.="<td>$v[fechaNacimiento]</td>".N;
               // echo gettype($v['fechaNacimiento']);
                $t.="<td>$v[curso]</td>".N;     
                $t.="</tr>".N;
                
            }
            $t.="</tbody>".N;

            $t.="</table>".N;
            echo $t;
        }
        //print_r($alumnos);
        tabla($alumnos);

    }

    
?>
    </body>
</html>