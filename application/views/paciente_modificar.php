<?php
foreach ($infoPaciente->result() as $row) {
?>


  <div class="content-wrapper">
    <div class="container mt-5">

      <?php
      echo form_open_multipart('paciente/modificarbd');
      ?>

      <div class="form-group">
        <label>Nombre *</label>
        <input type="text" name="nombre" class="form-control" value="<?php echo $row->nombre; ?>" required>
        <input type="hidden" name="idPaciente" class="form-control" value="<?php echo $row->idPaciente; ?>">
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
        <label>fechaNacimiento (dd/mm/yy) *</label>
        <input type="text" name="fechaNacimiento" class="form-control" placeholder="Escriba la fecha de Nacimiento" value="<?php echo $row->fechaNacimiento; ?>" required>
      </div>

      <div class="form-group">
        <label>edad *</label>
        <input type="text" name="edad" class="form-control" placeholder="Escriba la edad" value="<?php echo $row->edad; ?>" required>
      </div>

      <div class="form-group">
        <label>sexo *</label>
        <input type="text" name="sexo" class="form-control" placeholder="Escriba el sexo" value="<?php echo $row->sexo; ?>" required>
      </div>

      <div class="form-group">
        <label>estatura (Cm) *</label>
        <input type="text" name="estatura" class="form-control" placeholder="Escriba la estatura" value="<?php echo $row->estatura; ?>" required>
      </div>

      <div class="form-group">
        <label>peso (Kg) *</label>
        <input type="text" name="peso" class="form-control" placeholder="Escriba el peso" value="<?php echo $row->peso; ?>" required>
      </div>

      <div class="form-group">
        <?php
        $foto = $row->foto;
        if ($foto == "") {
        ?>
          <img width="100" src="<?php echo base_url(); ?>/uploads/paciente/user_default.png">
        <?php
        } else {
        ?>
          <img width="100" src="<?php echo base_url(); ?>/uploads/paciente/<?php echo $foto; ?>">
        <?php
        }
        ?>
      </div>

      <div class="form-group">
        <div>
          <label>Subir Foto</label>
          <input type="hidden" name="idPaciente" value="<?php echo $row->idPaciente; ?>" />
          <input type="file" name="userfile">
        </div>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Guardar</button>
      </div>
      <?php
      echo form_close();
      ?>
    </div>
  </div>
<?php
}
?>