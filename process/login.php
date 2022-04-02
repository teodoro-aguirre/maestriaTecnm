<?php
    require_once "../php/conexion.php";
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $query = "SELECT nombreDocente FROM docente WHERE nPersonal ='$user' AND curp = '$pass'";
    $consulta = consultarSQL($query);
    $filas=$consulta->fetch_array(MYSQLI_ASSOC);
    if($consulta->num_rows >= 1){
      session_start();
      $_SESSION['user']= $filas['nombreDocente'];
      $_SESSION['verificar']=true;
      header("Location: ../home.php");
    }else{  
        echo'
        <script type="text/javascript">
            alert("Usuario y/o contraseña incorrectos.");
            history.back();
        </script>';
    }
?>