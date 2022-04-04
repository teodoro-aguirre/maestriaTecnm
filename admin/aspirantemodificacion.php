<?php

    if(!isset($_SESSION)){ 
        session_start(); 
        error_reporting(E_PARSE);
    } 
    if(!$_SESSION['verificar']){
        header("Location: ./menu.php");
    } 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php include "./inc/link.php"; ?>
    <title>Modificación de datos</title>
</head>
<body>
    <?php include "./inc/navbar.php"; ?>

      <section class="section">
        <div class="container">
        <a href="./aspirantes.php" class="button is-info">Regresar</a>
        <br>
        <br>
                <?php
                // Consultas
                    require('../php/conexion.php');

                    $query = 'SELECT * FROM aspirante WHERE CURP = "'.$_GET['CURP'].'"';
                    $consulta = consultarSQL($query);
                    $fila = $consulta->fetch_array(MYSQLI_ASSOC);

                ?>
            <div class="columns">
                <div class="column">
                    <div class="notification is-link is-light">
                        <p><strong>Fecha de registro: </strong> <?= $fila['fechaAlta'] ?></p>
                    </div>
                </div>
                <div class="column">
                    <div class="notification is-link is-light">
                        <p><strong>Folio: </strong> <?= $fila['folio'] ?></p>
                    </div>
                </div>
            </div>
            <form action="./process/modificacionprocess.php" method="POST" class="form">
                <div class="form-row">
                    <div class="notification is-success is-light col-12 mb-12 has-text-centered">
                        INFORMACIÓN PERSONAL DEL ASPIRANTE
                    </div>
                    <input type="hidden" value="<?= $fila['folio']?>" name="folio" >
                    <div class="field col-md-4 mb-12">
                        <label class="label">APELLIDO PATERNO</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="apellidoPaterno" value="<?= $fila['apellidoPaterno']?>" type="text" placeholder="APELLIDO PATERNO" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field col-md-4 mb-12">
                        <label class="label">APELLIDO MATERNO</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="apellidoMaterno" type="text" value="<?= $fila['apellidoMaterno']?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field col-md-4 mb-12">
                        <label class="label">NOMBRE (S)</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="nombre" type="text" value="<?= $fila['nombre']?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field col-md-4 mb-12">
                        <label class="label">CURP</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="CURP" type="text" maxlength="18" value="<?= $fila['CURP']?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            <span class="icon is-small is-left">
                            <i class="fas fa-address-card"></i>
                            </span>
                        </div>
                    </div>
                    
                    <div class="field col-md-4 mb-12">
                        <label class="label">FECHA DE NACIMIENTO</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="fechaNacimiento" type="date" value="<?= $fila['fechaNacimiento']?>" max="2007-12-31" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            <span class="icon is-small is-left">
                            <i class="fas fa-calendar-alt"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field col-md-4 mb-12">
                        <label class="label">TELÉFONO</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="telefono" type="text" maxlength="10" value="<?= $fila['telefono']?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            <span class="icon is-small is-left">
                            <i class="fas fa-phone"></i>
                            </span>
                        </div>
                        <p class="help">En caso de no tener poner S/N</p>
                    </div>
                    <div class="field col-md-4 mb-12">
                        <label class="label">CELULAR</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="celular" type="text" maxlength="10" value="<?= $fila['celular']?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            <span class="icon is-small is-left">
                            <i class="fas fa-mobile-alt"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field col-md-4 mb-12">
                        <label class="label">CORREO</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="correo" type="email" value="<?= $fila['correo']?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field col-md-4 mb-12">
                        <label class="label">GÉNERO</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="genero" type="text" value="<?= $fila['genero']?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            <span class="icon is-small is-left">
                            <i class="fas fa-dna"></i>
                            </span>
                        </div>
                    </div>
                    <div class="notification is-success is-light has-text-centered col-12">DOMICILIO DEL ASPIRANTE</div>
                    <div class="field col-md-4 mb-12">
                        <label class="label">CALLE</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="calle" type="text" value="<?= $fila['calle']?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            <span class="icon is-small is-left">
                            <i class="fas fa-road"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field col-md-4 mb-12">
                        <label class="label">NÚMERO</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="numeroCasa" type="text" value="<?= $fila['numeroCasa']?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            <span class="icon is-small is-left">
                            <i class="fas fa-hashtag"></i>
                            </span>
                        </div>
                        <p class="help">En caso de no tener poner S/N</p>
                    </div>
                    <div class="field col-md-4 mb-12">
                        <label class="label">COLONIA O LOCALIDAD</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="colonia" type="text" value="<?= $fila['colonia']?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            <span class="icon is-small is-left">
                            <i class="fas fa-map-marker-alt"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field col-md-4 mb-12">
                        <label class="label">MUNICIPIO</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="municipio" type="text" value="<?= $fila['municipio']?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            <span class="icon is-small is-left">
                            <i class="fas fa-map-marked-alt"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field col-md-4 mb-12">
                        <label class="label">CÓDIGO POSTAL</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="codigoPostal" maxlength="5" type="text" value="<?= $fila['codigoPostal']?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            <span class="icon is-small is-left">
                            <i class="fas fa-hashtag"></i>
                            </span>
                        </div>
                    </div>
                    <div class="notification is-success is-light has-text-centered col-12">
                        OPCIONES ESPECIALIDAD
                    </div>
                    <div class="field col-md-4 mb-12">
                        <label class="label">ÓPCION 1</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="opcion1" type="text" value="<?= $fila['especialidad1']?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            <span class="icon is-small is-left">
                            <i class="fas fa-vote-yea"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field col-md-4 mb-12">
                        <label class="label">ÓPCION 2</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="opcion2" type="text" value="<?= $fila['especialidad2']?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            <span class="icon is-small is-left">
                            <i class="fas fa-vote-yea"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field col-md-4 mb-12">
                        <label class="label">ÓPCION 3</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="opcion3" type="text" value="<?= $fila['especialidad3']?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            <span class="icon is-small is-left">
                            <i class="fas fa-vote-yea"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field col-12">
                        <label class="label">¿POR QUÉ ELIGIÓ EL CBTIS PARA CURSAR EL BACHILLERATO?</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="motivoIngreso" type="text" value="<?= $fila['motivoIngreso']?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                            </span>
                        </div>
                    </div>
                    <div class="notification is-info is-light has-text-centered col-12">
                        DATOS PERSONALES DEL TUTOR
                    </div>
                    <div class="field col-md-8 mb-12">
                        <label class="label">NOMBRE TUTOR</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="nombreTutor"  type="text" value="<?= $fila['nombreTutor']?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field col-md-4 mb-12">
                        <label class="label">CELULAR</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="celularTutor" maxlength="10" type="text" value="<?= $fila['celularTutor']?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            <span class="icon is-small is-left">
                            <i class="fas fa-mobile-alt"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field col-md-4 mb-12">
                        <label class="label">TELÉFONO</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="telefonoTutor" maxlength="10" type="text" value="<?= $fila['telefonoTutor']?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            <span class="icon is-small is-left">
                            <i class="fas fa-phone"></i>
                            </span>
                        </div>
                        <p class="help">En caso de no tener poner S/N</p>
                    </div>
                    <div class="field col-md-8 mb-12">
                        <label class="label">DIRECCIÓN</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="direccionTutor"  type="text" value="<?= $fila['direccionTutor']?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            <span class="icon is-small is-left">
                            <i class="fas fa-map-marked-alt"></i>
                            </span>
                        </div>
                    </div>
                    <div class="notification is-warning is-light col-12">
                        INFORMACIÓN DE LA ESCUELA DE PROCEDENCIA
                    </div>
                    <div class="field col-md-4 mb-12">
                        <label class="label">NOMBRE DE LA ESCUELA</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="nombreEscuela" value="<?= $fila['nombreEscuela']?>" type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            <span class="icon is-small is-left">
                            <i class="fas fa-school"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field col-md-4 mb-12">
                        <label class="label">TIPO DE SOSTENIMIENTO</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="tipoSostenimiento" value="<?= $fila['tipoSostenimiento']?>" type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            <span class="icon is-small is-left">
                            <i class="fas fa-school"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field col-md-4 mb-12">
                        <label class="label">PLANTEL DE PROCEDENCIA</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="plantelProcedencia" value="<?= $fila['plantelProcedencia']?>" type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            <span class="icon is-small is-left">
                            <i class="fas fa-school"></i>
                            </span>
                        </div>
                    </div>

                    <div class="field col-md-4 mb-12">
                        <label class="label">TELÉFONO DE LA ESCUELA</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="telefonoEscuela" value="<?= $fila['telefonoEscuela']?>" maxlength="10" type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            <span class="icon is-small is-left">
                            <i class="fas fa-school"></i>
                            </span>
                        </div>
                        <p class="help">En caso de no tener poner S/N</p>
                    </div>
                    <div class="field col-md-4 mb-12">
                        <label class="label">NOMBRE DEL DIRECTOR</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="nombreDirector"  type="text" value="<?= $fila['nombreDirector']?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field col-md-4 mb-12">
                        <label class="label">MUNICIPIO</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" name="municipioEscuela"  type="text" value="<?= $fila['municipioEscuela']?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            <span class="icon is-small is-left">
                            <i class="fas fa-map-marked-alt"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <br>
                <div class="field has-text-centered">
                    <button class="button is-warning" type="submit">MODIFICAR REGISTRO</button>
                </div>
            </form>

            <br>
            
            <div class="has-text-centered">
                <a class="button is-danger" data-toggle="modal" data-target="#eliminarAspirante">Eliminar Registro</a>
            </div>

                <!-- Modal Delete aspirante -->

                <div class="modal fade" id="eliminarAspirante" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Eliminar registro</h5>
                                </div>
                                <div class="modal-body">
                                    ¿Deseas eliminar el registro?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <a type="button" href="./process/deleteaspirante.php?folio=<?= $fila['folio'] ?>" class="btn btn-danger">ELIMIAR</a>
                                </div>
                            </div>
                        </div>
                </div>

            
            <br>
            <div class="columns">
                <div class="column">
                    <div class="notification is-link is-light">
                        <p><strong>Ultima Modificación </strong> <?= $fila['fechaModificacion'] ?></p>
                    </div>
                </div>
                <div class="column">
                    <div class="notification is-link is-light">
                        <p><strong>Modificó: </strong> <?= $fila['modificacionUsuario'] ?></p>
                    </div>
                </div>
            </div>
                    
                    
            
        </div>
        
      </section>

    <?php include "./inc/footer.php"; ?>
</body>
</html>