<?php


    class udao{
        public function __construct()
    {
        
    }
    function getAll(){
        try{
            $c = new Conn();
            $conn = $c->getConn();
    
            //Ejecutar consulta no preparada
    
            $sql = "SELECT * FROM usuarios";
            $prods = $conn->query($sql);//Devuelve un objeto del tipo PDOStatement

            $result=$prods->fetchAll(PDO::FETCH_ASSOC);

            $c->closeConn();
        }catch(PDOException $e){
            echo"<h1>ERROR</h1>";
        }    
        return $result;
    }

    function get($usr,$pass){
        try{
            $c = new Conn();
            $conn = $c->getConn();

    
            //Ejecutar consulta preparada
    
            $sql = "SELECT usr,rol FROM usuarios WHERE usr=:usr AND pass=:pass";
            $pstmt = $conn->prepare($sql);//Devuelve un objeto del tipo PDOStatement
            $pstmt->bindValue(':usr',$usr);
            $pstmt->bindValue(':pass',$pass);
            $pstmt->execute();
            $result=$pstmt->fetchAll(PDO::FETCH_ASSOC);

            $c->closeConn();
        }catch(PDOException $e){
            echo"<h1>ERROR</h1>";
        }    
        return $result;
        }
    }
?>