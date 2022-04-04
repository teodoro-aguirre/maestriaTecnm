<!--Evaluacion de la sesion-->
    <?php
      if(!isset($_SESSION)) 
      { 
        session_start(); 
        error_reporting(E_PARSE);
      } 

      if(!$_SESSION['verificar']){
        header("Location: ./index.php");
      }
    ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php
        include './inc/link.php';
    ?>
    <title>Menu</title>
</head>
<body>
    <?php
        include './inc/navbar.php';
    ?>
    <!-- Section -->
    <section class="section">
        <div class="container">
            <h1 class="is-size-4">Menú de ingreso</h1>
            <br>
            <div class="columns has-text-centered">
                <div class="column">
                    <a href="./aspirantes" class="button is-primary">PROCESOS</a>
                </div>
                <div class="column">
                    <a href="#" class="button is-primary">ESTUDIANTES</a>
                </div>
                <?php if($_SESSION['tipo'] == "ADMINISTRADOR"): ?>
                <div class="column">
                    <a href="./usuarios/lista" class="button is-primary">USUARIOS</a>
                </div>
                <div class="column">
                    <a href="./docente" class="button is-primary">DOCENTES  </a>
                </div>
                <?php endif ?>
            </div>
        </div>
    </section>
    <?php
        include './inc/footer.php';
    ?>
</body>
</html>