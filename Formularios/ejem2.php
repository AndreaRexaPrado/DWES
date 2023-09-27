<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
        <title>ejercicio 5.2</title>
    </head>
    <body>
        <?php

        $conv=$_POST['conv'];
        $cantidad=$_POST['cantidad'];
        $valores=["euro"=>166.386,"dolares"=>180.386];
        $pesetas=$cantidad/$valores[$conv];

        echo "<h1>Son $pesetas $conv</h1>";
        ?>
    </body>
</html>