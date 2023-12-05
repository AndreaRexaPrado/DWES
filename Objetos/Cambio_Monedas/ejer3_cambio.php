<html>
    <head>
        <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
        <title>Ejercicio 5.2</title>
    </head>
    <body>
            
        <?php 
            include("modelo/ejer3.datos.php"); //Trae el codigo del archivo indicado
            include("vista/ejer3.vista.php");
            session_start();

            if(!isset($_SESSION['lang'])){
                $v = new Vista();
            }else{
                $v = new Vista($_SESSION['lang']);


            }
            
            if(isset($_POST["ok_lang"])){
                
                $_SESSION['lang']=$_POST["idiomas"];

                $v->set_lang($_SESSION['lang']);           
                $v->form_cambio();
            }else{
                $v->form_cambio();
                
            }
            //var_dump($_POST);
           if(isset($_POST['ok'])){//Si esa variable existe
                
                $conv=$_POST['conv'];
                $cantidad=$_POST['cantidad'];
                $peseta=$cantidad*VALORES[$conv];
                $v->imprimirResultado($cantidad,$conv,$peseta);
            }
        ?>
    </body>
</html>