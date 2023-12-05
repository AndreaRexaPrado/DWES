<html>
    <head>
        <title>Examen RP-A</title>
    </head>
    <body>
    <?php

    include("RP-A.vista.inc.php");
    setcookie("idioma","es");
    generarFormIdiomas();

    if(isset($_POST["ok_lang"])){
        generarFormImg($_COOKIE["idioma"]).
        setcookie("idioma",$_POST["idiomas"]);
        
    }else {
        generarFormImg($_COOKIE["idioma"]);
    }

    if(isset($_POST["ok_img"])){
        contarImg($_POST["radio"],$_COOKIE["idioma"]); 
    }
    ?>
    

</body>
</html>