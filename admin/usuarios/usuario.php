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
    <title>Registro usuarios</title>
</head>
<body>
    <?php include '../inc/navbar.php'; ?>

    <section class="section">
        <div class="container">
            <a href="./lista.php" class="button is-info">REGRESAR</a>
            <h1 class="is-title has-text-centered">CREAR USUARIO</h1>

            <form action="../process/registroprocess.php" method="POST" class="form">
                <div class="columns">
                    <div class="field column">
                        <label class="label">NOMBRE COMPLETO</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="nombre"  type="text" placeholder="NOMBRES" maxlength="110" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            <span class="icon is-small is-left">
                            <i class="fas fa-address-card"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field column">
                        <label class="label">TIPO</label>
                        <div class="control">
                            <div class="select is-rounded">
                                <select name="tipo" required>
                                    <option>ADMINISTRADOR</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="field column">
                        <label class="label">USUARIO</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="usuario"  type="text" placeholder="INGRESA TU USUARIO" maxlength="10" required>
                            <span class="icon is-small is-left">
                            <i class="fas fa-address-card"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field column">
                        <label class="label">CONTRASEÑA</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="password"  type="text" placeholder="MAXIMO 12 DIGITOS" maxlength="12" required>
                            <span class="icon is-small is-left">
                            <i class="fas fa-address-card"></i>
                            </span>
                        </div>
                    </div>
                </div>
                    
                <div class="has-text-centered">
                    <button type="submit" class="button is-info">REGISTRAR USUARIO</button>
                </div>
            </form>
        </div>
    </section>

    <?php include '../inc/footer.php'; ?>

</body>
</html>