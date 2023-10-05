<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
    <meta content="text/html; charset=ISO-8859-1" httpequiv="content-type">
    <title>ejercicio 4.8</title>
    </head>
    <body>
    <?php
        echo "<h1>Tabla de Fotos con Enlace</h1>";
        function validar($fotos)
        {
        return preg_match('/.*/',);
        }
        echo "<table border=1>";
        $ruta = "../../img";
        $puntero = opendir($ruta);
        $i=1;
        while (false !== ($foto = readdir($puntero)))
        {
            if ($foto!="." && $foto!=".." && validar($foto))
            {
                if ($i==1)
                
                    echo "<tr>";
                    echo "<td><a href='$ruta/$foto'>";
                    echo "<img src='$ruta/$foto' width=100 height=100></img>";
                    echo "</a></td>";
                
                if ($i==4)
                {
                    echo "</tr>"; 
                    $i=0;
                }
                $i++;
            }
        }
        closedir($puntero);
        echo "</table>";
    ?>
    </body>
</html>