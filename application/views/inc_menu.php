<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="<?php echo base_url() ?>usuario" class="nav-link">Inicio</a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
        <i class="fas fa-th-large"></i>
      </a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <div class="brand-link">
    <span class="brand-text font-weight-light">Sistema PAI</span>
  </div>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="#" class="nav-link">
            <p>
              <?php
              echo  $nombre . " " . $primerApellido . " " . $segundoApellido;
              ?>
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url() ?>usuario/modificarDatosPersonales" class="nav-link">
                <i class="fas fa-user nav-icon"></i>
                <p>Cambiar Datos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url() ?>usuario/modificarContrasena" class="nav-link">
                <i class="fas fa-user nav-icon"></i>
                <p>Seguridad de cuenta</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url() ?>login/logout" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>Cerrar Session</p>
              </a>
            </li>
          </ul>
        </li>

        <li>
        <div class="brand-link"></div>
        </li>
        <li class="nav-header">Administrar</li>
        <li class="nav-item">
          <a href="<?php echo base_url() ?>usuario" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Usuarios
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url() ?>paciente" class="nav-link">
            <i class="nav-icon fas fa-child"></i>
            <p>
              Pacientes
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url() ?>vacuna" class="nav-link">
            <i class="nav-icon fas fa-book-medical"></i>
            <p>
              Vacuna
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url() ?>vacuna" class="nav-link">
            <i class="nav-icon fas fa-syringe"></i>
            <p>
              Registrar vacuna a paciente
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>