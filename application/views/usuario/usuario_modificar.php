<?php
function set_selected($desired_value, $new_value)
{
    if($desired_value==$new_value)
    {
        echo ' selected="selected"';
    }
}

foreach ($infoUsuario->result() as $row) {
?>

  <div class="content-wrapper">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col col-lg-6">

          <div class="card mt-3">
            <div class="card-header">
              <h3 class="card-title">Actualizar Usuario</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <form method="post" id="add_create" name="add_create" action="<?= site_url('usuario/modificarbd') ?>">
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
                  <label>Segundo Apellido (Opcional)</label>
                  <input type="text" name="segundoApellido" class="form-control" value="<?php echo $row->segundoApellido; ?>">
                </div>

                <div class="form-group">
                  <label>CI *</label>
                  <input type="text" name="ci" class="form-control" placeholder="Escriba su numero de carnet de identidad" value="<?php echo $row->ci; ?>" required>
                </div>

                <div class="form-group">
                  <label>Direccion</label>
                  <input type="text" name="direccion" class="form-control" value="<?php echo $row->direccion; ?>">
                </div>

                <div class="form-group">
                  <label>Tipo de usuario</label>
                  <select class="form-select" name="tipoUsuario" aria-label="seleccionar por defecto" >
                    <option value="admin" <?php set_selected('admin', $row->tipoUsuario); ?>>Admin</option>
                    <option value="tutor" <?php set_selected('tutor', $row->tipoUsuario); ?>>Tutor</option>
                    <option value="responsableVacuna" <?php set_selected('responsableVacuna', $row->tipoUsuario); ?>>Responsable Vacuna</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Correo</label>
                  <input type="email" name="correo" class="form-control" value="<?php echo $row->correo; ?>">
                </div>

                <div class="form-group form-check">
                  <input type="checkbox" name="habilitado" class="form-check-input" id="habilitado" <?php if (isset($row->habilitado) && $row->habilitado == 1) {
                                                                                                      echo 'checked';
                                                                                                    }  ?>>
                  <label class="form-check-label" for="habilitado">Dar de Alta</label>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                  <!--               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-sm">
              Guardar
              </button> -->
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

<?php
echo form_open_multipart('login/logout');
?>
<div class="modal fade" id="modal-sm">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Usuario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Estas seguro de guardar los cambios?</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary">Si</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->