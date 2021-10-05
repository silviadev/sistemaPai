<div class="content-wrapper">
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col col-lg-10">

        <div class="card card-primary mt-3">
          <div class="card-header">
            <div class="card-title">Paciente vacuna</div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">

            <?php
            //echo form_open_multipart('pacientevacuna/registrarPacienteVacuna');
            ?>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Paciente</label>
                  <select class="select-paciente-ajax form-control select2bs4" style="width: 100%;" name="paciente">
                    <option></option>
                    <?php
                    foreach ($pacienteCodigo->result() as $row) {
                      $codigo = $row->codigo;
                    ?>
                      <option value="<?php echo $row->idUsuario; ?>"><?php echo $row->nombre . " " . $row->primerApellido . " " . $row->segundoApellido . " - " . $codigo; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="table-responsive-sm">
              <table class="table table-sm table-bordered">
                <thead class="vacuna-cabecera">
                  <tr>
                    <th>Edad de aplicación (Meses)</th>
                    <th>Vacuna</th>
                    <th>Fecha vacuna</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody id="tabla-vacunas">

                </tbody>
              </table>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
              </div>
            </div>
            <?php
            //echo form_close();
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="<?php echo base_url(); ?>/adminLte/plugins/jquery/jquery.min.js"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url(); ?>adminLte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {

    $('.select-paciente-ajax').on('change', function() {
      var idPaciente = $(".select-paciente-ajax option:selected").val();
      console.log(idPaciente);
      var tablaDosis = $("tbody");

      if (idPaciente != '') {
        $.ajax({
          data: {
            idPaciente: idPaciente
          },
          url: '<?= base_url() ?>pacientevacuna/buscarDosisPaciente',
          type: 'POST',
          dataType: 'json',
          success: function(r) {
            console.log("jasdkfjaklsd", r);
            tablaDosis.find('tr').remove();

            $(r).each(function(indice, valor) {
              console.log(valor);
              tablaDosis.append(
                '<tr class="bg-color-'+ valor.rangoMesInicial +'">' +
                '<td><label>' + valor.rangoMesInicial + '</label></td>' +
                '<td><label>' + valor.nombrevacuna + " " + valor.dosis + " " + valor.nombrevia + '</label></td>' +
                '<td>' +

                '<div class="input-group">' +
                '<div class="input-group-prepend">' +
                '<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>' +
                '</div>' +
                '<input type="text" name="fechavacunapaciente" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask required>' +
                '</div>' +

                '</td>' +
                '<td>' +
                '<div class="form-check">' +
                '<input class="form-control form-check-input" type="checkbox" value="" id="flexCheckChecked">' +
                '</div>' +
                '</td>' +
                '</tr>'
              );
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

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', {
      'placeholder': 'dd/mm/yyyy'
    });

    //Money Euro
    $('[data-mask]').inputmask();

  });
</script>