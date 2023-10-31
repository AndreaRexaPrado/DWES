

<html lang="es">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="alumnos.css">
    </head>
    <body>
    
<?php
   
/**Crear un formulario con los siguientes elementos
 *  Un titulo "Gestion de alumnos"
 *  Debajo, dos botones:Listado, Consultar,Nuevo
 *      Al pulsar la opcion listado, aparecera una tabla con todos los alumnos
 *      Al pulsar consultar, aparecera un formulario con su respectivo boton y 
 *         1 una lista desplegable con todos los numeros de expediente
 *         2 si seleccionamos un num exp, mostrar todos los datos del alumno correspondiente
 *      Al pulsar la opcion nuevo, aparecera un formulario con su correspondiente boton y 
 *         Los campos los datos de un nuevo alumno sin que desaparezcan los formularios anteriores, EXCEPTO el numero de expediente.
 *         Al pulsar el boton del formulario, se calculara el num exp, sumando 2 al mayor numero que haya y se insertara el alumno con el formato adecuado
 *         
 *          
 * 
 * 
 * Solo se usara el script alumnos.php para mostrar datos
 *  
 */
    include("alumnos_vista.php");
    generarForm();
    $alumnos = getAll();
    if(isset($_POST['list'])){
        //$alumnos = getAll();
        print_r($alumnos);
        generarTabla($alumnos);
    }
    if(isset($_POST['cons'])){   
       // $alumnos = getAll();
        generarDespegable($alumnos);
    }
    
    if(isset($_POST['ok_cons'])){
        generarTablaConsExp(get($_POST['exps']),$_POST['exps']);
    }

    if(isset($_POST['new'])){
        generarFormNuevo();
    }
    if(isset($_POST['ok_nuevo'])){
        //$alumnos = getAll();
        echo generarNumExp($alumnos);
        $arr=array("nombre"=>$_POST["nom"],"ape1"=>$_POST["ape1"],"ape2"=>$_POST["ape1"],"fnac"=>$_POST["fnac"],"ciclo"=>$_POST["ciclos"]);
        var_dump($arr);
        $alumnos[generarNumExp($alumnos)]=$arr;
        generarTabla($alumnos);

    }
    function generarNumExp($alumnos) {
        $alumnos_ord = $alumnos; 
        krsort($alumnos_ord);
        $maxExp= array_key_first($alumnos_ord);
        return $maxExp + 2;
    }
?>
    </body>
</html>