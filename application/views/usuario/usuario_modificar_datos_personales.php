<?php
foreach ($infoUsuario->result() as $row) {
?>

  <div class="content-wrapper">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col col-lg-6">
          <form method="post" id="add_create" name="add_create" action="<?= site_url('usuario/modificarbdDatosPersonales') ?>">
            <div class="form-group">
              <label>Nombre *</label>
              <input type="text" name="nombre" class="form-control" value="<?php echo $row->nombre; ?>" required>
              <input type="hidden" name="idUsuario" class="form-control" value="<?php echo $row->idUsuario; ?>">
            </div>
            <div class="form-group">
              <label>Primer Apellido *</label>
              <input type="text" name="primerApellido" class="form-control" value="<?php echo $row->primerApellido; ?>" required>
            </div>
            <div class="form-group">
              <label>Segundo Apellido *</label>
              <input type="text" name="segundoApellido" class="form-control" value="<?php echo $row->segundoApellido; ?>" required>
            </div>

            <div class="form-group">
              <label>Direccion</label>
              <input type="text" name="direccion" class="form-control" value="<?php echo $row->direccion; ?>">
            </div>

            <div class="form-group">
              <label>correo</label>
              <input type="text" name="correo" class="form-control" value="<?php echo $row->correo; ?>">
            </div>

            <div class="form-group">
              <label>Nombre usuario</label>
              <input type="text" name="nombreUsuario" class="form-control" value="<?php echo $row->nombreUsuario; ?>">
            </div>

            <div class="form-group">
              <label>Nueva Contraseña</label>
              <input type="text" name="contrasena" class="form-control" value="">
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php
}
?>