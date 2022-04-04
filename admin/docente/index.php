<?php
    if(!isset($_SESSION)){ 
        session_start(); 
        error_reporting(E_PARSE);
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
                        $queryList1 = 'SELECT nombreDocente, apellidoPaterno, apellidoMaterno FROM docente';
                        $consultaList1 = consultarSQL($queryList1);
                        
                        while($filas = $consultaList1->fetch_array(MYSQLI_ASSOC)):
                    ?>
                    <tr>
                        <td> <?= $filas['nombreDocente'] ?> </td>
                        <td> <?= $filas['apellidoPaterno'] ?> </td>
                        <td> <?= $filas['apellidoMaterno'] ?> </td>
                        <td> <a class="button is-info is-light" href="./aspirante.php?CURP=<?= $filas['CURP'] ?>">MODIFICAR</a> </td>
                        <td> <a class="button is-danger is-light" href="../process/deleteuser.php?user=<?= $filas['usuario'] ?>">ELIMINAR</a> </td>
                    </tr>

                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </section>
    
    
    <?php  include "../inc/footer.php" ?>
    
</body>
</html>