<?php

    include "../php/conexion.php";
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $tipo = $_POST['tipo'];
    $usuario = $_POST['usuario'];
    $password = md5($_POST['password']);

    $query1 = "SELECT usuario FROM usuarios WHERE usuario = '$usuario'";

    $query2 = "INSERT INTO usuarios (nombre, apellidos, usuario, contrasena, tipo) 
        VALUES ('$nombre', '$apellido', '$usuario', '$password', '$tipo')";

    $consulta = consultarSQL($query1);
    if($consulta -> num_rows >= 1){
        echo "YA EXISTE UN USUARIO REGISTRADO";
    } else{
        consultarSQL($query2);
        echo "REGISTRO EXITOSO
            <a href='../usuarios/lista.php'>REGRESAR</a>
        ";
    }

?>