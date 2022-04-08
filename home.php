<?php
    session_start();
    if(!isset($_SESSION['verificar'])){
        header("location: ./index.php");  
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
        <p class="fs-3" style="text-align: center;"><?= $_SESSION['user'] ?> <?= $_SESSION['apellidoP'] ?> <?= $_SESSION['apellidoM'] ?></p>
    </div>
    <?php
        include("./inc/footer.php")
    ?>
</body>

</html>