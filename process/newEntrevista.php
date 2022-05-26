<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.9/dist/sweetalert2.all.min.js"></script>


<?php
    require("../php/manifest.php");
    require("../php/conexion.php");

    $url = obtenerURL();
    
    echo '<p style="color:#fff;"></p>';
    if(!isset($_POST['nControl'])){
        echo "
        <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'No se recibieron datos',
        }).then((result) => {
            if (result.isConfirmed) {
            location.href='$url/tutorados';
            } 
        })
        </script>";
    } else {
        $idTutoria = $_POST['idTutoria'];
        $nControl = $_POST['nControl'];
        $estrategias = $_POST['estrategias'];
        $problemasFamiliares = $_POST['problemasFamiliares'];
        $problemasSentimentales = $_POST['problemasSentimentales'];
        $problematicasDetectadas = $_POST['problematicasDetectadas'];
        $avance = $_POST['avance'];
        $actividades = $_POST['actividades'];
        $productos = $_POST['productos'];
        $totalEstrategias = count($estrategias);

        // '1','Carga académica','El tutorado debe informar de las materias y los docentes que se le asignaron en su carga académica. El tutor puede investigar si existen inconvenientes académicos en las materias del semestre, por ejemplo, dificultades de programación, problemas con '
        // '2','Estrategias de estudio','El tutorado expresa las estrategias de estudio a implementar para la aprobación del semestre. El tutor puede dar sugerencias en este tópico.'
        // '3','Problemas familiares y/o sentimentales','El tutor detecta problemas familiares que puedan afectar el desempeño académico del tutorado.'
        // '4','Otras problemáticas detectadas','El tutor detecta problemas diversos y externos a la institución que puedan afectar el desempeño académico del tutorado.\r\n'
        // '5','Avance del proyecto de tesis (%)','El tutorado indica el avance del proyecto de tesis al inicio del semestre y se establece un avance durante el periodo actual.'
        // '6','Actividades programadas para el semestre','El tutorado informa de las actividades que realizará durante el semestre, por ejemplo, clases, retribución social, participación en congresos, realizar estancias de investigación, redacción de artículos, etc.'
        // '7','Productos programados para el semestre','El tutorado informa los productos entregables para el semestre actual, por ejemplo, artículo redactado y enviado para publicación, constancia de participación en congreso, prototipo, desarrollo de software (manuales técnico y de usuario), etc.'
        // '8','Carga académica','El tutorado debe informar de las calificaciones obtenidas en las materias cursadas y el promedio final del semestre.'
        // '9','Estrategias de estudio','El tutorado expresa si las estrategias de estudio que implementó fueron de utilidad y/o necesita una mayor guía en este aspecto.'
        // '10','Problemas familiares y/o sentimentales','El tutor indaga si los problemas familiares detectados al inicio del semestre se resolvieron y no afectaron el desempeño académico del tutorado.\r\n'
        // '11','Otras problemáticas detectadas','El tutor indaga si los problemas diversos y externos a la institución se resolvieron y no afectaron el desempeño académico del tutorado.\r\n'
        // '12','Avance del proyecto de tesis (%)\r\n','El tutorado informa si se logró el avance del proyecto de tesis propuesto al inicio del semestre. Además, el tutor informa que se debe llenar el formato de desempeño del becario de CONACYT, enviarlo a la coordinación para el visto bueno y finalmente,'
        // '13','Actividades programadas para el semestre','Si las actividades no se cumplieron, el tutorado explica los motivos y las estrategias para terminarlas a la brevedad.'
        // '14','Productos programados para el semestre','Si los productos comprometidos no se entregaron, el tutorado explica los motivos y las estrategias para su entrega a la brevedad.\r\n'


        for ($i=0; $i < $totalEstrategias; $i++) { 
            $queryEstrategia = "SELECT * FROM estrategiasEstudio WHERE estrategia = '".$estrategias[$i]."'";
            $consultaEstrategia = consultarSQL($queryEstrategia);
            $resultado = $consultaEstrategia->fetch_array(MYSQLI_ASSOC);
            if($resultado -> num_rows >= 1){
               
            } else{  
                $query = "INSERT INTO estrategiasEstudio(estrategia) VALUES ('".$estrategias[$i]."')";
                if(consultarSQL($query)){}
                else {
                    echo "
                    <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error en el registro de estrategia',
                    }).then((result) => {
                        if (result.isConfirmed) {
                        location.href='$url/tutorados';
                        } 
                    })
                    </script>";
                }
            }
        }

        $bandera = true;
        for ($i=0; $i < $totalEstrategias; $i++) { 
            $consultaQuery = "SELECT * FROM estrategiasEstudio where estrategia = '$estrategias[$i]'";
            $consultaEstrategiaExistente = consultarSQL($consultaQuery);
            $resultado = $consultaEstrategiaExistente -> fetch_array(MYSQLI_ASSOC);

            $queryRelacion = "INSERT INTO tutoriaEstrategia(estrategiasEstudio_idEstrategia, tutoria_idTutoria)
            VALUES (".$resultado['idEstrategia'].", ".$idTutoria.")";

            if(!consultarSQL($queryRelacion)){
                $bandera = false;
            }

        }

        if($bandera == false){
            echo "
                <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error en el registro de estrategias',
                }).then((result) => {
                    if (result.isConfirmed) {
                    location.href='$url/tutorados';
                    } 
                })
                </script>";
        }


        // Insertar preguntas

        $queryPregunta3 = "INSERT INTO respuestaAlumno(alumno_nControl, pregunta_idPregunta, respuesta)
        VALUES ('".$nControl."', 3, '".$problemasFamiliares."')";

        $queryPregunta4 = "INSERT INTO "
        

        // $totalActividades = count($actividades);

        // for ($i=0; $i < $totalActividades; $i++) { 
            
        // }

        // $totalProductos = count($productos);
        // for ($i=0; $i < $totalProductos; $i++) { 
            
        // }
    }

    

    
?>