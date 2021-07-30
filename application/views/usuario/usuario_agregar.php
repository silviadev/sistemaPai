<div class="content-wrapper">
  <div class="container mt-5">
    <form method="post" id="add_create" name="add_create" action="<?= site_url('usuario/agregarbd') ?>">

      <div class="form-group">
        <label>Nombre *</label>
        <input type="text" name="nombre" class="form-control" placeholder="Escriba el Nombre" required>
      </div>

      <div class="form-group">
        <label>Primer Apellido *</label>
        <input type="text" name="primerApellido" class="form-control" placeholder="Escriba el primer apellido" required>
      </div>

      <div class="form-group">
        <label>Segundo Apellido *</label>
        <input type="text" name="segundoApellido" class="form-control" placeholder="Escriba el segundo apellido" required>
      </div>

      <div class="form-group">
        <label>Direccion</label>
        <input type="text" name="direccion" class="form-control" placeholder="Escriba la dirección">
      </div>

      <div class="form-group">
        <label>Tipo de usuario</label>
        <select class="form-select" name="tipoUsuario" aria-label="Default select example">
          <option selected>Seleccionar tipo de usuario</option>
          <option value="admin" selected="selected">admin</option>
          <option value="tutor">tutor</option>
        </select>
      </div>

      <div class="form-group">
        <label>Correo</label>
        <input type="text" name="correo" class="form-control" placeholder="Escriba la dirección">
      </div>
      <div class="form-group form-check">
        <input type="checkbox" name="habilitado" class="form-check-input" id="habilitado">
        <label class="form-check-label" for="habilitado">Dar de Alta</label>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Crear Usuario</button>

      </div>
    </form>
  </div>
</div>