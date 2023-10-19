<html>
    <body>
        
<?php
/*2. Codificar un script PHP tal que al conectarse un usuario por primera vez, le envíe una cookie llamada identificador,
     de contenido una cadena alfanumérica aleatoria de longitud fija y duración 1 hora. Así mismo, se informará al usuario que era “nuevo en el lugar”.
     Al conectarse en sucesivas ocasiones, se recuperará la cookie y se informará al usuario de que “ya estaba registrado”.
*/ 
function generateRandomString($length = 10) {
    return 
   substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}
setcookie("identificador", generateRandomString(), time()+3600);

$mss1 = "<p>Ya estaba registrado</p>";
$mss2 = "<p>Nuevo en el lugar</p>";
print_r($_COOKIE);
if(isset($_COOKIE['identificador'])){
    echo $mss1;
}else{
    echo $mss2;
}



?>
    </body>
</html>