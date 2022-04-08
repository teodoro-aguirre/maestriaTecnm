<!DOCTYPE html>
<html lang="en">

<head>
    <title>Maestria ITSM - Entrevista</title>
    <?php
        include("../inc/link.php")
    ?>
</head>

<body>
    <?php
        include("../inc/navbar.php")
    ?>
    <div class="container-row mt-2">
        <div class="row">
            <div class="col col-md-1 col-lg-1 col-sm-1"></div>

            <div class="col col-md-3 col-lg-4 col-10">
                <img src="/assets/media/logos/logo-oficial.png" style="max-height: 120px;" class="img-fluid" alt="">
            </div>

            <div class="col col-md-4 col-lg-4 col-mb-0">
                <img src="/assets/media/logos/Tecnm-logo.png" style="max-height: 120px;" class="img-fluid" alt="">
            </div>
            <div class="col-md-4 col-lg-3 col col-mb-0">
                <img src="assets/media/logos/MARCAVERACRUZ.png" style="max-height: 120px;" class="img-fluid" alt="">
            </div>
            <div class="col-lg-1"></div>
            <br>
        </div>
    </div>

    <div class="container">
        <div class="container" style="text-align: center;">
            <h1 class="title" style="text-align: center;">Entrevista tutor - tutorado</h1>
            <p class="fs-3">Final de semestre</p>
        </div>
        <h4>Alumno: Juan Perez Delgado</h4>
        <h4>Semestre: 4</h4>
        <h4>Número de Control: 202T0321</h4>
        <h4>Programa Académico: MSC</h4>
        <hr>
        <form action="">
            <!-- SITUACIÓN ACADÉMICA -->
            <div class="alert alert-primary" style="text-align: center;" role="alert">
                <strong>SITUACIÓN ACADÉMICA</strong>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Carga Académica</label>
                <textarea placeholder="El tutorado debe informar de las materias y los docentes que se le asignaron en su carga académica. El tutor puede investigar si existen inconvenientes académicos en las materias del semestre, por ejemplo, dificultades de programación, problemas con matemáticas, temas desconocidos, horario, etc." class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Estrategias de estudio</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="El tutorado expresa las estrategias de estudio a implementar para la aprobación del semestre. El tutor puede dar sugerencias en este tópico." rows="3"></textarea>
            </div>

            <!-- SITUACIÓN PERSONAL -->
            <div class="alert alert-primary" style="text-align: center;" role="alert">
                <strong>SITUACIÓN PERSONAL</strong>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Problemas familiares</label>
                <textarea placeholder="" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Problemas sentimentales</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Otras problemáticas detectadas</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="" rows="3"></textarea>
            </div>
            <!-- SITUACIÓN PERSONAL -->
            <div class="alert alert-primary" style="text-align: center;" role="alert">
                <strong>PROYECTO DE TESIS</strong>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Avance del proyecto de tesis(%)</label>
                <input type="number" class="form-control" id="exampleFormControlTextarea1" aria-describedby="tesisHelp">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Actividades programadas para el semestre</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Productos programados para el semestre</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="" rows="3"></textarea>
            </div>
        </form>
        <div class="text-center">
            <a href="" class="btn btn-lg btn-danger">Registrar Entrevista</a>

        </div>
    </div>

    </div>

    <?php
        include("../inc/footer.php")
    ?>
</body>

</html>