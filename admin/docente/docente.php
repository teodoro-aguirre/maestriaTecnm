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
    <?php include '../inc/link.php'; ?>
    <title>Registro docente</title>
</head>

<body>
    <?php include '../inc/navbar.php'; ?>

    <section class="section">
        <div class="container">
            <a href="./lista.php" class="button is-info">REGRESAR</a>
            <h1 class="is-title has-text-centered">CREAR DOCENTE</h1>

            <form action="../process/registroDocenteProcess.php" method="POST" class="form">
                <div class="columns">
                    <div class="field column">
                        <label class="label">Número Personal</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="nPersonal" type="number" placeholder="Numero"
                                onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            <span class="icon is-small is-left">
                                <i class="fas fa-address-card"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field column">
                        <label class="label">NOMBRE</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="nombreDocente" type="text" placeholder="NOMBRE COMPLETO"
                                maxlength="30" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            <span class="icon is-small is-left">
                                <i class="fas fa-address-card"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field column">
                        <label class="label">APELLIDO PATERNO</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="apellidoPaterno" type="text" placeholder="NOMBRES"
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
                            <input class="input" name="apellidoMaterno" type="text" placeholder="NOMBRES"
                                maxlength="110" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            <span class="icon is-small is-left">
                                <i class="fas fa-address-card"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field column">
                        <label class="label">CURP</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="curp" type="text" placeholder="INGRESA TU USUARIO"
                                maxlength="18" required>
                            <span class="icon is-small is-left">
                                <i class="fas fa-address-card"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field column">
                        <label class="label">Nivel Académico</label>
                        <div class="control">
                            <div class="select is-rounded">
                                <select name="nivelAcademico" required>
                                    <option selected>Seleccionar</option>
                                    <option value="DR">DR</option>
                                    <option value="DRA">DRA</option>
                                    <option value="MSC">MSC</option>
                                    <option value="DCI">DCI</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="field column">
                        <label class="label">CORREO</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="correo" type="email" placeholder="CORREO"
                            onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="50" required>
                            <span class="icon is-small is-left">
                                <i class="fas fa-at"></i>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="has-text-centered">
                    <button type="submit" class="button is-info">REGISTRAR DOCENTE</button>
                </div>
            </form>
        </div>
    </section>

    <?php include '../inc/footer.php'; ?>

</body>

</html>