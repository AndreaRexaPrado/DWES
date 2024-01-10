<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ConsolaComp </title>
</head>
<body> 
<?php
	include("../modelo/productos_dao.inc.php");
	include("../modelo/users_dao.inc.php");
	include("../vista/vista.inc.php");
	session_start();
	if(!isset($_COOKIE["idioma"])){
		setcookie("idioma","ES");
	}
	$v = new vista();
	$daoProd = new ProductosDAO();
	$daoUser = new udao();
	$v->cabecera();
?>
<div style="overflow:hidden; width:100%; height:80%;">
	<div id="tables" style="float:left; width:30%; ">
        
        <fieldset>
            <legend><?php echo LANG[$_COOKIE["idioma"]]["legUsr"]?> </legend>
			 
				<?php
						
					if(isset($_SESSION['user'])){
						if($_SESSION['rol']==='cli'){
							echo LANG[$_COOKIE["idioma"]]["user"] . " " .$_SESSION['user'];
						}else{
							echo "Administrador ". $_SESSION['user'];

						}
					}else{
						echo LANG[$_COOKIE["idioma"]]["msgIdent"];
					}
				?>				
		</fieldset>
			  
			  
	<div>
		<fieldset>
		<legend><?php echo LANG[$_COOKIE["idioma"]]["legFil"]?> </legend>
				<?php
					$v->formFiltros($daoProd->camposTabla());
				?>
		</fieldset>
		</div>
	</div> 
			
	<div id="cuerpo" style="width:70%; float:left;">
	 <fieldset>
	   <legend><?php echo LANG[$_COOKIE["idioma"]]["legContPri"]?></legend>
	
	
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
	}else if(isset($_POST['btnLogOut'])){
		header("Location: logout.php");

	}else if(isset($_POST['okFiltar'])){
		$arrProd=$daoProd->filtrado($_POST);
		if(!empty($arrProd)){
			$v->mostrarTablaProds($arrProd);
		}else{
			echo "<h2>No se han encontrado productos con los filtros especificados</h2>";
		}

	}else if(isset($_POST["okIdioma"])){
		setcookie("idioma",$_POST["idiomaSelec"]);
		
		header("Location: panel_app.php");

	}else{
		
		$v->mostrarTablaProds($daoProd->getAll());
	}

	

?>	
	
	</fieldset>
	
    </div>
	
	</div>
</body>
</html>