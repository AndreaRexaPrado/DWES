
- [Teoria](#teoria)
  - [Teoria UD1](#teoria-ud1)
- [Codigo](#codigo)
  - [Codigo Basico](#codigo-basico)
    - [Comentarios, decalaracion de variables, concatenacion](#comentarios-decalaracion-de-variables-concatenacion)
    - [Comillas](#comillas)
    - [Imprimir tabla html y for](#imprimir-tabla-html-y-for)
    - [Echo vs print](#echo-vs-print)
    - [Gettype](#gettype)
    - [Trabajo de variables](#trabajo-de-variables)
    - [Arrays, trabajo basico](#arrays-trabajo-basico)
    - [===, variabes como boolean y constantes](#-variabes-como-boolean-y-constantes)
    - [Funciones](#funciones)
    - [$\_SERVER](#_server)
    - [Capicua v1](#capicua-v1)
    - [Capicua v2](#capicua-v2)
    - [Include, require, include\_once, require\_once](#include-require-include_once-require_once)
  - [Arrays](#arrays)
    - [Reindexar](#reindexar)
    - [Añadir elementos](#añadir-elementos)
    - [array\_keys](#array_keys)
    - [Ordenacion](#ordenacion)
    - [Ordenacion definida por el usario](#ordenacion-definida-por-el-usario)
    - [array\_values](#array_values)
    - [Explode](#explode)
    - [Implode](#implode)
    - [Str\_replace](#str_replace)
    - [md5](#md5)
    - [array\_multisort](#array_multisort)
  - [Formularios](#formularios)
    - [Post a otro archivo](#post-a-otro-archivo)
    - [MVC](#mvc)
  - [Imagenes](#imagenes)
    - [Iterara correctamente](#iterara-correctamente)
    - [Tabla de img](#tabla-de-img)
    - [Crear miniaturas (hay que instalar algo)](#crear-miniaturas-hay-que-instalar-algo)
    - [Subir imgs](#subir-imgs)
  - [Archivos](#archivos)
    - [Lectura caracter a caracter](#lectura-caracter-a-caracter)
    - [Lectura linea a linea](#lectura-linea-a-linea)
    - [Generar fich ins](#generar-fich-ins)
- [Metodos](#metodos)

# Teoria
## Teoria UD1
**HTTP** (Protoloco de Transferencia de HiperTexto)                         
# Codigo
## Codigo Basico
### Comentarios, decalaracion de variables, concatenacion
```php
    <?php
        //Esto es un comentario de una linea
        /*y
        este
        de
        varias    
        */
        $ini = "Hola ";
        $fin = " a todos";
        $todo = $ini . $fin; //. es el operador de  concat
        echo $todo;
        //No hay tipado las variables pueden cambiar en cualquier momento
        $ini = 1;
        $fin = 2.2;
        $todo = $ini . $fin; // el concat con int los trata como texto
        echo "<br>".$todo."<br>";
    ?>
``` 
### Comillas
```php 
    <?php
        $n1 = 1;
        $n2 = 2;
        $suma = $n1 + $n2;
        echo "suma = " . $suma . "<br/>";
        echo "suma = $suma <br/>"; //comillas magicas: las variables simples se puede poner en echo y extraera su valor con $variable
        echo "$n1+$n2<br/>";
        echo "\$n1+\$n2<br/>";// con la barra se realiza el escape tal cual el caracter o cadena
        echo '$n1+$n2<br/>';
        echo "\"hola\"";
        echo phpinfo(); //Imprime toda la informacion del servidor
    ?> 
```  
### Imprimir tabla html y for
```php
    <?php
        echo "<table border=1>";
        $n = 1;
        for ($n1 = 1; $n1 <= 10; $n1++) {
            echo "<tr>";
            for ($n2 = 1; $n2 <= 10; $n2++) {
                echo "<td>", $n, "</td>";
                $n = $n + 1;
            }
            echo "</tr>";
        }
        echo "</table>";
    ?> 
```
### Echo vs print 
```php
    <?php
        $hora = date ("H", time());
            if($hora>20 || $hora<4)
            {
                echo "<h1>Buenos noches</h1>";
            }else
            {
                echo "<h1>Buenos dias</h1>";
            }
        //Resuelve funciones antiguamente echo no lo hacia
        print ( "<br/>".date("M d, Y H:i:s", time())); 
        $var1='<br/>hola';
        $var2="$var1 mundo";
        echo $var2;
    ?>
``` 
### Gettype 
```php

    <?php
        $mivar = 123;
        print (gettype($mivar));
        echo '<br>'.$mivar; // no se convierte en string

        echo "<br>De string entero";
        $mivar = '3';
        /*print ('<br>'.gettype($mivar));
        echo '<br>'.$mivar;
        $mivar = 2 + $mivar; el operador + convierte el valor de la
                               variable de mivar entero, luego el operador =
                               convierte el tipo a entero de mivar
                               debido a la prioridad de operaciones (* > + > =)
                              
        print ('<br>'.gettype($mivar));
        echo '<br>'.$mivar;
        */
        $otra=2*$mivar;
        echo '<br>'.$mivar;
        print ('<br>'."tipo de mivar ".gettype($mivar));
        echo '<br>'.$otra;
        //$otra = (string) $otra;//se convierte el tipo con el casteo pero con el = se le cambia a la variable.
        print ('<br>'."tipo de otra ".gettype($otra));
    ?>
```
### Trabajo de variables
```php
    <?php
        /*copia de variables por valor */
        echo "Copia de variables";
        $v1=100;
        $v2=$v1; //asignamos EL VALOR y TIPO a v2
        echo "<br> v1: $v1"; 
        echo "<br> v2: $v2";  
        //modificamos el valor de v1
        echo "<br>Modificacion de valor v1";
        $v1=500;
        echo "<br> v1: $v1";
        echo "<br> v2: $v2";
        //copia de variables por referencia
        echo "<br>Copia por referencia";
        $v2=&$v1;
        echo "<br> v1: $v1";
        echo "<br> v2: $v2";
        //Se modifica v1, al v2 tener la referencia apuntando 
        //al valor de v1 tambien cambia.
        echo "<br>Se cambia el valor de v1";
        $v1=375;
        echo "<br> v1: $v1";
        echo "<br> v2: $v2";
        //Se aplica tambien al modificar v2
        echo "<br>Se cambia el valor de v2";
        $v2 = 5;
        echo "<br> v1: $v1";
        echo "<br> v2: $v2";
        echo "<br>Se desvincula v2 de v1 con unset";
        unset($v2); // la variable desaparece de la pila, podemos volver a usarla cuando queramos
        echo "<br> v1: $v1";
        if (isset($v2)) echo "<br> v2: $v2";
        else echo "<br>v2: la variable no existe";
        echo "<br>v2 se vuelve a crear";
        $v2=2;
        echo "<br> v1: $v1";
        echo "<br> v2: $v2";
    ?>
```
### Arrays, trabajo basico
```php
    <?php
            $arr1 = [
                0 => 444,
                1 => 555,
                7 => 666,
                "hola" => "que tal"
            ];
        $arr1[]="otro";  
        echo "<h1>Array con print_r</h1>";    
        print_r($arr1);

        $arr1["fin"]="adios";
        echo "<h1>Array con var_dump</h1>"; 
        var_dump($arr1);
        echo "<h1>Array con bucle foreach SOLO LOS VALORES </h1>"; 
        foreach ($arr1 as $v){
            echo "<br> $v"; //visuala solo los valores
        }
        $arr1[5]=5; //NO ESTAN ORDENADO, VA POR ORDEN DE INSERCION
        $arr1[1]="dos";
        echo "<h1>Array con bucle foreach CLAVE-VALOR</h1>"; 
        foreach ($arr1 as $k =>$v){
            echo "<br> la clave <b>$k</b> corresponde al valor: $v";
        }
        echo "<h1>Otra forma de crear un array</h1>";
        $a = array (1,true,"c"); 
        print_r($a);
        echo "<br>";
        var_dump($a);
        echo "<h1>Borrar un indice de un array</h1>";
        unset($a[0]);
        var_dump($a);
        echo "<h1>Si intentamos imprimir un valor que no existe</h1>";
        echo $a[0]; //WARNING 
    ?>
```
### ===, variabes como boolean y constantes
```php
    <?php
        /*
        En php cualquier variabale puede ser tratada como boolean,
        */
        define("BR","<br>\n"); //Constantes
            
        echo "Esto es".BR." un salto de linea";   
        $v0=0;
        $v1 = 5;
        $s ="";
           
        if($v1) echo BR."$v1 es TRUE";
        if($v1===true) echo BR."$v1 es TRUE";

        if($v0) echo BR."$v0 es FALSE";
        if($v0!==true) echo BR."$v0 es FALSE";

        if(!$s) echo BR."String vacio $s es FALSE";
        $s= "ddasd";
        if($s) echo BR."String $s es TRUE";
            
        $a= array();
        if(!$a) BR."Array vacio es FALSE";
        $n= NULL;
        if(!$n) BR."NULL es FALSE";

        if($s == true) echo BR."Comparacion mal hecha";
    ?>
```
### Funciones
```php

    <?php
        function enlace($url = "www.php.net"){
            echo '<a href="'.$url.'">Pulsa aqui</a><br>';
        }
        enlace();
            
        enlace("www.google.es");
    ?>
```
### $_SERVER
```php

    <?php
        foreach($_SERVER as $k=>$v){
            echo "$k .... $v<br>";
        }

    ?>
```
### Capicua v1
```php
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
```
### Capicua v2
```php
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
```
### Include, require, include_once, require_once
Vista
```php
<?php
    function vista($a){
        $t = "<table border=1>\n";//Se puede usar echo "<table border=1>\n"; en vez de una variable
        $t .= "<caption>Array en una tabla</caption>\n";+
        //Cabecera de la tabla    
        $t .="\t\t\t\t\t<tr> 
              \t<th>Clave</th>
           \t<th>Tipo</th>
                        \t<th>Valor</th>
                    \t</tr>\n";
                
            foreach ($a as $k =>$v){
                    $tipovar=gettype($v); //Extraemos el tipo de la variable
                    //Fila con las celdas con sus valores correspondientes por cada fila del array
                    $t .="\t\t\t\t\t<tr>
                            <td>$k</td>
                            <td>$tipovar</td>
                            <td>$v</td>
                </tr>\n";
                    
            }
            $t .= "</table>\n";
            return $t;
        }

?>
```
require
```php
    <?php
            require("ejercicio1_v2_vista.php");
            
            /*Ejecicio : iterar el array $a visualizarlo en formato de tabla
                En cada linea tendremos tres campos: clave, tipo y valor
            */
            //Datos
            
            $datos = [
                0 => "false",
                1 => 222,
                2 => true,
                7 => 666,
                "hola" => "que tal"
            ];
            $a[] ="otro";

            //Vista 

            echo vista($datos);
            unset($a[1]); //No hay persistencia de datos porque aunque se borre al iniciar de nuevo el programa el array seguira teniendo la pos 1
    ?>
```
[Indice](#)
## Arrays 
### Reindexar
```php
<?php
    $a = array(1 => 'uno', 2 => 'dos', 3 => 'tres');
    unset($a[2]);
    /* producirá un array que se haya definido como
    $a = array(1 => 'uno', 3 => 'tres');
    y NO $a = array(1 => 'uno', 2 =>'tres'); */
    $b = array_values($a);
    // Ahora $b es array(0 => 'uno', 1 =>'tres')
    var_dump($a);
    var_dump($b);
?> 
```
### Añadir elementos
```php
    <?php 
        /* 1. Dados los dos siguientes arrays,
            $a = array("manzana", "naranja”);
            $b = array(1 => "manzana", "0" => "naranja");
            Añadir dos nuevos elementos a ambos arrays: uno con el valor uva y otro con el valor mandarina.
            Mostrar los nuevos resultados. 
        */

        $a = array("manzana", "naraja"); 
        $b = array("1"=>"manzana", "0"=>"naranja");

        echo "Antes de añadir<br>";
        
        var_dump($a);
        echo "<br>";
        var_dump($b);

        $a[]="uva";
        $b[]="uva";

        $a[]="mandarina";
        $b[]="mandarina";
        echo "<br>Despues de añadir<br>";
        var_dump($a);
        echo "<br>";
        var_dump($b);

        /*
        Antes de añadir
        array(2) { [0]=> string(7) "manzana" [1]=> string(6) "naraja" }
        array(2) { [1]=> string(7) "manzana" [0]=> string(7) "naranja" }
        Despues de añadir
        array(4) { [0]=> string(7) "manzana" [1]=> string(6) "naraja" [2]=> string(3) "uva" [3]=> string(9) "mandarina" }
        array(4) { [1]=> string(7) "manzana" [0]=> string(7) "naranja" [2]=> string(3) "uva" [3]=> string(9) "mandarina" }

        -En conclusion los arrays en estos casos la clave no es la siguiente a la ultima si no la cantidad de elementos + 1
        eso en el caso de que no introduzcamos una personalizada a la hora de añadir*/
    ?>
```
### array_keys
```php
    <?php 
        /* 2. Guardar las claves del array $b en otro array. Nota: array_keys.
        */
        $a = array("manzana", "naraja"); 
        $b = array(1=>"manzana", "0"=>"naranja");

        $arrayClavesB = array_keys($b);
        $arrayClavesA = array_keys($a);
        echo "Antes de añadir<br>";
        var_dump($b);
        echo "<br>";
        var_dump($arrayClavesB);

        var_dump($a);
        echo "<br>";
        var_dump($arrayClavesA);

        $a[]="uva";
        $b[]="uva";

        $a[]="mandarina";
        $b[]="mandarina";

        $arrayClavesB = array_keys($b);
        echo "<br>Despues de añadir<br>";
        var_dump($b);
        echo "<br>";
        var_dump($arrayClavesB);
        var_dump($a);
        echo "<br>";
        var_dump($arrayClavesA);

        /*
        Antes de añadir
        array(2) { [1]=> string(7) "manzana" [0]=> string(7) "naranja" }
        array(2) { [0]=> int(1) [1]=> int(0) }
        Despues de añadir
        array(4) { [1]=> string(7) "manzana" [0]=> string(7) "naranja" [2]=> string(3) "uva" [3]=> string(9) "mandarina" }
        array(4) { [0]=> int(1) [1]=> int(0) [2]=> int(2) [3]=> int(3) }

        -En conclusion array_keys crea otro array con los valores puede ser util ya que como las claves son personalizas 
        para conocerlas, no se actualiza solo cada vez de se añade un nuevo elemento al array $b hay que ejecutar el metodo
        */
    ?>
```
### Ordenacion
```php
    <?php 
        /* 3. Ordenar:
            a. descendentemente por clave el array $b anterior
            b. ascendentemente por valor el array $b anterior. 

        */

        $b = array(1=>"manzana", "0"=>"naranja");
        echo "Antes de ordernar descendentemente por clave <br>";
        var_dump($b);
        echo "<br>";
        arsort($b);

        echo "Despues de ordernar descendentemente por clave <br>";
        var_dump($b);
        echo "<br>";

        echo "Antes de ordernar ascendentemente por valor <br>";
        var_dump($b);
        echo "<br>";
        arsort($b);

        echo "Despues de ordernar ascendentemente por valor <br>";
        var_dump($b);
        echo "<br>";
        /*
        Antes de ordernar descendentemente por clave
        array(2) { ["b"]=> string(7) "manzana" ["a"]=> string(7) "naranja" }
        Despues de ordernar descendentemente por clave
        array(2) { ["a"]=> string(7) "naranja" ["b"]=> string(7) "manzana" }
        Antes de ordernar ascendentemente por valor
        array(2) { ["a"]=> string(7) "naranja" ["b"]=> string(7) "manzana" }
        Despues de ordernar ascendentemente por valor
        array(2) { ["a"]=> string(7) "naranja" ["b"]=> string(7) "manzana" }

        -En conclusion la ordenacion indendientemente se ordena alfabeticamente desc o asc
        */
    ?>
```
### Ordenacion definida por el usario
```php

```
### array_values
```php
    <?php 
        /* 4. A partir de $b obtener otro array con los mismos valores, 
        pero con claves numéricas empezando desde 0. Nota: array_values.*/

        $b = array("1"=>"manzana", "0"=>"naranja");
        
        $arrayValoresB = array_values($b);
        asort($arrayValoresB);

        print_r($arrayValoresB);

        //Array ( [0] => manzana [1] => naranja )
        //array_values similar a array_keys pero con los valores    
    ?>
```
### Explode
```php
    <?php 
        /* 5. Dada la cadena de caracteres “Desarrollo Web en Entorno Servidor con PHP”, construir un array con cada palabra de la cadena anterior. */

        $cadena ="Desarrollo Web en Entorno Servidor con PHP";
        $array = explode(" ",$cadena);
        print_r($array);
        /*Array ( [0] => Desarrollo [1] => Web [2] => en [3] => Entorno [4] => Servidor [5] => con [6] => PHP )
        -En conclusion explode divide la cadena detectando el separador que se introduce como primer argumento,y generando un array en el que cada palabra esta en un hueco  */  
    ?>
```
### Implode
```php
    <?php 
        /* 6. Dado el array obtenido en el ejercicio anterior, obtener una cadena con sus elementos, pero separados por el carácter ‘-‘. Debe salir “Desarrollo-Web-en Entorno-Servidor-con-PHP”.  */

        $cadena ="Desarrollo Web en Entorno Servidor con PHP";
        $array = explode(" ",$cadena);
        print_r($array);
        echo "<br>";
        $cadenaNueva = implode("-",$array);
        printf("La nueva cadena es: %s",$cadenaNueva);
        /*Array ( [0] => Desarrollo [1] => Web [2] => en [3] => Entorno [4] => Servidor [5] => con [6] => PHP )
        La nueva cadena es: Desarrollo-Web-en-Entorno-Servidor-con-PHP
        -En conclusion implode funcina al contrario que explode, 
        une las palabras de un array con el separador introducido como primer argumento */  
    ?>
```
### Str_replace
```php
    <?php 
        /* 7. Reemplazar el valor PHP de la cadena anterior por el valor JSP.   */

        $cadena ="Desarrollo Web en Entorno Servidor con PHP";
        $array = explode(" ",$cadena);
        print_r($array);
        echo "<br>";
        $cadenaNueva = implode("-",$array);
        printf("La nueva cadena es: %s",$cadenaNueva);
        echo "<br>";
        $cadenaJSP= str_replace("PHP","JSP",$cadenaNueva);

        printf("La nueva cadena con JSP es: %s",$cadenaJSP);
        /*Array ( [0] => Desarrollo [1] => Web [2] => en [3] => Entorno [4] => Servidor [5] => con [6] => PHP )
        La nueva cadena es: Desarrollo-Web-en-Entorno-Servidor-con-PHP
        La nueva cadena con JSP es: Desarrollo-Web-en-Entorno-Servidor-con-JSP
        -En conclusion str_replace busca el fragmento a cambiar y la remplaza por el nuevo*/  
    ?>
```
### md5
```php
    <?php 
        /* $credenciales = array(
            'ana' => array('nombre' => 'Ana', 'apellido' => 'García', 'clave' =>
            'a4a97ffc170ec7ab32b85b2129c69c50'),
            'marga' => array('nombre' => 'Margarita', 'apellido' => 'Ayuso', 'clave' =>
            '35559e8b5732fbd5029bef54aeab7a21'),
            'pepe' => array('nombre' => 'Jose', 'apellido' => 'González', 'clave' =>
            '10dea63031376352d413a8e530654b8b'),
            'luis' => array('nombre' => 'Luis', 'apellido' => 'Merino', 'clave' =>
            'C707dce7b5a990e349c873268cf5a968')
            );
            Supongamos un formulario de autenticación donde un usuario introduce como contraseña el valor
            ‘clave2’ y la aplicación autenticó al usuario correctamente. Indicar el nombre y apellido del
            usuario que introdujo tal contraseña.   */

            $credenciales = array(
                'ana' => array('nombre' => 'Ana', 'apellido' => 'García', 'clave' =>
                'a4a97ffc170ec7ab32b85b2129c69c50'),
                'marga' => array('nombre' => 'Margarita', 'apellido' => 'Ayuso', 'clave' =>
                '35559e8b5732fbd5029bef54aeab7a21'),
                'pepe' => array('nombre' => 'Jose', 'apellido' => 'González', 'clave' =>
                '10dea63031376352d413a8e530654b8b'),
                'luis' => array('nombre' => 'Luis', 'apellido' => 'Merino', 'clave' =>
                'C707dce7b5a990e349c873268cf5a968')
                );
                $usario ="";

                foreach($credenciales as $k=>$v){
                    if($v['clave'] === md5("clave2")){
                        printf("El usuario que introdujo la contraseña es: %s %s",$v['nombre'],$v['apellido']);
                        break;
                    }
                }
                echo md5("C707dce7b5a990e349c873268cf5a968");
                /*$usario=array_filter($credenciales, function($e){
                    return $e['clave'] == md5("clave2");
                });

                //print_r($usario);
                printf("El usuario que introdujo la contraseña es: %s %s",$usario[array_key_first($usario)]['nombre'],$usario[array_key_first($usario)]['apellido']);*/
                
                /*-En conclusion se puede hacer con dos formas, con un bucle recorriendolo,$v sera el array de cada usuario con lo cual comprobamos aquel cuya clave sea 'clave2' en md5
                    y lo imprimimos, la otra forma es array_filter que el segundo argumento es una funcion que actua como filtro de lo que buscamos es decir return $e['clave'] == md5("clave2");
                    
                */  
    ?>
```
### array_multisort
```php
    <?php 
        /* $credenciales = array(
            'ana' => array('nombre' => 'Ana', 'apellido' => 'García', 'clave' =>
            'a4a97ffc170ec7ab32b85b2129c69c50'),
            'marga' => array('nombre' => 'Margarita', 'apellido' => 'Ayuso', 'clave' =>
            '35559e8b5732fbd5029bef54aeab7a21'),
            'pepe' => array('nombre' => 'Jose', 'apellido' => 'González', 'clave' =>
            '10dea63031376352d413a8e530654b8b'),
            'luis' => array('nombre' => 'Luis', 'apellido' => 'Merino', 'clave' =>
            'C707dce7b5a990e349c873268cf5a968')
            );
            Supongamos un formulario de autenticación donde un usuario introduce como contraseña el valor ‘clave2’ y la aplicación autenticó al usuario correctamente. Indicar el nombre y apellido del usuario que introdujo tal contraseña.   */
            $credenciales = array(
                'ana' => array('nombre' => 'Ana', 'apellido' => 'García', 'clave' =>
                'a4a97ffc170ec7ab32b85b2129c69c50'),
                'marga' => array('nombre' => 'Margarita', 'apellido' => 'Ayuso', 'clave' =>
                '35559e8b5732fbd5029bef54aeab7a21'),
                'pepe' => array('nombre' => 'Jose', 'apellido' => 'González', 'clave' =>
                '10dea63031376352d413a8e530654b8b'),
                'luis' => array('nombre' => 'Luis', 'apellido' => 'Merino', 'clave' =>
                'C707dce7b5a990e349c873268cf5a968')
                );

            function crear_tabla($a,$ord){
                $t="<table border=\"1\">";
                $t.="<caption>".$ord."</caption>";
                $t.="<tr>";
                $keys= array_keys($a[array_key_first($a)]);
                foreach($keys as $k){               
                        $t.="<th>".$k."</th>";         
                }
                $t.="</tr>";
                foreach($a as $k=>$v){
                    $t.="<tr>";
                    $t.="<td>".$v['nombre']."</td>";
                    $t.="<td>".$v['apellido']."</td>";
                    $t.="<td>".$v['clave']."</td>";
                    $t.="</tr>";
                }
                $t.="</table><br>";
                return $t;
            }  

            function ord_apellido($a){
                foreach ($a as $k => $v) {
                    $apellido[] = $v['apellido'];
                    $nombre[] = $v['nombre'];
                }
                array_multisort($apellido, SORT_ASC,$nombre, SORT_ASC,$a);  
                return $a;
            }    
            
            echo crear_tabla($credenciales,"Sin ordenar");
            $credenciales=ord_apellido($credenciales);
            echo crear_tabla($credenciales,"Ordenado por apellido");
    ?>
```
[Indice](#)

## Formularios
### Post a otro archivo
HTML
```html
    <html>
        <head>
            <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
            <title>Ejercicio 5.2</title>
        </head>
        <body>
            <form method=post action=ejem2.php>
                Introduzca la cantidad: <br>
                <input type=text name=cantidad size=10>
                
                Seleccione el tipo de conversion:<br>
                <input type=radio name=conv value=euro checked>Euros<br>
                <input type=radio name=conv value=dolares>dolares<br>
                Introduzca la cantidad de euros: 
                <input type="text" name="euros" size="10">
                <input type="submit" name="ok" value="enviar">
            </form>
        </body>
    </html>
```
PHP
```php
    <?php
        $euros = $_POST['euros'];
        $pesetas = $euros * 166.386;
        echo "<h1>Son $pesetas pesetas</h1>";
            
        $conv=$_POST['conv'];
        $cantidad=$_POST['cantidad'];
        $valores=["euro"=>166.386,"dolares"=>180.386];
        $pesetas=$cantidad/$valores[$conv];

        echo "<h1>Son $pesetas $conv</h1>";
    ?>
```
[Indice](#)
### MVC
Ejer1
Datos
```php
    <?php
        DEFINE("CAMPOSFORM",array("nom"=>["patron"=>"/.*/","size"=>"60","pal"=>"Nombre","patronUser"=>"Cualquier caracter alfanumerico"],
        "ape"=> ["patron"=>"/.*/","size"=>"30","pal"=>"Apellidos","patronUser"=>"Cualquier caracter alfanumerico"],
        "DNI"=> ["patron"=>"/[0-9]{8}[TRWAGMYFPDXBNJZSQVHJCKE]/","size"=>"9","pal"=>"DNI","patronUser"=>"8 numeros y una letra"],
        "mail"=> ["patron"=>"/^[a-zA-Z0-9.]+@educa\.madrid\.org$/","size"=>"40","pal"=>"Correo Electronico","patronUser"=>"debe ser con el dominio de educamadrid"],
        "fecNac"=> ["patron"=>"/[0-9]{2}-[0-9]{2}-[0-9]{4}/","size"=>"10","pal"=>"Fecha Nacimiento","patronUser"=>"dd-MM-yyyy"],
        "TelFijo"=> ["patron"=>"/[0-9]{9}/","size"=>"9","pal"=>"Telefono Fijo","patronUser"=>"9 digitos"],
        "TelMovil"=> ["patron"=>"/(\+34)[0-9]{9}/","size"=>"10","pal"=>"Telefono Movil","patronUser"=>"(+34)9 digitos"],
        "pwd"=> ["patron"=>"/^(?=.*[a-z])(?=.*[^a-zA-Z0-9])[^0-9]{8,}$/","size"=>"9","pal"=>"Contraseña","patronUser"=>"8 caracteres alfanumericos, al menos una minuscula y un caracter especial"]));
    ?>
```
Vista
```php
    <?php

        function formulario(){
            $f="<form method=\"post\" action=".$_SERVER['PHP_SELF'].">\n";
            $f.="<table>";
            foreach(CAMPOSFORM as $k=>$v){
                $f.="<tr>";
                $f.="<td><label for=\"i$k\">".$v['pal']."</label></td>\n";
                if($k!='pwd'){
                    $f.="<td><input type=\"text\" id =\"i$k\" name=\"$k\" size=\"".$v['size']."\"></td>\n";
                }else{
                    $f.="<td><input type=\"password\" id =\"i$k\" name=\"$k\" size=\"".$v['size']."\"></td>\n";
                }
                $f.="<tr>";
            }
            $f.="</table>";
            $f.="<input type=\"submit\" name=\"ok\" value=\"Validar\">\n";
            $f.="</form>";
            echo $f;
        }

        function validar_form($p){
            //var_dump($p);
            $boolMsg=true;// varible o flag para control de que mensaje tiene que salir
            foreach(CAMPOSFORM as $k=>$v){
                //Si el campo esta vacio saltrar el error marcando aquuellos que estan vacios
                if(empty($p[$k])){
                    printf("<h1 style=\"color:red;\">ERROR: El campo %s debe estar relleno</h1>",$v['pal']);
                    $boolMsg=false;
                }else{
                    //Validacion de fecha con checkdate, se separa la fecha con explode
                    if($k === 'fecNac'){
                        $arrFech = explode("-",$p[$k]);
                        //print_r($arrFech);
                        if(!checkdate($arrFech[1],$arrFech[0],$arrFech[2])){
                            printf("<h1 style=\"color:red;\">ERROR: El campo %s debe tener el patron: %s</h1>",$v['pal'],$v['patronUser']);
                            $boolMsg=false;
                            //break;
                        }
                    //Validacion de los demas campos segun su patron si no coicide, saltara el error
                    }else{
                        if(!preg_match($v['patron'],$p[$k])){
                            //echo $v['patron'] .".....".$p[$k];
                            printf("<h1 style=\"color:red;\">ERROR: El campo %s debe tener el patron: %s</h1>",$v['pal'],$v['patronUser']);
                            $boolMsg=false;
                            //break;
                        }
                    }
                }
            }
            //Si no hay ningun error, saltara el mensaje de bienvenida
            if($boolMsg){
                //echo "<h1 style=\"color:green;\">TODO CORRECTO BIENVENIDE</h1>";
                header("Location:back.php");
            }


        }
        
        function validateDate($date, $format = 'd-m-Y')
        {
            $d = DateTime::createFromFormat($format, $date);
            return $d && $d->format($format) == $date;
        }
    ?>
```
Control
```php
    <?php
        include("Ejer1_datos.php");
        include("Ejer1_vista.php");
        formulario();

        if(isset($_POST['ok'])){//Si esa variable existe
            validar_form($_POST);
            //echo validateDate('15-02-2000');
        }

    ?>
```
     
Ejer3
Datos
```php
    <?php
        define ("VALORES",["Euro"=>166.386,"Dolar"=>180.386,"Libra"=>191.837,"Yen"=> 200.00]);
        
        $valores=["Euro"=>166.386,"Dolar"=>180.386,"Libra"=>191.837,"Yen"=> 200.00];

        define ("IDIOMAS",
            ["es"=>["name"=>"Español","select_lang"=>"Seleccione idioma: ","intro_cant"=>"Introduzca la cantidad a convertir: \n","msg"=>"<h1>%d %s son %d pesetas </h1>"],"en"=>["name"=>"English","select_lang"=>"Select a language: ","intro_cant"=>"Enter the amount to convert: \n","msg"=>"<h1>%d %s are %d pesetas </h1>"],"fr"=>["name"=>"FranÇais","select_lang"=>"Sélectionnez une langue: ","intro_cant"=>"Entrez le montant à convertir: \n","msg"=>"<h1>%d %s sont %d pesetas </h1>"],"de"=>["name"=>"Deutch","select_lang"=>"Wähle eine Sprache: ","intro_cant"=>"Geben Sie den umzurechnenden Betrag ein: \n","msg"=>"<h1>%d %s sind %d pesetas </h1>"]
                ]);

    
    ?>
```
Vista
```php
    <?php
        
        //funciones para generar vistas
        function form_cambio($lang="es"){
            
            $f="<form method=post action=".$_SERVER['PHP_SELF'].">\n";
            $f.=IDIOMAS[$lang]["select_lang"];
            $f.= lista(IDIOMAS,"idiomas","es");
            $f.="<input type=\"submit\" name=\"ok_lang\" value=\"Enviar\">\n";
            $f.="</form>";

            $f.="<form method=post action=".$_SERVER['PHP_SELF'].">\n";     
            $f.= IDIOMAS[$lang]["intro_cant"];
            $f.="<input type=\"number\" name=\"cantidad\" value= 0 size=\"10\">\n";
            //$f.= radio($datos,"conv");
            $f.= lista(VALORES,"conv");
            $f.="<input type=\"submit\" name=\"ok\" value=\"Enviar\">\n";
            $f.="</form>";
            echo $f;
        }

        /*Funcion para generar dinamicamente los radio button
        se le pasa por paramentros un array, un nombre para el input 
        y el check si no hay otro por defecto estara seleccionado Dolar*/
        function radio($a,$name,$check="Dolar"){
            $f="";
            foreach($a as $k =>$v){
                $f.="<input type=radio name=\"$name\" value=\"$k\"";
                if($check === $k) $f.= " checked "; //si check coicide con la moneda que se pasa como argumento pondra el checked

                $f.=">".plurales($k)."<br>\n";           
            }
            return $f;
        }

        /*Funcion para generar dinamicamente una lista desplegable
        se le pasa por paramentros un array, un nombre para el select 
        y el selected si no hay otro por defecto estara seleccionado Dolar*/
        function lista($a,$name,$selected="Dolar"){
            //var_dump($a);
            $f="<select name = $name>";
            foreach($a as $k =>$v){
                $f.="<option value=\"$k\"";
                if($selected === $k) $f.= " selected ";
                
                if($name=="conv") $f.=">".plurales($k);

                elseif($name=="idiomas") $f.=">".$v['name'];

                else $f .= ">".$k;
                $f.="</option><br>";           
            }
            return $f;
        }
        
        //Funcion que pone el plurar a las palabras segun como terminen usando regex
        function plurales($singular){

            if(preg_match("/[aeiou]$/",$singular)){
                $singular .= "s";
            }elseif(preg_match("/[z]$/",$singular)){
                $singular[strlen($singular)-1]="c";
                $singular .= "es";
            }elseif(preg_match("/[s]$/",$singular)){
                $singular = "Los".$singular;
            }
            else{
                $singular .= "es"; 
            }
            
            return $singular;
        }
    ?>
```
Control
```php
    <html>
        <head>
            <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
            <title>Ejercicio 5.2</title>
        </head>
        <body>
                
            <?php 
                include("ejer3.datos.php"); //Trae el codigo del archivo indicado
                include("ejer3.vista.php");
            
                if(isset($_POST["ok_lang"])){
                    form_cambio($_POST["idiomas"]);
                }else {
                    form_cambio();
                }
                //var_dump($_POST);
                cambio_moneda($_POST);

                function cambio_moneda($p){
                    /*Para evitar warnings al principio ya que no tenemosel array _POST 
                    debemos comprobar si se ha pulsado el boton enviar antes de utilizar los datos*/
                    if(isset($p['ok'])){//Si esa variable existe
                    
                        $conv=$p['conv'];
                        $cantidad=$p['cantidad'];
                        $peseta=$cantidad*VALORES[$conv];
                        
                    
                        printf(IDIOMAS["es"]["msg"],$cantidad,plurales($conv),$peseta);
                    }
                }
            ?>
        </body>
    </html>
``` 
[Indice](#)

## Imagenes
### Iterara correctamente
```php
    <?php

        $ruta = "../../img";
        if ($gestor = opendir($ruta)) {
            echo "Gestor de directorio: $gestor\n";
            echo "Entradas:\n";
        
            /* Esta es la forma correcta de iterar sobre el directorio. */
            while (false !== ($entrada = readdir($gestor))) {
                echo "$entrada\n";
            }
        
            /* Esta es la forma errónea de iterar sobre el directorio. */
            while ($entrada = readdir($gestor)) {
                echo "$entrada\n";
            }
        
            closedir($gestor);
        }
    ?>
```
### Tabla de img
```php
    <?php
        $ruta = "../../img";
        if ($gestor = opendir($ruta))
        {
            echo "<table border=1>";
            echo "<tr>";
            $i=0;
            $numcols=6;
            while (false !== ($archivo = readdir($gestor)))
            {
                if ($archivo!="." && $archivo!="..")//Si el archivo es el padre
                {
                    if ($i%$numcols==0) echo "<tr>";
                    
                    echo "<td>";
                    echo "<a href='$ruta/$archivo'><img src='$ruta/$archivo' width=100 height=100></a>";
                    echo "</td>";

                    if ($i%$numcols==$numcols) echo "</tr>";
                    
                    $i++;
                }
            }
            echo "</tr>";
            echo "</table>";
            closedir($gestor);
        }
    ?>
```
### Crear miniaturas (hay que instalar algo)
```php
    <?php
        define("IMGS",array("jpg","png","bmp","gif"));
        $ruta = "../../img";
        $numcols=5;
        echo "<h1>Tabla de Fotos con Enlace</h1>";
        function validar($fotos)
        {   
            $ext = substr($fotos,strrpos($fotos,'.')+1);
            //$ext= pathinfo($fotos, PATHINFO_EXTENSION);
            $p = "/";
            foreach(IMGS as $v) $p.="$v|";
            $p = substr($p,0,-1)."/";
            return preg_match($p,$ext);
            

        }
        
        function crea_tumbs($foto,$ruta)
        {
         
            if (!is_dir($ruta.'/thumb'))
                mkdir ($ruta.'/thumb', 0777);

            if (!is_file($ruta.'/thumb/MINI-'.$foto))
            echo $ruta.'/thumb/MINI-'.$foto;  
                system ("convert -sample 40x40 $ruta/$foto $ruta/thumb/MINI-$foto");
        }

        if ($gestor = opendir($ruta))
        {
            echo "<table border=1>";
            echo "<tr>";
        
        
            $puntero = opendir($ruta);
            $i=0;
            while (false !== ($archivo = readdir($gestor)))
            {
                if (validar($archivo))//Si el archivo es el padre
                {
                    crea_tumbs($archivo,$ruta);
                    if ($i%$numcols==0) echo "<tr>";
                    
                    echo "<td>";
                    echo "<a href='$ruta/$archivo'><img src='$ruta/$archivo' width=100 height=100></a>";
                    echo "</td>";

                    if ($i%$numcols==$numcols) echo "</tr>";
                    
                    $i++;
                }
            }
            echo "</tr>";
            echo "</table>";
            closedir($gestor);
        }
    ?>
```
### Subir imgs
```php
<?php form_fotos()?>   
    <?php
        define("IMGS",array("jpg","png","bmp","gif"));
        $ruta = "../../img";
        $numcols=5;
        echo "<h1>Tabla de Fotos con Enlace</h1>";
        function validar($fotos){   
            $ext = substr($fotos,strrpos($fotos,'.')+1);
            //$ext= pathinfo($fotos, PATHINFO_EXTENSION);
            $p = "/";
            foreach(IMGS as $v) $p.="$v|";
            $p = substr($p,0,-1)."/";
            return preg_match($p,$ext);
            

        }
        
        /*function crea_tumbs($foto,$ruta)
        {
         
            if (!is_dir($ruta.'/thumb'))
                mkdir ($ruta.'/thumb', 0777);

            if (!is_file($ruta.'/thumb/MINI-'.$foto))
            echo $ruta.'/thumb/MINI-'.$foto;  
                system ("convert -sample 40x40 $ruta/$foto $ruta/thumb/MINI-$foto");
        }*/

        function form_fotos(){
            $f= "<form enctype='multipart/form-data' action=".$_SERVER['PHP_SELF'] ." method='post'>";
            $f.= "Enviar foto: <input name='foto' type='file'>";
            $f.= "<input type='submit' name='ok' value='Enviar'>";
            $f.="</form>";
            echo $f;

        }
        if(isset($_POST['ok'])){
        if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
            print_r($_FILES);
          
            $nombre = "nueva".rand(0,100);
            print($nombre);
            $ext = substr($_FILES['foto']['name'],strrpos($_FILES['foto']['name'],'.')+1);
            copy($_FILES['foto']['tmp_name'], $ruta."/$nombre.".$ext);
           } else
            echo "Possible file upload attack. Filename: " .
           $_FILES['foto']['name']. "---".$_FILES['foto']['tmp_name'];
        }
        if ($gestor = opendir($ruta))
        {
            echo "<table border=1>";
            echo "<tr>";
        
        
            $puntero = opendir($ruta);
            $i=0;
            while (false !== ($archivo = readdir($gestor)))
            {
                if (validar($archivo))//Si el archivo es el padre
                {
                    //crea_tumbs($archivo,$ruta);
                    if ($i%$numcols==0) echo "<tr>";
                    
                    echo "<td>";
                    echo "<a href='$ruta/$archivo'><img src='$ruta/$archivo' width=100 height=100></a>";
                    echo "</td>";

                    if ($i%$numcols==$numcols) echo "</tr>";
                    
                    $i++;
                }
            }
            echo "</tr>";
            echo "</table>";
            closedir($gestor);
        }
    ?>
```
[Indice](#)
## Archivos
### Lectura caracter a caracter
```php
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
```
### Lectura linea a linea
```php
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
```
### Generar fich ins
```php
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

```
[Indice](#)
# Metodos
[Indice](#)
