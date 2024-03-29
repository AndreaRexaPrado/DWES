<?php

include("../modelo/conn.inc.php");
class ProductosDAO{
    public function __construct()
    {
        
    }
    //Funcion que trae todos los productos de la bbdd
    function getAll(){
        try{
            $c = new Conn();
            $conn = $c->getConn();
    
            //Ejecutar consulta no preparada
    
            $sql = "SELECT * FROM productos";
            $prods = $conn->query($sql);//Devuelve un objeto del tipo PDOStatement

            $result=$prods->fetchAll(PDO::FETCH_ASSOC);

            $c->closeConn();
        }catch(PDOException $e){
            echo"<h1>ERROR</h1>";
        }    
        return $result;
    }
    //Funcion que trae el producto con la id pasada por parametro de la bbdd
    function get($id){
        try{
            $c = new Conn();
            $conn = $c->getConn();

    
            //Ejecutar consulta preparada
    
            $sql = "SELECT * FROM productos WHERE cod=:id";
            $pstmt = $conn->prepare($sql);//Devuelve un objeto del tipo PDOStatement
            $pstmt->bindValue(':id',$id);
            $pstmt->execute();
            $result=$pstmt->fetchAll(PDO::FETCH_ASSOC);

            $c->closeConn();
        }catch(PDOException $e){
            echo"<h1>ERROR</h1>";
        }    
        return $result;
    }
    //Funcion que trae todos los campos de la tabla productos de la bbdd
    function camposTabla(){
        try{
            $c = new Conn();
            $conn = $c->getConn();
    
            //Ejecutar consulta no preparada
    
            $sql = "DESC productos";
            $prods = $conn->query($sql);//Devuelve un objeto del tipo PDOStatement

            $result=$prods->fetchAll(PDO::FETCH_ASSOC);

            $c->closeConn();
        }catch(PDOException $e){
            echo"<h1>ERROR</h1>";
        }    
        return $result;
    }

    //Funcion que filtra los objetos segun los filtros pasados
    function filtrado($filtos){
        $sql="SELECT * FROM productos ";
        $cont = 0; 
        $bind = array(); //Array para luego pasarlo a la consulta preparada
        //Se recorre el array de filtros mirando cuales no estan vacios
        foreach($filtos as $kf => $vf){
            if(!empty($vf) && $kf != 'okFiltar'){
                //Si es l primero pondra el where delante del filtro, incrementa el contador y al resto pondra and 
                if($cont === 0){
                    $sql .= "WHERE ";
                    $cont++;
                } else {
                    $sql .= " AND ";
                }
                //Se introduce el filtro si son numeros se usaran los opeandos en array constante OPER 
                //si es un texto pondra el like y el % para que busque aunque no sea exactamente ese texto
                
                if(is_numeric($vf)){                  
                    $sql .= "$kf ".OPER[$kf]." ?";
                    $bind[] = $vf; //Se añade al array de bind 
                } else {
                    $sql .= "$kf LIKE ?";
                    $bind[] = "%$vf%";  //Se añade al array de bind             
                }
            }
        }
        $sql .= ";";

        try {
            $c = new Conn();
            $conn = $c->getConn();
    
            // Ejecutar consulta preparada
            $stmt = $conn->prepare($sql);
            $stmt->execute($bind);//Sustituye las ? por los datos que hay en el array
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            $c->closeConn();
        } catch (PDOException $e) {
            echo "<h1>ERROR</h1> ".$e->getMessage();
        }
    
        return $result;
    }
    //Funcion que recorre el array del carrito y trae los datos de los productos seleccionados en el carrito
    function carrito(){

        $sql="SELECT cod,nom_prod,pvp,imagen,existencias FROM productos ";
        $cont = 0; 
        foreach($_SESSION['carr'] as $kf => $vf){
            if($cont === 0){
                $sql .= "WHERE ";
                $cont++;
            } else {
                $sql .= " OR ";
            }

            $sql .= "cod = $kf";

            
        }

        try {
            $c = new Conn();
            $conn = $c->getConn();
    
            // Ejecutar consulta preparada
            $prods = $conn->query($sql);//Devuelve un objeto del tipo PDOStatement

            $result=$prods->fetchAll(PDO::FETCH_ASSOC);

            $c->closeConn();
        } catch (PDOException $e) {
            echo "<h1>ERROR</h1> ".$e->getMessage();
        }
    
        return $result;
    }

    function updateExistecias(){
        /*Actualiza las existencias de los productos del carrito */
        $sql="UPDATE productos SET existencias = existencias - ? WHERE cod= ?";

        //Transancion
      
        $fins = "INSERT INTO FACTURAS(usr) VALUES (?)";
        $llins= "INSERT INTO LINEAS VALUES (?,?,?,?)";
        try {
            $c = new Conn();
            $conn = $c->getConn();
    
            //$conn->commit();
            //Set autocomito off

            $conn->beginTransaction();
            $pstmt = $conn->prepare($sql);
            $cont=0;
            foreach($_SESSION['carr'] as $kf => $vf) {
                if($pstmt->execute([$vf,$kf])){
                    $cont+=$pstmt->rowCount();
                }                
            }
            
            if($cont!= sizeof($_SESSION['carr'])){
                throw new PDOException("Error en la actualizacion");
            }else{
                $pstmt = $conn->prepare($fins);
                $pstmt->execute([$_SESSION['user']]);

                $facturaId = $conn->lastInsertId();
                $pstmt = $conn->prepare($llins);
                $cont=1;
                foreach($_SESSION['carr'] as $kf => $vf) {
                    $pstmt->execute([$facturaId,$cont,$vf,$kf]);
                    $cont+=1;                      
                }
            }
            $conn->commit();
           
        } catch (PDOException $e) {
            $conn->rollBack();
            echo "<h1>ERROR</h1> ".$e->getMessage();
        }
        $c->closeConn();
    }

    function insert($prod){
        /*Actualiza las existencias de los productos del carrito */
        $sqlMaxId="SELECT max(cod) as cod FROM productos";

        //Transancion
      

        $pins= "INSERT INTO productos VALUES (?,?,?,?,?,?)";
        try {
            $c = new Conn();
            $conn = $c->getConn();
    
            //$conn->commit();
            //Set autocomito off

            $conn->beginTransaction();
            $query = $conn->query($sqlMaxId);
            $maxID=$query->fetchAll(PDO::FETCH_ASSOC);
            $bind = array(); //Array para luego pasarlo a la consulta preparada
           

            $bind[] = $maxID[0]['cod']+1;
            foreach($prod as $kp => $vp){
                if($kp!='okInsert'){
                    if($kp == 'pvp'){
                        $bind[]=number_format($vp,2, '.', '');
                    }else{
                        $bind[]=$vp;

                    }
                }
            }
            //print_r($bind);
            $pstmt = $conn->prepare($pins);
            $pstmt->execute($bind);
            $conn->commit();

           
        } catch (PDOException $e) {
            $conn->rollBack();
            echo "<h1>ERROR</h1> ".$e->getMessage();
        }
        $c->closeConn();
    }
    
    function updateProd($prod){

    }
  /*Mismo campos que prod con old y new en ellos excepto codigo,usr,rol,dni,sentence,dni */
  
}
?>