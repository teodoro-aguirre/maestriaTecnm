<?php
    require_once "../php/conexion.php";
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $query = "SELECT nombre, curp, apellidoPaterno, apellidoMaterno FROM docente WHERE nPersonal ='$user' AND curp = '$pass'";
    $consulta = consultarSQL($query);
    $filas=$consulta->fetch_array(MYSQLI_ASSOC);
    if($consulta->num_rows >= 1){
      session_start();
      $_SESSION['curp']= $filas['curp'];
      $_SESSION['verificar']=true;
      header("Location: ../home");
    }else{  
        echo'
        <script type="text/javascript">
            alert("Usuario y/o contraseña incorrectos.");
            history.back();
        </script>';
    }
?>