<?php

include("../modelo/conn.inc.php");
class ProductosDAO{
    public function __construct()
    {
        
    }
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
    function filtrado($filtos){
        
        $sql="SELECT * FROM productos ";
        $cont = 0; 
        foreach($filtos as $kf => $vf){
            if(!empty($vf) && $kf != 'okFiltar'){
                if($cont === 0){
                    $sql.="WHERE ";
                    $cont++;
                }else{
                    $sql.= " AND ";
                }
                
                if(preg_match('/^[0-9]+$/',$vf)){
                    
                    $sql.= "$kf = $vf";
                }else{
                    $sql.= "$kf LIKE '%$vf%'";
                }
                
            }
        }
        $sql.=";";
        try{
            $c = new Conn();
            $conn = $c->getConn();
    
            //Ejecutar consulta no preparada
    
           
            $prods = $conn->query($sql);//Devuelve un objeto del tipo PDOStatement

            $result=$prods->fetchAll(PDO::FETCH_ASSOC);

            $c->closeConn();
        }catch(PDOException $e){
            echo"<h1>ERROR</h1>";
        }    
        return $result;
    }
}
?>