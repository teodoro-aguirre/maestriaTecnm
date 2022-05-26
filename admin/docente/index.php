<?php
    if(!isset($_SESSION)){ 
        session_start(); 
        error_reporting(E_PARSE);
    } 

    if(!$_SESSION['verificar']){
        header("Location: ../index.php");
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php  include "../inc/link.php" ?>
    <title>Lista Docentes</title>
</head>
<body>
    <?php  include "../inc/navbar.php" ?>
    
    <section class="section">
        <div class="container">
            <a href="../menu.php" class="button is-info">REGRESAR</a>
            <br><br>
            <div class="notification is-success is-light has-text-centered">
                <p>LISTA DE DOCENTES</p>
                
                <a href="./docente" class="button is-primary">REGISTRAR NUEVO DOCENTE</a>
            </div>


            <table class="table is-hoverable">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include "../php/conexion.php";
                        $queryList1 = 'SELECT nombre, apellidoPaterno, apellidoMaterno, curp FROM docente';
                        $consultaList1 = consultarSQL($queryList1);
                        
                        while($filas = $consultaList1->fetch_array(MYSQLI_ASSOC)):
                    ?>
                    <tr>
                        <td> <?= $filas['nombre'] ?> </td>
                        <td> <?= $filas['apellidoPaterno'] ?> </td>
                        <td> <?= $filas['apellidoMaterno'] ?> </td>
                        <td> <a class="button is-info is-light" href="./docente.php?curp=<?= $filas['curp'] ?>">MODIFICAR</a> </td>
                        <td> <a class="button is-danger is-light" href="../elimininarDocente.php?user=<?= $filas['curp'] ?>">ELIMINAR</a> </td>
                    </tr>

                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </section>
    
    
    <?php  include "../inc/footer.php" ?>
    
</body>
</html>