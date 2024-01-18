<?php


    class provdao{
        public function __construct()
    {
        
    }
    //Funcion que trae todos los usuarios
    function getAll(){
        try{
            $c = new Conn();
            $conn = $c->getConn();
    
            //Ejecutar consulta no preparada
    
            $sql = "SELECT * FROM proveedores";
            $prods = $conn->query($sql);//Devuelve un objeto del tipo PDOStatement

            $result=$prods->fetchAll(PDO::FETCH_ASSOC);

            $c->closeConn();
        }catch(PDOException $e){
            echo"<h1>ERROR</h1>";
        }    
        return $result;
    }
    function getCif(){
        try{
            $c = new Conn();
            $conn = $c->getConn();
    
            //Ejecutar consulta no preparada
    
            $sql = "SELECT cif FROM proveedores";
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