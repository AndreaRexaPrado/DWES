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

            /*foreach($credenciales as $k=>$v){
                if($v['clave'] == md5("clave2")){
                    printf("El usuario que introdujo la contraseña es: %s %s",$v['nombre'],$v['apellido']);
                }
            }*/
            $usario=array_filter($credenciales, function($e){
                return $e['clave'] == md5("clave2");
            });

            //print_r($usario);
            printf("El usuario que introdujo la contraseña es: %s %s",$usario[array_key_first($usario)]['nombre'],$usario[array_key_first($usario)]['apellido']);
            
            /*-En conclusion se puede hacer con dos formas, con un bucle recorriendolo,$v sera el array de cada usuario con lo cual comprobamos aquel cuya clave sea 'clave2' en md5
                y lo imprimimos, la otra forma es array_filter que el segundo argumento es una funcion que actua como filtro de lo que buscamos es decir return $e['clave'] == md5("clave2");
                
            */  
?>