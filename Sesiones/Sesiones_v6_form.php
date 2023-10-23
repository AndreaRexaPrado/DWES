<html>
    <body>
        
<?php
/*6. Crear un script PHP que tenga un formulario que llame a una segunda página PHP y que solicite el nombre y apellidos de un usuario 
y los almacene en sendas variables de sesión cuando se pulse el botón de enviar. En esta segunda página se verificará si existen ambas variables de sesión. 
En caso afirmativo, dará la bienvenida al usuario mostrando su nombre y apellidos. En caso contrario, mostrará un mensaje indicando 
que no puede visitar la página. Tendrá un hipervínculo al formulario inicial.
*/
generarForm();
function generarForm(){
    $f="<form method=post action=".$_SERVER['PHP_SELF'].">\n";
    $f.="<fieldset>";
    $f.="<legend>Login</legend>";
    $f.="<label for='name'>Nombre </label>";
    $f.="<input name='nombre' id='name' type ='text'><br>";
    $f.="<label for='ape'>Apellido </label>";
    $f.="<input name='apellido' id='ape' type ='text'><br>";
    $f.="<input type=\"submit\" name=\"ok\" value=\"Enviar\">\n";
    $f.="</fieldset>";
    
    $f.="</form>";
    echo $f;
} 

if(isset($_POST['ok'])){
    session_start(array("session.use_strict_mode"));
    echo "Sesion: ".session_id();
   
    if($_POST['nombre']!==""&&$_POST['apellido']!==""){
        $_SESSION["nombre"] = $_POST['nombre'];
        $_SESSION["apellido"] = $_POST['apellido'];
    }
    header("Location:Sesiones_v6_validar.php");
}else if(isset($_SESSION['nombre'])){
    session_unset();
    session_destroy();
}


?>
    </body>
</html>