<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<head>
    <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
    <title>Ejercicio 5.1</title>
</head>

<body>
    <form method="POST" action=<?php echo $_SERVER['PHP_SELF'] ?>>
        Introduzca la cantidad de euros:
        <input type="text" name="euros" size="10">
        <input type="submit" name="ok" value="enviar">
    </form>
    <?php

    $euros = $_POST['euros'];
    $pesetas = $euros * 166.386;
    echo "<h1>Son $pesetas pesetas</h1>";
    ?>
</body>

</html>