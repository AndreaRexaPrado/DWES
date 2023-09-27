<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<head>
    <title>ejercicio 4.1</title>
</head>

<body>

    <?php
    //Esto es un comentario de una linea
    /*y
      este
      de
      varias    
    */
    $ini = "Hola ";
    $fin = " a todos";
    $todo = $ini . $fin; //. es el operador de  concat
    echo $todo;
    //No hay tipado las variables pueden cambiar en cualquier momento
    $ini = 1;
    $fin = 2.2;
    $todo = $ini . $fin; // el concat con int los trata como texto
    echo "<br>".$todo."<br>";
    ?>
</body>

</html>