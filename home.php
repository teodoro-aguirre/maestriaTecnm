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
    <div class="container mt-5">
        <h1 class="title" style="text-align: center;">Bienvenido</h1>
        <?php
            require_once "./php/conexion.php";
            $query = "SELECT nPersonal, nombre, apellidoPaterno, apellidoMaterno, nivelAcademico, imagen, correo, curp FROM docente WHERE curp = '".$_SESSION['curp']."'";
            $consulta = consultarSQL($query);
            $datos = $consulta->fetch_array(MYSQLI_ASSOC);
        ?>
        <div class="container mt-4">
            <div class="row">
                <div class="col">
                    <img src="<?= $datos['imagen']?>" class="img-fluid" alt="">
                </div>
                <div class="col">
                    <p class="fs-3">
                        <?= $datos['nivelAcademico'] ?>.
                        <?= $datos['nombre'] ?>
                        <?= $datos['apellidoPaterno'] ?>
                        <?= $datos['apellidoMaterno'] ?>
                    </p>
                    <p> <strong>Correo: </strong><?= $datos['correo'] ?></p>
                    <p> <strong>CURP: </strong><?= $datos['curp'] ?></p>
                    <p> <strong>Número de Personal: </strong><?= $datos['nPersonal'] ?></p>
                </div>
                <div class="col"></div>
            </div>
        </div>
    </div>
    <?php
        include("./inc/footer.php")
    ?>
</body>

</html>