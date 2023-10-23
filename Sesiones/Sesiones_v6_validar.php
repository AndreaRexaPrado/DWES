<html>
    <body>
        
<?php
/*6. Crear un script PHP que tenga un formulario que llame a una segunda página PHP y que solicite el nombre y apellidos de un usuario 
y los almacene en sendas variables de sesión cuando se pulse el botón de enviar. En esta segunda página se verificará si existen ambas variables de sesión. 
En caso afirmativo, dará la bienvenida al usuario mostrando su nombre y apellidos. En caso contrario, mostrará un mensaje indicando 
que no puede visitar la página. Tendrá un hipervínculo al formulario inicial.
*/

session_start(array());

if(isset($_SESSION['nombre'])&&isset($_SESSION['apellido'])){
    echo "Bienvenido ".$_SESSION['nombre']." ".$_SESSION['apellido']."<br>";

}else{
    echo "NO PUEDES PASAR <br>";
   
}

setcookie("PHPSESSID","",time()-1);
$_SESSION['deleted_time'] = time();
if (!empty($_SESSION['deleted_time']) && $_SESSION['deleted_time'] < time() - 1) {
    session_destroy();
    //session_start();
}
print_r($_COOKIE);
echo "<a href='Sesiones_v6_form.php'>Volver</a>";
?>
    </body>
</html>