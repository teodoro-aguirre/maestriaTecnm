<!--Evaluacion de la sesion-->
    <?php
      if(!isset($_SESSION)) 
      { 
        session_start(); 
        error_reporting(E_PARSE);
      } 

      if(!$_SESSION['verificar']){
        header("Location: ./");
      }

      if($_SESSION['tipo'] != "ADMINISTRADOR"){
        $_SESSION['verificar']=false;
        session_destroy();
        header("Location: ./");
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
            <div class="row">
                <div class="shadow p-3 mb-5 bg-white col-md-3 col-12 mr-1 rounded has-text-centered">
                    <p class="is-size-5"><strong>Procesos</strong></p>
                    <img src="img/list-check-solid.svg" alt="Logo procesos" class="img-fluid block"
                        width="80"><br>
                    <a href="./procesos" class="button is-link">Ingresar</a>
                </div>
                <div class="shadow p-3 ml-2 mb-5 bg-white col-md-3 col-12 mr-1 rounded has-text-centered">
                    <p class="is-size-5"><strong>Estudiantes</strong></p>
                    <img src="img/users-solid.svg" alt="Logo estudiantes" class="img-fluid block"
                        width="80"><br>
                    <a href="./estudiantes" class="button is-link">Ingresar</a>
                </div>
                <div class="shadow p-3 ml-2 mb-5 bg-white col-md-3 col-12 mr-1 rounded has-text-centered">
                    <p class="is-size-5"><strong>Usuarios</strong></p>
                    <img src="img/users-solid.svg" alt="Logo estudiantes" class="img-fluid block"
                        width="80"><br>
                    <a href="./usuarios/lista" class="button is-link">Ingresar</a>
                </div>
                <div class="shadow p-3 ml-2 mb-5 bg-white col-md-3 col-12 mr-1 rounded has-text-centered">
                    <p class="is-size-5"><strong>Docentes</strong></p>
                    <img src="img/users-solid.svg" alt="Logo estudiantes" class="img-fluid block"
                        width="80"><br>
                    <a href="./docente" class="button is-link">Ingresar</a>
                </div>
            </div>
        </div>
    </section>
    <?php
        include './inc/footer.php';
    ?>
</body>
</html>