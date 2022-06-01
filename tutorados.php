<?php
    session_start();
    if(!isset($_SESSION['verificar'])){
        header("location: ./");  
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <title>Maestria ITSM - Home</title>
    <?php
        include("./inc/link.php")
    ?>
</head>

<body>
    <?php
        include("./inc/navbar.php")
    ?>
    <div class="container">
        <h1 class="title mt-2" style="text-align: center;">Lista de alumnos tutorados</h1>
        <hr>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No. Control</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido Paterno</th>
                    <th scope="col">Apellido Materno</th>
                    <th scope="col">Entrevista</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    require_once "./php/conexion.php";
                    $query = "SELECT alumno.nControl, alumno.nombre, alumno.apellidoPaterno, alumno.apellidoMaterno FROM alumno, tutoria, docente WHERE tutoria.docente_curp = '".$_SESSION['curp']."' AND tutoria.docente_curp = docente.curp AND tutoria.alumno_nControl = alumno.nControl";
                    $consulta = consultarSQL($query);
                    $total = $consulta->num_rows;
                    if($total):
                        while($filas = $consulta->fetch_array(MYSQLI_ASSOC)):
                ?>
                <tr>
                    <th scope="row">
                        <?= $filas['nControl'] ?>
                    </th>
                    <td>
                        <?= $filas['nombre'] ?>
                    </td>
                    <td>
                        <?= $filas['apellidoPaterno'] ?>
                    </td>
                    <td>
                        <?= $filas['apellidoMaterno'] ?>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#tipoEntrevistaModal" data-bs-whatever="<?= $filas['nControl'] ?>">Registrar</button>
                    </td>
                </tr>
                <?php
                        endwhile;
                    else:
                ?>
                <tr>
                    <td></td>
                    <td>No se encontraron resultados.</td>
                    <td></td>
                    <td></td>
                </tr>
                <?php
                    endif;
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="matriculaModal" tabindex="-1" aria-labelledby="matriculaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="matriculaModalLabel">Entrevista</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style=" text-align: center; ">
                    <form action="" method="POST">

                        <br>
                        <div class="mt-6 has-text-centered">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tipoEntrevistaModal" tabindex="-1" aria-labelledby="tipoEntrevistaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tipoEntrevistaModalLabel">Registrar entrevista</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="./entrevista/index.php" method="POST">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Numero de control:</label>
                            <input type="text" class="form-control" name="numeroControl" id="recipient-name" readonly required>
                        </div>
                        <div class="field">
                            <div class="control">
                                <p class="control has-icons-left has-icons-right">
                                    <label for="matriculaFormControlInput" class="form-label">Tipo: </label>

                                    <select class="form-select" name="tipo" aria-label="Default select example" required>
                                        <option value="inicio" selected>Inicio de semestre</option>
                                        <option value="final">Final de semestre</option>
                                        <option value="extraordinaria">Extraordinaria</option>
                                    </select>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                </p>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Registrar entrevista</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        var tipoEntrevistaModal = document.getElementById('tipoEntrevistaModal')
        tipoEntrevistaModal.addEventListener('show.bs.modal', function (event) {
            // Button that triggered the modal
            var button = event.relatedTarget
            // Extract info from data-bs-* attributes
            var numeroControl = button.getAttribute('data-bs-whatever')
            // If necessary, you could initiate an AJAX request here
            // and then do the updating in a callback.
            //
            // Update the modal's content.
            var modalTitle = tipoEntrevistaModal.querySelector('.modal-title')
            var modalBodyInput = tipoEntrevistaModal.querySelector('.modal-body input')

            modalTitle.textContent = 'Numero Control: ' + numeroControl
            modalBodyInput.value = numeroControl
        })
    </script>
    <?php
        include("./inc/footer.php")
    ?>
</body>

</html>