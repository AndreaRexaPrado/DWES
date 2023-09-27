<html>
    <body>
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
    </body>
</html>