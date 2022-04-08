<?php $url = "http://localhost/posgrado" ?>
<div class="container-row mt-2">
    <div class="row">
        <div class="col col-md-1 col-lg-1 col-sm-1"></div>

        <div class="col col-md-3 col-lg-4 col-10">
            <img src="<?= $url ?>/assets/media/logos/logo-oficial.png" style="max-height: 120px;" class="img-fluid" alt="">
        </div>
        <div class="col col-md-4 col-lg-4 col-mb-0">
            <img src="<?= $url ?>/assets/media/logos/Tecnm-logo.png" style="max-height: 120px;" class="img-fluid" alt="">
        </div>
        <div class="col-md-4 col-lg-3 col col-mb-0">
            <img src="<?= $url ?>/assets/media/logos/MARCAVERACRUZ.png" style="max-height: 120px;" class="img-fluid" alt="">
        </div>
        <div class="col-lg-1"></div>
        <br>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark p-md-3" style="background-color: #691B33;">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= $url ?>">
            Posgrado
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= $url ?>">Inicio</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" id="navbarDropdownMenuGobierno" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false" href="#">Tutoría</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuGobierno">
                        <li><a class="dropdown-item" href="<?= $url ?>/tutorados">Tutorados</a></li>
                    </ul>
                </li>
            </ul>
            <a class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#cerrarSesion">
                Bienvenido: <?= $_SESSION['user'] ?>
            </a>
        </div>
    </div>
</nav>


<div class="modal fade" id="cerrarSesion" tabindex="-1" aria-labelledby="logoutModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logoutModal">Cerrar sesión</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Deseas cerrar la sesión?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <a type="button" href="./process/logout.php" class="btn btn-danger">Salir</a>
      </div>
    </div>
  </div>
</div>
