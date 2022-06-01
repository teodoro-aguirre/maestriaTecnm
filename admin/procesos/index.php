<!--Evaluacion de la sesion-->
<?php
      if(!isset($_SESSION)) 
      { 
        session_start(); 
        error_reporting(E_PARSE);
      } 

      if(!$_SESSION['verificar']){
        header("Location: ../");
      }

      if($_SESSION['tipo'] != "ADMINISTRADOR"){
        $_SESSION['verificar']=false;
        session_destroy();
        header("Location: ../");
      }
    ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php
        include '../inc/link.php';
    ?>
    <title>Menu</title>
</head>

<body>
    <?php
        include '../inc/navbar.php';
    ?>
    <!-- Section -->
    <section class="section">
        <div class="container">
            <a href="../menu" class="button is-info">REGRESAR</a>
            <h1 class="is-size-4 mt-3">Procesos del Sistema Integral de Posgrado</h1>
            <br>
            <div class="row">
                <div class="shadow p-3 mb-5 bg-white col-md-3 col-12 mr-1 rounded has-text-centered">
                    <p class="is-size-5"><strong>Entrevistas</strong></p>
                    <img src="../img/file-solid.svg" alt="Logo proyectos" class="img-fluid block"
                        width="80"><br>
                    <a href="./entrevistas/" class="button is-link">Ingresar</a>
                </div>
            </div>
        </div>
    </section>
    <?php
        include '../inc/footer.php';
    ?>
</body>

</html>