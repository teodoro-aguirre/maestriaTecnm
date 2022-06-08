<?php
    if(!isset($_SESSION)) 
    { 
      session_start(); 
      error_reporting(E_PARSE);
    } 

    if(!$_SESSION['verificar']){
      header("Location: ../");
    }
?>

<!DOCTYPE html>
<html lang="es">

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
            <p class="fs-3">Inicio de semestre</p>
        </div>
        <?php
            include_once "../php/conexion.php";
            $nControl = $_GET['nControl'];
            $idTutoria = $_GET['idTutoria'];
            // Query consulta información del tutorado
            $query = "SELECT nControl, nombre, apellidoPaterno, apellidoMaterno FROM alumno WHERE nControl='".$nControl."'";
            $consulta = consultarSQL($query);
            $datos = $consulta->fetch_array(MYSQLI_ASSOC);
            $queryTutoria = "SELECT tutoria.idTutoria, MAX(semestre_idSemestre) FROM tutoria, docente, alumno
            WHERE tutoria.docente_curp = '".$_SESSION['curp']."'
            AND tutoria.docente_curp = docente.curp 
            AND tutoria.alumno_nControl = '".$nControl."'
            GROUP BY tutoria.alumno_nControl;";

            $consultaTutoria = consultarSQL($queryTutoria);
            $datoTutoria = $consultaTutoria->fetch_array(MYSQLI_ASSOC);
        ?>
        <p class="fs-5"> <strong>Alumno: </strong>
            <?= $datos['nombre'] ?>
            <?= $datos['apellidoPaterno'] ?>
            <?= $datos['apellidoMaterno'] ?>
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
        <?php
            $queryPromedio = "SELECT Max(semestre_idSemestre)-1, promedio FROM semestreAlumno
            WHERE  alumno_nControl='$nControl'";
            $consultaPromedio = consultarSQL($queryPromedio);
            $datosPromedio = $consultaPromedio->fetch_array(MYSQLI_ASSOC);
        ?>
        <p class="fs-5"><strong>Promedio Semestre Anterior: </strong>
            <?= $datosPromedio['promedio'] ?>
        </p>
        <?php
            $querySemActual = "SELECT Max(semestre_idSemestre) FROM semestreAlumno
            WHERE  alumno_nControl='$nControl'";
            $consultaSemActual = consultarSQL($querySemActual);
            $datosSemActual = $consultaSemActual->fetch_array(MYSQLI_NUM);
        ?>
        <p class="fs-5"><strong>Semestre Actual: </strong>
            <?= $datosSemActual[0] ?>
        </p>
        <hr>
        <form action="../process/newEntrevista.php" method="post">
            <input type="hidden" name="idTutoria" value="<?= $datoTutoria['idTutoria'] ?>">
            <input type="hidden" name="nControl" value="<?= $nControl ?>">
            <input type="hidden" name="tipoTutoria" value="1">
            <!-- SITUACIÓN ACADÉMICA -->
            <div class="alert alert-primary" style="text-align: center;" role="alert">
                <strong>SITUACIÓN ACADÉMICA</strong>
            </div>
            <h5>Carga Academica</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Clave</th>
                        <th scope="col">Materia</th>
                        <th scope="col">Creditos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $queryCargaAcademica = "SELECT materia.idMateira, materia.nombreMateria, materia.creditos 
                    FROM materia, cargaAcademica, alumno 
                    WHERE alumno.nControl=cargaAcademica.alumno_nControl 
                    AND materia.idMateira=cargaAcademica.materia_idMateira 
                    AND alumno.nControl='".$nControl."';";
                    
                    $consultaCargaAcademica = consultarSQL($queryCargaAcademica);
                    $total = $consultaCargaAcademica->num_rows;
                    if($total):
                        while($filas = $consultaCargaAcademica->fetch_array(MYSQLI_ASSOC)):
                ?>
                    <tr>
                        <th scope="row">
                            <?= $filas['idMateira'] ?>
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
            <h5>Estrategias de estudio</h5>
            <br>
            <div class="row g-3 ml-5">
                <ol>
                    <?php 
                    $queryEstrategias = "SELECT estrategiasEstudio.estrategia,estrategiasEstudio.descripcion
                    FROM estrategiasEstudio,tutoria,alumno,tutoriaEstrategia
                    WHERE estrategiasEstudio.idEstrategia=tutoriaEstrategia.estrategiasEstudio_idEstrategia
                    AND alumno.nControl=tutoria.alumno_nControl
                    AND tutoria.idTutoria=tutoriaEstrategia.tutoria_idTutoria
                    AND alumno.nControl='".$nControl."' AND tutoria.idTutoria=".$idTutoria.";";
                    
                    $consultaEstrategias = consultarSQL($queryEstrategias);
                    $total = $consultaEstrategias->num_rows;
                    if($total):
                        while($filas = $consultaEstrategias->fetch_array(MYSQLI_ASSOC)):
                ?>
                    <li>
                        <?= $filas['estrategia'] ?>
                    </li>
                    <?php 
                        endwhile;
                    endif;    
                        ?>
                </ol>
            </div>
            <br>
            <!-- SITUACIÓN PERSONAL -->
            <?php
                // Consulta de preguntas
                $queryPreguntas = "SELECT respuestaAlumno.respuesta 
                FROM respuestaAlumno, entrevista,entrevistaTutoria,alumno, tutoria,preguntas,preguntasEntrevista
                WHERE alumno.nControl=tutoria.alumno_nControl
                AND entrevista.idEntrevista=entrevistaTutoria.entrevista_idEntrevista
                AND preguntas.idPregunta=preguntasEntrevista.preguntas_idPregunta
                AND alumno.nControl=respuestaAlumno.alumno_nControl
                AND preguntasEntrevista.preguntas_idPregunta=preguntas.idPregunta
                AND preguntas.idPregunta=respuestaAlumno.preguntas_idPregunta
                AND alumno.nControl='".$nControl."';";
            ?>
            <div class="alert alert-primary" style="text-align: center;" role="alert">
                <strong>SITUACIÓN PERSONAL</strong>
            </div>
            <h5>Problemas familiares</h5>
            <div class="mb-3">
                <!-- <label for="problemaFamiliarControl" class="form-label">Problemas familiares</label> -->
                <?php
                    $queryProblemasFamiliares = "SELECT respuestaAlumno.respuesta FROM respuestaAlumno WHERE respuestaAlumno.alumno_nControl = '".$nControl."' and respuestaAlumno.preguntas_idPregunta = 3;";
                    $resultado = consultarSQL($queryProblemasFamiliares);
                    $datoProblemasFam = $resultado->fetch_array(MYSQLI_ASSOC);
                ?>
                <textarea placeholder="" class="form-control" name="problemasFamiliares" id="problemaFamiliarControl"
                    rows="3" required><?= $datoProblemasFam['respuesta'] ?></textarea>
            </div>
            <h5>Problemas Sentimentales</h5>
            <div class="mb-3">
                <!-- <label for="problemasSentControl" class="form-label">Problemas sentimentales</label> -->
                <?php
                    $queryProblemasSent = "SELECT respuestaAlumno.respuesta FROM respuestaAlumno WHERE respuestaAlumno.alumno_nControl = '".$nControl."' and respuestaAlumno.preguntas_idPregunta = 8;";
                    $resultado = consultarSQL($queryProblemasSent);
                    $datoProblemasSent = $resultado->fetch_array(MYSQLI_ASSOC);
                ?>
                <textarea class="form-control" name="problemasSentimentales" id="problemasSentControl" placeholder=""
                    rows="3" required><?= $datoProblemasSent['respuesta'] ?></textarea>
            </div>
            <h5>Otras problematicas detectadas</h5>
            <div class="mb-3">
                <!-- <label for="problematicasDetectControl" class="form-label">Otras problemáticas detectadas</label> -->
                <?php
                    $queryOtrasProm = "SELECT respuestaAlumno.respuesta FROM respuestaAlumno WHERE respuestaAlumno.alumno_nControl = '".$nControl."' and respuestaAlumno.preguntas_idPregunta = 4;";
                    $resultado = consultarSQL($queryOtrasProm);
                    $datoOtrasProbl = $resultado->fetch_array(MYSQLI_ASSOC);
                ?>
                <textarea class="form-control" name="problematicasDetectadas" id="problematicasDetectControl"
                    placeholder="" rows="3" required><?= $datoOtrasProbl['respuesta'] ?></textarea>
            </div>
            <div class="alert alert-primary" style="text-align: center;" role="alert">
                <strong>PROYECTO DE TESIS</strong>
            </div>
            <h5>Avance del Proyecto de tesis</h5>
            <div class="mb-3">
                <label for="avanceControl" class="form-label">Porcentaje(%) 0-100</label>
                <?php
                    $queryAvance = "SELECT resultadoAlumno.avance FROM resultadoAlumno WHERE resultadoAlumno.alumno_nControl = '".$nControl."'";
                    $resultado = consultarSQL($queryAvance);
                    $datoAvance = $resultado->fetch_array(MYSQLI_ASSOC);
                ?>
                <input type="number" name="avance" min="0" max="100" class="form-control" id="avanceControl"
                    aria-describedby="tesisHelp" value="<?= $datoAvance['avance']?>" required>
            </div>
            <h5>Actividades programadas para el semestre</h5>
            <div class="row g-3 ml-5">
                <ol>
                    <?php
                        $queryActividad = "SELECT actividad.nombre FROM resultadoAlumno, actividad WHERE resultadoAlumno.alumno_nControl = '".$nControl."' and actividad.idActividad = resultadoAlumno.actividad_idActividad and resultadoAlumno.tutoria_idTutoria = ".$idTutoria.";";
                        $resultados = consultarSQL($queryActividad);
                        while($resultActividad = $resultados->fetch_array(MYSQLI_ASSOC)):
                    ?>
                    <li>
                        <?= $resultActividad['nombre'] ?>
                    </li>
                    <?php endwhile; ?>
                </ol>
            </div>
    <h5>Productos programados para el semestre</h5>
    <div class="row g-3 ml-5">
        <ol>
            <?php
                                $queryProd = "SELECT producto.nombre FROM resultadoAlumno, producto
                                WHERE resultadoAlumno.alumno_nControl = '".$nControl."'
                                AND resultadoAlumno.tutoria_idTutoria= ".$idTutoria."
                                AND producto.idProducto = resultadoAlumno.producto_idProducto;";
                                $resultadosProd = consultarSQL($queryProd);
                                while($resultProd = $resultadosProd->fetch_array(MYSQLI_ASSOC)):
                            ?>
            <li>
                <?= $resultProd['nombre'] ?>
            </li>
            <?php endwhile; ?>
        </ol>
    </div>
    <br>

    </div>
    </form>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <!-- incrementos en inputs dinamicos -->
    <script>
        $(function () {
            var i = 1;
            $('#btnMoreEstrategias').click(function () {
                i++;
                var div = '<div class="row g-3">';
                var divInput = '<div class="col-1" style="text-align: right;"><label for="estrategias" class="text-left">E' + i + '</label></div>';
                var inputCode = '<div class="col-8"><input type="text" name="estrategias[]" class="form-control" required></div>';
                //Importante esta variable debe ir debajo del autoincrementable
                var btnDeleteEst = '<div class="col-3"><button type="button" name="removeEstrategia" id="' + i + '" class="btn btn-danger btn_removeEstrategia">X</button></div>';

                $('#incrementaEstrategia').append('<div class="row-fluid-estrategia' + i + '">' + div + divInput + inputCode + '<div class="col-md-1">' + btnDeleteEst + ' </div> </div><br>');
            });


            $(document).on('click', '.btn_removeEstrategia', function () {
                var button_id = $(this).attr("id");
                $('.row-fluid-estrategia' + button_id + '').remove();
                i--;
            });

            // incrementos en inputs dinamicos actividad
            var j = 1;
            $('#btnMoreActividad').click(function () {
                j++;
                var div = '<div class="row g-3">';
                var divSelect = '<div class="col-1" style="text-align: right;"><label for="actividadesControl" class="form-label">A' + j + '</label></div>';
                var selectAct = '<div class="col-8"><select class="form-select" name="actividades[]" required id="actividadesControl" aria-label="Selecciona una actividad" required>'
                    + '<option selected value="">Selecciona una Actividad</option>'
                    + '<option value="1">Participación en congreso (nacional y/o internacional)</option>'
                    + '<option value="2">Estancia de investigación</option>'
                    + '<option value="3">Redacción de artículo</option>'
                    + '<option value="4">Publicación de artículo en revista nacional y/o internacional</option>'
                    + '<option value="5">Realización de una o varias etapas del proyecto del proyecto de tesis</option>'
                    + '<option value="6">Otro</option>'
                    + '</select></div>';
                var btnDeleteAct = '<div class="col-3"><button type="button" name="removeActividad" id="' + j + '" class="btn btn-danger btn_removeActividad">X</button></div>';

                $('#incrementaActividad').append('<div class="row-fluid-actividad' + j + '">' + div + divSelect + selectAct + '<div class="col-md-1">' +
                    btnDeleteAct + '</div></div><br>');
            });

            $(document).on('click', '.btn_removeActividad', function () {
                var button_id = $(this).attr("id");
                $('.row-fluid-actividad' + button_id + '').remove();
            });

            // incrementos en inputs dinamicos productos
            var k = 1;
            $('#btnMoreProducto').click(function () {
                k++;
                var div = '<div class="row g-3">';
                var divSelectProd = '<div class="col-1" style="text-align: right;"><label for="productosControl" class="form-label">P' + k + '</label></div>';
                var selectActProd = '<div class="col-8"><select class="form-select" id="productosControl" required name = "productos[]" aria-label="Selecciona un producto" required>'
                    + '<option selected value="">Selecciona un Producto</option><option value="1">Cartel</option>'
                    + '<option value="2">Artículo</option>'
                    + '<option value="3">Prototipo</option>'
                    + '<option value="4">Modelo de utilidad</option>'
                    + '<option value="5">Software</option>'
                    + '<option value="6">Otro</option>'
                    + '</select></div>';
                var btnDeleteProd = '<div class="col-3"><button type="button" name="removeProducto" id="' + k + '" class="btn btn-danger btn_removeProd">X</button></div>';

                $('#incrementaProducto').append('<div class="row-fluid-producto' + k + '">' + div + divSelectProd + selectActProd + '<div class="col-md-1">' +
                    btnDeleteProd + '</div></div><br>');
            });

            $(document).on('click', '.btn_removeProd', function () {
                var button_id = $(this).attr("id");
                $('.row-fluid-producto' + button_id + '').remove();
            });

        });
    </script>
    <br><br>
    <?php
        include("../inc/footer.php")
    ?>
</body>

</html>