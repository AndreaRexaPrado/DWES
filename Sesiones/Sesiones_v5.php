<html>
    <body>
        
<?php
/*5. Codificar un script PHP que presente el número de veces que un usuario accede a una página.
 La primera vez, además de mostrar el valor 1, mostrará el mensaje “Nuevo en el lugar”. 
 La segunda y sucesivas veces, mostrará el valor “n” del número de visitas y el momento que el usuario entró por última vez. 
 Realizarlo primero mediante cookies y después mediante sesiones.
*/ 
function generateRandomString($length = 10) {
    return 
   substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}
setcookie("identificador", generateRandomString(), time()+3600);
setcookie("contador", 1);
setcookie("ultima", date("d-M-Y h:i:s",time()));

$mss1 = "<p>Ya estaba registrado</p>";
$mss2 = "<p>Nuevo en el lugar</p>";
print_r($_COOKIE);
if(isset($_COOKIE['identificador'])&&isset($_COOKIE['contador'])&&isset($_COOKIE['ultima'])){
    
    $visitas=intval($_COOKIE['contador']);
    $visitas+=1;
    setcookie("contador", (String) $visitas);
    echo $mss1;
    echo "Numero de visitas: ".$_COOKIE['contador']."<br>";
    echo "Ultima visita: ".$_COOKIE['ultima'];

}else{
    echo $mss2." 1";
}



?>
    </body>
</html>