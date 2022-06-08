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

            // Sustitur valores
            $TBS->MergeField('entrevista.nombreCompleto', $nombreCompleto);
            $TBS->MergeField('entrevista.noControl', $nControl);

            // QUERY SEMESTRE
            $querySemActual = "SELECT Max(semestre_idSemestre) FROM semestreAlumno
            WHERE  alumno_nControl='$nControl'";
            $consultaSemActual = consultarSQL($querySemActual);
            $datosSemActual = $consultaSemActual->fetch_array(MYSQLI_NUM);

            $TBS->MergeField('entrevista.Semestre', $datosSemActual[0]);
            
            $TBS->PlugIn(OPENTBS_DELETE_COMMENTS);

            $save_as = (isset($_POST['save_as']) && (trim($_POST['save_as'])!=='') && ($_SERVER['SERVER_NAME']=='localhost')) ? trim($_POST['save_as']) : '';
            $output_file_name = str_replace('.', '_'.$codigoRegistro.$save_as.'.', $template);
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