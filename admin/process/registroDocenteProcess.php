<?php

    include "../php/conexion.php";

    $nPersonal = $_POST['nPersonal'];
    $nombre = $_POST['nombreDocente'];
    $apellidoP = $_POST['apellidoPaterno'];
    $apellidoM = $_POST['apellidoMaterno'];
    $curp = $_POST['curp'];
    $nivelAcademico = $_POST['nivelAcademico'];
    $correo = $_POST['correo'];

    $query1 = "SELECT nPersonal FROM docente WHERE curp = '$curp'";

    $query2 = "INSERT INTO `docente`(`nPersonal`, `nombreDocente`, `apellidoPaterno`, `apellidoMaterno`, `curp`, `nivelAcademico`, `correo`) 
    VALUES ('$nPersonal','$nombre','$apellidoP','$apellidoM','$curp','$nivelAcademico','$correo')";

    $consulta = consultarSQL($query1);
    if($consulta -> num_rows >= 1){
        echo'
        <script type="text/javascript">
            alert("Ya existe un registro con esta CURP.");
            history.back();
        </script>';
    } else{
        consultarSQL($query2);
        echo'
        <script type="text/javascript">
            header("Location: ../docente");
            alert("Docente registrado exitosamente!");
        </script>';
    }

?>