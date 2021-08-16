<div class="content-wrapper">
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col col-lg-6">

        <div class="card mt-3">
          <div class="card-header">
            <h3 class="card-title">Agregar Usuario</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">

            <form method="post" id="add_create" name="add_create" action="<?= site_url('usuario/agregarbd') ?>">

              <div class="form-group">
                <label for="nombre" class="form-label">Nombre *</label>
                <input id="" type="text" name="nombre" class="form-control" placeholder="Escriba el Nombre" required>
              </div>

              <div class="form-group">
                <label>Primer Apellido *</label>
                <input type="text" name="primerApellido" class="form-control" placeholder="Escriba el primer apellido" required>
              </div>

              <div class="form-group">
                <label>Segundo Apellido (Opcional)</label>
                <input type="text" name="segundoApellido" class="form-control" placeholder="Escriba el segundo apellido">
              </div>

              <div class="form-group">
                <label>CI *</label>
                <input type="text" name="ci" class="form-control" placeholder="Escriba su numero de carnet de identidad" required>
              </div>

              <div class="form-group">
                <label>Direccion</label>
                <input type="text" name="direccion" class="form-control" placeholder="Escriba la dirección">
              </div>

              <div class="form-group">
                <label>Tipo de usuario</label>
                <select class="form-select" name="tipoUsuario" aria-label="seleccionar por defecto">
                  <option selected>Seleccionar tipo de usuario</option>
                  <option value="admin" selected="selected">admin</option>
                  <option value="tutor">tutor</option>
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
              <button type="submit" class="btn btn-primary">Crear Usuario</button>
            </form>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>