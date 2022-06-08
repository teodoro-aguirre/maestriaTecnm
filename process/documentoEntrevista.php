<?php
    session_start();
    if(!isset($_SESSION['verificar'])){
        header("location: ../");  
    }
    if(empty($_GET['nControl'])){
        
    } else {
        include_once('tbs_class.php');
        include_once('plugins/tbs_plugin_opentbs.php');
        include "../php/conexion.php";

        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $TBS = new clsTinyButStrong;
        $TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); 

        // Obtener numero control e idtutoria
        $nControl = $_GET['nControl'];
        $idTutoria = $_GET['idTutoria'];

        // Consultar datos tutorado
        $query = "SELECT nControl, nombre, apellidoPaterno, apellidoMaterno FROM alumno WHERE nControl='".$nControl."'";
        $consulta = consultarSQL($query);

        // 
        if($consulta){
            $datos = $consulta->fetch_array(MYSQLI_ASSOC);    
            // Asignar valores
           $nombreCompleto = $datos['nombre']." ".$datos['apellidoPaterno']." ".$datos['apellidoMaterno'];
           
            // Cargar plantilla
            $template = './EntrevistaInicio.docx';
            $TBS->LoadTemplate($template, OPENTBS_ALREADY_UTF8);

            // Datos alumno
            $TBS->MergeField('entrevista.nombreCompleto', $nombreCompleto);
            $TBS->MergeField('entrevista.noControl', $nControl);

            $queryPromedio = "SELECT Max(semestre_idSemestre)-1, promedio FROM semestreAlumno
            WHERE  alumno_nControl='$nControl'";
            $consultaPromedio = consultarSQL($queryPromedio);
            $datosPromedio = $consultaPromedio->fetch_array(MYSQLI_ASSOC);
            $TBS->MergeField('entrevista.promedio', $datosPromedio['promedio']);


            // QUERY SEMESTRE
            $querySemActual = "SELECT Max(semestre_idSemestre) FROM semestreAlumno
            WHERE  alumno_nControl='$nControl'";
            $consultaSemActual = consultarSQL($querySemActual);
            $datosSemActual = $consultaSemActual->fetch_array(MYSQLI_NUM);

            $TBS->MergeField('entrevista.Semestre', $datosSemActual[0]);

            // CARGA ACADEMICA
            $queryCargaAcademica = "SELECT materia.idMateira, materia.nombreMateria, materia.creditos 
            FROM materia, cargaAcademica, alumno 
            WHERE alumno.nControl=cargaAcademica.alumno_nControl 
            AND materia.idMateira=cargaAcademica.materia_idMateira 
            AND alumno.nControl='".$nControl."';";
            
            $consultaCargaAcademica = consultarSQL($queryCargaAcademica);
            $total = $consultaCargaAcademica->num_rows;
            if($total):
                $materias = '';
                while($filas = $consultaCargaAcademica->fetch_array(MYSQLI_ASSOC)):
                    $materias .= $filas['nombreMateria'].", ";
                endwhile;
                $materias = substr($materias, 0, -2);
                $materias .= '.';
                $TBS->MergeField('entrevista.materias', $materias);
            else:
                $TBS->MergeField('entrevista.materias', 'No tiene materias cargadas');
            endif;

            // ESTRATEGIAS
            $queryEstrategias = "SELECT estrategiasEstudio.estrategia,estrategiasEstudio.descripcion
            FROM estrategiasEstudio,tutoria,alumno,tutoriaEstrategia
            WHERE estrategiasEstudio.idEstrategia=tutoriaEstrategia.estrategiasEstudio_idEstrategia
            AND alumno.nControl=tutoria.alumno_nControl
            AND tutoria.idTutoria=tutoriaEstrategia.tutoria_idTutoria
            AND alumno.nControl='".$nControl."' AND tutoria.idTutoria=".$idTutoria.";";
            
            $consultaEstrategias = consultarSQL($queryEstrategias);
            $total = $consultaEstrategias->num_rows;
            if($total):
                $estrategias = '';
                while($filas = $consultaEstrategias->fetch_array(MYSQLI_ASSOC)):
                    $estrategias .= $filas['estrategia'].", ";
                endwhile;
                $estrategias = substr($estrategias, 0, -2);
                $estrategias .= '.';
                $TBS->MergeField('entrevista.estrategias', $estrategias);
            endif;

            // problemasFamiliares
            $queryProblemasFamiliares = "SELECT respuestaAlumno.respuesta FROM respuestaAlumno WHERE respuestaAlumno.alumno_nControl = '".$nControl."' and respuestaAlumno.preguntas_idPregunta = 3;";
            $resultado = consultarSQL($queryProblemasFamiliares);
            $datoProblemasFam = $resultado->fetch_array(MYSQLI_ASSOC);
            $TBS->MergeField('entrevista.problemasFamiliares', $datoProblemasFam['respuesta']);
            // problemasSentimentales
            $queryProblemasSent = "SELECT respuestaAlumno.respuesta FROM respuestaAlumno WHERE respuestaAlumno.alumno_nControl = '".$nControl."' and respuestaAlumno.preguntas_idPregunta = 8;";
            $resultado = consultarSQL($queryProblemasSent);
            $datoProblemasSent = $resultado->fetch_array(MYSQLI_ASSOC);
            $TBS->MergeField('entrevista.problemasSentimentales', $datoProblemasSent['respuesta']);
            // problematicasDetectadas
            $queryOtrasProm = "SELECT respuestaAlumno.respuesta FROM respuestaAlumno WHERE respuestaAlumno.alumno_nControl = '".$nControl."' and respuestaAlumno.preguntas_idPregunta = 4;";
            $resultado = consultarSQL($queryOtrasProm);
            $datoOtrasProbl = $resultado->fetch_array(MYSQLI_ASSOC);
            $TBS->MergeField('entrevista.problematicasDetectadas', $datoOtrasProbl['respuesta']);
            // avance
            $queryAvance = "SELECT resultadoAlumno.avance FROM resultadoAlumno WHERE resultadoAlumno.alumno_nControl = '".$nControl."'";
            $resultado = consultarSQL($queryAvance);
            $datoAvance = $resultado->fetch_array(MYSQLI_ASSOC);
            $TBS->MergeField('entrevista.avance', $datoAvance['avance']);
            // actividades
            $queryActividad = "SELECT actividad.nombre FROM resultadoAlumno, actividad WHERE resultadoAlumno.alumno_nControl = '".$nControl."' and actividad.idActividad = resultadoAlumno.actividad_idActividad and resultadoAlumno.tutoria_idTutoria = ".$idTutoria.";";
            $resultados = consultarSQL($queryActividad);
            $total = $resultados->num_rows;
            if($total):
                $actividades = '';
                while($resultActividad = $resultados->fetch_array(MYSQLI_ASSOC)):
                    $actividades .= $resultActividad['nombre'].", ";
                endwhile;
                $actividades = substr($actividades, 0, -2);
                $actividades .= '.';
                $TBS->MergeField('entrevista.actividades', $actividades);
            endif;      
            // productos
            $queryProd = "SELECT producto.nombre FROM resultadoAlumno, producto
            WHERE resultadoAlumno.alumno_nControl = '".$nControl."'
            AND resultadoAlumno.tutoria_idTutoria= ".$idTutoria."
            AND producto.idProducto = resultadoAlumno.producto_idProducto;";
            $resultadosProd = consultarSQL($queryProd);
            $total = $resultadosProd->num_rows;
            if($total):
                $productos = '';
                while($resultProd = $resultadosProd->fetch_array(MYSQLI_ASSOC)):
                    $productos .= $resultProd['nombre'].", ";
                endwhile;
                $productos = substr($productos, 0, -2);
                $productos .= '.';
                $TBS->MergeField('entrevista.productos', $productos);
            endif;
           
            
            // NOMBRE TUTOR
            $queryTutor = 'SELECT docente.nombre,docente.apellidoPaterno,docente.apellidoMaterno
            FROM  tutoria, docente
            WHERE docente.curp=docente_curp
            AND tutoria.idTutoria='.$idTutoria.';';
            $consultaTutor = consultarSQL($queryTutor);
            $datosTutor = $consultaTutor->fetch_array(MYSQLI_ASSOC);
            $nombreTutor = $datosTutor['nombre']." ".$datosTutor['apellidoPaterno']." ".$datosTutor['apellidoMaterno'];
            $TBS->MergeField('entrevista.nombreTutor', $nombreTutor);

            $TBS->PlugIn(OPENTBS_DELETE_COMMENTS);

            $save_as = (isset($_POST['save_as']) && (trim($_POST['save_as'])!=='') && ($_SERVER['SERVER_NAME']=='localhost')) ? trim($_POST['save_as']) : '';
            $output_file_name = $nombreCompleto."-".$template;
            if ($save_as==='') {
                $TBS->Show(OPENTBS_DOWNLOAD, $output_file_name); 
                exit();
            } else {
                $TBS->Show(OPENTBS_FILE, $output_file_name);
                exit("File [$output_file_name] has been created.");
            }
        } else {
            echo '
            <script type="text/javascript">
                alert("Ocurrio un problema inesperado, intentelo en unos minutos.");
                window.close();
            </script>';
        }

       
    }
    
?>