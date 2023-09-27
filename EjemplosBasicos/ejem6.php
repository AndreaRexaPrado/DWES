<html>
    <body>
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
    </body>
</html>