<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sección:</title>
</head>
<body> 
<?php
	include("../modelo/productos_dao.inc.php");
	include("../modelo/users_dao.inc.php");
	include("../vista/vista.inc.php");
	session_start();
	$v = new vista();
	$daoProd = new ProductosDAO();
	$daoUser = new udao();
	$v->cabecera();
?>
<div style="overflow:hidden; width:100%; height:80%;">
	<div id="tables" style="float:left; width:30%; ">
        
        <fieldset>
            <legend>Informacion del usuario: </legend>
			 
				<?php
				
					
					
					if(isset($_SESSION['user'])){
						if($_SESSION['rol']==='cli'){
							echo "Usuario ".$_SESSION['user'];
						}else{
							echo "Administrador ". $_SESSION['user'];

						}
					}else{
						echo "Identifícate para acceder a todas las funcionalidades";
					}
				?>				
		</fieldset>
			  
			  
	<div>
		<fieldset>
		<legend>Filtros: </legend>
				<?php
					$v->formFiltros($daoProd->camposTabla());
				?>
		</fieldset>
		</div>
	</div> 
			
	<div id="cuerpo" style="width:70%; float:left;">
	 <fieldset>
	   <legend>Contenido principal: </legend>
	
	
<?php

	if(isset($_POST['btnLogIn'])){
		$v->formLogin();
		
		
	}else if(isset($_POST['okLogin'])){
		
		$user=$daoUser->get($_POST['usr'],$_POST['pass']);
		if(empty($user)){
			echo "<h2>ERROR USER NO VALIDO O NO EXISTE</h2>";
		}else{
			
			$_SESSION['user']=$user[0]['usr'];
			$_SESSION['rol']=$user[0]['rol'];
			header("Location: panel_app.php");
			
		}
	}else if(isset($_POST['btnLogoOut'])){
		session_unset();
		session_destroy();
		exit();

	}else if(isset($_POST['okFiltar'])){
		//print_r($_POST);
		$daoProd->filtrado($_POST);

	}else{
		
		$v->mostrarTablaProds($daoProd->getAll());
	}

	

?>	
	
	</fieldset>
	
    </div>
	
	</div>
</body>
</html>