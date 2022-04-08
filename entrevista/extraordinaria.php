<?php
    session_start();
    if(!isset($_SESSION['verificar'])){
        header("location: ./index.php");  
    }

    if(!isset($_GET['numeroControl']) || !isset($_GET['numeroControl'])){
        echo'
        <script type="text/javascript">
            alert("No se seleccionado un alumno o tipo de entrevista");
            history.back();
        </script>';
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Maestria ITSM - Entrevista</title>
    <?php
        include("../inc/link.php")
    ?>
</head>

<body>
    <?php
        include("../inc/navbar.php")
    ?>
    <div class="container">
        <div class="container mt-2" style="text-align: center;">
            <h1 class="title" style="text-align: center;">Entrevista tutor - tutorado</h1>
            <p class="fs-3">Extraordinaria</p>
        </div>
        <?php
            include_once "../php/conexion.php";
            $nControl = $_GET['numeroControl'];
            // Query consulta información del tutorado
            $query = "SELECT nControl, nombre, apellidoPaterno, apellidoMaterno FROM alumno WHERE nControl='".$nControl."'";
            $consulta = consultarSQL($query);
            $datos = $consulta->fetch_array(MYSQLI_ASSOC);
        ?>
        <p class="fs-5"> <strong>Alumno: </strong>
            <?= $datos['nombre'] ?>
            <?= $datos['apellidoPaterno'] ?>
            <?= $datos['apellidoMaterno'] ?>
        </p>
        <p class="fs-5"><strong>Promedio Semestre Anterior: </strong>
            <?= $datos['nControl'] ?>
        </p>
        <p class="fs-5"><strong>Semestre Actual: </strong>
            <?= $datos['nControl'] ?>
        </p>
        <p class="fs-5"><strong>Número de Control: </strong>
            <?= $datos['nControl'] ?>
        </p>
        <?php
            $queryPP = "SELECT programaPosgrado.nombrePP, programaPosgrado.abreviatura FROM programaPosgrado, alumno,alumnoPosgrado
            WHERE alumno.nControl=alumnoPosgrado.alumno_nControl AND programaPosgrado.idpp=programaPosgrado_idpp
            AND alumno.nControl='".$nControl."'";
            $consultaPP = consultarSQL($queryPP);
            $datosPP = $consultaPP->fetch_array(MYSQLI_ASSOC);
        ?>
        <p class="fs-5"><strong>Programa Académico: </strong>
            <?= $datosPP['nombrePP'] ?>
        </p>
        <hr>
        <form action="">
            <!-- SITUACIÓN ACADÉMICA -->
            <div class="alert alert-primary" style="text-align: center;" role="alert">
                <strong>SITUACIÓN ACADÉMICA</strong>
            </div>
            <?php
                    // Query para obtener la carga academica del alumno
                    
                    $datosCarga = $consulta->fetch_array(MYSQLI_ASSOC);
                ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Clave Materia</th>
                        <th scope="col">Nombre Materia</th>
                        <th scope="col">Creditos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $queryCargaAcademica = "SELECT materia.idMateria, materia.nombreMateria, materia.creditos FROM materia, cargaAcademica, alumno
                    WHERE alumno.nControl=cargaAcademica.alumno_nControl AND materia.idMateria=cargaAcademica.materia_idMateria
                    AND alumno.nControl='".$datos['nControl']."'";
                    $consultaCargaAcademica = consultarSQL($queryCargaAcademica);
                    $total = $consultaCargaAcademica->num_rows;
                    if($total):
                        while($filas = $consultaCargaAcademica->fetch_array(MYSQLI_ASSOC)):
                ?>
                    <tr>
                        <th scope="row">
                            <?= $filas['idMateria'] ?>
                        </th>
                        <td>
                            <?= $filas['nombreMateria'] ?>
                        </td>
                        <td>
                            <?= $filas['creditos'] ?>
                        </td>
                    </tr>
                    <?php
                        endwhile;
                    else:
                ?>
                    <tr>
                        <td></td>
                        <td>No tiene materias cargadas.</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php
                    endif;
                ?>
                </tbody>
            </table>
            <br>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Estrategias de estudio</label>
                <textarea class="form-control" id="exampleFormControlTextarea1"
                    placeholder="El tutorado expresa las estrategias de estudio a implementar para la aprobación del semestre. El tutor puede dar sugerencias en este tópico."
                    rows="3"></textarea>
            </div>

            <!-- SITUACIÓN PERSONAL -->
            <div class="alert alert-primary" style="text-align: center;" role="alert">
                <strong>SITUACIÓN PERSONAL</strong>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Problemas familiares</label>
                <textarea placeholder="" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Problemas sentimentales</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Otras problemáticas detectadas</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="" rows="3"></textarea>
            </div>
            <!-- SITUACIÓN PERSONAL -->
            <div class="alert alert-primary" style="text-align: center;" role="alert">
                <strong>PROYECTO DE TESIS</strong>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Avance del proyecto de tesis(%)</label>
                <input type="number" class="form-control" id="exampleFormControlTextarea1" aria-describedby="tesisHelp">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Actividades programadas para el
                    semestre</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Productos programados para el
                    semestre</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="" rows="3"></textarea>
            </div>
        </form>
        <div class="text-center">
            <a href="" class="btn btn-lg btn-danger">Registrar Entrevista</a>

        </div>
    </div>

    </div>

    <?php
        include("../inc/footer.php")
    ?>
</body>

</html>