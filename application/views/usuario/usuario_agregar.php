<div class="content-wrapper">
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col col-lg-6">

        <div class="card card-primary mt-3">
          <div class="card-header">
            <label class="card-title">Agregar Usuario</label>
          </div>
          <!-- /.card-header -->
          <div class="card-body">

            <form method="post" id="add_create" name="add_create" action="<?= site_url('usuario/agregarbd') ?>">

              <div class="form-group">
                <label for="nombre" class="form-label">Nombre *</label>
                <input id="nombre" type="text" name="nombre" class="form-control" placeholder="Escriba el Nombre" pattern="[A-Za-z]+" required>
              </div>

              <div class="form-group">
                <label>Primer Apellido *</label>
                <input type="text" id="apellidoPaterno" name="primerApellido" class="form-control" placeholder="Escriba el primer apellido" pattern="[A-Za-z]+" required>
              </div>

              <div class="form-group">
                <label>Segundo Apellido</label>
                <input type="text" name="segundoApellido" class="form-control" placeholder="Escriba el segundo apellido" pattern="[A-Za-z]+">
              </div>

              <div class="form-group">
                <label>CI *</label>
                <input type="text" name="ci" class="form-control" placeholder="Escriba su numero de carnet de identidad" minlength="6" pattern="[a-zA-Z0-9-]+"  required>
              </div>

              <div class="form-group">
                <label>Direccion</label>
                <input type="text" name="direccion" class="form-control" placeholder="Escriba la dirección">
              </div>

              <div class="form-group">
                <label>Tipo de usuario</label>
                <select class="form-select" name="tipoUsuario" aria-label="seleccionar por defecto">
                    <option value="admin">Admin</option>
                    <option value="tutor">Tutor</option>
                    <option value="responsableVacuna">Responsable Vacuna</option>
                </select>
              </div>

              <div class="form-group">
                <label>Correo</label>
                <input type="email" name="correo" class="form-control" placeholder="Escriba la dirección">
              </div>
              <div class="form-group form-check">
                <input type="checkbox" name="habilitado" class="form-check-input" id="habilitado">
                <label class="form-check-label" for="habilitado">Dar de Alta</label>
              </div>
              <div class="form-group">
                <label>Nombre Usuario *</label>
                <input type="text" id="nombreUsuario" name="nombreUsuario" class="form-control" placeholder="NombreUsuario" required>
                <?php echo validation_errors('<div class="error">', '</div>'); ?>
              </div>
              <button type="submit" class="btn btn-primary">Crear Usuario</button>
            </form>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>

 <!-- jQuery -->
 <script src="<?php echo base_url(); ?>/adminLte/plugins/jquery/jquery.min.js"></script>
<script>
  var nombre = "";
  nombre = $('#nombre').val();
  $('#nombre').on('input',function(e){
    var value = $('#nombre').val().substr(0, 1);
    var nombre = value + "" + $("#apellidoPaterno").val();
    $("#nombreUsuario").val(nombre.toLowerCase());
  });

  $("#apellidoPaterno").on("input", function(e) {
    var value = $('#nombre').val().substr(0, 1);
    var apellidoPaterno = value + "" + $("#apellidoPaterno").val();
    $("#nombreUsuario").val(apellidoPaterno.toLowerCase());
  });
</script>