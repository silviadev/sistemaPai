<?php
foreach ($infoUsuario->result() as $row) {
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
                  <input type="hidden" name="idUsuario" class="form-control" value="<?php echo $row->idUsuario; ?>">
                  <input type="hidden" name="tipoUsuario" class="form-control" value="<?php echo $row->tipoUsuario; ?>">
                </div>

                <div class="form-group">
                  <label>Contraseña antiguo</label>
                  <input type="text" name="antiguaContrasena" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Nueva contraseña</label>
                  <input type="text" name="nuevaContrasena" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Confirmar nueva contraseña</label>
                  <input type="text" name="confirmarContrasena" class="form-control" required>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
}
?>