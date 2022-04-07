<?php 

    include "../php/conexion.php";

    if(!isset($_POST['nControl'])){
        echo'
        <script type="text/javascript">
            alert("No se recibio un alumno");
            history.back();
        </script>';
    } else {
        $nControl = $_POST['nControl'];
        $nombre = $_POST['nombreAlumno'];
        $apellidoP = $_POST['apellidoPaterno'];
        $apellidoM = $_POST['apellidoMaterno'];
        $curp = $_POST['curp'];
        $correo = $_POST['correo'];
        $curpDocente = $_POST['curpDocente'];

        echo $nControl."\n";
        echo $nombre."\n";
        echo $apellidoP."\n";
        echo $apellidoM."\n";
        echo $curp."\n";
        echo $correo."\n";
        echo $curpDocente."\n";
    }
?>
