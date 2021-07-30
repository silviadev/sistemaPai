<?php
foreach ($infoUsuario->result() as $row) {
?>

<div class="content-wrapper">
  <div class="container mt-5">
    <form method="post" id="add_create" name="add_create" 
        action="<?= site_url('usuario/modificarbd') ?>">
      <div class="form-group">
        <label>Nombre *</label>
        <input type="text" name="nombre" class="form-control" value="<?php echo $row->nombre;?>" required> 
        <input type="hidden" name="idUsuario" class="form-control" value="<?php echo $row->idUsuario;?>"> 
      </div>
      <div class="form-group">
        <label>Primer Apellido *</label>
        <input type="text" name="primerApellido" class="form-control" value="<?php echo $row->primerApellido;?>" required>
      </div>
      <div class="form-group">
        <label>Segundo Apellido *</label>
        <input type="text" name="segundoApellido" class="form-control" value="<?php echo $row->segundoApellido;?>" required>
      </div>
      <div class="form-group">
        <label>Direccion</label>
        <input type="text" name="direccion" class="form-control" value="<?php echo $row->direccion;?>">
      </div>

      <div class="form-group">
        <label>Correo</label>
        <input type="text" name="correo" class="form-control" value="<?php echo $row->direccion;?>">
      </div>

      <div class="form-group form-check">
        <input type="checkbox" name="habilitado" class="form-check-input" id="habilitado" <?php  if(isset($row->habilitado)&& $row->habilitado == 1){echo 'checked'; }  ?> >
        <label class="form-check-label" for="habilitado">Dar de Alta</label>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Guardar</button>
      </div>
    </form>
  </div>
</div>
<?php
}
?>