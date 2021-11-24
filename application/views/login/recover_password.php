
<div class="login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card">
    <div class="card-header text-center">
        <h1>Sistema PAI</h1>
    </div>
      <div class="card-body login-card-body">
        <p class="login-box-msg">Está a solo un paso de su nueva contraseña, recupere su contraseña ahora.</p>

        <form action="<?= site_url('login/guardarBd') ?>" method="post">
          <input type="hidden" name="idUsuario" class="form-control" value="<?php echo $idUsuario; ?>">
          <div class="input-group mb-3">

            <input type="password" name="nuevaContrasena" class="form-control" placeholder="Nueva Contraseña">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="confirmarContrasena" class="form-control" placeholder="Confirm Contraseña">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Cambiar contraseña</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <p class="mt-3 mb-1">
          <a href="<?php echo base_url() ?>login">Login</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>

</div>
