<html>
    <body>
        <?php
            $n= 5665;
            /*Dado un numero $n comprobar si es capicua 
              -mostrar por pantalla un menaje adecudado
              ej: El numero 123 NO es capicua
                  El numero 121 es capicua */  
                 
            //1. Extraer las cifras del numero e insertarlas en un array
            $arrayNumero=array(); //Creamos el array vacio
            
            $resto = $n;

            while($resto > 9){
                $arrayNumero[] = $resto % 10;
                $resto = ($resto - ($resto%10))/10;
            }

            $arrayNumero[]=$resto;
            /*$n_temp = $n;
            while($n_temp > 1){
   
                $arrayNumero[] = $n_temp % 10;//El resto de dividir un numero entre 10 es el ultimo digito Ej: 5665 % 10 = 5

                $n_temp /= 10; //Lo dividimos para extraer el ultimo digito y asignarle el nuevo valor a n
                
            }*/
            //var_dump($arrayNumero);
            //2. Comprobar que es capicua
            $capicua= true;
            $medio = count($arrayNumero)/2;

            for($i=0;$i<$medio;$i++){
                if($arrayNumero[$i] != $arrayNumero[(count($arrayNumero)-1)-$i]){
                    $capicua = false;
                    break;
                }      
            }
            if($capicua){
                echo "El numero $n es capicúa";
            }else{
                echo "El numero $n NO es capicúa";
            }

            /*
            $mssg = "El numero $n ";
            if($capicua) $mssg .= "NO ";
            $mssg .= "es capicúa";
            echo $mssg;

           
            */

            /*
            $capicua= true;
              En este bucle for recorremos el array desde el final hasta el inicio
              para ello tenemos dos contadores long que se inicializa con la longitud del array menos 1
              ya que nos devuelve el conteo de cuantas posiciones hay e i que se inicializa en 0 para 
              ir del inicio del array e ir comparando inicio y final viendo si son distintos si no es asi
              el bucle se rompe y si no i incrementara y long decrementara.
            
            for($long = count($arrayNumero)-1 ,$i=0;$long >= 0;$i++,$long--){
             

                if($arrayNumero[$i] != $arrayNumero[$long]){
                    $capicua=false;
                    break;
                }
                
            }

            if($capicua){
                echo "El numero $n es capicúa";
            }else{
                echo "El numero $n NO es capicúa";
            }*/
        ?>
    </body>
</html>