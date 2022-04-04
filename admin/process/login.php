<?php

    require_once "../../php/conexion.php";

    $user = $_POST['user'];
    $pass = md5($_POST['pass']);
    $query = "SELECT * FROM users WHERE user ='$user' AND pass='$pass'";
    $consulta = consultarSQL($query);
    $filas=$consulta->fetch_array(MYSQLI_ASSOC);
    if($consulta->num_rows >= 1){
      
      session_start();
      $_SESSION['user']= $filas['nombre'];
      $_SESSION['verificar']=true;
      $_SESSION['tipo'] = $filas['tipo'];
	  header("Location: ../menu.php");
    }else{  
        echo "LOS DATOS SON INCORRECTOS";
    }
?>