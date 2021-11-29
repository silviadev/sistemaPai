<?php
foreach ($infoUsuario->result() as $row) {
?>

  <div class="content-wrapper">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col col-lg-6">

          <div class="card mt-3">
            <div class="card-header">
              <h3 class="card-title">Actualizar datos usuario</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <form method="post" id="add_create" name="add_create" action="<?= site_url('usuario/modificarbdDatosPersonales') ?>">
                <div class="form-group">
                  <input type="hidden" name="idUsuario" class="form-control" value="<?php echo $row->idUsuario; ?>">
                  <input type="hidden" name="tipoUsuario" class="form-control" value="<?php echo $row->tipoUsuario; ?>">
                </div>

                <div class="form-group">
                  <label>Direccion</label>
                  <input type="text" name="direccion" class="form-control" value="<?php echo $row->direccion; ?>">
                </div>

                <div class="form-group">
                  <label>correo</label>
                  <input type="email" name="correo" class="form-control" value="<?php echo $row->correo; ?>">
                </div>

                <!-- <div class="form-group">
                  <label>Nombre usuario</label>
                  <input type="text" name="nombreUsuario" class="form-control" value="<?php echo $row->nombreUsuario; ?>">
                </div> -->

                <div class="form-group">
                  <button type="submit" class="btn btn-primary" onclick="return confirm('Usted quiere actualizar los datos de usuario?');">Guardar</button>
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