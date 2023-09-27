<html>
    <body>
        <?php
            $n= 5665;
            //$n_st = (string)$n; Casteo de entero a string
            //1. Extraer las cifras del numero e insertarlas en un array
                $arrayNumero=array(); //Creamos el array vacio
            
                $s = "";
                $resto = $n;
                while($resto > 9){
                    $s = $resto % 10;
                    $resto = ($resto - ($resto%10))/10;
                }
            
                $s.=$resto;
            //$n_st_invertido = strrev($n_st); //Funcion que invierte un string
            echo $s;
            //Se comparan ambos strings si son diferentes añadira el 'NO' al mssg
            $mssg = "El numero $n ";
            if($n != strrev($s)) {
                $mssg .= "NO ";
            }

            $mssg .= "es capicúa";

            echo $mssg;

            $cap = ( $s !=strrev($s))?"NO":" ";
            printf("El numero %s %s es capicúa",$s,$cap);
        ?>
    </body>
</html>