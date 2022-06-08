<?php
    if(!isset($_SESSION)) 
    { 
      session_start(); 
      error_reporting(E_PARSE);
    } 

    if(!isset($_SESSION['verificar'])){
        header("location: ./");  
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php  include "./inc/link.php" ?>
    <title>Lista entrevistas</title>
</head>
<body>
    <?php  include "./inc/navbar.php" ?>
    
    <section class="section">
        <div class="container">
            <a href="./" class="btn is-info">REGRESAR</a>
            <br><br>
            <div class="alert alert-primary" style="text-align: center;">
                <p>LISTA DE ENTREVISTAS</p>
            </div>


            <table class="table is-hoverable">
                <thead>
                    <tr>
                        <th>Tutoria</th>
                        <th>Nombre Alumno</th>
                        <th>Tutor</th>
                        <th>Tipo Entrevista</th>
                        <th>Archivo</th>
                        <th>Ver</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include "./php/conexion.php";
                        $queryEntrevistas = "SELECT tutoria.idTutoria, alumno.nombre,alumno.apellidoPaterno,alumno.apellidoMaterno,
                        docente.nombre,docente.apellidoPaterno,docente.apellidoMaterno,entrevista.tipo, alumno.nControl 
                        FROM alumno, entrevista,tutoria, entrevistaTutoria, docente
                        WHERE alumno.nControl = tutoria.alumno_nControl
                        AND tutoria.idTutoria = entrevistaTutoria.tutoria_idTutoria
                        AND entrevistaTutoria.entrevista_idEntrevista = entrevista.idEntrevista
                        AND docente.curp = tutoria.docente_curp;";
                        $consultaEntrevistas = consultarSQL($queryEntrevistas);
                        
                        while($filas = $consultaEntrevistas->fetch_array(MYSQLI_NUM)):
                    ?>
                    <tr>
                        <td><?= $filas[0] ?> </td>
                        <td><?= $filas[1] ?> <?= $filas[2] ?> <?= $filas[3] ?></td>
                        <td><?= $filas[4] ?> <?= $filas[5] ?> <?= $filas[6] ?></td>
                        <td><?= $filas[7] ?></td>
                        <td> <a class="" href="./process/documentoEntrevista.php?nControl=<?= $filas[8] ?>&idTutoria=<?= $filas[0] ?>">
                        <img src="./assets/file-lines-solid.svg" width="20" alt="">
                            </a> </td>
                        <td> <a class="btn btn-primary" href="./entrevista/entrevista.php?nControl=<?= $filas[8] ?>&idTutoria=<?= $filas[0] ?>">VER</a> </td>
                    </tr>

                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </section>
    
    
    <?php  include "./inc/footer.php" ?>
    
</body>
</html>