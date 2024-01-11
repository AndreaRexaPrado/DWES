<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectronicaWeb</title>
	<link rel="stylesheet" href="estilosv2.css">
	 <!-- Incluye los archivos de Bootstrap y Font Awesome -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body> 
<?php
	//Includes
	include("../modelo/productos_dao.inc.php");
	include("../modelo/users_dao.inc.php");
	include("../vista/vista.inc.php");
	//Session start
	session_start();
	//Si el la cookie para mantener la persistencia del idioma se pone en español por defecto
	//echo "<h1>".isset($_COOKIE["idioma"])."<h1>";
	if(!isset($_COOKIE["idioma"])){
		setcookie("idioma","ES");
		$v = new vista($_COOKIE["idioma"]);
		header("Location: panel_app.php"); //Recargar la pagina
	}else{
		$v = new vista($_COOKIE["idioma"]);
	}
	//Cookie para guardar el carrito 
	if(!isset($_SESSION['carr'])){
		$_SESSION['carr']=[];
	}
	//Instanciacion de los objetos que necesitaremos mas adelante como el de vista para generarla
	
	$daoProd = new ProductosDAO();
	$daoUser = new udao();
	//Metodo que imprime la cabecera
	$v->cabecera();

?>
<div style="overflow:hidden; width:100%; height:80%;">
	<div id="tables" style="float:left; width:30%; ">
        
        <fieldset>
		<legend><?php echo LANG[$v->get_lang()]["legUsr"]?> </legend>
			 
				<?php
					//Panel datos del usuario			
					if(isset($_SESSION['user'])){
						if($_SESSION['rol']==='cli'){
							echo LANG[$v->get_lang()]["user"] . " " .$_SESSION['user'];
	

						}else{
							echo "Administrador ". $_SESSION['user'];

						}

						if(!isset($_SESSION['carr'])){
							$_SESSION['carr']=[];
						}
					}else{
						echo LANG[$v->get_lang()]["msgIdent"];
					}
				?>				
		</fieldset>
			  
			  
	<div>
		<fieldset>
		<legend><?php echo LANG[$v->get_lang()]["legFil"]?> </legend>
				<?php
					//Panel de filtros
					$v->formFiltros($daoProd->camposTabla());
				?>
		</fieldset>
		</div>
	</div> 
			
	<div id="cuerpo" style="width:70%; float:left;">
		<fieldset>
	   		<legend><?php echo LANG[$v->get_lang()]["legContPri"]?></legend>
	
	
<?php
	//Contenido principal
	
	//Funcion boton Login
	if(isset($_POST['btnLogIn'])){
		$v->formLogin();
		
		
	}else if(isset($_POST['okLogin'])){
		/*Funcion boton ok login, tras introducir los datos compueba si son correctos haciendo una consulta a la bbdd
		  si es correcto la variable user no estara vacia e iniciara la sesion con los datos del usuario para futuras
		  funcionalidades y la de commit para cuando vaya a comprar se de por validado que esta iniciada la session
		*/
		$user=$daoUser->get($_POST['usr'],$_POST['pass']);
		if(empty($user)){
			echo "<h2>".LANG[$v->get_lang()]["userNoVal"]."</h2>";
		}else{
			
			$_SESSION['user']=$user[0]['usr'];
			$_SESSION['rol']=$user[0]['rol'];
			$_SESSION["commit"]=1;
			header("Location: panel_app.php"); //Recargar la pagina
			
		}
	}else if(isset($_POST['btnLogOut'])){
		//Deslogeo del usuario, manda a pagina de logout donde se destruye la sesion
		header("Location: logout.php");


	}else if(isset($_POST['okFiltar'])){
		//Filtra los productos segun los introducidos en los filtros y muestra el resultado
		$result=$daoProd->filtrado($_POST);
		$v->mostrarTablaProds($result);

	}else if(isset($_POST['btnCart'])){
		//Introduce en la sesion incar para que cuando se recarge la pagina no se salga del carrito
		$_SESSION['incarr']=1;
		header("Location: panel_app.php");

	}else if(isset($_POST['btnHome'])){
		//Boton que regresa a la pagina principal desde cualquier parte
		unset($_SESSION['commit']);
		unset($_SESSION['incarr']);
		header("Location: panel_app.php");	
		
	}else if(isset($_POST['btnRegresar'])){
		//Boton que regresa a la pagina principal desde el carrito
		unset($_SESSION['incarr']);
		header("Location: panel_app.php");

	}else if(isset($_POST['btnRegresarFact'])){
		//Boton que regresa al carrito desde la factira
			unset($_SESSION['commit']);
			header("Location: panel_app.php");

	}else if(isset($_POST['btnTramitar'])){
		/*Boton en el carrito para tramitar el pedido,si no esta logeado le manda al formulario de logeo y si no muestra la factura*/
		if(!isset($_SESSION['user'])){
			$v->formLogin();	
		}else{
			$result=$daoProd->carrito();
			$daoProd->update();
			//$v->factura($result);
		}
	}else if(isset($_POST["okIdioma"])){
			//Boton para la traducion que crea la cookie idioma con el valor del idioma seleccionado
			setcookie("idioma",$_POST["idiomaSelec"]);			
			header("Location: panel_app.php");
	}else {
		//Boton que añade al carrito el id del producto y las unidades seleccionadas
		if(isset($_POST['btnUds'])&&$_POST['selUds']>0){
			$cod = array_key_first($_POST['btnUds']);
			$_SESSION['carr'][$cod]=$_POST['selUds'];
		}
		//Si el usuario esta logeado mostrara la factura
		if(isset($_SESSION['commit'])){
			$result=$daoProd->carrito();
			
			$v->factura($result);

		}else if(isset($_SESSION['incarr'])){
			//Gestion del carrito, botones de borrado y ediccion de unidades del producto en el carrito
			if(isset($_POST['btnDel'])) {
				$cod = array_key_first($_POST['btnDel']);
				unset($_SESSION['carr'][$cod]);
			}

			if(isset($_POST['btnEdit'])) {
			
				$cod = array_key_first($_POST['btnEdit']);
				$_SESSION['carr'][$cod]=$_POST['selUds'];
			}
			//Se muestra el carrito
			$result=$daoProd->carrito();
			
			$v->mostrarCarrito($result);

		}else{
			//Se muestra el listado con todas los productos
			$result=$daoProd->getAll();
			$v->mostrarTablaProds($result);
		}
	}

?>	
	
			</fieldset>
	
    	</div>
	</div>
	<!-- Incluye los archivos de jQuery y Bootstrap JavaScript -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	
</body>
</html>