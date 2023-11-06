<?php
    $array=array(3,4,6,7,30);
    function calcular_media($arr){
        if(is_array($arr)){
            $bool_num=true;//Flag para ver si el numero es un int o string
            for($i=0;$i<=count($arr)-1;$i++){
                //Se recorren todo los elementos del array viendo si hay algun string
                //si es asi se pone la flag en false y sale del bucle con break;
                if(is_string($arr[$i])){
                    $bool_num=false;
                    break;
                }
            }
            //Si la flag no ha cambiado hara la media
            if($bool_num){
                $media=array_sum($arr);
                print($media/count($arr));
                return $media/count($arr);
            }else{
                echo "El array no es un array de numeros";
            }
            
        }else{
            echo "$arr no es un array";
        }

    }
    

    function calcular_maximo($arr){
        if(is_array($arr)){
            $bool_num=true;//Flag para ver si el numero es un int o string
            for($i=0;$i<=count($arr)-1;$i++){
                //Se recorren todo los elementos del array viendo si hay algun string
                //si es asi se pone la flag en false y sale del bucle con break;
                if(is_string($arr[$i])){
                    $bool_num=false;
                    break;
                }
            }
            //Si la flag no ha cambiado hara la media
            if($bool_num){
                
                return max($arr);
            }else{
                echo "El array no es un array de numeros";
            }
            
        }else{
            echo "$arr no es un array";
        }

    }

   
    function calcular_min($arr){
        if(is_array($arr)){
            $bool_num=true;//Flag para ver si el numero es un int o string
            for($i=0;$i<=count($arr)-1;$i++){
                //Se recorren todo los elementos del array viendo si hay algun string
                //si es asi se pone la flag en false y sale del bucle con break;
                if(is_string($arr[$i])){
                    $bool_num=false;
                    break;
                }
            }
            //Si la flag no ha cambiado hara la media
            if($bool_num){
                
                return max($arr);
            }else{
                echo "El array no es un array de numeros";
            }
            
        }else{
            echo "$arr no es un array";
        }

    }
   

    function imprimir_array($arr){
        if(is_array($arr)){
            $bool_num=true;//Flag para ver si el numero es un int o string
            for($i=0;$i<=count($arr)-1;$i++){
                //Se recorren todo los elementos del array viendo si hay algun string
                //si es asi se pone la flag en false y sale del bucle con break;
                if(is_string($arr[$i])){
                    $bool_num=false;
                    break;
                }
            }
            //Si la flag no ha cambiado hara la media
            if($bool_num){
                $t = "<table border='1'>";
                $t .= "<tr>";
                $t .= "<th>Clave</th>";
                $t .= "<th>Valor</th>";
                $t .= "</tr>";

                foreach($arr as $clave => $valor){
                    $t .= "<tr>";
                    $t .= "<td>$clave</td>";
                    $t .= "<td>$valor</td>";
                    $t .= "</tr>";
                    
                }
                $t .= "</table>";
                return $t;
            }else{
                echo "El array no es un array de numeros";
            }
            
        }else{
            echo "$arr no es un array";
        }

    }
    function inicializarArray($num_elem,$min,$max){
        $array = array();
        if(is_numeric($min)){
            if(is_numeric($max)){
                //El error estaba en este if, tienes = que operador de asignacion
                //y tienes que comprobar si es menor o igual la resta
                if(($max-$min) <= $num_elem+2){
                    
                    for($k=0;$k<$num_elem;$k++){
                        $array[]=rand($min,$max);
                    }
                    print_r($array);
                }else{
                    echo "Error if 3";
                }    
            }else{
                echo "Error if 2";
            } 
        }else{
            echo "Error if 1";
        } 
    }
    inicializarArray(6,1,5);

?>