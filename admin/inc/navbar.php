<?php $url = "https://tecmisantla.tech/posgrado" ?>
<?php $url2 = "http://localhost/maestria" ?>

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
    <!-- Navbar -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
		
            <a class="navbar-brand" >Administración</a>  
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse " id="navbarNav">
            <div class="navbar-end">
            <div class="navbar-item">
              <div class="buttons">
              <?php
              /* Evalua la sesion */
                if(!$_SESSION['user'] == ""){
                  echo '
                  <a class="button is-light" data-toggle="modal" data-target="#cerrarSesion">
                    '.$_SESSION['user'].'
                  </a>';
                } 
              ?>
              </div>
            </div>
          </div>

		</div>
    </nav>
    
    <!-- Modal Logout -->

    <div class="modal fade" id="cerrarSesion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Cerrar</h5>
                    </div>
                    <div class="modal-body">
                        ¿Deseas cerrar tu sesión?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <a type="button" href="<?= $url2 ?>/admin/process/logout.php" class="btn btn-danger">Salir</a> <!-- Cambiar href-->
                    </div>
                </div>
            </div>
    </div>