<html>
    <body>
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
    </body>
</html>