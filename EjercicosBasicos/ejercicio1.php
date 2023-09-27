<html>
    <body>
        <?php
            
            /*Ejecicio : iterar el array $a visualizarlo en formato de tabla
                En cada linea tendremos tres campos: clave, tipo y valor
            */
            $a = [
                0 => "false",
                1 => 222,
                2 => true,
                7 => 666,
                "hola" => "que tal"
            ];
            $a[] ="otro";
            $t = "<table border=1>\n";//Se puede usar echo "<table border=1>\n"; en vez de una variable
            $t .= "<caption>Array en una tabla</caption>\n";
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
            echo $t;
            unset($a[1]); //No hay persistencia de datos porque aunque se borre al iniciar de nuevo el programa el array seguira teniendo la pos 1
        ?>
    </body>
</html>