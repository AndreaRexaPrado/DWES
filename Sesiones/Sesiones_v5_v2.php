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
session_start();
session_unset();
echo "Sesion: ". session_id();
$_SESSION["identificador"] = generateRandomString();
$visitas=1;
$_SESSION["contador"] = $visitas+1;
$_SESSION["ultima"] = date("d-M-Y h:i:s",time());

$mss1 = "<p>Ya estaba registrado</p>";
$mss2 = "<p>Nuevo en el lugar 1</p>";
echo "<br>";
var_dump($_SESSION);
echo "<br>";
if(isset($_SESSION['identificador'])&&isset($_SESSION['contador'])&&isset($_SESSION['ultima'])){
    

    echo $mss1;
    echo "Numero de visitas: ".$_SESSION['contador']."<br>";
    echo "Ultima visita: ".$_SESSION['ultima'];

}else{
    echo $mss2;
}
session_destroy();
//
?>
    </body>
</html>