<?php
    session_start();
    if(!isset($_SESSION['verificar'])){
        header("location: ./index.php");  
    }
?>

<!DOCTYPE html>
<html lang="en">

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
        <h1 class="title" style="text-align: center;">Bienvenido al sistema de Maestría del TecNM Campus Misantla</h1>
        <hr>

        <div class="text-center">
            <button type="button" data-bs-toggle="modal" data-bs-target="#matriculaModal"
                class="btn btn-lg btn-primary">Registrar
                Entrevista</button>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="matriculaModal" tabindex="-1" aria-labelledby="matriculaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="matriculaModalLabel">Entrevista</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body style=" text-align: center; "">
                    <form action="" method="POST">
                        <div class="field">
                            <div class="control">
                                <p class="control has-icons-left has-icons-right">
                                    <label for="matriculaFormControlInput" class="form-label">Tipo: </label>

                                    <select class="form-select" aria-label="Default select example" required>
                                        <option value="inicio" selected>Inicio de semestre</option>
                                        <option value="final">Final de semestre</option>
                                        <option value="extr">Extraordinaria</option>
                                    </select>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                </p>
                            </div>
                        </div>
                        <br>
                        <div class="mt-6 has-text-centered">
                            <a href="./entrevista.html" class="btn btn-success">Iniciar Entrevista</a>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


    <?php
        include("./inc/footer.php")
    ?>
</body>

</html>