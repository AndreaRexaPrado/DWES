<html>
    <head>
        
    </head>

    <body>

   
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
 </body>
</html>