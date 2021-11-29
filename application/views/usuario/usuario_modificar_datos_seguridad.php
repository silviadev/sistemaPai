<?php
//foreach ($infoUsuario->result() as $row) {
?>

  <div class="content-wrapper">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col col-lg-6">

          <div class="card mt-3">
            <div class="card-header">
              <h3 class="card-title">Cambiar contraseña</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <form method="post" id="add_create" name="add_create" action="<?= site_url('usuario/modificarbdDatosSeguridad') ?>">
                <div class="form-group">
                 
                </div>

                <div class="form-group">
                  <label>Antigua Contraseña *</label>
                  <input type="password" name="antiguaContrasena" class="form-control" required>
                  <?php echo form_error('antiguaContrasena', '<div class="error">', '</div>')?>
                </div>

                <div class="form-group">
                  <label>Nueva Contraseña *</label>
                  <input type="password" name="nuevaContrasena" class="form-control" required>
                  <?php echo form_error('nuevaContrasena', '<div class="error">', '</div>')?>
                </div>

                <div class="form-group">
                  <label>Confirmar Contraseña *</label>
                  <input type="password" name="confirmarContrasena" class="form-control" required>
                  <?php echo form_error('confirmarContrasena', '<div class="error">', '</div>')?>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary" onclick="return confirm('Usted quiere actualizar la contraseña?');">Guardar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
//}
?>