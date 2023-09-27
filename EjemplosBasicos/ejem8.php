<html>
    <body>
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
    </body>
</html>