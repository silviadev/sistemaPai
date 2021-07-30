
<div class="content-wrapper">
  <div class="container mt-5">
    <h3>Buscar usuario Padre de familia o tutor</h3>
    <form method="post" id="agregarBd" name="agregarBd" action="<?= site_url('usuario/buscarPorNombre') ?>">
      <div class="form-group">
          <label>Nombre del Tutor *</label>
          <input type="text" name="nombre" class="form-control" placeholder="Escriba el nombre del Padre o tutor" required pattern="[A-Za-z0-9]{1,20}">
      </div>

      <?php
        if (isset($infoUsuario)) {
          foreach ($infoUsuario->result() as $row) {
          ?>
          <div class="form-group alert alert-success ">
            <label>Nombre del Tutor</label>
            
            <?php echo "Nombre Completo: ".$row->nombre." ".$row->primerApellido." ".$row->segundoApellido?>
            <input type="hidden" name="idUsuario" class="form-control" value="<?php echo $row->idUsuario;?>"> 
        
          </div>
            
        <?php } // fin IF?>
      <?php } //Fin info usuario ?>
      

      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Buscar</button>
      </div>
    </form>
  </div>




  <div class="container mt-5">
    <h3>Formulario Paciente</h3>
    <form method="post" id="crearPaciente" name="crearPaciente" action="<?= site_url('paciente/crearPaciente') ?>">
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
        <label>fechaNacimiento (dd/mm/yy) *</label>
        <input type="text" name="fechaNacimiento" class="form-control" placeholder="Escriba la fecha de Nacimiento" required>
      </div>

      <div class="form-group">
        <label>edad *</label>
        <input type="text" name="edad" class="form-control" placeholder="Escriba la edad" required>
      </div>

      <div class="form-group">
        <label>sexo *</label>
        <input type="text" name="sexo" class="form-control" placeholder="Escriba el sexo" required>
      </div>

      <div class="form-group">
        <label>estatura (Cm) *</label>
        <input type="text" name="estatura" class="form-control" placeholder="Escriba la estatura" required>
      </div>

      <div class="form-group">
        <label>peso (Kg) *</label>
        <input type="text" name="peso" class="form-control" placeholder="Escriba el peso" required>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Crear Paciente</button>

      </div>
    </form>
  </div>
</div>