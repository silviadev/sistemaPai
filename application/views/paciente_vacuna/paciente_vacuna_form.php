<div class="content-wrapper">
  <!-- /.card-header -->
  <div class="card-body">
    <?php
    echo form_open_multipart('pacientevacuna/registrarPacienteVacuna');
    ?>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>CI tutor</label>
          <select class="form-control select2bs4 select-tutor" style="width: 100%;" name="usuario_tutor">
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
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Paciente</label>
          <select class="select-paciente-ajax form-control select2bs4" style="width: 100%;" name="paciente">
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Dosis</label>

          <select class="select2bs4 select-dosis-ajax" multiple="multiple" data-placeholder="Select a State" style="width: 100%;" name="dosis[]">
            <?php
            foreach ($listaDosis->result() as $row) {
            ?>
              <option value="<?php echo $row->idDosis; ?>"><?php echo $row->vacunaNombre . " " . $row->dosisNombre . " via " . $row->viaNombre; ?></option>
            <?php
            }
            ?>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Siguiente dosis</label>
          <select class="select2bs4" name="siguienteDosis[]" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
            <?php
            foreach ($listaDosis->result() as $row) {
            ?>
              <option value="<?php echo $row->idDosis; ?>"><?php echo $row->vacunaNombre . " " . $row->dosisNombre . " via " . $row->viaNombre; ?></option>
            <?php
            }
            ?>
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Fecha proxima vacuna:</label>
          <div class="input-group date" id="reservationdate" data-target-input="nearest">
            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" />
            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
      </div>
    </div>
    <?php
    echo form_close();
    ?>
  </div>
</div>

<!-- jQuery -->
<script src="<?php echo base_url(); ?>/adminLte/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.select-tutor').on('change', function() {
      var idTutor = $(".select-tutor option:selected").val();

      var pacientes = $(".select-paciente-ajax");
      if (idTutor != '') {
        $.ajax({
          data: {
            idTutor: idTutor
          },
          url: '<?= base_url() ?>pacientevacuna/buscarPacientes',
          type: 'POST',
          dataType: 'json',
          success: function(r) {
            console.log(r);
            // Limpiamos el select
            pacientes.find('option').remove();

            $(r).each(function(i, v) { // indice, valor
              pacientes.append('<option value="' + v.idPaciente + '">' + v.nombre + '</option>');
            })

            //pacientes.prop('disabled', false);
          },
          error: function() {
            alert('Ocurrio un error en el servidor ..');
            //alumnos.prop('disabled', false);
          }
        });
      }
    });

    /*$('.select-paciente-ajax').on('change', function() {
      var idPaciente = $(".select-paciente-ajax option:selected").val();
      console.log(idPaciente);
      var dosis = $(".select-dosis-ajax");

      if (idPaciente != '') {
        $.ajax({
          data: {
            idPaciente: idPaciente
          },
          url: '<?= base_url() ?>pacientevacuna/buscarDosisPaciente',
          type: 'POST',
          dataType: 'json',
          success: function(r) {
            console.log(r);
            dosis.find('option').remove();

            $(r).each(function(indice, valor) {
              dosis.append('<option value="' + valor.idDosis + '">' + valor.dosisNombre + '</option>');
            })

            //pacientes.prop('disabled', false);
          },
          error: function() {
            alert('Ocurrio un error en el servidor ..');
            //alumnos.prop('disabled', false);
          }
        });
      }
    });*/

  });
</script>