<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sección:</title>
	<style>
        .formlogin {
            width: 30%;
            margin: auto;
        }
		.fieldsetlogin {
			border: 1px solid #ccc;
			padding: 10px;
			border-radius: 5px;
		}

		.legendlogin {
			font-size: 1.2em;
			font-weight: bold;
		}

		.labellogin {
			display: block;
			margin-bottom: 5px;
		}

		.inputlogin {
			width: 100%;
			padding: 8px;
			margin-bottom: 10px;
			box-sizing: border-box;
		}

		.inputlogin[type="submit"] {
			background-color: #4CAF50;
			color: white;
			cursor: pointer;
		}

		.inputlogin[type="submit"]:hover {
			background-color: #45a049;
		}
	</style>
</head>
<body> 
<?php
	include("../modelo/productos_dao.inc.php");
	include("../modelo/users_dao.inc.php");
	include("../vista/vista.inc.php");
	$v = new vista();
	$daoProd = new ProductosDAO();
	$daoUser = new udao();
	$v->cabecera();
?>
<div style="overflow:hidden; width:100%; height:80%;">
	<div id="tables" style="float:left; width:30%; ">
        
        <fieldset>
            <legend>Sección: </legend>
			 
				<?php
					echo "IZQ ARRIBA";
				?>				
		</fieldset>
			  
			  
	<div>
		<fieldset>
		<legend>Sección: </legend>
				<?php
					echo "IZQ ABAJO";
				?>
		</fieldset>
		</div>
	</div> 
			
	<div id="cuerpo" style="width:70%; float:left;">
	 <fieldset>
	   <legend>Sección: </legend>
	<h3>Resultados</h3>
	
<?php

	if(isset($_POST['btnLogIn'])){
		$v->formLogin();
		
	}else if(isset($_POST['okLogin'])){
		
		$user=$daoUser->get($_POST['usr'],$_POST['pass']);
		echo md5($_POST['pass']);
		if(empty($user)){
			echo "<h2>ERROR USER NO VALIDO O NO EXISTE</h2>";
		}else{
			echo "<h2>LETS GOOOO</h2>";
		}
	}else{
		
		$v->mostrarTablaProds($daoProd->getAll());
	}

		
?>	
	
	</fieldset>
	
    </div>
	
	</div>
</body>
</html>