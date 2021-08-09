<div class="content-wrapper alert-dark">
  <nav class="navbar navbar-expand-lg navbar-light bg-success">
    <div>
      <b>
        <?php
        echo  "Usuario" . ": " . $nombre . " " . $primerApellido . " " . $segundoApellido;
        ?>
      </b>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Configuracion
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?php echo base_url() ?>usuario/modificarDatosPersonales">Cambiar Datos Personales</a>
          </div>
        </li>
      </ul>
      <div>
        <?php
        echo form_open_multipart('login/logout');
        ?>
        <button class="btn btn-danger">Cerrar Session</button>
        <?php
        echo form_close();
        ?>
      </div>

    </div>
  </nav>
  <section>
    <div class="container text-dark">
      <h3><b>Mis hijos</b></h3>
      <div class="row justify-content-md-center">
        <div class="col-md-auto">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" width="100" src="<?php echo base_url(); ?>/uploads/paciente/user_default.png" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Hernan Veizaga</h5>
              <p class="card-text">Edad: 2 años</p>
            </div>
          </div>
        </div>
        <div class="col-md-auto">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" width="100" src="<?php echo base_url(); ?>/uploads/paciente/user_default.png" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Jose Veizaga</h5>
              <p class="card-text">Edad: 5 años</p>
            </div>
          </div>
        </div>
        <div class="col-md-auto">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" width="100" src="<?php echo base_url(); ?>/uploads/paciente/user_default.png" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Fabi Veizaga</h5>
              <p class="card-text">Edad: 2 meses</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>