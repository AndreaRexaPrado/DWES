<html>
    <body>
        
<?php
/*1. Codificar un script PHP que genere una cookie llamada idioma con valor ‘es’. 
     La página mostrará por defecto el mensaje en inglés ‘There was upon a time …’ 
     La siguiente(s) veces que se ejecute el script, se recuperará dicha cookie y aparecerá el mensaje ‘Érase una vez …’.
*/ 
setcookie("kk", "Érase una vez …");

print_r($_COOKIE);
if(isset($_COOKIE['kk'])){
    echo "<p>$_COOKIE[Erase]</p>";
}else{
    echo "<p>There was upon a time …</p>";
}



?>
    </body>
</html>