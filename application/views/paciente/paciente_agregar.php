<div class="content-wrapper">
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col col-lg-6">

        <div class="card card-primary mt-3">
          <div class="card-header">
            <div class="card-title">Formulario Paciente</div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">

            <form method="post" id="crearPaciente" name="crearPaciente" action="<?= site_url('paciente/crearPaciente') ?>">

              <div class="form-group">
                <label>CI del usuario tutor *</label>
                <select class="form-control select2bs4 select-tutor" style="width: 100%;" name="usuario_tutor" required>
                  <!--  <option selected="selected">Alabama</option> -->
                  <option></option>
                  <?php
                  foreach ($usuario->result() as $row) {
                    $ci = ($row->ci != "") ? "-" . $row->ci: $row->ci;
                  ?>
                    <option value="<?php echo $row->idUsuario; ?>"><?php echo $row->nombre . $ci; ?></option>
                  <?php
                  }
                  ?>
                </select>

                <?php echo form_error('ci', '<div class="error">', '</div>') ?>
              </div>

              <div class="form-group">
                <label>Nombre *</label>
                <input type="text" name="nombre" class="form-control" placeholder="Ingrese el Nombre" required>
              </div>
              <div class="form-group">
                <label>Primer Apellido *</label>
                <input type="text" name="primerApellido" class="form-control" placeholder="Ingrese el primer apellido" required>
              </div>
              <div class="form-group">
                <label>Segundo Apellido</label>
                <input type="text" name="segundoApellido" class="form-control" placeholder="Ingrese el segundo apellido">
              </div>

              <div class="form-group">
                <label>FechaNacimiento (dd/mm/yy) *</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                  </div>
                  <input type="text" name="fechaNacimiento" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask required>
                </div>
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
                <button type="submit" class="btn btn-primary">Crear Paciente</button>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="<?php echo base_url(); ?>/adminLte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>/adminLte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>/adminLte/plugins/select2/js/select2.full.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', {
      'placeholder': 'dd/mm/yyyy'
    });

    //Money Euro
    $('[data-mask]').inputmask();

    $('.select2').select2();

  });
</script>
