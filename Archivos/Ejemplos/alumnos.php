

<html lang="es">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="alumnos.css">
    </head>
    <body>
    
<?php
   header('Content-Type: text/html; charset=UTF-8');
   
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
    include("data/dao_alumnos.inc.php");
    include("alumnos_vista.php");
    generarForm();
    $alumnos = getAll();
    if(isset($_POST['list'])){
        generarTabla($alumnos);
    }
    if(isset($_POST['cons'])){   

        generarDespegable($alumnos,"cons");
    }
    
    if(isset($_POST['ok_cons'])){
        generarTablaConsExp(get($_POST['exps']),$_POST['exps']);
    }

    if(isset($_POST['new'])){
        generarFormNuevo();
    }
    if(isset($_POST['ok_nuevo'])){
        $valido=true;
        
        foreach($_POST as $k => $v){
            if($k != "ok_nuevo"){
                if(empty($v)){
                    $valido=false;
                    break;
                }
            }
        }
        if($valido){
            $alumno=array(generarNumExp($alumnos)=>array("nombre"=>$_POST["nombre"],"ape1"=>$_POST["ape1"],"ape2"=>$_POST["ape2"],"fnac"=>date("d-m-Y",strtotime($_POST["fnac"])),"ciclo"=>$_POST["ciclo"]));
            save($alumno);
        }else{
            echo BR.BR.BR."<p style='color:red'>Algun dato vacio</p>";
        }
        
        

    }

    if(isset($_POST['update'])){
        generarDespegable($alumnos,"upd");
    }

    if(isset($_POST['ok_upd'])){
        $al=get($_POST['exps']);

        generarFormActualizar($al);
        $_POST['exps']=$_POST['exps'];
        setcookie('exp', $_POST['exps']);

    }

    if(isset($_POST['ok_upd_form'])){
        $valido=true;
        //print_r($_POST);
        foreach($_POST as $k => $v){
            if($k != "ok_nuevo"){
                if(empty($v)){
                    $valido=false;
                    break;
                }
            }
        }
        if($valido){
            $alumno=array($_COOKIE['exp']=>array("nombre"=>$_POST["nombre"],"ape1"=>$_POST["ape1"],"ape2"=>$_POST["ape2"],"fnac"=>date("d-m-Y",strtotime($_POST["fnac"])),"ciclo"=>$_POST["ciclo"]));
            update($alumno);
        }else{
            echo BR.BR.BR."<p style='color:red'>Algun dato vacio</p>";
        }
    }

    function generarNumExp($alumnos) {
        $alumnos_ord = $alumnos; 
        krsort($alumnos_ord);
        $maxExp= array_key_first($alumnos_ord);
        return intval($maxExp) + 2;
    }

?>
    </body>
</html>