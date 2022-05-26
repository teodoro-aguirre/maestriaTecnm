<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.9/dist/sweetalert2.all.min.js"></script>

<?php 
    
    require("../../php/manifest.php");
    include "../php/conexion.php";
    $url = obtenerURL();
    
    echo '<p style="color:#fff;"></p>';
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
        $semestre = $_POST['semestre'];

        $query = "INSERT INTO alumno (nControl, nombre, apellidoPaterno, apellidoMaterno, curp, correo) 
        VALUES ('$nControl', '$nombre', '$apellidoP', '$apellidoM', '$curp', '$correo');";
        
        // Agregar validacion de numero control

        if(consultarSQL($query)){
            
            $queryRelacion = "INSERT INTO tutoria (idTutoria, docente_curp, alumno_nControl,semestre_idSemestre)
            VALUES (null, '$curpDocente', '$nControl', '$semestre');";
            
            if(consultarSQL($queryRelacion)){
                echo "
                <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Alumno Registrado',
                    text: 'Exito en el registro!',
                }).then((result) => {
                    if (result.isConfirmed) {
                    location.href='$url/admin/estudiantes';
                    } 
                })
                </script>";
            } else {
                echo "
                <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error en la relacion de tutoria',
                }).then((result) => {
                    if (result.isConfirmed) {
                    location.href='$url/admin/estudiantes';
                    } 
                })
                </script>";
            }
            
        } else {
            echo "
                <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error en el registro de alumnos',
                }).then((result) => {
                    if (result.isConfirmed) {
                    location.href='$url/admin/estudiantes';
                    } 
                })
                </script>";
        }



    }
?>
