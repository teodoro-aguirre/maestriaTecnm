<?php

    function consultarSQL($query){
        
        $mysqli= new mysqli("162.241.61.203", "tecmisan_admin", "8vJtA6POp(FI", "tecmisan_posgrado");
        if(mysqli_connect_errno()){
            echo "Este sitio esta presentando problemas";
        }
        $mysqli->set_charset("utf8");
        $mysqli->autocommit(FALSE);
        $mysqli->begin_transaction(MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT);
        if($consulta=$mysqli->query($query)){
            if($mysqli->commit()){
                
            }else{
                echo "error";
            }
        }else{
            $mysqli->rollback();
        }
        return $consulta;
    }
?>