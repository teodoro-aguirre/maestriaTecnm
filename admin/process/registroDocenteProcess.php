<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.9/dist/sweetalert2.all.min.js"></script>

<?php

    require("../../php/manifest.php");
    include "../php/conexion.php";
    $url = obtenerURL();

    $nPersonal = $_POST['nPersonal'];
    $nombre = $_POST['nombreDocente'];
    $apellidoP = $_POST['apellidoPaterno'];
    $apellidoM = $_POST['apellidoMaterno'];
    $curp = $_POST['curp'];
    $nivelAcademico = $_POST['nivelAcademico'];
    $correo = $_POST['correo'];

    $query1 = "SELECT nPersonal FROM docente WHERE curp = '$curp'";

    $query2 = "INSERT INTO `docente`(`nPersonal`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `curp`, `nivelAcademico`, `correo`) 
    VALUES ('$nPersonal','$nombre','$apellidoP','$apellidoM','$curp','$nivelAcademico','$correo')";
    
    echo '<p style="color:#fff;"></p>';

    $consulta = consultarSQL($query1);
    if($consulta -> num_rows >= 1){
        echo "
            <script>
            Swal.fire({
                icon: 'error',
                title: 'Error en el registro',
                text: 'Docente: $nombre, ya existe.',
            }).then((result) => {
                if (result.isConfirmed) {
                location.href='$url/admin/docente/';
                } 
            })
            </script>"; 
    } else{
        if(consultarSQL($query2)){
            echo "
            <script>
            Swal.fire({
                icon: 'success',
                title: 'Docente Registrado',
                text: 'Docente: $nombre, registrado correctamente.',
            }).then((result) => {
                if (result.isConfirmed) {
                location.href='$url/admin/docente/';
                } 
            })
            </script>"; 
        } else {
            echo "
            <script>
            Swal.fire({
                icon: 'error',
                title: 'Error en el registro',
                text: 'Hubo un error inesperado.',
            }).then((result) => {
                if (result.isConfirmed) {
                location.href='$url/admin/docente/';
                } 
            })
            </script>"; 
        }
        
    }

?>