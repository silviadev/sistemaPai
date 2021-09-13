 
<div class="login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-header text-center">
        <h1>Sistema PAI</h1>
    </div>
    <div class="card-body login-card-body">
      <p class="login-box-msg">¿Olvidaste tu contraseña? Aquí puedes recuperar fácilmente una nueva contraseña?</p>

      <form action="<?= site_url('login/resetPassword') ?>" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          <?php echo form_error('email', '<div class="error">', '</div>')?>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Solicitar nueva contraseña</button>
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
