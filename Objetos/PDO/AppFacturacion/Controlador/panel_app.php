<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectronicaWeb</title>
	<link rel="stylesheet" href="estilos.css">
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

	
	if(!isset($_SESSION['carr'])){
		$_SESSION['carr']=[];
	}
	
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
						if(!isset($_SESSION['carr'])){
							$_SESSION['carr']=[];
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
			$_SESSION["commit"]=1;
			header("Location: panel_app.php");
			
		}
	}else if(isset($_POST['btnLogOut'])){
		$_SESSION['carr']=[];
		header("Location: logout.php");


	}else if(isset($_POST['okFiltar'])){
		
		$result=$daoProd->filtrado($_POST);
		$v->mostrarTablaProds($result);

	}else if(isset($_POST['btnCart'])){
		$_SESSION['incarr']=1;
		header("Location: panel_app.php");

	}else if(isset($_POST['btnRegresar'])){
		unset($_SESSION['incarr']);
		header("Location: panel_app.php");

	}else if(isset($_POST['btnTramitar'])){
		if(!isset($_SESSION['user'])){
			$v->formLogin();	
		}else{
			$result=$daoProd->carrito();
			
			$v->factura($result);
		}
	
	}else {
		if(isset($_POST['btnUds'])&&$_POST['selUds']>0){
			$cod = array_key_first($_POST['btnUds']);
			$_SESSION['carr'][$cod]=$_POST['selUds'];
		}
		if(isset($_SESSION['commit'])){
			$result=$daoProd->carrito();
			
			$v->factura($result);
		}else if(isset($_SESSION['incarr'])){
			/*print_r($_SESSION);*/
			if(isset($_POST['btnDel'])) {
				$cod = array_key_first($_POST['btnDel']);
				unset($_SESSION['carr'][$cod]);
			}
			if(isset($_POST['btnEdit'])) {
			
				$cod = array_key_first($_POST['btnEdit']);
				$_SESSION['carr'][$cod]=$_POST['selUds'];
			}

			$result=$daoProd->carrito();
			
			$v->mostrarCarrito($result);
		}else{
			$result=$daoProd->getAll();
			$v->mostrarTablaProds($result);
		}






	}

	

?>	
	
			</fieldset>
	
    	</div>
	
	</div>
</body>
</html>