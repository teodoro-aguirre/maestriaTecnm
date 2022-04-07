<?php
    if(!isset($_SESSION)){ 
        session_start(); 
        error_reporting(E_PARSE);
    } 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../inc/link.php'; ?>
    <title>Registro alumno</title>
</head>

<body>
    <?php include '../inc/navbar.php'; ?>

    <section class="section">
        <div class="container">
            <a href="./lista.php" class="button is-info">REGRESAR</a>
            <h1 class="is-title has-text-centered">REGISTRAR ALUMNO</h1>

            <form action="./registroAlumno.php" method="POST" class="form">
                <div class="columns">
                    <div class="field column">
                        <label class="label">Numero de Control</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="nControl" type="text" placeholder="Numero de control" maxlength="8"
                                onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            <span class="icon is-small is-left">
                                <i class="fas fa-address-card"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field column">
                        <label class="label">NOMBRE(s)</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="nombreAlumno" type="text" placeholder="NOMBRES" maxlength="110"
                                onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            <span class="icon is-small is-left">
                                <i class="fas fa-address-card"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field column">
                        <label class="label">APELLIDO PATERNO</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="apellidoPaterno" type="text" placeholder="APELLIDO PATERNO"
                                maxlength="110" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            <span class="icon is-small is-left">
                                <i class="fas fa-address-card"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="field column">
                        <label class="label">APELLIDO MATERNO</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="apellidoMaterno" type="text" placeholder="APELLIDO MATERNO"
                                maxlength="110" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            <span class="icon is-small is-left">
                                <i class="fas fa-address-card"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field column">
                        <label class="label">CURP</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="curp" type="text" placeholder="INGRESA TU CURP" maxlength="18"
                                required>
                            <span class="icon is-small is-left">
                                <i class="fas fa-address-card"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field column">
                        <label class="label">CORREO</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="correo" type="email" placeholder="CORREO" maxlength="50"
                                required>
                            <span class="icon is-small is-left">
                                <i class="fas fa-address-card"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="field column">
                        <label class="label">TUTOR(A) ASIGNADO(A)</label>

                        <div class="control">
                            <div class="select is-rounded">
                                <select name="curpDocente" required>
                                    <?php
                                    include "../php/conexion.php";
                                    $queryList1 = 'SELECT nombreDocente, apellidoPaterno, apellidoMaterno, curp FROM docente';
                                    $consultaList1 = consultarSQL($queryList1);
                                    
                                    while($filas = $consultaList1->fetch_array(MYSQLI_ASSOC)):
                                ?>
                                    <option value="<?= $filas['curp']?>">
                                        <?= $filas['nombreDocente'] ?>
                                        <?= $filas['apellidoPaterno'] ?>
                                        <?= $filas['apellidoMaterno'] ?>
                                    </option>

                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="has-text-centered">
                    <button type="submit" class="button is-info">REGISTRAR ALUMNO</button>
                </div>
            </form>
        </div>
    </section>

    <?php include '../inc/footer.php'; ?>

</body>

</html>