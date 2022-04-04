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
        include "../inc/link.php";
    ?>
    <title>Datos aspirante</title>
</head>
<body>
    <?php
        include "./inc/navbar.php";
    ?>

    <section class="section">
        <div class="container">
            <?php
                if(!isset($_GET['CURP'])){
                    echo "No existe";
                } else {
                    
                }
            ?>

            <a href="./aspirantes.php" class="button is-info">Regresar</a>
            <section class="section">
                <div class="tabs is-centered">
                    <ul>
                        <li class="is-active" data-target="personal-info">
                            <a>
                                <span class="icon is-small"><i class="fas fa-address-card" aria-hidden="true"></i></span>
                                <span>Datos personales</span>
                            </a>
                        </li>
                        <li data-target="tutor-info">
                            <a>
                                <span class="icon is-small"><i class="fas fa-male" aria-hidden="true"></i></span>
                                <span>Datos del tutor</span>
                            </a>
                        </li>
                        <li data-target="school-info">
                            <a>
                                <span class="icon is-small"><i class="fas fa-school" aria-hidden="true"></i></span>
                                <span>Datos de la escuela</span>
                            </a>
                        </li>
                        <li data-target="documents">
                            <a>
                                <span class="icon is-small"><i class="far fa-file-alt" aria-hidden="true"></i></span>
                                <span>Documentos</span>
                            </a>
                        </li>
                        <li data-target="send-mail">
                            <a>
                                <span class="icon is-small"><i class="far fa-file-alt" aria-hidden="true"></i></span>
                                <span>Enviar correo</span>
                            </a>
                        </li>
                    </ul>
                </div>
                
                <?php
                // Consultas
                    require('../php/conexion.php');

                    $query = 'SELECT * FROM aspirante WHERE CURP = "'.$_GET['CURP'].'"';
                    $consulta = consultarSQL($query);
                    $fila = $consulta->fetch_array(MYSQLI_ASSOC);

                ?>
                <!-- Contenido tabs -->
                <div class="px-2" id="tab-content">
                    <div id="personal-info">
                            <fieldset disabled>
                                <div class="form-row">
                                    <div class="notification is-success is-light col-12 mb-12 has-text-centered">
                                            INFORMACION PERSONAL
                                    </div>
                                    <div class="field col-md-4 mb-12">
                                        <label class="label">APELLIDO PATERNO</label>
                                        <div class="control has-icons-left has-icons-right">
                                            <input class="input" name="apellidoPaterno" type="text" value="<?= $fila['apellidoPaterno']?>" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                            <span class="icon is-small is-left">
                                            <i class="fas fa-user"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="field col-md-4 mb-12">
                                        <label class="label">APELLIDO MATERNO</label>
                                        <div class="control has-icons-left has-icons-right">
                                            <input class="input" name="apellidoMaterno" type="text" value="<?= $fila['apellidoMaterno'] ?>" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                            <span class="icon is-small is-left">
                                            <i class="fas fa-user"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="field col-md-4 mb-12">
                                        <label class="label">NOMBRE (S)</label>
                                        <div class="control has-icons-left has-icons-right">
                                            <input class="input" name="nombre" type="text" value="<?= $fila['nombre'] ?>"  onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                            <span class="icon is-small is-left">
                                            <i class="fas fa-user"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="field col-md-4 mb-12">
                                        <label class="label">CURP</label>
                                        <div class="control has-icons-left has-icons-right">
                                            <input class="input" name="CURP" type="text" maxlength="18" value="<?= $fila['CURP'] ?>"  placeholder="CURP 18 DIGITOS" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                            <span class="icon is-small is-left">
                                            <i class="fas fa-address-card"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="field col-md-4 mb-12">
                                        <label class="label">CONTRASEÑA</label>
                                        <div class="control has-icons-left has-icons-right">
                                            <input class="input" name="password" type="text" value="NO SE TIENE ACCESO A ESE DATO"  placeholder="CONTRASEÑA" maxlength="12" required>
                                            <span class="icon is-small is-left">
                                            <i class="fas fa-address-card"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="field col-md-4 mb-12">
                                        <label class="label">FECHA DE NACIMIENTO</label>
                                        <div class="control has-icons-left has-icons-right">
                                            <input class="input" name="fechaNacimiento" type="date" value="<?= $fila['fechaNacimiento'] ?>"  max="2007-12-31" placeholder="NOMBRE (S)" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                            <span class="icon is-small is-left">
                                            <i class="fas fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="field col-md-4 mb-12">
                                        <label class="label">TELEFONO</label>
                                        <div class="control has-icons-left has-icons-right">
                                            <input class="input" name="telefono" type="text" maxlength="10" value="<?= $fila['telefono'] ?>"  placeholder="10 DIGITOS" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                            <span class="icon is-small is-left">
                                            <i class="fas fa-phone"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="field col-md-4 mb-12">
                                        <label class="label">CELULAR</label>
                                        <div class="control has-icons-left has-icons-right">
                                            <input class="input" name="celular" type="text" maxlength="10" value="<?= $fila['celular'] ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                            <span class="icon is-small is-left">
                                            <i class="fas fa-mobile-alt"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="field col-md-4 mb-12">
                                        <label class="label">CORREO</label>
                                        <div class="control has-icons-left has-icons-right">
                                            <input class="input" name="correo" type="email" value="<?= $fila['correo'] ?>"  onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                            <span class="icon is-small is-left">
                                            <i class="fas fa-envelope"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="field col-md-4 mb-12">
                                        <label class="label">GENERO</label>
                                        <div class="control has-icons-left has-icons-right">
                                            <input class="input" name="genero" type="email" value="<?= $fila['genero'] ?>"  onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                            <span class="icon is-small is-left">
                                            <i class="fas fa-user"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="notification is-success is-light has-text-centered col-12">DOMICILIO DEL ASPIRANTE</div>
                                    <div class="field col-md-4 mb-12">
                                        <label class="label">CALLE</label>
                                        <div class="control has-icons-left has-icons-right">
                                            <input class="input" name="calle" type="text" value="<?= $fila['calle'] ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                            <span class="icon is-small is-left">
                                            <i class="fas fa-road"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="field col-md-4 mb-12">
                                        <label class="label">NÚMERO</label>
                                        <div class="control has-icons-left has-icons-right">
                                            <input class="input" name="numeroCasa" type="text" value="<?= $fila['numeroCasa'] ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                            <span class="icon is-small is-left">
                                            <i class="fas fa-hashtag"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="field col-md-4 mb-12">
                                        <label class="label">COLONIA O LOCALIDAD</label>
                                        <div class="control has-icons-left has-icons-right">
                                            <input class="input" name="colonia" type="text" value="<?= $fila['colonia'] ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                            <span class="icon is-small is-left">
                                            <i class="fas fa-map-marker-alt"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="field col-md-4 mb-12">
                                        <label class="label">MUNICIPIO</label>
                                        <div class="control has-icons-left has-icons-right">
                                            <input class="input" name="municipio" type="text" value="<?= $fila['municipio'] ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                            <span class="icon is-small is-left">
                                            <i class="fas fa-map-marked-alt"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="field col-md-4 mb-12">
                                        <label class="label">CÓDIGO POSTAL</label>
                                        <div class="control has-icons-left has-icons-right">
                                            <input class="input" name="codigoPostal" maxlength="5" type="text" value="<?= $fila['codigoPostal'] ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                            <span class="icon is-small is-left">
                                            <i class="fas fa-hashtag"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="notification is-info is-light has-text-centered col-12">ESPECIALIDAD ASPIRANTE</div>
                                    <div class="field col-md-4 mb-12">
                                        <label class="label">OPCION 1</label>
                                        <div class="control has-icons-left has-icons-right">
                                            <input class="input" name="calle" type="text" value="<?= $fila['especialidad1'] ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                            <span class="icon is-small is-left">
                                            <i class="fas fa-user"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="field col-md-4 mb-12">
                                        <label class="label">OPCION 2</label>
                                        <div class="control has-icons-left has-icons-right">
                                            <input class="input" name="numeroCasa" type="text" value="<?= $fila['especialidad2'] ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                            <span class="icon is-small is-left">
                                            <i class="fas fa-user"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="field col-md-4 mb-12">
                                        <label class="label">OPCION 3</label>
                                        <div class="control has-icons-left has-icons-right">
                                            <input class="input" name="colonia" type="text" value="<?= $fila['especialidad3'] ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                            <span class="icon is-small is-left">
                                            <i class="fas fa-user"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="field col-md-8 mb-12">
                                        <label class="label">MOTIVO</label>
                                        <div class="control has-icons-left has-icons-right">
                                            <input class="input" name="municipio" type="text" value="<?= $fila['motivoIngreso'] ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                            <span class="icon is-small is-left">
                                            <i class="fas fa-user"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>


                            </fieldset>
                    </div>


                    <div id="tutor-info" class="is-hidden">
                            <fieldset disabled>
                            <div class="form-row">
                            <div class="notification is-info is-light has-text-centered col-12">
                                DATOS PERSONALES DEL TUTOR
                            </div>
                            <div class="field col-md-4 mb-12">
                                <label class="label">NOMBRE TUTOR</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input" name="nombreTutor"  type="text" value="<?= $fila['nombreTutor'] ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                    <span class="icon is-small is-left">
                                    <i class="fas fa-user"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field col-md-4 mb-12">
                                <label class="label">CELULAR</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input" name="celularTutor" maxlength="10" type="text" value="<?= $fila['celularTutor'] ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                    <span class="icon is-small is-left">
                                    <i class="fas fa-mobile-alt"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field col-md-4 mb-12">
                                <label class="label">TELEFONO</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input" name="telefonoTutor" maxlength="10" type="text" value="<?= $fila['telefonoTutor'] ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                    <span class="icon is-small is-left">
                                    <i class="fas fa-phone"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field col-md-12 mb-12">
                                <label class="label">DIRECCION</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input" name="direccionTutor"  type="text" value="<?= $fila['direccionTutor'] ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                    <span class="icon is-small is-left">
                                    <i class="fas fa-map-marked-alt"></i>
                                    </span>
                                </div>
                            </div>
                            </div>
                            </fieldset>
                    </div>

                    <div id="school-info" class="is-hidden">
                        
                            <fieldset disabled="disabled">
                                <div class="form-row">
                                    <div class="notification is-warning is-light col-12">
                                        INFORMACIÓN DE LA ESCUELA DE PROCEDENCIA
                                    </div>
                                    <div class="field col-md-4 mb-12">
                                        <label class="label">NOMBRE DE LA ESCUELA</label>
                                        <div class="control has-icons-left has-icons-right">
                                            <input class="input" name="nombreEscuela"  type="text" value="<?= $fila['nombreEscuela'] ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                            <span class="icon is-small is-left">
                                            <i class="fas fa-school"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="field col-md-4 mb-12">
                                        <label class="label">TIPO DE SOSTENIMIENTO</label>
                                        <div class="control has-icons-left has-icons-right">
                                            <input class="input"  type="text" value="<?= $fila['tipoSostenimiento'] ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                            <span class="icon is-small is-left">
                                            <i class="fas fa-school"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="field col-md-4 mb-12">
                                        <label class="label">PLANTEL DE PROCEDENCIA</label>
                                        <div class="control has-icons-left has-icons-right">
                                            <input class="input" type="text" value="<?= $fila['plantelProcedencia'] ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                            <span class="icon is-small is-left">
                                            <i class="fas fa-school"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="field col-md-4 mb-12">
                                        <label class="label">TELEFONO DE LA ESCUELA</label>
                                        <div class="control has-icons-left has-icons-right">
                                            <input class="input" name="telefonoEscuela" maxlength="10" type="text" value="<?= $fila['telefonoEscuela'] ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                            <span class="icon is-small is-left">
                                            <i class="fas fa-phone"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="field col-md-4 mb-12">
                                        <label class="label">NOMBRE DEL DIRECTOR</label>
                                        <div class="control has-icons-left has-icons-right">
                                            <input class="input" name="nombreDirector"  type="text" value="<?= $fila['nombreDirector'] ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                            <span class="icon is-small is-left">
                                            <i class="fas fa-user"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="field col-md-4 mb-12">
                                        <label class="label">MUNICIPIO</label>
                                        <div class="control has-icons-left has-icons-right">
                                            <input class="input" name="municipioEscuela"  type="text" value="<?= $fila['municipioEscuela'] ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                            <span class="icon is-small is-left">
                                            <i class="fas fa-map-marked-alt"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                    </div>

                    <div id="documents" class="is-hidden">
                        <h1 class="is-size-4">Documentos</h1>
                            <?php
                                if(!$fila['archivoCURP'] == ""):
                            ?>
                            <div class="columns is-vcentered">
                                <div class="column ">
                                    <h1 class="is-size-4">Acta de nacimiento</h1>
                                    <a class="button is-danger mt-2" data-toggle="modal" data-target="#mostrarActaNacimiento">Ver archivo</a>
                                    <a class="button is-danger mt-2" href="../docs/aspirante/<?= $fila['CURP'] ?>/<?= $fila['archivoActaNacimiento'] ?>" target="_blank">Descargar</a>
                                </div>
                                <div class="column">
                                    <h1 class="is-size-4">CURP</h1>
                                    <a class="button is-danger mt-2" data-toggle="modal" data-target="#mostrarCURP">Ver archivo</a>
                                    <a class="button is-danger mt-2" href="../docs/aspirante/<?= $fila['CURP'] ?>/<?= $fila['archivoCURP'] ?>" target="_blank">Descargar</a>
                                </div>
                                <div class="column">
                                    <h1 class="is-size-4">CONSTANCIA DE ESTUDIOS</h1>
                                    <a class="button is-danger mt-2" data-toggle="modal" data-target="#mostrarConstanciaEstudios">Ver archivo</a>
                                    <a class="button is-danger mt-2" href="../docs/aspirante/<?= $fila['CURP'] ?>/<?= $fila['archivoConstanciaEstudios'] ?>" target="_blank">Descargar</a>
                                </div>
                                <div class="column">
                                    <h1 class="is-size-4">COMPROBANTE DE DOMICILIO</h1>
                                    <a class="button is-danger mt-2" data-toggle="modal" data-target="#mostrarComprobanteDom">Ver archivo</a>
                                    <a class="button is-danger mt-2" href="../docs/aspirante/<?= $fila['CURP'] ?>/<?= $fila['archivoComprobanteDomicilio'] ?>" target="_blank">Descargar</a>
                                </div>
                            </div>


                            <div class="modal fade " id="mostrarActaNacimiento" tabindex="-1" role="dialog" aria-labelledby="Comprobante_dom" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Acta de Nacimiento</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="ratio ratio-16x9 has-text-centered">
                                                    <embed src="../docs/aspirante/<?= $fila['CURP'] ?>/<?= $fila['archivoActaNacimiento'] ?>" type="application/pdf" width="80%" height="800px" title="Document" />
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                                            </div>
                                        </div>
                                    </div>
                            </div>  

                            <div class="modal fade " id="mostrarCURP" tabindex="-1" role="dialog" aria-labelledby="mostrarCURP" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">CURP</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="ratio ratio-16x9 has-text-centered">
                                                    <embed src="../docs/aspirante/<?= $fila['CURP'] ?>/<?= $fila['archivoCURP'] ?>" type="application/pdf" width="80%" height="800px" title="Document" />
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <div class="modal fade " id="mostrarConstanciaEstudios" tabindex="-1" role="dialog" aria-labelledby="mostrarConstanciaEstudios" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">CONSTANCIA DE ESTUDIOS</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="ratio ratio-16x9 has-text-centered">
                                                    <embed src="../docs/aspirante/<?= $fila['CURP'] ?>/<?= $fila['archivoConstanciaEstudios'] ?>" type="application/pdf" width="80%" height="800px" title="Document" />
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <div class="modal fade " id="mostrarComprobanteDom" tabindex="-1" role="dialog" aria-labelledby="Comprobante_dom" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">COMPROBANTE DE DOMICILIO</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="ratio ratio-16x9 has-text-centered">
                                                    <embed src="../docs/aspirante/<?= $fila['CURP'] ?>/<?= $fila['archivoComprobanteDomicilio'] ?>" type="application/pdf" width="80%" height="800px" title="Document" />
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <?php else: ?>
                                <p>Aún no ha cargado sus documentos.</p>
                            <?php endif; ?>
                            
                            <?php if($fila['archivoINE'] != ""): ?>
                            <div class="columns is-vcentered">
                                <div class="column ">
                                    <h1 class="is-size-4">INE Tutor</h1>
                                    <a class="button is-danger mt-2" data-toggle="modal" data-target="#mostrarINE">Ver archivo</a>
                                    <a class="button is-danger mt-2" href="../docs/aspirante/<?= $fila['CURP'] ?>/<?= $fila['archivoINE'] ?>" target="_blank">Descargar</a>
                                </div>
                                <div class="column ">
                                    <h1 class="is-size-4">Fotografia Infantil</h1>
                                    <a class="button is-danger mt-2" data-toggle="modal" data-target="#mostrarFotografia">Ver archivo</a>
                                    <a class="button is-danger mt-2" href="../docs/aspirante/<?= $fila['CURP'] ?>/<?= $fila['archivoFotografia'] ?>" target="_blank">Descargar</a>
                                </div>
                            </div>

                            <div class="modal fade " id="mostrarINE" tabindex="-1" role="dialog" aria-labelledby="mostrarINE" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">INE</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="ratio ratio-16x9 has-text-centered">
                                                <embed src="../docs/aspirante/<?= $fila['CURP'] ?>/<?= $fila['archivoINE'] ?>" type="application/pdf" width="80%" height="800px" title="Document" />
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade " id="mostrarFotografia" tabindex="-1" role="dialog" aria-labelledby="mostrarFotografia" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Fotografia Infantil</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="ratio ratio-16x9 has-text-centered">
                                                <img src="../docs/aspirante/<?= $fila['CURP'] ?>/<?= $fila['archivoFotografia'] ?>" />
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php else: ?>
                                    <p>
                                            Aún no ha subido INE Y Fotografia
                                    </p>
                            <?php endif; ?>

                    </div>

                    <div id="send-mail" class="is-hidden">
                        <h1 class="is-size-4">Enviar correo</h1>
                        <section class="section" id="contacto">
                        <div class="container is-vcentered" >
                            <form action="../process/mailAspirante.php" method="POST">
                                <input type="hidden" name="correo" value="<?= $fila['correo'] ?>">
                                <input type="hidden" name="nombre" value="<?= $fila['nombre'] ?> <?= $fila['apellidoPaterno'] ?> <?= $fila['apellidoMaterno'] ?>">
                                <div class="field">
                                    <label class="label">Asunto</label>
                                    <div class="control">
                                        <input type="text" name="asunto" class="input" autocomplete="off">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Mensaje</label>
                                    <div class="control">
                                        <textarea class="textarea" name="mensaje" autocomplete="off"></textarea>
                                    </div>
                                    <p class="help">Si la página se recarga es porque tu consulta se envio sastifactoriamente</p>
                                </div>
                                <div class="field mt-6 has-text-centered">
                                    <p class="control">
                                        <button class="button is-info is-light" type="submit">
                                            ENVIAR CORREO
                                        </button>
                                    </p>
                                </div>
                            </form>
                        </div>
                        </section>
                    </div>
                </div>
            </section>
        </div>
    </section> 

    <?php
        include "../inc/footer.php";
    ?>

    <script src="./js/tabs.js"></script>
</body>
</html>