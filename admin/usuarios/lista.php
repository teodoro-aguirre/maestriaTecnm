<?php
    if(!isset($_SESSION)){ 
        session_start(); 
        error_reporting(E_PARSE);
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php  include "../inc/link.php" ?>
    <title>Lista Usuarios</title>
</head>
<body>
    <?php  include "../inc/navbar.php" ?>
    
    <section class="section">
        <div class="container">
            <a href="../menu.php" class="button is-info">REGRESAR</a>
            <br><br>
            <div class="notification is-success is-light has-text-centered">
                <p>LISTA USUARIOS DE ADMINISTRACIÓN</p>
                
                <a href="./usuario.php" class="button is-primary">CREAR NUEVO USUARIO</a>
            </div>


            <table class="table is-hoverable">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include "../php/conexion.php";
                        $queryList1 = 'SELECT nombre, tipo, user FROM users';
                        $consultaList1 = consultarSQL($queryList1);
                        
                        while($filas = $consultaList1->fetch_array(MYSQLI_ASSOC)):
                    ?>
                    <tr>
                        <td> <?= $filas['user'] ?> </td>
                        <td> <?= $filas['nombre'] ?> </td>
                        <td> <?= $filas['tipo'] ?> </td>
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