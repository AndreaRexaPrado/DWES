<?php

    class vista{
        private $lang;

        //Constructor
        function __construct($lang="es"){

            $this->lang = $lang;
        }
        
        function get_lang(){
            return $this->lang;
        }

        function set_lang($lang){
            
             $this->lang = $lang;
        }
        //Funcion para poner los select de unidades en cada producto tanto en la principal como en el carrito
        function ops_uds($max_uds,$id,$sel=0,$operacion="add"){

            $cont=$max_uds>MAXUDS ? MAXUDS: $max_uds; //Si las unidades son mayores que la de MAXUDS pondra el valor de MAXUDS si no la unidades 

            if($cont>0){
                $f="<form method=post action=".$_SERVER['PHP_SELF'].">\n";
                $f.="<select name='selUds'>";
                $f.="<option value='0'>0</option>";
                for($i=1;$i<=$cont;$i++){
                    $f.="<option value='$i'";
                    //Si el tercer argumento es distinto de 0 seleccionara ese valor(solo para el carrito)
                    if($i == $sel){
                        $f.=" selected";
                    }
                    $f.=">$i</option>";

                }
                $f.="</select>";
                //Si el cuarto argumento es distionto de add pondra los botones de editar y borrar (solo para el carrito) 
                if($operacion=="add"){
                    $f.="<input type='submit' name='btnUds[".$id."]' value='".LANG[$this->lang]["btnAniadir"]."'>";
                }else{
                    $f.="<input type='submit' name='btnEdit[".$id."]' value='Edit'>";
                    $f.="<input type='submit' name='btnDel[".$id."]' value='Del'>";
                }
                
                $f.="</form>";
                return $f;
            }else{
                return "No hay stock";
            }
            
        }
        //Funcion que recorre el array que se le pasa e imprime la tabla del productos
        function mostrarTablaProds($prods){
            if(empty($prods)){   
                echo "<h3>".LANG[$this->lang]["msgProdVacio"]."<br><a href=".$_SERVER['PHP_SELF'].">".LANG[$this->lang]["continuar"]."</a></h3>";
            }else{           
                
                
                $t="<table>".N;     
                $t.="<thead>".N;
                $keys = array_keys($prods[array_key_first($prods)]);
        
                foreach($keys as $k => $v){
                    $t.="<th>".LANG[$this->lang]["titulos"][$v]."</th>";           
                }
                $t.="<th>Unidades</th>";      
                $t.="</thead>".N;
                $t.="<tbody>".N;
                foreach($prods as $k => $v){
                    $t.="<tr>".N;
                    foreach($v as $kv => $vv){
                        
                        
                        if($kv==="imagen"){
                            $t.="<td><img src='../Img/$vv' alt='$vv' width ='100' height='100'></td>";
                        }else{
                            $t.="<td>".$vv."</td>"; 
                        }

                    }
                    
                    $t.="<td>".$this->ops_uds($v['existencias'],$v['cod'])."<td>"; //Celda para el select de unidades
                    $t.="</tr>".N;   
                }

                $t.="</tbody>".N;
                $t.="</table>".N;
                echo $t;
            }  
        
        }
        //Funcion que recorre el array que se le pasa e imprime la tabla del carrito
        function mostrarCarrito($prods){ 
            //Si el carrito esta vacio sacara un mensaje que esta vacio y permite volver a la principal
            if(empty($_SESSION['carr'])){   
                echo "<h3>".LANG[$this->lang]["msgCarritoVacio"]."<br><a href=".$_SERVER['PHP_SELF'].">".LANG[$this->lang]["continuar"]."</a></h3>";
                unset($_SESSION['incarr']);
            }else{           
                
              
                $t="<table>".N;     
                $t.="<thead>".N;
                //Cabeceras con los campos traducidos
                $keys = array_keys($prods[array_key_first($prods)]);
        
                foreach($keys as $k => $v){
                    
                    $t.="<th>".LANG[$this->lang]["titulosCarrito"][$v]."</th>";     
                    
                }
                $t.="<th>".LANG[$this->lang]["uds"]."</th>";      
                $t.="</thead>".N;
                $t.="<tbody>".N;

                foreach($prods as $k => $v){
                   
                        $t.="<tr>".N;
                        foreach($v as $kv => $vv){
                            
                            
                            if($kv==="imagen"){
                                $t.="<td><img src='../Img/$vv' alt='$vv' width ='100' height='100'></td>";
                            }else{
                                $t.="<td>".$vv."</td>"; 
                            }

                        }
                        $t.="<td>".$this->ops_uds($v['existencias'],$v['cod'],$_SESSION['carr'][$v['cod']],"carr")."<td>";
                        $t.="</tr>".N;  
                
                }

                $t.="</tbody>".N;
                $t.="</table>".N;
                $t.="<form method=post action=".$_SERVER['PHP_SELF'].">\n";
                $t.="<input type='submit' name='btnTramitar' value='".LANG[$this->lang]["btnTramitar"]."'>";
                $t.="<input type='submit' name='btnRegresar' value='".LANG[$this->lang]["continuar"]."'>";
                $t.="<form>";
                echo $t;
            }  
        
        }
        
        function factura($prods){
            $sumTotal=0;

            $t="<table>".N;     
            $t.="<thead>".N;
             
            $keys = array_keys($prods[array_key_first($prods)]);
               
            foreach($keys as $k => $v){

                if($v!=="existencias"){
                    $t.="<th>".LANG[$this->lang]["titulosCarrito"][$v]."</th>";     
                }             
            } 
            $t.="<th>".LANG[$this->lang]["subtotal"]."</th>";       
            $t.="</thead>".N;
            $t.="<tbody>".N;
            foreach($prods as $k => $v){
                   
                    $t.="<tr>".N;
                    foreach($v as $kv => $vv){
                            
                            
                        if($kv==="imagen"){
                            $t.="<td><img src='../Img/$vv' alt='$vv' width ='100' height='100'></td>";
                        }else if($kv!=="existencias"){
                            $t.="<td>".$vv."</td>"; 
                        }

                        if($kv==="pvp"){
                            $pvp=$vv;
                        }
                        if($kv==="cod"){
                            $cod=$vv;
                        }
                    }
                    $subTotalProd=$pvp*$_SESSION["carr"][$cod];
                    $sumTotal+=$subTotalProd;
                    $t.="<td>".$subTotalProd."</td>"; 
                    $t.="</tr>".N;  
                
            }
            $t.="<tr><td>".LANG[$this->lang]["total"].":</td><td>".$sumTotal ."</td></tr>".N;
            $t.="</tbody>".N;
            $t.="</table>".N;
            $t.="<form method=post action=".$_SERVER['PHP_SELF'].">\n";
            $t.="<input type='submit' name='btnTramitarFact' value='".LANG[$this->lang]["btnTramitar"]."'>";
            $t.="<input type='submit' name='btnRegresarFact' value='".LANG[$this->lang]["continuar"]."'>";
            $t.="<form>";
            echo $t;
            
        
        }
        //Formulario de idiomas
        function formIdiomas(){
            $f="<div style=float:left;>";
            $f.="<form method=post action=".$_SERVER['PHP_SELF'].">\n";
            $f.="<label>".LANG[$this->lang]["seleIdio"]."</label>";
            $f.="<select name='idiomaSelec' >\n";
            foreach(IDIOMAS as $k => $v){
                
                $f.="<option value='$k' ";
                if($k == $this->lang){
                    $f.="selected";
                }
                $f.=">$v</option>\n";
            }
            $f.="</select>\n";
            $f.="<input type='submit' name='okIdioma' value='".LANG[$this->lang]["trad"]."'>\n";
            $f.="</form>\n";
            $f.="</div>";
            return $f;
        }
        //Cabecera
        function cabecera(){
            $f="<nav class='navbar navbar-expand-lg navbar-dark'>
            <a class='navbar-brand' href='#'>
                <img src='../Img/CalicoElectronico-1.jpg' alt='Logo ELECTRONICAWEB' width='30' height='30' class='d-inline-block align-top'>
                ELECTRONICAWEB
            </a>
            <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarNav'>
            <ul class='navbar-nav ml-auto'>
                <li class='nav-item active'>
                    <a class='nav-link' href='#'><i class='fas fa-home'></i> Inicio <span class='sr-only'>(current)</span></a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='#'><i class='fas fa-shopping-cart'></i> Carrito</a>
                </li>";
               
                    if (isset($_SESSION['user'])) {
                        // Usuario autenticado
                        $f.="\n<li class='nav-item' id='logoutButton'><a class='nav-link' href='#'><i class='fas fa-sign-out-alt'></i> Cerrar sesión</a></li>\n";
                    } else {
                        // Usuario no autenticado
                        $f.="<li class='nav-item' id='loginButton'><a class='nav-link' href='#'><i class='fas fa-sign-in-alt'></i> Iniciar sesión</a></li>";
                    }
                
                $f.="<li class='nav-item dropdown' id='languageSelect'>
                    <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        <i class='fas fa-globe'></i> Idioma
                    </a>
                    <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                        <a class='dropdown-item' href='#'>Español</a>
                        <a class='dropdown-item' href='#'>English</a>
                    </div>
                </li>
            </ul>
        </div>
        </nav>";
           /* $f.=$this->formIdiomas();
            $f.="<div style=float:right;>";          
            $f.="<form method=post action=".$_SERVER['PHP_SELF'].">\n";
            $f.="<input name='btnLogIn' type='submit' value='Log in' class='button'>";
            $f.="<input name='btnLogOut' type='submit' value='Log out' class='button'>";
            $f.="<input name='btnCart' type='submit' value='".LANG[$this->lang]["btnCarr"]."' class='button'>";
            $f.="<input name='btnHome' type='submit' value='Home' class='button'>";
            $f.="</form>";
            $f.="</div>";*/
            echo $f;
        }
        //Formulario de login
        function formLogin(){
            
            $f="<form method=post action=".$_SERVER['PHP_SELF'].">\n";
            $f.="<fieldset>\n";
            $f.="<legend >Login</legend>\n";
            $f.="<label for='idusr'>".LANG[$this->lang]["user"]."</label>\n";
            $f.="<input type='text' id='idusr' name='usr'>\n";
            $f.="<label for='idpass'>".LANG[$this->lang]["pass"]."</label>\n";
            $f.="<input type='password' id='idpass' name='pass' >\n";
            $f.="<input type='submit' name='okLogin' value='Log'>\n";
            $f.="</fieldset>\n";
            $f.="</form>\n";
            echo $f;
        }

        //Formulario de filtrado
        function formFiltros($filtros){
            
            $f="<form method=post action=".$_SERVER['PHP_SELF'].">\n";
            
            foreach($filtros as $campos){
                if($campos['Field'] !='imagen'){
                    $f.="<input type=";
                    //Si el campo en la bbdd es de tipo var el input text si no number
                    if(substr($campos['Type'],0,3)==='var'){
                        $f.="'text'";
                    }else{
                        $f.="'number' min=0 ";
                    }
                    
                    $f.="name='$campos[Field]' placeholder=".LANG[$this->lang]["titulos"][$campos['Field']]."><br>\n";
                }
            }
            $f.="<br><input type='submit' name='okFiltar' value='".LANG[$this->lang]["botFil"]."'>\n";
            $f.="</form>\n";
            echo $f;
        }
    }
?>