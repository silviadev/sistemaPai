<div class="content-wrapper">
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col col-lg-6">
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

                <?php echo "Nombre Completo: " . $row->nombre . " " . $row->primerApellido . " " . $row->segundoApellido ?>
                <input type="hidden" name="idUsuario" class="form-control" value="<?php echo $row->idUsuario; ?>">

              </div>

            <?php } // fin IF
            ?>
          <?php } //Fin info usuario 
          ?>


          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Buscar</button>
          </div>
        </form>
      </div>
    </div>
  </div>




  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col col-lg-6">
        <h3>Formulario Paciente</h3>
        <form method="post" id="crearPaciente" name="crearPaciente" action="<?= site_url('paciente/crearPaciente') ?>">
          <div class="form-group">
            <label>Nombre *</label>
            <input type="text" name="nombre" class="form-control" placeholder="Ingrese el Nombre" required>
          </div>
          <div class="form-group">
            <label>Primer Apellido *</label>
            <input type="text" name="primerApellido" class="form-control" placeholder="Ingrese el primer apellido" required>
          </div>
          <div class="form-group">
            <label>Segundo Apellido *</label>
            <input type="text" name="segundoApellido" class="form-control" placeholder="Ingrese el segundo apellido" required>
          </div>

          <div class="form-group">
            <label>FechaNacimiento (dd/mm/yy) *</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
              </div>
              <input type="text" name="fechaNacimiento" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
            </div>
          </div>

          <div class="form-group">
            <label>edad *</label>
            <input type="text" name="edad" class="form-control" placeholder="Ingrese la edad" required>
          </div>

          <div class="form-group">
            <label>Sexo *</label>
            <div class="form-group clearfix">
              <div class="icheck-primary d-inline">
                <input type="radio" id="radioFemenino" name="sexo" value="femenino" checked>
                <label for="radioFemenino">
                  Femenino
                </label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="radio" id="radioMasculino" name="sexo" value="masculino">
                <label for="radioMasculino">
                  Masculino
                </label>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label>estatura (Cm) *</label>
            <input type="number" name="estatura" class="form-control" placeholder="Ingrese la estatura" min="0" max="100" step="0.25" value="0.00" required>
          </div>

          <div class="form-group">
            <label>peso (Kg) *</label>
            <input type="number" name="peso" class="form-control" min="0" max="5" step="0.25" value="0.00" placeholder="Ingrese el peso" required>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary">Crear Paciente</button>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="<?php echo base_url(); ?>/adminLte/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', {
      'placeholder': 'dd/mm/yyyy'
    });

    //Money Euro
    $('[data-mask]').inputmask();
  });
</script>