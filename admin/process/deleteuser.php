<?php
    $user = $_GET['user'];
    include "../php/conexion.php";
    $query = "DELETE FROM usuarios where usuario = '$user'";
    if(consultarSQL($query)){
        echo "SE ELIMINO CON EXITO $user";
        echo "<br><br> <a href='../usuarios/lista.php'>REGRESAR</a>";
    }
    
?>