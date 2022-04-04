<?php

    include "../php/conexion.php";

    $folio = $_POST['folio'];
    $apellidoPaterno = $_POST['apellidoPaterno'];
    $apellidoMaterno = $_POST['apellidoMaterno'];
    $nombre = $_POST['nombre'];
    $CURP = $_POST['CURP'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $genero = $_POST['genero'];
    $telefono = $_POST['telefono'];
    $celular = $_POST['celular'];
    $correo = $_POST['correo'];
    $calle = $_POST['calle'];
    $numeroCasa = $_POST['numeroCasa'];
    $colonia = $_POST['colonia'];
    $municipio = $_POST['municipio'];
    $codigoPostal = $_POST['codigoPostal'];
    $opcion1 = $_POST['opcion1'];
    $opcion2 = $_POST['opcion2'];
    $opcion3 = $_POST['opcion3'];
    $motivoIngreso = $_POST['motivoIngreso'];
    $nombreTutor = $_POST['nombreTutor'];
    $celularTutor = $_POST['celularTutor'];
    $telefonoTutor = $_POST['telefonoTutor'];
    $direccionTutor = $_POST['direccionTutor'];
    $nombreEscuela = $_POST['nombreEscuela'];
    $tipoSostenimiento = $_POST['tipoSostenimiento'];
    $plantelProcedencia = $_POST['plantelProcedencia'];
    $telefonoEscuela = $_POST['telefonoEscuela'];
    $nombreDirector = $_POST['nombreDirector'];
    $municipioEscuela = $_POST['municipioEscuela'];

    session_start();
    $usuario = $_SESSION['user'];
    $query = "UPDATE aspirante SET apellidoPaterno = '$apellidoPaterno', apellidoMaterno = '$apellidoMaterno', nombre = '$nombre', genero = '$genero', telefono = '$telefono',
    celular = '$celular', correo = '$correo', CURP= '$CURP', fechaNacimiento = '$fechaNacimiento', calle = '$calle', numeroCasa = '$numeroCasa', colonia = '$colonia',
    municipio = '$municipio', codigoPostal = '$codigoPostal', especialidad1 = '$opcion1', especialidad2 = '$opcion2', especialidad3 = '$opcion3' ,motivoIngreso = '$motivoIngreso', 
    nombreTutor = '$nombreTutor', celularTutor = '$celularTutor', telefonoTutor = '$telefonoTutor', direccionTutor = '$direccionTutor', nombreEscuela = '$nombreEscuela', tipoSostenimiento = '$tipoSostenimiento', 
    plantelProcedencia = '$plantelProcedencia', telefonoEscuela = '$telefonoEscuela', nombreDirector = '$nombreDirector', municipioEscuela = '$municipioEscuela', fechaModificacion = now(),
    modificacionUsuario = '$usuario' WHERE folio = $folio";

    if(consultarSQL($query)){
        include '../inc/link.php';
        include '../inc/navbar.php';

        echo '
            <section class="section">
                <div class="container">
                    <div class="notification is-danger is-light">
                        <p> SE MODIFICÓ CON EXITO EL ASPIRANTE: <strong> '.$nombre.' </strong> </p>

                        <a class="button is-info" href="../aspirante.php?CURP='.$CURP.'">REGRESAR</a>
                    </div>
                </div>
            </section>
        ';

        include '../inc/footer.php';

    }
    echo $query;

?>