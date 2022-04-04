<?php
    // Evita los errores
    if(!isset($_SESSION)){ 
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
        include '../inc/link.php';
    ?>
    <title>Lista aspirantes</title>
</head>
<body>
    <?php
        include './inc/navbar.php';
        include "../php/conexion.php";
        $queryAll = 'SELECT folio, apellidoPaterno, apellidoMaterno, nombre, estatus, CURP FROM aspirante';
        $consultaAll = consultarSQL($queryAll);
        $totalRegistro = $consultaAll->num_rows;
        $registrosPendientes = consultarSQL("SELECT folio FROM aspirante WHERE estatus = 'PENDIENTE'")->num_rows;
        $registrosCompletos = consultarSQL("SELECT folio FROM aspirante WHERE estatus = 'COMPLETO'")->num_rows;
    ?>

    <section class="section">
        <div class="container">
            <a href="./menu.php" class="button is-info">Regresar</a>
            <br>
            <br>
            
            <div class="columns">
                <div class="column">
                    <div class="notification is-info is-light">
                        Cantidad de registros: <b> <?= $totalRegistro ?> </b>
                    </div>
                </div>
                <div class="column">
                    <div class="notification is-warning is-light">
                        Pendientes: <b> <?= $registrosPendientes ?> </b>
                    </div>
                </div>
                <div class="column">
                    <div class="notification is-success is-light">
                        Completos: <b> <?= $registrosCompletos ?> </b>
                    </div>
                </div>
            </div>

            <div class="notification is-success is-light has-text-centered">
                DESCARGAR BASE DE DATOS EXCEL <br>
                <a href="./excel.php" class="button is-warning mt-4">DESCARGAR</a>
            </div>
            
            <h1 class="is-size-4">Lista ordenada por apellidos</h1>
        
            <div class="tabs is-centered">
                <ul>
                    <li class="is-active" data-target="list-a-e">
                        <a>
                            <span class="icon is-small"><i class="fas fa-file-alt" aria-hidden="true"></i></span>
                            <span>A - E</span>
                        </a>
                    </li>
                    <li data-target="list-f-j">
                        <a>
                            <span class="icon is-small"><i class="fas fa-file-alt" aria-hidden="true"></i></span>
                            <span>F - J</span>
                        </a>
                    </li>
                    <li data-target="list-k-n">
                        <a>
                            <span class="icon is-small"><i class="fas fa-file-alt" aria-hidden="true"></i></span>
                            <span>K - Ñ</span>
                        </a>
                    </li>
                    <li data-target="list-o-s">
                        <a>
                            <span class="icon is-small"><i class="fas fa-file-alt" aria-hidden="true"></i></span>
                            <span>O - S</span>
                        </a>
                    </li>
                    <li data-target="list-t-x">
                        <a>
                            <span class="icon is-small"><i class="fas fa-file-alt" aria-hidden="true"></i></span>
                            <span>T - X</span>
                        </a>
                    </li>
                    <li data-target="list-y-z">
                        <a>
                            <span class="icon is-small"><i class="fas fa-file-alt" aria-hidden="true"></i></span>
                            <span>Y - Z</span>
                        </a>
                    </li>
                    <li data-target="list-all">
                        <a>
                            <span class="icon is-small"><i class="fas fa-file-alt" aria-hidden="true"></i></span>
                            <span>Todos</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="px-2" id="tab-content">
                <!--Contenido de A - E-->
                <div id="list-a-e">
                    <table class="table is-hoverable">
                        <thead>
                            <tr>
                                <th>Folio</th>
                                <th>Apellido Materno</th>
                                <th>Apellido Paterno</th>
                                <th>Nombre</th>
                                <th>Estatus</th>
                                <th>Ver datos</th>
                                <th>COMPROBANTE</th>
                                <th>Modificar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $queryList1 = 'SELECT folio, apellidoPaterno, apellidoMaterno, nombre, estatus, CURP FROM aspirante where apellidoPaterno like "A%" OR apellidoPaterno like "B%" OR apellidoPaterno like "C%" OR apellidoPaterno like "D%" OR apellidoPaterno like "E%" ';
                                $consultaList1 = consultarSQL($queryList1);
                                
                                while($filas = $consultaList1->fetch_array(MYSQLI_ASSOC)):
                            ?>
                            <tr>
                                <td> <?= $filas['folio'] ?> </td>
                                <td> <?= $filas['apellidoPaterno'] ?> </td>
                                <td> <?= $filas['apellidoMaterno'] ?> </td>
                                <td> <?= $filas['nombre'] ?> </td>
                                <td> <?= $filas['estatus'] ?> </td>
                                <td> <a class="button is-info is-light" href="./aspirante.php?CURP=<?= $filas['CURP'] ?>" target="_blank">Ver datos</a> </td>
                                <td> <a class="button is-info is-light" href="./comprobante.php?CURP=<?=  $filas['CURP'] ?>" target="_blank">COMPROBANTE</a> </td>
                                <td> <a class="button is-info is-light" href="./aspirantemodificacion.php?CURP=<?= $filas['CURP'] ?>" target="_blank">Modificar</a> </td>
                            </tr>

                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>

                <!--Contenido de F - J-->
                <div id="list-f-j" class="is-hidden">
                    <table class="table is-hoverable">
                        <thead>
                            <tr>
                                <th>Folio</th>
                                <th>Apellido Materno</th>
                                <th>Apellido Paterno</th>
                                <th>Nombre</th>
                                <th>Estatus</th>
                                <th>Ver datos</th>
                                <th>COMPROBANTE</th>
                                <th>Modificar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $queryList1 = 'SELECT folio, apellidoPaterno, apellidoMaterno, nombre, estatus, CURP FROM aspirante where apellidoPaterno like "F%" OR apellidoPaterno like "G%" OR apellidoPaterno like "H%" OR apellidoPaterno like "I%" OR apellidoPaterno like "J%" ';
                                $consultaList1 = consultarSQL($queryList1);
                                
                                while($filas = $consultaList1->fetch_array(MYSQLI_ASSOC)):
                            ?>
                            <tr>
                                <td> <?= $filas['folio'] ?> </td>
                                <td> <?= $filas['apellidoPaterno'] ?> </td>
                                <td> <?= $filas['apellidoMaterno'] ?> </td>
                                <td> <?= $filas['nombre'] ?> </td>
                                <td> <?= $filas['estatus'] ?> </td>
                                <td> <a class="button is-info is-light" href="./aspirante.php?CURP=<?= $filas['CURP'] ?>" target="_blank">Ver datos</a> </td>
                                <td> <a class="button is-info is-light" href="./comprobante.php?CURP=<?=  $filas['CURP'] ?>" target="_blank">COMPROBANTE</a> </td>
                                <td> <a class="button is-info is-light" href="./aspirantemodificacion.php?CURP=<?= $filas['CURP'] ?>" target="_blank">Modificar</a> </td>
                            </tr>

                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
                <!--Contenido de K - Ñ-->
                <div id="list-k-n" class="is-hidden">
                    <table class="table is-hoverable">
                        <thead>
                            <tr>
                                <th>Folio</th>
                                <th>Apellido Materno</th>
                                <th>Apellido Paterno</th>
                                <th>Nombre</th>
                                <th>Estatus</th>
                                <th>Ver datos</th>
                                <th>COMPROBANTE</th>
                                <th>Modificar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $queryList1 = 'SELECT folio, apellidoPaterno, apellidoMaterno, nombre, estatus, CURP FROM aspirante where apellidoPaterno like "K%" OR apellidoPaterno like "L%" OR apellidoPaterno like "M%" OR apellidoPaterno like "N%" OR apellidoPaterno like "Ñ%" ';
                                $consultaList1 = consultarSQL($queryList1);
                                
                                while($filas = $consultaList1->fetch_array(MYSQLI_ASSOC)):
                            ?>
                            <tr>
                                <td> <?= $filas['folio'] ?> </td>
                                <td> <?= $filas['apellidoPaterno'] ?> </td>
                                <td> <?= $filas['apellidoMaterno'] ?> </td>
                                <td> <?= $filas['nombre'] ?> </td>
                                <td> <?= $filas['estatus'] ?> </td>
                                <td> <a class="button is-info is-light" href="./aspirante.php?CURP=<?= $filas['CURP'] ?>" target="_blank">Ver datos</a> </td>
                                <td> <a class="button is-info is-light" href="./comprobante.php?CURP=<?=  $filas['CURP'] ?>" target="_blank">COMPROBANTE</a> </td>
                                <td> <a class="button is-info is-light" href="./aspirantemodificacion.php?CURP=<?= $filas['CURP'] ?>" target="_blank">Modificar</a> </td>
                            </tr>

                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
                <!--Contenido de O - S-->
                <div id="list-o-s" class="is-hidden">
                    <table class="table is-hoverable">
                        <thead>
                            <tr>
                                <th>Folio</th>
                                <th>Apellido Materno</th>
                                <th>Apellido Paterno</th>
                                <th>Nombre</th>
                                <th>Estatus</th>
                                <th>Ver datos</th>
                                <th>COMPROBANTE</th>
                                <th>Modificar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $queryList1 = 'SELECT folio, apellidoPaterno, apellidoMaterno, nombre, estatus, CURP FROM aspirante where apellidoPaterno like "O%" OR apellidoPaterno like "P%" OR apellidoPaterno like "Q%" OR apellidoPaterno like "R%" OR apellidoPaterno like "S%" ';
                                $consultaList1 = consultarSQL($queryList1);
                                
                                while($filas = $consultaList1->fetch_array(MYSQLI_ASSOC)):
                            ?>
                            <tr>
                                <td> <?= $filas['folio'] ?> </td>
                                <td> <?= $filas['apellidoPaterno'] ?> </td>
                                <td> <?= $filas['apellidoMaterno'] ?> </td>
                                <td> <?= $filas['nombre'] ?> </td>
                                <td> <?= $filas['estatus'] ?> </td>
                                <td> <a class="button is-info is-light" href="./aspirante.php?CURP=<?= $filas['CURP'] ?>" target="_blank">Ver datos</a> </td>
                                <td> <a class="button is-info is-light" href="./comprobante.php?CURP=<?=  $filas['CURP'] ?>" target="_blank">COMPROBANTE</a> </td>
                                <td> <a class="button is-info is-light" href="./aspirantemodificacion.php?CURP=<?= $filas['CURP'] ?>" target="_blank">Modificar</a> </td>
                            </tr>

                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
                <!--Contenido de T - X-->
                <div id="list-t-x" class="is-hidden">
                    <table class="table is-hoverable">
                        <thead>
                            <tr>
                                <th>Folio</th>
                                <th>Apellido Materno</th>
                                <th>Apellido Paterno</th>
                                <th>Nombre</th>
                                <th>Estatus</th>
                                <th>Ver datos</th>
                                <th>COMPROBANTE</th>
                                <th>Modificar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $queryList1 = 'SELECT folio, apellidoPaterno, apellidoMaterno, nombre, estatus, CURP FROM aspirante where apellidoPaterno like "T%" OR apellidoPaterno like "U%" OR apellidoPaterno like "V%" OR apellidoPaterno like "W%" OR apellidoPaterno like "X%" ';
                                $consultaList1 = consultarSQL($queryList1);
                                
                                while($filas = $consultaList1->fetch_array(MYSQLI_ASSOC)):
                            ?>
                            <tr>
                                <td> <?= $filas['folio'] ?> </td>
                                <td> <?= $filas['apellidoPaterno'] ?> </td>
                                <td> <?= $filas['apellidoMaterno'] ?> </td>
                                <td> <?= $filas['nombre'] ?> </td>
                                <td> <?= $filas['estatus'] ?> </td>
                                <td> <a class="button is-info is-light" href="./aspirante.php?CURP=<?= $filas['CURP'] ?>" target="_blank">Ver datos</a> </td>
                                <td> <a class="button is-info is-light" href="./comprobante.php?CURP=<?=  $filas['CURP'] ?>" target="_blank">COMPROBANTE</a> </td>
                                <td> <a class="button is-info is-light" href="./aspirantemodificacion.php?CURP=<?= $filas['CURP'] ?>" target="_blank">Modificar</a> </td>
                            </tr>

                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
                <!--Contenido de Y - Z-->
                <div id="list-y-z" class="is-hidden">
                    <table class="table is-hoverable">
                        <thead>
                            <tr>
                                <th>Folio</th>
                                <th>Apellido Materno</th>
                                <th>Apellido Paterno</th>
                                <th>Nombre</th>
                                <th>Estatus</th>
                                <th>Ver datos</th>
                                <th>COMPROBANTE</th>
                                <th>Modificar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $queryList1 = 'SELECT folio, apellidoPaterno, apellidoMaterno, nombre, estatus, CURP FROM aspirante where apellidoPaterno like "Y%" OR apellidoPaterno like "Z%"';
                                $consultaList1 = consultarSQL($queryList1);
                                
                                while($filas = $consultaList1->fetch_array(MYSQLI_ASSOC)):
                            ?>
                            <tr>
                                <td> <?= $filas['folio'] ?> </td>
                                <td> <?= $filas['apellidoPaterno'] ?> </td>
                                <td> <?= $filas['apellidoMaterno'] ?> </td>
                                <td> <?= $filas['nombre'] ?> </td>
                                <td> <?= $filas['estatus'] ?> </td>
                                <td> <a class="button is-info is-light" href="./aspirante.php?CURP=<?= $filas['CURP'] ?>" target="_blank">Ver datos</a> </td>
                                <td> <a class="button is-info is-light" href="./comprobante.php?CURP=<?=  $filas['CURP'] ?>" target="_blank">COMPROBANTE</a> </td>
                                <td> <a class="button is-info is-light" href="./aspirantemodificacion.php?CURP=<?= $filas['CURP'] ?>" target="_blank">Modificar</a> </td>
                            </tr>

                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
                <!--Contenido TODO -->
                <div id="list-all" class="is-hidden">
                    <table class="table is-hoverable">
                        <thead>
                            <tr>
                                <th>Folio</th>
                                <th>Apellido Materno</th>
                                <th>Apellido Paterno</th>
                                <th>Nombre</th>
                                <th>Estatus</th>
                                <th>Ver datos</th>
                                <th>COMPROBANTE</th>
                                <th>Modificar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                
                                
                                while($filas = $consultaAll->fetch_array(MYSQLI_ASSOC)):
                            ?>
                            <tr>
                                <td> <?= $filas['folio'] ?> </td>
                                <td> <?= $filas['apellidoPaterno'] ?> </td>
                                <td> <?= $filas['apellidoMaterno'] ?> </td>
                                <td> <?= $filas['nombre'] ?> </td>
                                <td> <?= $filas['estatus'] ?> </td>
                                <td> <a class="button is-info is-light" href="./aspirante.php?CURP=<?= $filas['CURP'] ?>" target="_blank">Ver datos</a> </td>
                                <td> <a class="button is-info is-light" href="./comprobante.php?CURP=<?=  $filas['CURP'] ?>" target="_blank">COMPROBANTE</a> </td>
                                <td> <a class="button is-info is-light" href="./aspirantemodificacion.php?CURP=<?= $filas['CURP'] ?>" target="_blank">Modificar</a> </td>
                            </tr>

                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>


            </div>

        </div>
    </section>

    <?php
        include '../inc/footer.php';
    ?>

    <script src="./js/tabs.js"></script>
</body>
</html>