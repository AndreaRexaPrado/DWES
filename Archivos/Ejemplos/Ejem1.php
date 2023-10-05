<html>
    <head>
        <title>ejercicio 4.7</title>
    </head>
    <body>
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
    </body>
</html>